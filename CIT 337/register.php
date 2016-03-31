<?php
// Template on prepared statements: http://www.w3schools.com/php/php_mysql_prepared_statements.asp


include_once('connect.php');

if (isset($_REQUEST['username'])) {
    // Set a cookie to expire in 1 hour.
    setcookie("UserName", $_REQUEST['username'], time()+3600);
    $_COOKIE['UserName'] = $_REQUEST['username'];
}

?>
<html>
    <head>
        <title>CIT 337 Project</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        
        <!-- Adds some css to the elements in the page -->
        <style type="text/css">
        /*Centers the header text, and makes bold.*/
            .col-sm-12 h1{
                text-align: center;
                font-weight: 600;
            }
            
            /*Bolds the text within the content area of the page, as well
            as centers the heading for the form area.*/
            .col-sm-8 p{
                font-weight: bold;
                text-align: center;
            }
            
            /*Changes the the text next to the receive newsletter checkbox
            back to non-bold text.*/
            #newsletter{
                font-weight: normal;
            }
            
            /*Creates some white space on each side of the login dropdown form*/
            #login{
                padding: 10px 15px 0px 15px;
            }
            
            /*Adjusts the the size of the caption in each picture, as well as how close
            the caption is to the carousel navigation bar.*/
            .carousel-caption p{
                font-size: 100%;
                margin-bottom: 0px;
            }
            
            /*Adjust the font size, and makes the text italic within the footer.*/
            footer{
                font-size: 75%;
                font-style: italic;
            }
        </style>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                
                <!--- Replace the iteration2 in top left with logo. Template for 
                this function found at 
                http://getbootstrap.com/components/#navbar-brand-image -->
                
                <a class="navbar-brand" href="#">Media Cave</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="Iteration2.html">Home</a></li>
                    <li><a href="About.html">About Us</a></li>
                    <li><a href="Contact.html">Contact Us</a></li>
                    <li><a href="Movies.html">Movies/TV</a></li>
                    <li><a href="Games.html">Games</a></li>
                    <li><a href="Music.html">Music</a></li>
                    <li><a href="Books.html">Books</a></li>
                </ul>
                
                <!--Places the signup button on the right-hand side of the navbar,
                as well as the login dropdown-->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                        <div class="dropdown-menu">
                             <?php
                                // If form submitted, check for user in the database.
                                if (isset($_POST['logUsername'])){
                                    $logUsername = $_POST['logUsername'];
                                    $logPassword = $_POST['logPassword'];
                                    $query = "SELECT * FROM Test WHERE username='$logUsername' and password='$logPassword'";
                                    $mysql = $db->query($query);
                                    if ($mysql->num_rows > 0) {
                                        // output data of each row
                                        while($row = $mysql->fetch_assoc()) {
                                            ?> <script>window.alert('Username Found!');</script> <?php
                                        }
                                    } else {
                                        ?> <script>window.alert('Login Credential invalid!');</script> <?php
                                    } 
                                } ?>
                            <form id="login" method="POST">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li>
                        <form class="navbar-form">
                            <a href="#signup" class="btn btn-primary active">Sign Up</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
         // If form submitted, insert values into the database.
        if (isset($_POST['username'])){
            $name = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            
    //     This appears to work to gather informaiton out of table.         
            $query = "SELECT * FROM Test WHERE username='$username'";
            $mysql = $db->query($query);
            if ($mysql->num_rows > 0) {
                // output data of each row
                while($row = $mysql->fetch_assoc()) {
                    ?> <script>window.alert('Username Found!');</script> <?php
                }
            } else {
                $query = "INSERT INTO Test (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
    
                if($db->query($query)){
                    echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
                }
            }
        }else{
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-push-2">
                
                <!-- Holds the title of the form section -->
                <p>Sign up for a new account below:</p>
                <form class="form-horizontal" id="signup" method="POST">
                     <div class="form-group">
                        <label class="control-label col-sm-3" for="fullname">Name:</label>
                        <div class="col-sm-9">
                            <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="username">Username:</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="password">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
            
        <!-- Holds the footer/copyright information of the page. -->
        <div class="col-sm-12">
            <footer>
                <p>&copy; 2016</p>
            </footer>
        </div>
            
    </div>
    
   <?php } ?>
   
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</body>
</html>