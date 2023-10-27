<?php
    session_start();
    require_once('db.php');
    $teacher_login = $_POST['teacher_login'];
    $teacher_password = $_POST['teacher_password'];
    $teacher_email = $_POST['teacher_email'];
    $teacher_name = $_POST['teacher_name'];
    $teacher_patronymic = $_POST['teacher_patronymic'];
    $teacher_surname = $_POST['teacher_surname'];
    $teacher_department = $_POST['teacher_department'];
    
    if (empty($teacher_login) || empty($teacher_password) || empty($teacher_email) || empty($teacher_name) || empty($teacher_patronymic) || empty($teacher_surname) || empty($teacher_department)){
        echo "Заполните все поля";
    } else {
        $sql = "INSERT INTO `teachers` (`teacher_id`, `teacher_login`, `teacher_password`, `teacher_email`, `teacher_name`, `teacher_patronymic`, `teacher_surname`, `teacher_department`)
             VALUES (null, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $teacher_login, $teacher_password, $teacher_email, $teacher_name, $teacher_patronymic, $teacher_surname, $teacher_department);
        
        if ($stmt->execute() === TRUE) {
            echo "Успешная регистрация";
        } else {
            echo "Какие-то непонятки " . $conn->error;
        }
    }
?>