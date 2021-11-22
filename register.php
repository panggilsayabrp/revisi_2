<?php

require 'function.php';
global $db;

if (isset($_POST['register'])) {
    if (userRegister($_POST) > 0) {
        echo "
            <script>
              alert('Registration successful')
            </script>
        ";
        header('Location: index.php');
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h3 class="mx-3 px-4 my-3">Silahkan Register</h3>

<form action="" method="post">
    <div class="col-6 mx-3 px-4">
        <div class="mb-3">
            <label for="username" class="form-label">Email address</label>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="option"></label>
            <select class="form-select" aria-label="Default select example" name="option" id="option">
                <option value="admin">admin</option>
                <option value="pengguna">pengguna</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="register">Submit</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>