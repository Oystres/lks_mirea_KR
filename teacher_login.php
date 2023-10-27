<?php
session_start();
require_once('db.php');

$teacher_login = $_POST['teacher_login'];
$teacher_password = $_POST['teacher_password'];
$_SESSION['teacher_login'] = $teacher_login;

if(empty($teacher_login) || empty($teacher_password))
{
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM `teachers` WHERE teacher_login = '$teacher_login' AND teacher_password = '$teacher_password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
            header("Location: teacher_profile.php");
        }  
    } else {
        echo "Нет такого пользователя";
    }
}