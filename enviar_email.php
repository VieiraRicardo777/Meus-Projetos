<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura dos dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $preferenciaContato = $_POST['preferencia_contato'];
    $nivelSatisfacao = $_POST['nivel_satisfacao'];
    $receberNovidades = isset($_POST['novidades_promocoes']) ? $_POST['novidades_promocoes'] : 'Não';

    // Construção do corpo do e-mail
    $corpoEmail = "Nome: " . $nome . "\n" .
                  "Email: " . $email . "\n" .
                  "Telefone: " . $telefone . "\n" .
                  "Preferência de Contato: " . $preferenciaContato . "\n" .
                  "Nível de Satisfação: " . $nivelSatisfacao . "\n" .
                  "Deseja receber novidades e promoções por email?: " . $receberNovidades;

    // Configurações do e-mail
    $destinatario = "ricardo.vieira@lslog.com.br";
    $assunto = "Novo contato recebido";
    $headers = "From: suporte-ti@lslog.com.br\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail usando SMTP
    $smtpHost = 'smtp.office365.com';
    $smtpPort = 587; // ou 25 ou 465
    $smtpUser = 'suporte-ti@lslog.com.br';
    $smtpPassword = 'L$@dm1n24'; // Substitua pela sua senha

    // Configurações adicionais para SMTP
    $mailConfig = [
        'auth' => true,
        'username' => $smtpUser,
        'password' => $smtpPassword,
        'secure' => 'tls', //tls ou ssl
        'port' => $smtpPort
    ];

    // Criação de um objeto de transporte SMTP
    $transport = new \PHPMailer\PHPMailer\SMTP();
    $transport->isSMTP();
    $transport->SMTPAuth = $mailConfig['auth'];
    $transport->Host = $smtpHost;
    $transport->Username = $mailConfig['username'];
    $transport->Password = $mailConfig['password'];
    $transport->Port = $mailConfig['port'];
    $transport->SMTPSecure = $mailConfig['secure'];

    // Criação de um objeto PHPMailer
    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->setFrom($smtpUser);
    $mail->addAddress($destinatario);
    $mail->Subject = $assunto;
    $mail->Body = $corpoEmail;
    $mail->isHTML(false);

    // Envio do e-mail
    if ($mail->send()) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
    }
} else {
    echo "Este arquivo PHP não pode ser acessado diretamente.";
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
