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
    $mailer->Host = 'smtplw.com.br'; // Host do SMTP Locaweb
    $mailer->SMTPAuth = true; // Habilita autenticação SMTP
    $mailer->Username = 'contato@mparmog.com.br'; // Login SMTP
    $mailer->Password = 'HZ&ro6C9'; // Senha SMTP
    $mailer->FromName = 'Bart S. Locaweb'; // Nome do remetente
    $mailer->From = 'remetente@email.com.br'; // Endereço de e-mail do remetente
    $mailer->AddAddress('khricardo@gmail.com', 'Nome do destinatário'); // Endereço de e-mail do destinatário

    // Obtenha os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Construa o corpo do e-mail
    $corpoEmail = "Nome: $nome <br>" .
                  "Email: $email <br>" .
                  "Telefone: $telefone <br>" .
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
