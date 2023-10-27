<?php
    session_start();
    require_once('db.php');
    $stud_group = $_POST['stud_group'];
    $discipline_name = $_POST['discipline_name'];
    $teacher_login = $_POST['teacher_login'];


    $sql1 = "SELECT `teacher_id` FROM `teachers` WHERE `teacher_login` = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $teacher_login);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($row1 = $result1->fetch_assoc()) {
        $teacher_id = $row1['teacher_id'];
    } else {
        die("No matching teacher found");
    }

    $sql2 = "SELECT `discipline_id` FROM `Disciplines` WHERE `discipline_name` = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $discipline_name);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($row2 = $result2->fetch_assoc()) {
        $discipline_id = $row2['discipline_id'];
    } else {
        die("No matching teacher found");
    }
    
    if (empty($stud_group) || empty($result1) || empty($result2)){
        echo "Заполните все поля или удостоверьтесь в правильности заполнения";
    } else {
        $sql = "INSERT INTO `streams` (`stream_id`, `stud_group`, `discipline_id`, `teacher_id`)
             VALUES (null, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $stud_group, $discipline_id, $teacher_id);
        
        if ($stmt->execute() === TRUE) {
            echo "Успешная добавление";
        } else {
            echo "Добавление не удалось, повторите попытку, проверив корректность заполнения форм " . $conn->error;
        }
    }
?>