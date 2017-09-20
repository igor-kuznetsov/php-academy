<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

$mailer = new PHPMailer();
$mailer->isSMTP(); // set to use SMTP
$mailer->Host = 'smtp.gmail.com'; // SMTP host
$mailer->SMTPAuth = true; // enable SMTP auth
$mailer->Username = SMTP_USER; // SMTP user
$mailer->Password = SMTP_PASS; // SMTP password
$mailer->SMTPSecure = 'tls'; // TLS encryption
$mailer->Port = 587; // SMTP port

$mailer->setFrom('admin@example.com', 'Admin'); // send from email
$mailer->addReplyTo('info@example.com', 'Info'); // reply to email
$mailer->addAddress('softerix@gmail.com', 'Igor Kuznetsov'); // recipient (send to) email
$mailer->addCC('webdevastator@gmail.com'); // cc email
$mailer->addBCC('igdesign@i.ua'); // bcc email
$mailer->isHTML(true);
$mailer->Subject = 'Very Important Message #2';
$mailer->Body = '<h1>Test 2</h1><p>Test message in <b>HTML</b> format.</p>';
$mailer->AltBody = 'Test message in plain text format'; // if HTML is not supported

if ($mailer->send()) {
    echo 'Message has been sent';
} else {
    echo 'Mailer error: '.$mailer->ErrorInfo;
}