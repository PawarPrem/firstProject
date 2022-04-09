
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style type="text/css">
    <?php
        include '../resources/css/login-page.css';
    ?>
    </style>
  <link rel="stylesheet" href="">
  <script defer src="login-page.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<body>
  <main id="main-holder">
    <h1 id="login-header">Login</h1>

    <form action="" id="login-form">
      <input type="text" name="Email" id="firstname" class="login-form-field" placeholder="firstname">
      <input type="text" name="password" id="pass" class="login-form-field" placeholder="Lastname">
      <input type="submit" value="Login" id="login-form-submit">
    </form>
  
  </main>
</body>

</html>