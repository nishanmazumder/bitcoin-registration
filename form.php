<?php

session_start();

if (isset($_POST['reg'])) {
    $_SESSION["nmName"] = $_POST['nmName'];
    $_SESSION["nmMail"] = $_POST['nmMail'];
    $_SESSION["nmPasw"] = $_POST['nmPasw'];

    nmMailSend();

    echo "Mail Send";
    
} elseif (isset($_POST['per'])) {
    $_SESSION["test1"] = $_POST['test1'];

    
} else {
    $_SESSION["test3"] = $_POST['test3'];

    //nmMailSend();
    
}

function nmMailSend()
{
    $to = "arosh019@gmail.com";
    $subject = "New User";
    //$from = 'fromTEST@gmail.com';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <fromTEST@gmail.com>' . "\r\n";
    $headers .= 'Cc: test@gmail.com' . "\r\n";

    $message = '<html><body>';
    $message .= '<h1>Basi Info</h1>';
    $message .= '<strong>Name :</strong><span>'.$_SESSION["nmName"].'</span>';
    $message .= '<strong>Email :</strong><span>'.$_SESSION["nmMail"].'</span>';
    $message .= '<strong>Name :</strong><span>'.$_SESSION["nmPasw"].'</span>';
    $message .= '</body></html>';


    //$headers = "From: webmaster@example.com" . "\r\n" . "CC: somebodyelse@example.com";

    mail($to, $subject, $message, $headers);

    session_destroy();
}
