<?php
    $gender = $check = "";
    function formcheck(){
        $err = [];
        if(empty($_POST["fullname"])){
            $err['fullname'] = "Please enter first name";
        }else{
        }
        function checkemail($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        }
    
        if(empty($_POST["email"])){
            $err['email'] = "Please enter email address";
        }else if(!checkemail($_POST["email"])){
            $email =$_POST["email"];
            $err['email'] = "Please enter valid email address";
        }
    
        if(empty($_POST["password"])){
            $err['password'] = "Please enter password";
        }
        if (!empty($_POST["password"])) {
            if (strlen($_POST["password"]) < 6) {
                $password = $_POST["password"];
                $err['password'] = "Password must be at least 6 characters long!";
            } elseif (!preg_match('@[A-Z]@', $_POST["password"])) {
                $password = $_POST["password"];
                $err['password'] = "Password must contain at least one uppercase letter!";
            } elseif (!preg_match('@[a-z]@', $_POST["password"])) {
                $password = $_POST["password"];
                $err['password'] = "Password must contain at least one lowercase letter!";
            } elseif (!preg_match('@[^\w]@', $_POST["password"])) {
                $password = $_POST["password"];
                $err['password'] = "Password must contain at least one special character!";
            } elseif (!preg_match('@[0-9]@', $_POST["password"])) {
                $password = $_POST["password"];
                $err['password'] = "Password must contain at least one number!";
            } else {
                $password = $_POST["password"];
            }
        }else if(empty($_POST["confirmPassword"])){
            $err['confirmPassword'] = "Please enter confirm password";
        }
        if(empty($_POST["confirmPassword"])){
            $err['confirmPassword'] = "Please enter confirm password";
        }elseif($_POST["password"] != $_POST["confirmPassword"]){
            $err['confirmPassword'] = "Password and Confirm Password not same!";
        }else{
            $confirmPassword = $_POST["confirmPassword"];
        }
        return $err;
    
    }

?>
<?php
 

?>