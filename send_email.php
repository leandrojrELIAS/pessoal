<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Configurações do e-mail
    $to = "leandrojr.elias.farias@gmail.com"; // Substitua com o seu e-mail pessoal
    $subject = "Novo Contato do Formulário";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Mensagem do e-mail
    $message = "<html><body>";
    $message .= "<h2>Nova mensagem de contato</h2>";
    $message .= "<p><strong>Nome:</strong> $nome</p>";
    $message .= "<p><strong>E-mail:</strong> $email</p>";
    $message .= "<p><strong>Mensagem:</strong></p>";
    $message .= "<p>$mensagem</p>";
    $message .= "</body></html>";

    // Envia o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Ocorreu um erro ao enviar a mensagem.";
    }
}
?>
