<?php
session_start();
include('fungsi.php');
$fungsi = new Fungsi();
$validasi = new Validasi();
//jika user terdaftar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $user = $fungsi->login($username);
    if ($user) {
        //check password
        if (password_verify($password, $user["password"])) {
            if ($user["aktif"] == "Y") {
                // buat Session
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION['auth'] = 0;
                // login sukses, alihkan ke halaman timeline
                header("Location: index.php");
            } else {
                $_SESSION['log'] = $validasi->alert_blokir();
                header('location:login.php');
            }
        } else if ($user['aktif'] == "T") {
            $_SESSION['log'] = $validasi->alert_blokir();
            header('location:login.php');
        } else {
            if (isset($_SESSION['auth'][$user['nama_user']])) {
                $_SESSION['auth'][$user['nama_user']]++;
                echo $_SESSION['auth'][$user['nama_user']];
            } else {
                $_SESSION['auth'][$user['nama_user']] = 0;
            }

            if ($_SESSION['auth'][$user['nama_user']] >= 4) {
                $fungsi->blokir_akun($user["nama_user"]);
                $_SESSION['log'] = $validasi->alert_blokir();
                $_SESSION['auth'][$user['nama_user']] = 0;
                header('location:login.php');
            } else {
                $_SESSION['log'] = $validasi->alert_password_salah();
                header('location:login.php');
            }
        }
    } else {
        $obj = $validasi->alert_password_user_salah();
        $_SESSION['log'] = 'hai';
        //header('location:login.php');
        header('location:login.php');
        //$log = $_SESSION['log'];
        //echo $log;
    }
}
