<?php

class UserModel extends Model{
    public function register(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        
        if($post && $post['submit'] && !empty($post['name'])){

        $password = md5($post['password']);

            // Insert into MySQL
            $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();
            // Verify
            if($this->lastInsertId()){
                //redirect
                header('Location: '.ROOT_URL.'users/login');
            }

        }
        return;
    }

    public function login(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        if($post && isset($post['submit'], $post['email'], $post['password']) && !empty($post['email']) && !empty($post['password'])){
            
            $password = md5($post['password']);
            // compare
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row = $this->single();
            
            if($row){
                echo 'Logged in';
            } else {
                echo 'Incorrect Login';
            }
        }
        return;
    }
}