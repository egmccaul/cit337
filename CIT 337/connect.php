<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.
    
    // Template found at https://docs.c9.io/docs/setting-up-mysql
    // Insert Code Template http://www.w3schools.com/php/php_mysql_insert.asp

    $servername = getenv('https://cit337-egmccaul.c9users.io/phpmyadmin');
//    $username = 'egmccaul';
//    $password = "test";
//    $servername = getenv('IP');
    $username = 'root';
    $password = '';
    $database = 'c9';
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";
?>