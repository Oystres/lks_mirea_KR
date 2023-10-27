<?php
session_start();
require_once('db.php');

$admin_login = $_POST['admin_login'];
$admin_password = $_POST['admin_password'];
$_SESSION['admin_login'] = $admin_login;

if(empty($admin_login) || empty($admin_password))
{
    echo "Заполните все поля";
} else {
    $sql = "SELECT * FROM `admins` WHERE admin_login = '$admin_login' AND admin_password = '$admin_password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
            header("Location: add_student.php");
        }  
    } else {
        echo "Нет такого пользователя";
    }
}