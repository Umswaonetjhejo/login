<?php
//Developer: Jonathan Musa Skosana
//https://www.linkedin.com/in/jonathan-musa-skosana-a31a26a1/


error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once ('db.php');

function validateData($data)
{
    $resultData = htmlspecialchars(stripslashes(trim($data)));
    return $resultData;
}

if (isset($_POST['action']) && $_POST['action'] == 'registration') {
    $first_name = validateData($_POST['firstName']);
    $last_name = validateData($_POST['lastName']);
    $user_name = validateData($_POST['username']);
    $password = validateData($_POST['password']);
    $confirm_password = validateData($_POST['confirmPassword']);
    
    $error_message = '';
    $checkUserQuery = $conn->prepare("select * from users_table where user_name = ?");
    $checkUserQuery->bind_param("s", $user_name);
    $checkUserQuery->execute();
    
    $result = $checkUserQuery->get_result();
    if ($result->num_rows > 0) {
        
        $error_message = "Username already exists!";
        echo $error_message;
    } else {
        $insertQuery = $conn->prepare("insert into users_table(first_name,last_name,user_name,password) values(?,?,?,?)");
        $password = md5($password);
        $insertQuery->bind_param('ssss', $first_name, $last_name, $user_name, $password);
        
        if ($insertQuery->execute()) {
            echo "Thank you for registering with us. You can login now.";
            exit();
        } else {
            $error_message = "error";
        }
        $insertQuery->close();
        $conn->close();
        
        echo $error_message;
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $user_name = validateData($_POST['username']);
    $password = validateData($_POST['password']);
    $password = md5($password);
    $error_message = '';
    
    $selectQuery = $conn->prepare("select * from users_table where user_name = ? and password = ?");
    $selectQuery->bind_param("ss", $user_name, $password);
    $selectQuery->execute();
    
    $result = $selectQuery->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $row['first_name'] . " " . $row['last_name'];
            echo "dashboard.php";
            exit();
        } // endwhile
    } // endif
else {
        $error_message = "Wrong username or password!";
    } // endElse
    $conn->close();
    
    echo $error_message;
}
?>
