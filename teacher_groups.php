<?php
session_start();
require_once('db.php');
if (!isset($_SESSION['teacher_login'])) {
    header('Location: index.php');
    die();
}

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

$sql2 = "SELECT DISTINCT `stud_group` FROM `streams` WHERE `teacher_id` = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $teacher_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
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
  <script>
        function showStudents(stud_group) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_students.php?stud_group=" + stud_group, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById(stud_group).innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <header>
    <a href="teacher_profile.php" class="button">Мой профиль</a>
    <a href="teacher_groups.php" class="button">Мои группы</a>
    <a href="teacher_asessments.php" class="button">Поставить оценку</a>
    <a href="teacher_debts.php" class="button">Поставить долг</a>
    <a href="logout.php" class="button">Выйти</a>
  </header>
<div class="content">
<div class="info-block">
<h1>Мои группы</h1>
<table border='1'>
        <tr><th>Группа</th><th>Дисциплина</th></tr>
        <?php while ($row2 = $result2->fetch_assoc()): 
            $sql3 = "SELECT `discipline_id` FROM `streams` 
            WHERE `stud_group` = ?";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bind_param("s", $row2['stud_group']);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
            $row3 = $result3->fetch_assoc();

            $sql4 = "SELECT `discipline_name` FROM `disciplines` 
            WHERE `discipline_id` = ?";
            $stmt4 = $conn->prepare($sql4);
            $stmt4->bind_param("i", $row3['discipline_id']);
            $stmt4->execute();
            $result4 = $stmt4->get_result();
            $row4 = $result4->fetch_assoc();
        ?>
            <tr onclick="showStudents('<?php echo $row2['stud_group']; ?>')">
                <td><?php echo $row2['stud_group']; ?></td>
                <td><?php echo $row4['discipline_name']; ?></td>
            </tr>
            <tr id="<?php echo $row2['stud_group']; ?>"></tr>
        <?php endwhile; ?>
    </table>
</div>
  </div>
<form action="logout.php">
   <button>Выйти</button>
</body>
</html>
