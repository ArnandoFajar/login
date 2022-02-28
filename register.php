<?php
include('fungsi.php');
$fungsi = new Fungsi();
$validasi = new Validasi();

$error_nama = "";
$error_email = "";
$error_pw = "";

$pwErr = "";
$namaErr = "";
$emailErr = "";
if (isset($_POST['register'])) {
    if (empty($_POST["username"])) {
        $error_nama = "Username tidak boleh kosong";
    } else {
        $username = $validasi->cek_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
            $namaErr = "Inputan Hanya boleh huruf dan spasi";
        }
    }

    if (empty($_POST["email"])) {
        $error_email = "Email tidak boleh kosong";
    } else {
        $email = $validasi->cek_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email Invalid";
        }
    }

    if (empty($_POST["password"])) {
        $error_pw = "Password tidak boleh kosong";
    } else {
        $pass = $validasi->cek_input($_POST["password"]);
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        $leng    = strlen($pass) >= 6;
        if (!$uppercase || !$lowercase || !$number || !$leng) {
            $pwErr = "password harus lebih dari 6 karakter, mengandung huruf BESAR, huruf kecil dan angka";
        } else {
            $enkripsi = password_hash($pass, PASSWORD_DEFAULT);
            $ss;
        }
    }
    if (
        $error_nama == "" &&
        $error_email == "" &&
        $error_pw == "" &&
        $pwErr == "" &&
        $namaErr == "" &&
        $emailErr == ""
    ) {
        $daftar = $fungsi->daftar($username, $email, $enkripsi);
        if ($daftar) {
            echo '<div class="alert alert-success alert-dismissible fade show">';
            echo 'Akun Berhasil Dibuat';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';

            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        } else {
            echo "not";
        }
    }
}
?>
<!doctype html>
<html lang="id">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form action="" method="POST">
                        <img class="" src="https://ik.imagekit.io/tk6ir0e7mng/uploads/2021/10/1634634983539.jpeg?tr=w-609.98,h-344.64" alt="">
                        <h4><a href="index.php">Home</a></h4>
                        <h3 class="text-center text-info">Register</h3>
                        <div class="form-group">
                            <label for="" class="text-info">Email</label>
                            <input type="email" name="email" id="" class="form-control <?php echo ($error_email || $error_email != "" ? "is-invalid" : "") ?>" value="<?php echo (isset($_POST['register']) ? $_POST['email'] : "") ?>">
                            <span class="warning"><?php echo $error_email; ?></span>
                            <span class="warning"><?php echo $emailErr; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-info">Username</label>
                            <input type="text" name="username" class="form-control <?php echo ($error_nama || $namaErr != "" ? "is-invalid" : ""); ?>" value="<?php echo (isset($_POST['register']) ? $_POST['username'] : "") ?>">
                            <span class="warning"><?php echo $error_nama; ?></span>
                            <span class="warning"><?php echo $namaErr; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-info">Password</label>
                            <input type="password" name="password" class="form-control <?php echo ($error_pw || $pwErr != "" ? "is-invalid" : ""); ?>">
                            <span class="warning"><?php echo $error_pw; ?></span>
                            <span class="warning"><?php echo $pwErr; ?></span>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>