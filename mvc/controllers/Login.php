<?php
class Login extends Controller{
    protected $account;
    protected $user;

    public function __construct() {
        $this->account = self::model("Account");
        $this->user = self::model("User");
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

    public function auto(){
        self::view("login", []);
    }
    public function Signup(){
        if(isset($_POST["submit_signup"])) {
            $hoten_input = $_POST["hoten"];
            $username_input = $_POST["username"];
            $password_input = $_POST["password"];
            $email_input = $_POST["email"];
            $sdt_input = $_POST["sdt"];
            $ngaysinh_input = $_POST["ngaysinh"];

            if (!$this->validateName($hoten_input)) {
                self::view("signup", [
                    "msg" => "Invalid name."
                ]);
                exit();
            }
            if (!$this->validateEmail($email_input)) {
                self::view("signup", [
                    "msg" => "Invalid email."
                ]);
                exit();
            }
            if (!$this->validatePhone($sdt_input)) {
                self::view("signup", [
                    "msg" => "Invalid phone number."
                ]);
                exit();
            }
            
            $account_data = $this->account->getAccount($username_input);
            // check username
            if ($account_data->num_rows > 0 ) {
                self::view("signup", [
                    "msg" => "This username has been used"
                ]);
            }
            else {
                //ma hoa password
                $encryption_key = "itsasecret";
                $encryption_iv = "111555888abcdefg";

                $encrypt_pass = openssl_encrypt($password_input, "AES-128-CTR",
			    $encryption_key, 0, $encryption_iv);

                // them account
                $this->account->addAccount($username_input, $encrypt_pass);
                $this->user->addUser($username_input, $hoten_input, $email_input, $sdt_input, $ngaysinh_input);
                self::view("login", [
                    "alert" => "sign_up_success"
                ]);
                
            }
            
        }
        else {
            self::view("signup", []);
        }
        
    }

    function forgot_password() {
        if(!isset($_POST["username"]) && !isset($_POST["email"]) && !isset($_POST["sdt"])) {
            // $_SESSION["verify_user"] = false;
            self::view("verify_user", [
                "id" => 1,
                "verify_user" => false,
                "verify_data" => false,
                "action" => "forgot_password",
                "msg" => NULL
            ]);
        }
        if (isset($_POST["username"])) {
            $username_input = $_POST["username"];
            $account_data = $this->account->getAccount($username_input);
            if (mysqli_num_rows($account_data)) {
                // $_SESSION["verify_user"] = true;
                $_SESSION["username"] = $username_input;

                self::view("verify_user", [
                    "id" => 2,
                    "verify_user" => true,
                    "verify_data" => false,
                    "action" => "forgot_password",
                    "msg" => NULL
                ]);
            }
            else {
                self::view("verify_user", [
                    "id" => 3,
                    "verify_user" => false,
                    "verify_data" => false,
                    "action" => "forgot_password",
                    "msg" => "Username not found"
                ]);
            }
        }    
        
        if (isset($_POST["email"]) && isset($_POST["sdt"])) {
            $email_input = $_POST["email"];
            $sdt_input = $_POST["sdt"];

            if (!$this->validateEmail($email_input)) {
                self::view("verify_user", [
                    "id" => 5,
                    "verify_user" => true,
                    "verify_data" => false,
                    "action" => "forgot_password",
                    "msg" => "Wrong email or phone number"
                ]);
                exit();
            }
            if (!$this->validatePhone($sdt_input)) {
                self::view("verify_user", [
                    "id" => 5,
                    "verify_user" => true,
                    "verify_data" => false,
                    "action" => "forgot_password",
                    "msg" => "Wrong email or phone number"
                ]);
                exit();
            }

            $user_data = $this->user->getUser($_SESSION["username"]);

            while ($ud = mysqli_fetch_array($user_data)) {
                $email = $ud["email"];
                $sdt = $ud["sdt"];
            }
            if ($email_input == $email && $sdt_input == $sdt) {
                $account_data = $this->account->getAccount($_SESSION["username"]);
                while ($ad = mysqli_fetch_array($account_data)) {
                    $password = $ad["password"];
                }
                $decryption_key = "itsasecret";
                $decryption_iv = "111555888abcdefg";

                $decrypt_pass = openssl_decrypt ($password, "AES-128-CTR", $decryption_key, 0, $decryption_iv);

                self::view("verify_user", [
                    "id" => 4,
                    "verify_user" => true,
                    "verify_data" => true,
                    "password" => $decrypt_pass,
                    "action" => "forgot_password",
                    "msg" => NULL
                ]);
            }
            else {
                self::view("verify_user", [
                    "id" => 5,
                    "verify_user" => true,
                    "verify_data" => false,
                    "action" => "forgot_password",
                    "msg" => "Wrong email or phone number"
                ]);
            }
        }
        
    } 
    
}

?>