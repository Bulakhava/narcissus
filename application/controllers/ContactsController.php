<?php

namespace application\controllers;
use application\core\Controller;
require($_SERVER['DOCUMENT_ROOT'].'/application/lib/send_mail.php');

class ContactsController extends Controller {

    public function contactsAction() {
        if (!empty($_POST)) {
            $this -> sendMsg($_POST);
        }
        $this->view->render('Контакты',  []);
    }

    private function sendMsg($post){

        $emails_to = array("coronacia@mail.ru");
        $email_from = "olga.bulakhava@gmail.com";
        if (!isset($post['name']) ||
            !isset($post['email']) ||
            !isset($post['message']) ){
            die();
        }
        $name = $post['name'];
        $email = $post['email'];
        $message = $post['message'];

        $email_message = "<h3>Новое сообщение с сайта Нарцисс-и-К</h3><br>";

        function clean_string($string)
        {
            $bad = array("content-type", "bcc:", "to:", "cc:", "href");
            return str_replace($bad, "", $string);
        }

        $email_message .= "<b>Имя:</b> " . clean_string($name) . "<br>";
        $email_message .= "<b>Email:</b> " . clean_string($email) . "<br>";
        $email_message .= "<b>Сообщение:</b> " . clean_string($message) . "<br>";

        $email_subject = "Нарцисс-и-К -> " . $name;


        foreach ($emails_to as $email_to) {
            $mail_array = array(
                'to' => $email_to,
                'from' => $email_from,
                'subject' => $email_subject,
                'message' => $email_message
            );
            send_mail($mail_array);
        }

        $this->view->message('success', 'Ваше сообщение отправлено!');

    }

}
