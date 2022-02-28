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
        $aktif = 'Y';
        $query = $this->db->prepare("INSERT INTO user(nama_user,email,password,aktif) VALUES(:nama_user,:email,:password,:aktif)");
        $query->bindParam(':nama_user', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':aktif', $aktif);
        $query->execute();
        return $query->rowCount();
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
    public function cek_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
