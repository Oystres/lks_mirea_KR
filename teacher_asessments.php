<?php

session_start();


if (!isset($_SESSION['teacher_login'])) {
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
  min-height: calc(100vh - 70px);  /* Высчитываем высоту, вычитая высоту header */
}
    
.info-block {
  display: flex;
  flex-direction: column;  /* Для вертикального выравнивания элементов внутри */
  align-items: center;  /* Центрирует содержимое по горизонтали */
  justify-content: center;  /* Центрирует содержимое по вертикали */
  border-radius: 15px;
  background-color: #f1f1f1;
  padding: 20px;
  width: 400px;  /* Или используйте значение в пикселях, например, 400px */
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
    <a href="teacher_profile.php" class="button">Мой профиль</a>
    <a href="teacher_groups.php" class="button">Мои группы</a>
    <a href="teacher_asessments.php" class="button">Поставить оценку</a>
    <a href="teacher_debts.php" class="button">Поставить долг</a>
    <a href="logout.php" class="button">Выйти</a>
  </header>
<div class="content">
<div class="info-block">
<h1>Проставление оценки</h1>
<form action="process.php" method="POST">
    <label for="student_code">Код студента:</label>
    <input type="text" name="student_code" id="student_code">
    
    <label for="discipline_name">Дисциплина:</label>
    <input type="text" name="discipline_name" id="discipline_name">

    <label for="asessment_name">Оценка:</label>
    <input type="text" name="asessment_name" id="asessment_name">
    
    <button type="submit">Поставить</button>
</form>
</div>
  </div>
<form action="logout.php">
   <button>Выйти</button>
</body>
</html>