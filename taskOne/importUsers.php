<?php

$config = require 'config.php';

if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

    $db = new PDO(
        'pgsql:' . http_build_query($config, '', ';'),
        $config['user'],
        $config['password']
    );

    move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['full_path']);

    $file = fopen($_FILES['file']['full_path'], 'r');

    while (($data = fgetcsv($file, 1000, ',')) !== FALSE) {

        $phoneNumber = $data[0];
        $name = $data[1];

        $sql = 'insert into users (phone_number, name) values (:phone_number, :name)';

        $statement = $db->prepare($sql);

        $statement->bindParam(':phone_number', $phoneNumber);
        $statement->bindParam(':name', $name);

        $statement->execute();
    }

    fclose($file);

    echo "Success!";
} else {
    echo "Upload file please!";
}
