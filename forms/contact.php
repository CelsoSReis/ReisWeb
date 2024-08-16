<?php
// Defina o endereço de e-mail do destinatário
$destinatario = "celsosr87@gmail.com";

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $nome = htmlspecialchars(trim($_POST["nome"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $mensagem = htmlspecialchars(trim($_POST["mensagem"]));

    // Validação básica
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "O endereço de e-mail é inválido.";
        exit;
    }

    // Crie o assunto e o corpo do e-mail
    $assunto = "Contato pelo Site";
    $corpo = "Nome: $nome\nE-mail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Envie o e-mail
    if (mail($destinatario, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha no envio da mensagem.";
    }
} else {
    // Caso o formulário não tenha sido enviado corretamente
    echo "Método de solicitação inválido.";
}
?>
