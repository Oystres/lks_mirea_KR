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
<h1>Информация</h1>
<table>

<tbody>

<tr>

<td>Фамилия</td>

<td>Имя</td>


<td>Отчество</td>

<td>E-mail</td>

<td>Логин</td>

<td>Группа</td>

<td>Личный номер</td>

<td>Состояние</td>

</tr> 
<?php
require_once('db.php');
$stmt = $conn->prepare("SELECT * FROM `students` WHERE `student_login` = ?");

// Привязываем параметры
$stmt->bind_param("s", $_SESSION['student_login']);

// Выполняем запрос
$stmt->execute();

// Получаем результат
$result = $stmt->get_result();

while ($row=mysqli_fetch_array($result))


{ // выводим данные

echo "<tr>\n<td>".$row['surname']."</td>"."\n"."<td>"."".$row["name"]."

</td>"."\n"."<td>"."".$row["patronymic"]."</td>"."\n"."<td>"."".$row

["e_mail"]."</td>"."\n"."<td>"."".$row["student_login"]."</td>"."\n"."<td>

"."".$row["stud_group"]."</td>"."\n"."<td>"."".$row["student_code"]."</td>".


"\n"."<td>"."".$row["status"]."</td>"."\n"."</tr>"."\n";

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
