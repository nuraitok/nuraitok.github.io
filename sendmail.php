<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->Charset = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);


    $mail->setForm('info@fls.guru', 'Satoru Gojo');
    $mail->addAddress('code@fls.guru');

    $mail->Subject = 'Привет! Это Satoru Gojo';

    $body = '<h1>Вам пришло новое сообщение!<h1>';

    
    if(trim(!empty($_POST['name']))){
    | $body.= '<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))){
        $body.= '<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
    }
    
    if(trim(!empty($_POST['messageTitle']))){
        $body.= '<p><strong>Тема сooбшeния:</strong> '.$_POST['messageTitle'].'</p>';
    }
    
    if(trim(!empty($_POST['message']))){
        $body.= '<p><strong>Cooбшeние:</strong> '.$_POST['message'].'</p>';
    }
    
    $mail->Body = $body;

    if(!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);

?>