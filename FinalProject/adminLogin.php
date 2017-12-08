<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <style>
         .jumbotron {
                   	background:url("candy.gif")left repeat-y,url("candy.gif") right repeat-y;
                    width:100%;height:100%;

            }
            </style>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel="icon" href="pinkCandy.png" sizes="32x32">

</head>   
    <body>
        <div class="jumbotron text-center">
        <h1> Candy Captain Sign In </h1>
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