<html lang="en">
<head>
    <title>CodePen - Create and Download CSV</title>
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

    <form action="/controller/importUsers.php">
        <input type="file" id="file" name="file">
        <button type="submit">Import CSV</button>
    </form>

</body>
</html>