<?php
require_once('PHPMailer-master/src/PHPMailer.php');
require_once('PHPMailer-master/src/SMTP.php');

// Verifica se o método de solicitação é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Instancia o objeto PHPMailer
    $mailer = new PHPMailer\PHPMailer\PHPMailer();
    $mailer->IsSMTP();
    $mailer->SMTPDebug = 0; // desligue o debug quando em produção
    $mailer->Port = 587; // Porta de conexão SMTP
    $mailer->Host = 'email-ssl.com.br'; // Host do SMTP Locaweb
    $mailer->SMTPAuth = true; // Habilita autenticação SMTP
    $mailer->Username = 'contato@mparmlog.com.br'; // Login SMTP
    $mailer->Password = '42!eCN1ad'; // Senha SMTP
    $mailer->FromName = 'Contato via Site MPLOG'; // Nome do remetente
    $mailer->From = 'contato@mparmlog.com.br'; // Endereço de e-mail do remetente
    $mailer->AddAddress('contato@mparmlog.com.br', 'Nome do destinatário'); // Endereço de e-mail do destinatário


     // Define a codificação de caracteres como UTF-8
     $mailer->CharSet = 'UTF-8';


    // Obtenha os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $preferencia = $_POST['preferencia_contato'];
    $mensagem = $_POST['mensagem'];

    // Construa o corpo do e-mail
    $corpoEmail = "Nome: $nome <br>" .
                  "Email: $email <br>" .
                  "Telefone: $telefone <br>" .
                  "Preferencia de Contato: $preferencia <br>" .
                  "Mensagem: $mensagem";

    $mailer->IsHTML(true);
    $mailer->Subject = "Assunto da mensagem";
    $mailer->Body = $corpoEmail;

    // Tenta enviar o e-mail
    if(!$mailer->Send()) {
       echo "Erro ao enviar mensagem: " . $mailer->ErrorInfo;
    } else {
       echo "Mensagem enviada com sucesso";
    }
} else {
    echo "Este arquivo PHP não pode ser acessado diretamente.";
}
?>
