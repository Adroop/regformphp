<?php
    require 'libs/rb.php';
    R::setup('mysql:host=localhost; dbname=database1',
    'root', '' ); //for both mysql or mariaDB host = your database's host, dbnamae=your database name.
    // and remember! no more spaces on line 3
    session_start();
?>
