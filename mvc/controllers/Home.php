<?php

$username;
class Home extends Controller{
    protected $user;
    protected $account;
    public function __construct() {
        $this->user = self::model("User");
        $this->account = self::model("Account");
    }

    public function login() {
        $result = false;
        if(isset($_POST["submit_login"])) {
            $username = $_POST["username"];
            $_SESSION["username"] = $username;

            $password_input = $_POST["password"];
            if (empty($_POST["username"]) || empty($_POST["password"])) {
                self::view("login",[
                    "result" => $result
                ]);
            }
            // them user vao session
            // $session = $this->session->addSession($username);

            $user_data = $this->user->getUser($username);
            $account_data = $this->account->getAccount($username);

            if (mysqli_num_rows($account_data)) {
                while ($ad = mysqli_fetch_array($account_data)) {
                    $id = $ad["id"];
                    $password = $ad["password"];
                }
                while ($ud = mysqli_fetch_array($user_data)) {
                    $hoten = $ud["hoten"];
                    $ngaysinh = $ud["ngaysinh"];
                    $email = $ud["email"];
                    $sdt = $ud["sdt"];
                    $about_me = $ud["about_me"];
                }
                // khong dung duoc strcmp()
                if ($password_input == $password) {
                    // set cookie
                    if (isset($_POST["remember"])) {
                        setcookie("username","$username",time()+3600,"/","",0,0);
                        setcookie("password","$password",time()+3600,"/","",0,0);
                    }

                    self::view("home", [
                        "username" => $username,
                        "hoten" => $hoten,
                        "ngaysinh" => $ngaysinh,
                        "email" => $email,
                        "sdt" => $sdt,
                        "about_me" => $about_me,
                        "result" => $this->$result=true
                    ]);
                }
                else {
                    self::view("login", [
                        "result" => $result
                    ]);
                }
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

            if ($hoten_input != NULL) {
                $a = $this->user->editUser($username, $hoten_input, "hoten");
            }
            if ($email_input != NULL) {
                $b = $this->user->editUser($username, $email_input, "email");
            }
            if ($sdt_input != NULL) {
                $c = $this->user->editUser($username, $sdt_input, "sdt");
            }
            if ($ngaysinh_input != NULL) {
                $d = $this->user->editUser($username, $ngaysinh_input, "ngaysinh");
            }
            if ($about_me_input != NULL) {
                $e = $this->user->editUser($username, $about_me_input, "about_me");
            }
        }

        $user_data = $this->user->getUser($username);

        while ($ud = mysqli_fetch_array($user_data)) {
            $hoten = $ud["hoten"];
            $ngaysinh = $ud["ngaysinh"];
            $email = $ud["email"];
            $sdt = $ud["sdt"];
            $about_me = $ud["about_me"];
        }
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
        self::view("edit", [

        ]);
    }
}
?>