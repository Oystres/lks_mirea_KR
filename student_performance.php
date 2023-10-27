<?php
session_start();

if (!isset($_SESSION['student_login'])) {
    header('Location: index.php');
    die();
}
?>

<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Личный кабинет</title>
  <style>
    header {
      display: flex;
      justify-content: space-around;
      padding: 15px;
      border-radius: 8px;
    }
    .button {
      background-color: #003366;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      flex-grow: 1;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s, box-shadow 0.3s;
    }
    .button:hover {
        background-color: #005599;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .content {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 70px);
    }
    .info-block {
      border-radius: 15px;
      background-color: #f1f1f1;
      padding: 20px;
      width: 70%;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
    }
  </style>  
</head>
<body>
    <header>
    <a href="student_profile.php" class="button">Мой профиль</a>
    <a href="student_group.php" class="button">Моя группа</a>
    <a href="teachers.php" class="button">Преподаватели</a>
    <a href="student_performance.php" class="button">Успеваемость</a>
    <a href="student_debts.php" class="button">Задолженности</a>
    <a href="logout.php" class="button">Выйти</a>
  </header>
<div class="content">
<div class="info-block">
<h1>Успеваемость</h1>
<table>
<tbody>
<tr>
<td>Дисциплина</td>
<td>Форма оценивания</td>
<td>Семестр</td>
<td>Оценка</td>
</tr> 


<?php
require_once('db.php');
$sql1 = "SELECT `student_id` FROM `students` WHERE `student_login` = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $_SESSION['student_login']);
$stmt1->execute();
$result1 = $stmt1->get_result();
if ($row1 = $result1->fetch_assoc()) {
    $student_id = $row1['student_id'];
} else {
    die("No matching student found");
}

// Получение оценок по student_id
$sql2 = "SELECT * FROM `Asessments` WHERE `student_id` = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $student_id);
$stmt2->execute();
$result2 = $stmt2->get_result();

// Вывод данных
while ($row2 = $result2->fetch_assoc()) {
    $discipline_id = $row2['discipline_id'];
    $sql3 = "SELECT `discipline_name`, `asessment_form`, `semester` FROM `Disciplines` WHERE `discipline_id` = ? ORDER BY `semester` ASC";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->bind_param("i", $discipline_id);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    if ($row3 = $result3->fetch_assoc()) {
        echo "<tr>\n<td>".$row3['discipline_name']."</td>"."\n"."<td>"."".$row3["asessment_form"]."
        </td>"."\n"."<td>".$row3["semester"]."</td>"."\n"."<td>"."".$row2["asessment_name"]."</td>"."\n"."</tr>"."\n";
    }
}
?>


</tbody>
</table>
</div>
  </div>
<form action="logout.php">
   <button>Выйти</button>
</body>
</html>