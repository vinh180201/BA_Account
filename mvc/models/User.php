<?php
class User extends DB{
    //thuc hien truy van sql
    public function getUser($username) {
        $user = "SELECT * FROM user_profile WHERE username = '$username';";
        return mysqli_query($this->con, $user);
    }
    public function editUser($username, $hoten, $email, $sdt, $ngaysinh, $about_me) {
        $user = "UPDATE user_profile SET hoten = '$hoten', email = '$email', sdt = '$sdt', 
        ngaysinh = '$ngaysinh', about_me = '$about_me'  WHERE username = '$username';";
        return mysqli_query($this->con, $user);
    }
    public function addUser($username, $hoten, $email, $sdt, $ngaysinh) {
        $data = $this->getUser($username);
        $account = "INSERT INTO user_profile (`id`, `username`, `hoten`, `email`, `sdt`, `ngaysinh`) VALUES (NULL, '$username', '$hoten'
        , '$email', '$sdt', '$ngaysinh');";

        mysqli_query($this->con, "ALTER TABLE user_profile AUTO_INCREMENT = 1");
        return mysqli_query($this->con, $account);
    }

}
?>