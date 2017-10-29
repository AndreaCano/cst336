<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Admin Login </title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    </head>   
    <body>
        <div class="jumbotron text-center">
        <h1> Admin Login </h1>
        </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">

        <form method = "POST" action= "loginProcess.php">
            
            Username: <input type = "text" name="username"/> <br/>
            
            Password: <input type = "password" name="password"/> <br/>
            
            <input type="submit" name = "login" value = "Login"/> <br/>

        </form>
    </div>
    <div class="col-md-4"></div>
    </body>
</html>