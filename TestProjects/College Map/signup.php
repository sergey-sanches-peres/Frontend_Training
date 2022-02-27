<?php
    require "db.php";

    $data = $_POST;
    if(isset($data['do_signup'])){
        $errors = array();
        if(trim($data['login']) == ''){
            $errors[] = 'Введите логин.';
        }
        if(trim($data['phone']) == ''){
            $errors[] = 'Введите телефон.';
        }
        if($data['password'] == ''){
            $errors[] = 'Введите пароль.';
        }
        if($data['repeat_password'] != $data['password']){
            $errors[] = 'Повторный пароль введён неверно.';
        }
        if(empty($errors)){
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            R::store($user);
        }
        else{
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
?>