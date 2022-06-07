<?php
class User extends DB{
    //thuc hien truy van sql
    public function getUser($username) {
        $user = "SELECT * FROM user_profile WHERE username = '$username';";
        return mysqli_query($this->con, $user);
    }
    public function editUser($username, $data, $row) {
        $user = "UPDATE user_profile SET $row = '$data' WHERE username = '$username';";
        return mysqli_query($this->con, $user);
    }
    public function addUser($username, $hoten, $email, $sdt, $ngaysinh) {
        $data = $this->getUser($username);
        $account = "INSERT INTO user_profile (`id`, `username`, `hoten`, `email`, `sdt`, `ngaysinh`) VALUES (NULL, '$username', '$hoten'
        , '$email', '$sdt', '$ngaysinh');";
        return mysqli_query($this->con, $account);
    }

}
?>