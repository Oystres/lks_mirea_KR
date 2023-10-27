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
  min-height: calc(100vh - 70px); 
}
    
.info-block {
  display: flex;
  flex-direction: column;  
  align-items: center;  
  border-radius: 15px;
  background-color: #f1f1f1;
  padding: 20px;
  width: 550px;  
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
    <h1>Назначение потока</h1>
    <form action="stream_add_process.php" method="POST">
        <label for="stud_group">Группа:</label>
        <input type="text" name="stud_group" id="stud_group">

        <label for="discipline_name">Название дисциплины:</label>
        <input type="text" name="discipline_name" id="discipline_name">

        <label for="teacher_login">Логин преподавателя:</label>
        <input type="text" name="teacher_login" id="teacher_login">
        
        <button type="submit">Назначить</button>
    </form>
        <h1>Удаление потока</h1>
        <form action="stream_delete_process.php" method="POST">
            
        <label for="stud_group">Группа:</label>
        <input type="text" name="stud_group" id="stud_group">

        <label for="discipline_name">Название дисциплины:</label>
        <input type="text" name="discipline_name" id="discipline_name">

        <label for="teacher_login">Логин преподавателя:</label>
        <input type="text" name="teacher_login" id="teacher_login">

            <button type="submit">Удалить</button>
    </form>
</div>
</div>
<form action="logout.php">
   <button>Выйти</button>
</body>
</html>