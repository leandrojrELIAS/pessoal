<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'leandrojr.elias.farias@gmail.com'; // Seu e-mail Gmail
        $mail->Password = 'KTgd452585 '; // Sua senha Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configurações do e-mail
        $mail->setFrom($email, $nome);
        $mail->addAddress('leandrojr.elias.farias@gmail.com', 'leandro Jr'); // Adicione um destinatário
        $mail->addReplyTo($email, $nome);

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = "Contato do site de $nome";
        $mail->Body    = "<p>Nome: $nome</p><p>E-mail: $email</p><p>Mensagem:</p><p>$mensagem</p>";
        $mail->AltBody = "Nome: $nome\nE-mail: $email\n\nMensagem:\n$mensagem";

        $mail->send();
        echo "E-mail enviado com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
}
?>
