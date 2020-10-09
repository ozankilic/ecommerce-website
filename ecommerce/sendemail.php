<?php 

include 'db_connection.php';
include("phpmailer/class.phpmailer.php");

$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];



if(empty(trim($email))){
    echo 'Please enter an email';
    exit();
}

if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
    echo 'Please enter a valid Email';
    exit();
}

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = false; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
        $mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
        $mail->SMTPSecure = 'tls'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
        $mail->Host = "smtp.gmail.com"; // Mail sunucusunun adresi (IP de olabilir)
        $mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
        $mail->IsHTML(true);
        $mail->SetLanguage("tr", "phpmailer/language");
        $mail->CharSet  ="utf-8";
        $mail->Username = "bogazicirowingteam@gmail.com"; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
        $mail->Password = "ozan@7890"; // Mail adresimizin sifresi
        $mail->SetFrom('bogazicirowingteam@gmail.com', 'Ecommerce Web Site' ); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
        $mail->AddAddress($email); // Mailin gönderileceği alıcı adres
        $mail->Subject = 'Copy of Message '.$subject; // Email konu başlığı
        $mail->Body = $message; // Mailin içeriği
        $mail->Send();

    echo 'A copy of your message is sent to you.';
    exit();
