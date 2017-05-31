<?php

require_once './UsuarioDao.php';
require_once './PessoaDao.php';

require_once './PHPMailer-master/PHPMailer-master/class.phpmailer.php';
require_once './PHPMailer-master/PHPMailer-master/class.smtp.php';

$nivelAcesso = $_POST['nivelAcesso'];
$nome = $_POST['nomePessoa'];
$nivel = $_POST['nivel'];
$identificacao = $_POST['identificacao'];
$cpf = $_POST['CPF'];
$rg = $_POST['RG'];
$dtNasc = $_POST['dtNasc'];
$email = $_POST['email'];
$nomeUsuario = $_POST['login'];
$pwd = $_POST['senha'];
$hash = md5(rand(0,1000));







$p = PessoaDao::newPessoa();
$p->setCpf($cpf);
$p->setDtNasc($dtNasc);
$p->setEmail($email);
$p->setIdentificacao($identificacao);
$p->setNome($nome);
$p->setRg($rg);

$p->inserir();
$p->setId(DB::lastId($p->getTabela(), 'pesId'));

echo 'Nova pessoa tem o id: ' . $p->getId();

$pessoa = $p->getId();       
$u = new UsuarioDao($pwd, 0, $nivel, $nomeUsuario, $pessoa);

$u->setHash($hash);

if($u->cadastrarUsuario()){
    echo 'usuarioCadastrado';
    
    // Inicia a classe PHPMailer
    $mail = new PHPMailer();
    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(true); // Define que a mensagem será SMTP
    $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
    $mail->SMTPSecure = 'ssl';
    
    $mail->Port = 465;
    $mail->Username = 'predigeraion@gmail.com'; // Usuário do servidor SMTP
    $mail->Password = '2007luca'; // Senha do servidor SMTP
    
    
    
    // Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->From = "predigeraion@gmail.com"; // Seu e-mail
    $mail->FromName = "Luca Prediger"; // Seu nome
    $mail->SMTPDebug = 1;
    // Define os destinatário(s)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress($email, $nome);
    $mail->AddAddress($email);
    //echo $email;
    //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
    // Define os dados técnicos da Mensagem
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
    // Define a mensagem (Texto e Assunto)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->Subject  = "Confirmação de E-mail"; // Assunto da mensagem
    $mail->Body = "Para confirmar seu cadastro acesse o seguinte link: 
        Please click this link to activate your account:
        http://localhost/aps1/validarEmail.php?email='.$email.'&hash='.$hash.'";
    $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
    // Define os anexos (opcional)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
    // Envia o e-mail
    //echo 'iudwahgdiuywagdiuywagdwaiuydgwaiugdytwadgfwa';
    $enviado = $mail->Send();
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
    //echo 'luca lcua';
    // Exibe uma mensagem de resultado
    if ($enviado) {
      echo "E-mail enviado com sucesso!";
    } else {
      echo "Não foi possível enviar o e-mail.";
      echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
    }

}else{
    echo 'ERRO AO CADASTRAR USUARIO';
}

