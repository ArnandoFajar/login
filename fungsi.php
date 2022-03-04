<?php
class Fungsi
{
    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "login";
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            die("terjadi Kesalahan : " . $e->getMessage());
        }
    }
    public function login($username)
    {
        $query = $this->db->prepare("SELECT * FROM user WHERE nama_user=:username OR email=:email");
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $username);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function daftar($username, $email, $password)
    {
        $check = $this->db->prepare("SELECT * FROM user WHERE nama_user = :user");
        $check->bindParam(':user', $username);
        $check->execute();
        $row = $check->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return false;
        } else {
            $aktif = 'Y';
            $query = $this->db->prepare("INSERT INTO user(nama_user,email,password,aktif) VALUES(:nama_user,:email,:password,:aktif)");
            $query->bindParam(':nama_user', $username);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password);
            $query->bindParam(':aktif', $aktif);
            $query->execute();
            return true;
        }
    }
    public function blokir_akun($username)
    {
        $aktif = "T";
        $query = $this->db->prepare("UPDATE user SET aktif=:aktif WHERE nama_user=:username");
        $query->bindParam(':aktif', $aktif);
        $query->bindParam(':username', $username);
        $query->execute();
    }
}
class Validasi
{
    public function alert_password_salah()
    {
        echo '<div class="alert alert-danger alert-dismissible fade show">';
        echo 'Password salah';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
    public function alert_password_user_salah()
    {
        echo '<div class="alert alert-danger alert-dismissible fade show">';
        echo 'Username dan Password salah';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
    public function alert_gagal()
    {
        echo '<div class="alert alert-danger alert-dismissible fade show">';
        echo 'Username ' . $_POST['username'] . ' telah Dibuat mohon diganti';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
    function alert_berhasil()
    {
        echo '<div class="alert alert-success alert-dismissible fade show">';
        echo 'Akun Berhasil dibuat, akan diahlikan ke halaman login';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
    public function alert_blokir()
    {
        echo '<div class="alert alert-danger alert-dismissible fade show">';
        echo 'Username ' . $_POST['username'] . ' telah diblokir mohon hubungi admin';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
    public function cek_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
