<?php
class App{
    protected $controller = "Login"; //default
    protected $action = "auto";
    protected $params;
    
    function __construct(){
        $arr = $this -> UrlProcess();
        //xu ly controller
        if (isset($arr[0])) {
            if (file_exists("./mvc/controllers/". $arr[0] .".php")) {
                $this->controller = $arr[0];
                //loai bo phan tu => gan param cho tien
                unset($arr[0]);
            }
        }
        
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        //xu ly action
        if (isset($arr[1])) {
            //kt function co ton tai trong home.php hay k
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }  
        //xu ly param
        $this->params = $arr ? array_values($arr):[];
        
        call_user_func_array(array($this->controller, $this->action), array($this->params));
    }


    // tach url thanh 3 thanh phan CAP
    function UrlProcess() {
        if (isset($_GET["url"])) {
            //filter_var: bo ky tu la
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }

    }
}
?> 