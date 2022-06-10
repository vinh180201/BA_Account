<?php

$username;
class Home extends Controller{
    protected $user;
    protected $account;
    public function __construct() {
        $this->user = self::model("User");
        $this->account = self::model("Account");
    }
    // validate function
    protected function validateName($string) {
        if (!preg_match("/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀ
        ỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i",$string)) {
            return false;
        }
        return true;
    }

    protected function validateEmail($string) {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    protected function validatePhone($string) {
        if (!preg_match ("/^[0-9]*$/", $string) ){  
            return false;        
        }
        return true;
    }
    

    public function auto() {
        // quay lai home bang cach luu bien vao session
        $_SESSION["navbar"] = "home";
        self::view("home", [
            "username" => $_SESSION["username"],
            "hoten" => $_SESSION["hoten"],
            "ngaysinh" => $_SESSION["ngaysinh"],
            "email" => $_SESSION["email"],
            "sdt" => $_SESSION["sdt"],
            "about_me" => $_SESSION["about_me"],
            "result" => $_SESSION["result"]
        ]);
    }

    public function login() {
        if(isset($_POST["submit_login"])) {
            $username = $_POST["username"];
            $password_input = $_POST["password"];
            if (empty($_POST["username"]) || empty($_POST["password"])) {
                self::view("login",[
                    "result" => false
                ]);
            }
            // them user vao session

            $user_data = $this->user->getUser($username);
            $account_data = $this->account->getAccount($username);

            if (mysqli_num_rows($account_data)) {
                while ($ad = mysqli_fetch_array($account_data)) {
                    $id = $ad["id"];
                    $password = $ad["password"];
                }
                $decryption_key = "itsasecret";
                $decryption_iv = "111555888abcdefg";

                $decrypt_pass = openssl_decrypt ($password, "AES-128-CTR", $decryption_key, 0, $decryption_iv);
                while ($ud = mysqli_fetch_array($user_data)) {
                    $hoten = $ud["hoten"];
                    $ngaysinh = $ud["ngaysinh"];
                    $email = $ud["email"];
                    $sdt = $ud["sdt"];
                    $about_me = $ud["about_me"];
                }
                // khong dung duoc strcmp()
                if ($password_input == $decrypt_pass) {
                    // set cookie
                    if (isset($_POST["remember"])) {
                        setcookie("username","$username",time()+3600,"/","",0,0);
                    }
                    // tao bien session
                    $_SESSION["username"] = $username;
                    $_SESSION["hoten"] = $hoten;
                    $_SESSION["ngaysinh"] = $ngaysinh;
                    $_SESSION["email"] = $email;
                    $_SESSION["sdt"] = $sdt;
                    $_SESSION["about_me"] = $about_me;
                    $_SESSION["result"] = true;
                    $_SESSION["navbar"] = "home";

                    self::view("home", [
                        "username" => $username,
                        "hoten" => $hoten,
                        "ngaysinh" => $ngaysinh,
                        "email" => $email,
                        "sdt" => $sdt,
                        "about_me" => $about_me,
                        "result" => true
                    ]);
                }
                else {
                    self::view("login", [
                        "result" => false
                    ]);
                }
            }
            else {
                self::view("login", [
                    "result" => false
                ]);
            }
        }
    }
    
    public function submit_edit() {
        $username = $_SESSION["username"];
        if(isset($_POST["submit_login"])) {
            $hoten_input = $_POST["hoten"];
            $email_input = $_POST["email"];
            $sdt_input = $_POST["sdt"];
            $ngaysinh_input = $_POST["ngaysinh"];
            $about_me_input = $_POST["about_me"];

            if (!$this->validateName($hoten_input)) {
                $_SESSION["navbar"] = "edit";
                self::view("edit", [
                    "msg" => "Invalid name."
                ]);
                exit();
            }
            if (!$this->validateEmail($email_input)) {
                $_SESSION["navbar"] = "edit";
                self::view("edit", [
                    "msg" => "Invalid email."
                ]);
                exit();
            }
            if (!$this->validatePhone($sdt_input)) {
                $_SESSION["navbar"] = "edit";
                self::view("edit", [
                    "msg" => "Invalid phone number."
                ]);
                exit();
            }

            $_SESSION["hoten"] = $hoten_input;
            $_SESSION["ngaysinh"] = $ngaysinh_input;
            $_SESSION["email"] = $email_input;
            $_SESSION["sdt"] = $sdt_input;
            $_SESSION["about_me"] = $about_me_input;


            $a = $this->user->editUser($username, $hoten_input, $email_input, $sdt_input, $ngaysinh_input, $about_me_input);
        }

        $user_data = $this->user->getUser($username);

        while ($ud = mysqli_fetch_array($user_data)) {
            $hoten = $ud["hoten"];
            $ngaysinh = $ud["ngaysinh"];
            $email = $ud["email"];
            $sdt = $ud["sdt"];
            $about_me = $ud["about_me"];
        }

        $_SESSION["navbar"] = "home";
        self::view("home", [
            "username" => $username,
            "hoten" => $hoten,
            "ngaysinh" => $ngaysinh,
            "email" => $email,
            "sdt" => $sdt,
            "about_me" => $about_me,
        ]);
    }

    public function edit() {
        $_SESSION["navbar"] = "edit";
        self::view("edit", [

        ]);
    }
}
?>