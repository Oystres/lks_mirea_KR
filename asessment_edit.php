<?php

session_start();


if (!isset($_SESSION['admin_login'])) {
    header('Location: index.php');
    die();
}


?>

<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Админ</title>
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
  /* Центрирует содержимое по вертикали */
  border-radius: 15px;
  background-color: #f1f1f1;
  padding: 20px;
  width: 550px;  /* Или используйте значение в пикселях, например, 400px */
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
    <a href="add_student.php" class="button">Регистрация</a>
    <a href="deleting_student.php" class="button">Удаление</a>
    <a href="stream_add.php" class="button">Назначение потока</a>
    <a href="asessment_edit.php" class="button">Редактировать оценку</a>
    <a href="logout.php" class="button">Выйти</a>
  </header>
<div class="content">
<div class="info-block">
    <h1>Изменение оценки</h1>
    <form action="asessment_edit_process.php" method="POST">
        <label for="student_login">Логин студента:</label>
        <input type="text" name="student_login" id="student_login">

        <label for="discipline_name">Название дисциплины:</label>
        <input type="text" name="discipline_name" id="discipline_name">

        <label for="asessment_name">Новая оценка:</label>
        <input type="text" name="asessment_name" id="asessment_name">
        
        <button type="submit">Изменить</button>
</div>
</div>
<form action="logout.php">
   <button>Выйти</button>
</body>
</html>