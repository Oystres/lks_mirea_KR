<?php
    session_start();
    require_once('db.php');
    $student_code = $_POST['student_code'];
    $student_login = $_POST['student_login'];
    $e_mail = $_POST['e_mail'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $surname = $_POST['surname'];
    $stud_group = $_POST['stud_group'];
    $status = $_POST['status'];
    
    if (empty($student_code) || empty($student_login) || empty($e_mail) || empty($password) || empty($name) || empty($patronymic) || empty($surname) || empty($stud_group) || empty($status)){
        echo "Заполните все поля";
    } else {
        $sql = "INSERT INTO `students` (`student_id`, `student_code`, `student_login`, `e_mail`, `password`, `name`, `patronymic`, `surname`, `stud_group`, `status`)
             VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $student_code, $student_login, $e_mail, $password, $name, $patronymic, $surname, $stud_group, $status);
        
        if ($stmt->execute() === TRUE) {
            echo "Успешная регистрация";
        } else {
            echo "Какие-то непонятки " . $conn->error;
        }
    }
?>

