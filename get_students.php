<?php
session_start();
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .student_item {
            text-align: center; /* Центрируем содержимое */
        }

        .student_info {
            display: flex;
            justify-content: space-evenly; /* Равномерное пространственное распределение */
            align-items: center; 
        }
    </style>
</head>
<body>

<?php
$stud_group = $_GET['stud_group'];

$sql = "SELECT surname, patronymic, name, student_login, status FROM students WHERE stud_group = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $stud_group);
$stmt->execute();
$result = $stmt->get_result();

echo "<div id='students_" . $stud_group . "'>";
while ($row = $result->fetch_assoc()) {
    echo "<div class='student_item'>";
    echo "<span class='student_info'>" . $row['surname']
     . " " . $row['name'] . " " . $row['patronymic'] . " " . $row['student_login'] .
     " " . $row['status'] ."</span>";
    echo "</div>";
}
echo "</div>";
?>
