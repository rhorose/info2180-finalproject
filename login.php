<?php
session_start();

    $host = 'localhost';
    $username = 'admin';
    $password = 'password123';
    $dbname = 'project';

    $email;
    $password;
    $condition = 1;
    $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
    $emailMatch = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


    if(empty($_POST['email'])|| !preg_match ($emailMatch, $_POST['email'])){
        print("Please enter the correct format for a email");
        $condition = 0;
    
    }else{
        $email = $_POST['email'];
    }

    if(empty($_POST['password'])|| !preg_match ($passwordRegex, $_POST['password'])){
        if ($_POST['password'] === "password123"){
            $password = $_POST['password'];
        }else{
        print("Please ensure your password is 8 character long and has at least one uppercase letter, a number and one lowercase letter");
        $condition = 0;
        }
    
    }else{
        $password = $_POST['password'];
        if ($password !== "password123"){
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
    }
    if ($condition === 1){
        $sqldata = $conn->query("SELECT email,password FROM Users WHERE  email='$email' and `password` ='$password'");
        $finding = $sqldata->fetchAll(PDO::FETCH_ASSOC);
        if ($finding[0]['email']==$email && $finding[0]['password']==$password){
            header("Location: Issues.html");
        }else{
            echo "Failed";
        }
    }
?>