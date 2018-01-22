<?php
    require 'db.php';
    $data = $_POST;
    if (isset ($data['do_signup']))
    {
        $errors = array();
        if (trim($data['login'])== '') {
            $errors[] = 'Please write your username!';
        }

        if (trim($data['email']) == '') {
            $errors[] = 'Please write your email!';
        }

        if ( $data['password'] == '') {
            $errors[] = 'Please write your password!';
        }

        if ($data['password'] != $data['password_2']) {
            $errors[] = 'Passwords dont match!';
        }

        if (R::count('users', "login = ? OR email = ?", array($data['login'], $data['email'])) > 0) {
            $errors[] = 'Such account already exists!';
        }

        if (empty($errors))
        {
            $user = R::dispense('users');
            $user -> login = $data['login'];
            $user -> email = $data['email'];
            $user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div style="color: #296;">
                    <span>Congrats, youve been successfully signed up</span><br>
                    <a href="index.php">Main page</a>
                </div>';
        }
        else {
            echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }
    }
?>


<form class="" action="signup.php" method="post">
    <p>
        <p>
            <strong>username/strong>
        </p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>

    <p>
        <p>
            <strong>email</strong>
        </p>
        <input type="email" name="email" value="<?php echo @$data['email']; ?>">
    </p>

    <p>
        <p>
            <strong>Password</strong>
        </p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
        <p>
            <strong>Verify password</strong>
        </p>
        <input type="password" name="password_2" value="<?php echo @$data['password2']; ?>">
    </p>

    <button type="submit" name="do_signup">Sign up</button>
</form>
