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
        .submit-btn {
            padding: 10px;
            width: 200px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

    <form action="importUsers.php" enctype="multipart/form-data" method="POST">
        <input type="file" id="file" name="file">
        <input class="submit-btn" type="submit" value="Import CSV" name="submit">
    </form>

</body>
</html>
