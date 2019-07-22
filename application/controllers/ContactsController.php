<?php

namespace application\controllers;
use application\core\Controller;
use application\lib\PHPMailer;

class ContactsController extends Controller {

    public function contactsAction() {
        if (!empty($_POST)) {
            $this -> sendMsg($_POST);
        }
        $this->view->render('Контакты',  []);
    }

    private function sendMsg($post){
        $emails_to = array('olga.bulakhava@gmail.com', 'coronacia@mail.ru');
        $email_from = 'narciss-and-k@mail.ru';
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

        $mail = new PHPMailer();
        $mail->CharSet = 'utf-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = $email_from;
        $mail->Password = 'rubikidsgloves1979';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($email_from);
        $mail->isHTML(true);
        $mail->Subject = $email_subject;
        $mail->Body = $email_message;

          foreach ($emails_to as $email_to) {
                $mail->addAddress($email_to);
                $mail->send();
            }

        $this->view->message('success', 'Ваше сообщение отправлено!');

    }

}
