<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_code = $_POST['student_code'];
    $discipline_name = $_POST['discipline_name'];
    $asessment_name = $_POST['asessment_name'];

    require_once('db.php');

    $sql1 = "SELECT `teacher_id` FROM `teachers` WHERE `teacher_login` = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $_SESSION['teacher_login']);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    if ($row1 = $result1->fetch_assoc()) {
        $teacher_id = $row1['teacher_id'];
    } else {
        die("No matching teacher found");
    }

    $sql2 = "SELECT `student_id` FROM `students` WHERE `student_code` = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $student_code);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();
    $student_id = $row2['student_id'];

    // Получение discipline_id на основе discipline_name
    $sql3 = "SELECT `discipline_id` FROM `disciplines` WHERE `discipline_name` = ?";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->bind_param("s", $discipline_name);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $row3 = $result3->fetch_assoc();
    $discipline_id = $row3['discipline_id'];

    // Вставка новой записи в таблицу asessments
    $sql4 = "INSERT INTO `Asessments` (`asessment_id`, `student_id`, `discipline_id`, `asessment_name`) VALUES (NULL, ?, ?, ?)";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->bind_param("iis", $student_id, $discipline_id, $asessment_name);
    $stmt4->execute();

    if ($stmt4->affected_rows === 1) {
        echo "Оценка проставлена";
    } else {
        echo "Ошибка при проставлении оценки";
    }

    $conn->close();

}
