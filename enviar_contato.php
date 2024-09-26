<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    
    $destinatario = "vitor.nepomuceno@academico.ifpb.edu.br";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
  
    $corpo_email = "Nome: $nome\n";
    $corpo_email .= "Email: $email\n";
    $corpo_email .= "Assunto: $assunto\n";
    $corpo_email .= "Mensagem:\n$mensagem\n";

    if (mail($destinatario, $assunto, $corpo_email, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
}
?>
