<?php
    require 'db.php';
    if (isset($_SESSION['logged_user'] )) {
        echo 'Welcome home, '.$_SESSION['logged_user']->login.' ! ';
        echo '
        <form method="LINK" action="logout.php">
            <button type="submit" name="button">Log out</button>
        </form>';
    }
    else {
        echo '<a href="login.php">Log in</a><br>
        <a href="signup.php">Sign Up</a>';
    }
?>
