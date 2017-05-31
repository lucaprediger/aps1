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
    
    $mail = new PHPMailer(); 
    
    $mail->IsSMTP();
    //configuração do gmail
    $mail->Port = 465; //porta usada pelo gmail.
    $mail->Host = 'smtp.gmail.com'; 
    $mail->IsHTML(true); 
    $mail->Mailer = 'smtp'; 
    $mail->SMTPSecure = 'ssl';

    //configuração do usuário do gmail
    $mail->SMTPAuth = true; 
    $mail->Username = 'luca@alunos.utfpr.edu.br'; // usuario gmail.   
    $mail->Password = '2007prediger'; // senha do email.

    $mail->SingleTo = true; 

    // configuração do email a ver enviado.
    $mail->From = "luca@alunos.utfpr.edu.br"; 
    $mail->FromName = "Sistemas de Eventos"; 

    $mail->addAddress($email); // email do destinatario.

    $mail->Subject = "Ativação de E-mail."; 
    $mail->Body = "Seque o link com ativação: .";
    
    for($i=0; $i<20; $i++){
        if($mail->Send()){
        echo '<br>email enviado com sucesso!!!!';
        echo '<br>' . $email;
         }else{
        echo "<br>Erro ao enviar Email:" . $mail->ErrorInfo;
    }
    echo $i;
    }
    
}else{
    echo 'ERRO AO CADASTRAR USUARIO';
}

