<?php
    require 'db.php';
    $data = $_POST;

    if (isset($data['do_login'])) {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if ($user)
        {
            if (password_verify($data['password'], $user->password)) {
                $_SESSION['logged_user'] = $user;
                echo '<div style="color: #09f">
                        <span>Congrats, u r logged in!</span><br>
                        <a href="index.php">Main page</a>
                    </div>';
            } else {
                $errors[] = 'Wrong password';
            }
        } else {
            $errors[] = 'Cannot find such a username';
        }

        if (!empty($errors))
        {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<form class="" action="login.php" method="post">
    <p>

        <p>
            <strong>username</strong>
        </p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <p>
            <strong>password</strong>
        </p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <button type="submit" name="do_login">log in</button>
</form>
