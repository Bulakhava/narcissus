<?php

namespace application\models;

use application\core\Model;

class Account extends Model{

    public function validate($input, $post) {
        $rules = [
            'firstName' => [
                'pattern' => '#^[a-zA-Zа-яёА-ЯЁ0-9]{3,30}$#',
                'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 3 до 30 символов',
            ],
            'lastName' => [
                'pattern' => '#^[a-zA-Zа-яёА-ЯЁ0-9]{3,30}$#',
                'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 3 до 30 символов',
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


}