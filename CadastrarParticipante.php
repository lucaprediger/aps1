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
$hash = md5(rand(0, 1000));

$novo = FALSE;
$p = PessoaDao::newPessoa()->getByMail($email);

if ($p->getId() == 0) {
    $p->setCpf($cpf);
    $p->setDtNasc($dtNasc);
    $p->setEmail($email);
    $p->setIdentificacao($identificacao);
    $p->setNome($nome);
    $p->setRg($rg);

    $p->inserir();
    $p->setId(DB::lastId($p->getTabela(), 'pesId'));
    $u = new UsuarioDao($pwd, 0, $nivel, $nomeUsuario, $p->getId());
    $u->setHash($hash);
    $u->cadastrarUsuario();
    $novo = TRUE;
} else {
    $u = UsuarioDao::getByIdPessoa($p->getId());
    $u->setHash($hash);
    $u->atualizar();
}

if ($novo) {
    echo 'Cadastro efetuado!<br>Você receberá um e-mail com as informações para ativação de sua conta.';
}else{
    echo 'Seu e-mail já está cadastrado!<br>Você receberá um e-mail com as informações para reativação de sua conta.';
}
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->CharSet = "UTF-8";
//configuração do gmail
$mail->Port = 465; //porta usada pelo gmail.
$mail->Host = 'smtp.gmail.com';
$mail->IsHTML(true);
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'ssl';

//configuração do usuário do gmail
$mail->SMTPAuth = true;
$mail->Username = "marcioaraujo@alunos.utfpr.edu.br"; // usuario gmail.   
$mail->Password = "aletse01"; // senha do email.

$mail->SingleTo = true;

// configuração do email a ver enviado.
$mail->From = "marcioaraujo@alunos.utfpr.edu.br";
$mail->FromName = "Sistemas de Eventos";

$mail->addAddress($email); // email do destinatario.

$mail->Subject = "Ativação de E-mail.";

$mail->Body = 'Para confirmar seu cadastro acesse o seguinte link: ' .
        'http://localhost/aps1/validarEmail.php?email=' . $email . '&hash=' . $hash;
$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";


if ($mail->Send()) {
    echo '<br>email enviado com sucesso!!!!';
    echo '<br>' . $email;
} else {
    echo "<br>Erro ao enviar Email:" . $mail->ErrorInfo;
}

