<?php
    session_start();
    require_once('db.php');
    $teacher_login = $_POST['teacher_login'];

    
    if (empty($teacher_login)){
        echo "Заполните все поля";
    } else {
        $sql = "DELETE FROM `teachers` WHERE `teacher_login` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $teacher_login);
        
        if ($stmt->execute() === TRUE) {
            echo "Успешное удаление";
        } else {
            echo "Какие-то непонятки " . $conn->error;
        }
    }
?>