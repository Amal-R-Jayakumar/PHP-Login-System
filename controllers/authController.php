<?php
session_start();
require 'config/db.php';
require_once 'emailController.php';
$errors=array();
$user=array();
$username="";
$name="";
$email="";
if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
/*    if($password !== $confirm_password){
        $errors['password']="The two passwords donot match";
    }*/
    if(empty($_POST['agree'])) {
        $errors['agree']="Accept the terms and conditions";
    }
    if(count($errors)===0) {
        $sql="SELECT * FROM faculties WHERE (username='$username' OR email='$email');";
        $res=mysqli_query($conn,$sql);
        if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if ($username===$row['username'])
        {
            $errors['username'] = "Username already exists";
        }
        elseif($email===$row['email'])
        {
            $errors['email'] = "Email already exists";
        }}}
    if(count($errors)===0){
        $password=password_hash($password, PASSWORD_DEFAULT);
        $token=bin2hex(random_bytes(50));
        $verified=false;
        $sql="INSERT INTO faculties(name,email,username,verified,token,password)VALUES(?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssbss',$name,$email,$username,$verified,$token,$password);
        if($stmt->execute()){
            $user_id=$conn->insert_id;
            $_SESSION['id']=$user_id;
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['verified']=$verified;

            sendVerificationEmail($email, $token);

            //login user
            $_SESSION['message']="Logged in";
            $_SESSION['alert-class']="alert-success";
            header('location: home.php');
            exit();
        }else{
            $errors['db_error']="Database error: failed to register";}   }   }
//On-Click:- Login
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($username)){
        $errors['username']="Username Required";
    }
    if(empty($password)){
        $errors['password']="Password Required";
    }
    if(count($errors)===0){
        $sql="SELECT * FROM faculties where email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$username,$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if ($user['flag']===1){
            if(password_verify($password,$user['password'])) {
                //successfull login
                $_SESSION['id']=$user['id'];
                $_SESSION['name']=$user['name'];
                $_SESSION['username']=$user['username'];
                $_SESSION['email']=$user['email'];
                $_SESSION['verified']=$user['verified'];
                $_SESSION['message']="Logged in";
                $_SESSION['alert-class']="alert-success";
                header('location: home.php');
                exit();            
            }
            else{
                $errors['login_fail'] = "Wrong Credentials";
            }
        }else{
            $errors['login_restricted'] = "This user is restricted from logging in";}   }  }
//logout system
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: index.php');
    exit(); 
}
//Verification
function VerifyUser($token){
    global $conn;
    $sql="SELECT * FROM faculties WHERE token='$token' LIMIT 1";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
        $user=mysqli_fetch_assoc($result);
        $update_query="UPDATE faculties SET verified = 1 WHERE token='$token'";
        if (mysqli_query($conn, $update_query)) {
                //successfull login after verification
                $_SESSION['id']=$user['id'];
                $_SESSION['username']=$user['username'];
                $_SESSION['email']=$user['email'];
                $_SESSION['verified']=1;
                $_SESSION['message']="Your Email was successfully verified!";
                $_SESSION['alert-class']="alert-success";
                header('location: home.php');
                exit(); 
        }
    }else {
        echo 'User not found';
    }
}

//Password Reset

if (isset($_POST['forgot_password'])) {
    $email=$_POST['reset_email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email']="Email address is invalid";
    }
    if(empty($email)){
        $errors['email']="Email required";
    }
    if(count($errors)===0){
        $sql="SELECT * FROM faculties WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $token=$user['token'];
        sendPasswordResetLink($email, $token);
        header('Location: password_reset.php');
        exit(0);
    }


}
if(isset($_POST['change_password'])){
    $new_password=$_POST['new_password'];
    $confirm_new_password=$_POST['confirm_new_password'];
    if(empty($new_password) || empty($confirm_new_password)){
        $errors['password']="Password is Required";
    }
    if($new_password != $confirm_new_password){
        $errors['password']="Passwords do not match.";
    }
    $new_password=password_hash($new_password, PASSWORD_DEFAULT);
    $email=$_SESSION['email'];
    if(count($errors)===0){
        $sql="UPDATE faculties SET password='$new_password' WHERE email='$email'";
        $result=mysqli_query($conn, $sql);
        if($result){
            header('location: index.php');
            exit(0);
        }

    }
}


function resetPassword($token){
    global $conn;
$sql="SELECT * FROM faculties WHERE token=? LIMIT 1";
$stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$token);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $_SESSION['email']=$user['email'];
        header('location: change_password.php');
        exit(0);
}