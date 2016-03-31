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
                                    <input type="text" name="logUsername" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="logPassword" class="form-control" placeholder="Password">
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
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</body>
</html>