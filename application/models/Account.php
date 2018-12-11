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
        return $this->db->column('SELECT id FROM users WHERE email = :email', $params);
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
            'status' => 0
        ];

       $this->db->query('INSERT INTO users VALUES (:id, :email, :first_name, :last_name, :password, :token, :status)', $params);

       if(!$this->db->getError_info()[2]){
           mail($post['email'], 'Register', 'Confirm: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/account/confirm/'.$token);
           return 'Ссылка для подтверждения регистрации выслана вам на почту';
       } else {
           return 'Ошибка регистрации';
       }

    }

    public function createToken() {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)), 0, 30);
    }


}