<?php




require 'Services/Database.php';

$config = require('config.php');
$db = new \Services\Database($config);

var_dump('<pre>');
var_dump($db->query('
    CREATE TABLE Persons (
            PersonID int,
            LastName varchar(255),
            FirstName varchar(255),
            Address varchar(255),
            City varchar(255)
        );
'));
var_dump('</pre>');












?>


<html lang="en">
<head>
    <title>Import Users - CSV</title>
    <style>
        * {
            font-size: 24px;
        }
        form {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 50px 320px;
            border-radius: 20px;
            text-align: center;
            text-decoration: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
        }
        button {
            padding: 10px;
            width: 200px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

    <form action="/Controller/ImportUsersController.php" enctype="multipart/form-data">
        <input type="file" id="file" name="file">
        <button type="submit">Import CSV</button>
    </form>

</body>
</html>