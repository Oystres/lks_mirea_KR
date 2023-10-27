<?php
session_start();
require_once('db.php');

$student_login = $_POST['student_login'];
$password = $_POST['password'];
$_SESSION['student_login'] = $student_login;

if(empty($student_login) || empty($password))
{
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM `students` WHERE student_login = '$student_login' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
            header("Location: student_profile.php");
        }  
    } else {
        echo "Нет такого пользователя";
    }
}