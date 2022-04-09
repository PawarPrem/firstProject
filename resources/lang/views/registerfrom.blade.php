
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
    <h1 id="login-header">Registration</h1>

    <form action="" id="login-form">
        @csrf
      <input type="text" name="firstname" id="firstname" class="login-form-field" placeholder="firstname">
      <div id="firstErr" value=""  style="display: none;"></div>
      <input type="text" name="lastname" id="lastname" class="login-form-field" placeholder="Lastname">
      <div id="lastErr" value="" style="display: none;"></div>
      <input type="text" name="email" id="email" class="login-form-field" placeholder="Email">
      <div id="emailErr" value="" style="display: none;"></div>
      <input type="password" name="password" id="password" class="login-form-field" placeholder="Password">
      <div id="passErr" value="" style="display: none;"></div>
      <input type="text" name="phone" id="phone" class="login-form-field" placeholder="Phone Number">
      <div id="phoneErr" value="" style="display: none;"></div>
      <select name="subsciption" id="subsciption" class="login-form-field">
        <option value="100"> One month subscription</option>
        <option value="200"> Two month subscription</option>
        <option value="300"> Three month subscription </option>
      </select>
      <div id="subErr" value="" style="display: none;"></div>
      <input type="hidden" id="url" value="{{ URL::to('/api/create_users') }}">
      <input type="submit" value="Create User" id="login-form-submit">
    </form>
  
  </main>

  <script type="text/javascript">
  $(document).ready(function() {

    $('#login-form-submit').on('click', function(e) {
        alert('pewm');
        $.ajax({
                    url: $('#url').val(),
                    data: { firstname: $('#firstname').val(), lastname : $('#lastname').val(), email : $('#email').val(), password : $('#password').val(), phone_number : $('#phone').val(), subscription : $('#subsciption').val()},
                    type:"POST",
                    dataType: "json",
                }).done(function(returnData)
                {
                    if (returnData.firstnameErr != '') 
                    {
                        $('#firstErr').html(returnData.firstnameErr);
                         $('#firstErr').show();
                    }else{
                        $('#firstErr').hide();
                    }
                    if (returnData.lastnameErr != '') 
                    {
                        $('#lastErr').html(returnData.lastnameErr);
                         $('#lastErr').show();
                    }else{
                        $('#lastErr').hide();
                    }
                   
                   if (returnData.emailErr != '') 
                    {
                        $('#emailErr').html(returnData.emailErr);
                         $('#emailErr').show();
                    }else{
                        $('#emailErr').hide();
                    }
                   
                   if (returnData.passErr != '') 
                    {
                        $('#passwordErr').html(returnData.passErr);
                         $('#passwordErr').show();
                    }else{
                        $('#passwordErr').hide();
                    }
                   if (returnData.phoneErr != '') 
                    {
                        $('#phoneErr').html(returnData.phoneErr);
                         $('#phoneErr').show();
                    }else{
                        $('#phoneErr').hide();
                    }
                   if (returnData.subscriptionErr != '') 
                    {
                        $('#subErr').html(returnData.subscriptionErr);
                         $('#subErr').show();
                    }else{
                        $('#subErr').hide();
                    }
                   alert(returnData.message);
                   
                });

                e.preventDefault();
                return false;
    });
  });

</script>
</body>

</html>