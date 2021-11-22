<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "db_laundry";

$db = mysqli_connect($hostname,$username,$password,$db_name);

function userRegister($data): bool|int|string
{

    global $db;

    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($db, $data['password']);
//    tambah select
    $option = $data['option'];

    $query = mysqli_query($db, "SELECT username FROM pengguna WHERE username ='$username'");

    if (mysqli_fetch_assoc($query)) {
        echo "
            <script>
                alert('Username is already exists');
            </script>
        ";

        return false;
    }

    $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO pengguna VALUES ('','$username','$passwordEncrypted', '$option')");


    return mysqli_affected_rows($db);

}

function userLogin($data) {
    global $db;

    $username = $data['username'];
    $password = mysqli_real_escape_string($db, $data['password']);

    $query = mysqli_query($db, "SELECT * FROM pengguna WHERE username ='$username'");

    if (mysqli_num_rows($query)) {
        $rows = mysqli_fetch_array($query);

        if (password_verify($password, $rows['password'])) {

            session_start();

            $ssn = $_SESSION['login'] = true;

            if ($rows['role'] == 'admin' && $ssn) {
                header('Location: index.php');
                exit;
            } else if ($rows['role'] == 'pengguna' && $ssn) {
                header('Location: pengguna.php');
                exit;
            }



            /*if ($rows['role'] === 'admin') {
                $_SESSION['login'] = true;
                header('Location: index.php');

            } else if ($rows['role'] === 'pengguna') {
                $_SESSION['login'] = true;
                header('Location: pengguna.php');
            }*/

        } else {
            echo "
            <script>
                alert('Password Salah');
            </script>
        ";
        }
    } else {
        echo "
            <script>
                alert('Username Tidak Terdaftar');
            </script>
        ";
    }
}
