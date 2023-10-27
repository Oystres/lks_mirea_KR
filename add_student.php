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
  width: 500px;  /* Или используйте значение в пикселях, например, 400px */
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
<table>
<tr>
    <td>
    <h1>Регистрация</h1>
    <h1>студента</h1>
    <form action="register.php" method="POST">
        <label for="student_code">Код студента:</label>
        <input type="text" name="student_code" id="student_code">
        
        <label for="student_login">Логин студента:</label>
        <input type="text" name="student_login" id="student_login">

        <label for="e_mail">Email студента:</label>
        <input type="text" name="e_mail" id="e_mail">

        <label for="password">Пароль студента:</label>
        <input type="text" name="password" id="password">

        <label for="name">Имя студента:</label>
        <input type="text" name="name" id="name">

        <label for="patronymic">Отчество студента:</label>
        <input type="text" name="patronymic" id="patronymic">

        <label for="surname">Фамилия студента:</label>
        <input type="text" name="surname" id="surname">

        <label for="stud_group">Группа студента:</label>
        <input type="text" name="stud_group" id="stud_group">

        <label for="status">Статус студента:</label>
        <input type="text" name="status" id="status">

        
        <button type="submit">Зарегестрировать</button>
    </form>
    </td>
    <td>
        <h1>Регистрация</h1>
        <h1> преподавателя</h1>
        <form action="register_teacher.php" method="POST">
            
            <label for="teacher_login">Логин преподавателя:</label>
            <input type="text" name="teacher_login" id="teacher_login">

            <label for="teacher_password">Пароль преподавателя:</label>
            <input type="text" name="teacher_password" id="teacher_password">

            <label for="teacher_email">Email преподавателя:</label>
            <input type="text" name="teacher_email" id="teacher_email">

            <label for="teacher_name">Имя преподавателя:</label>
            <input type="text" name="teacher_name" id="teacher_name">

            <label for="teacher_patronymic">Отчество преподавателя:</label>
            <input type="text" name="teacher_patronymic" id="teacher_patronymic">

            <label for="teacher_surname">Фамилия преподавателя:</label>
            <input type="text" name="teacher_surname" id="teacher_surname">

            <label for="teacher_department">Кафедра преподавателя:</label>
            <input type="text" name="teacher_department" id="teacher_department">

            
            <button type="submit">Зарегестрировать</button>
        </form>
    </td>
</tr>
</table>
</div>
  </div>
<form action="logout.php">
   <button>Выйти</button>
</body>
</html>