

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Личный кабинет</title>

</head>
<body>
  <header>
    <img src="mirea_logo.png" alt="Логотип РТУ МИРЭА" class="logo">
    <div class="mainTitle">Личный кабинет студента</div>
    <button onclick="openRoleModal()">Войти</button>
  </header>
  <div id="loginModal">
    <div class="roleForm">
      <span class="close-button" onclick="closeForm('.roleForm')">&times;</span>
      <button onclick="openLoginForm('student')">Войти в личный кабинет студента</button>
      <button onclick="openLoginForm('teacher')">Войти в личный кабинет преподавателя</button>
      <button onclick="openLoginForm('admin')">Войти в личный кабинет работника</button>
    </div>
    
    <form action="login.php" method="POST" id="studentForm" class="loginForm">
      <span class="close-button" onclick="closeForm('#studentForm')">&times;</span>
      <label for="username">Логин:</label>
      <input type="text" placeholder="student_login" name="student_login"><br>
      <label for="password">Пароль:</label>
      <input type="password" placeholder="password" name="password"><br>
      <button type="submit" name="student">Вход</button>
    </form>
    <form action="teacher_login.php" method="POST" id="teacherForm" class="loginForm">
      <span class="close-button" onclick="closeForm('#teacherForm')">&times;</span>
      <label for="username">Логин:</label>
      <input type="text" placeholder="teacher_login" name="teacher_login"><br>
      <label for="password">Пароль:</label>
      <input type="password" placeholder="teacher_password" name="teacher_password"><br>
      <button type="submit" name="teacher">Вход</button>
    </form>
    <form action="admin_login.php" method="POST" id="adminForm" class="loginForm">
      <span class="close-button" onclick="closeForm('#adminForm')">&times;</span>
      <label for="username">Логин:</label>
      <input type="text" placeholder="admin_login" name="admin_login"><br>
      <label for="password">Пароль:</label>
      <input type="password" placeholder="admin_password" name="admin_password"><br>
      <button type="submit" name="admin">Вход</button>
    </form>
  </div>
  <script>
    function openRoleModal() {
      document.getElementById("loginModal").style.display = "flex";
      document.querySelector(".roleForm").style.display = "block";
    }
    function openLoginForm(role) {
      document.querySelector(".roleForm").style.display = "none";
      document.getElementById(role + "Form").style.display = "block";
    }
    function closeForm(formSelector) {
        document.querySelector(formSelector).style.display = "none";
        document.getElementById("loginModal").style.display = "none";
    }
  </script>
</body>
</html>