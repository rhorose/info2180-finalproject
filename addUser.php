<?php
session_start();
    $host = 'localhost';
    $username = 'admin';
    $password = 'password123';
    $dbname = 'project';
    $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/";
    $numMatch = "/^[0-9]*$/";
    $emailMatch = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
    $fname;
    $lname;
    $password;
    $email;
    $submitBTN;
    $date=date("Y-m-d");
    $condition = 1;
    

    // opens a new connection to the MySql server.
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


    // If statements to validate data
    if(empty($_POST['fname'])|| preg_match ($numMatch, $_POST['fname'])){
        print("Please enter your first name in a proper format");
        $condition = 0;
    
    }else{
        $fname = $_POST['fname'];
    }

    if(empty($_POST['lname'])|| preg_match ($numMatch, $_POST['lname'])){
        print("Please enter your last name in a proper format");
        $condition = 0;
    
    }else{
        $lname = $_POST['lname'];
    }

    if(empty($_POST['email'])|| !preg_match ($emailMatch, $_POST['email'])){
        print("Please enter the correct format for a email");
        $condition = 0;
    
    }else{
        $email = $_POST['email'];
    }

    if(empty($_POST['password'])|| !preg_match ($passwordRegex, $_POST['password'])){
        print("Please ensure your password is 8 character long and has at least one uppercase letter, a number and one lowercase letter");
        $condition = 0;
    
    }else{
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Inserts the different values into the database collectively
    if ($condition == 1){
        $sqldata = "INSERT INTO users( firstname, lastname, `password`, email, date_joined) VALUES ('$fname','$lname','$password','$email','$date')";
        $conn-> exec($sqlVotes);
        
        echo "Successfully added";
        // refreshes the page
		// header("Location: AddUser.html");
    }  
       
?>