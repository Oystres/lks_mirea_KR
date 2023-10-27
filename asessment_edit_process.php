<?php
    session_start();
    require_once('db.php');
    $student_login = $_POST['student_login'];
    $discipline_name = $_POST['discipline_name'];
    $asessment_name = $_POST['asessment_name'];


    $sql1 = "SELECT `student_id` FROM `students` WHERE `student_login` = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $student_login);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($row1 = $result1->fetch_assoc()) {
        $student_id = $row1['student_id'];
    } else {
        die("No matching student found");
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

    $sql3 = "SELECT `asessment_id` FROM `Asessments` WHERE `student_id` = ? AND `discipline_id` = ?";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->bind_param("ii", $student_id, $discipline_id);
    $stmt3->execute();
    $result3 = $stmt3->get_result();

    if ($row3 = $result3->fetch_assoc()) {
        $asessment_id = $row3['asessment_id'];
    } else {
        die("No matching asessment found");
    }
    
    if (empty($asessment_name) || empty($asessment_name) || empty($asessment_id)){
        echo "Заполните все поля или удостоверьтесь в правильности заполнения";
    } else {
        $sql4 = "UPDATE `Asessments` SET `asessment_name` = ? WHERE `asessment_id` = ?";
        $stmt4 = $conn->prepare($sql4);
        if ($stmt4 === false) {
            die('Prepare failed: ' . $conn->error);
        }
        $stmt4->bind_param("si", $asessment_name, $asessment_id);
        
        if ($stmt4->execute() === TRUE) {
            echo "Успешное изменение";
        } else {
            echo "Изменение не удалось, повторите попытку, проверив корректность заполнения форм " . $conn->error;
        }
    }
?>