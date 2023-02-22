<?php

$config = require 'config.php';

$db = new PDO(
    'pgsql:' . http_build_query($config, '', ';'),
    $config['user'],
    $config['password']
);

$rowsCount = $db->query('select count(*) from users;')->fetch()['count'];
$chunkSize = 1000;

for ($i = 0; $i < $rowsCount/$chunkSize; $i++) {
    $offset = $chunkSize * $i;

    $users = $db->prepare('select * from users where sent = 0 order by id limit :limit offset :offset;');
    $users->bindParam(':limit', $chunkSize);
    $users->bindParam(':offset', $offset);
    $users->execute();

    notifyAllUsersJob($users->fetchAll(), $db);
}

function notifyAllUsersJob(array $users, PDO $db)
{
    foreach ($users as $user) {
        $updateResult = $db->prepare('update users set sent = 1 where id = :user_id');
        $updateResult->bindParam(':user_id', $user['id']);
        $updateResult->execute();

        sendMessage($user);
        var_dump($user['id']);
    }
}

function sendMessage(array $user): string
{
    return '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Message for you, dear '. $user['name'] .'</title>
        </head>
        <body>
            <p>Hello '. $user['id'] .'</p>
        </body>
        </html>
    ';
}


