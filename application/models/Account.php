<?php

namespace application\models;

use application\core\Model;

class Account extends Model{

    public function validate($input, $post) {
        $rules = [
            'firstName' => [
                'pattern' => '#^[\w]{3,30}$#',
                'message' => 'Имя указано неверно (разрешены только буквы и цифры от 3 до 30 символов',
            ],
            'lastName' => [
                'pattern' => '#^[\w]{3,30}$#',
                'message' => 'Фамилия указанa неверно (разрешены только буквы и цифры от 3 до 30 символов',
            ],
            'email' => [
                'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => 'E-mail адрес указан неверно',
            ],
            'password' => [
                'pattern' => '#^[a-z0-9]{6,30}$#',
                'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 10 до 30 символов',
            ],
        ];
        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }
        }
        return true;
    }


    public function checkEmailExists($email) {
        $params = [
            'email' => $email,
        ];
        return $this->db->column('SELECT id FROM accounts WHERE email = :email', $params);
    }

     public function register($post) {
       
        $token = $this->createToken();

        $params = [
            'id' => 0,
            'email' => $post['email'],
            'first_name' => $post['firstName'],
            'last_name' => $post['lastName'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'token' => $token,
            'status' => 0,
            'date_reg' => time()
        ];

       $this->db->query('INSERT INTO accounts VALUES (:id, :email, :first_name, :last_name, :password, :token, :status, :date_reg)', $params);

       if(!$this->db->getError_info()[2]){

           mail($post['email'], 'Register', 'Confirm: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/confirm?token=' . $token . '&email=' . $post['email']);

          return ['message' => 'Ссылка для подтверждения регистрации выслана вам на почту', 'status' => 'success'];
       } else {
           return ['message' => 'Ошибка регистрации', 'status' => 'error'];
       }

    }

    public function createToken() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)), 0, 30);
    }


    public function checkTokenExists($email, $query_token) {
        $params = [
            'email' => $email,
        ];
        $token = $this->db->column('SELECT token FROM accounts WHERE email = :email', $params);
        
         return $token === $query_token;
    }

    public function activate($email) {
        $params = [
            'email' => $email,
        ];
        $this->db->query('UPDATE accounts SET status = 1 WHERE email = :email', $params);
    }


    public function checkAdmin($login, $password){
         $config = require 'application/config/admin.php';
         return $config['login'] === $login and $config['password'] === $password;
    }


    public function checkLogin($email, $password){
       $params = [
            'email' => $email,
        ];
        $data = $this->db->row('SELECT * FROM accounts WHERE email = :email', $params);
        if(empty($data)){
            return ['message' => 'Неверный логин', 'status' => 'error'];
        } elseif($data[0]['status'] != 1) {
             return ['message' => 'Аккаунт ожидает подтверждения по E-mail', 'status' => 'error'];
        } else {
            if(!password_verify ($password, $data[0]['password'])){
                return ['message' => 'Неверный пароль', 'status' => 'error'];
            } else {
                return ['message' => 'Ok', 'status' => 'success', 'id' => $data[0]['id'], 'first_name' => $data[0]['first_name']];
            }
      
        }
       
    }

    
}