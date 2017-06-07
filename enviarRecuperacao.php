<?php

require_once './PessoaDao.php';
require_once './UsuarioDao.php';
require_once './PHPMailer-master/PHPMailer-master/class.phpmailer.php';
require_once './PHPMailer-master/PHPMailer-master/class.smtp.php';


$mail = $_POST['email'];

$pessoa = PessoaDao::newPessoa()->getByMail($mail);

$novoEmail = $pessoa->getEmail();

//var_dump($pessoa);
if ($pessoa->getId()!= 0) {
    
    //$usu = UsuarioDao::newUsuarioDao();
    
    $usu = UsuarioDao::newUsuarioDao()->getByIdPessoa($pessoa->getId());
   
    //echo '<br>' . $usu->getPwd();
    //echo '<br>' . $usu->getNomeUsuario();
    
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

    $mail->addAddress($novoEmail); // email do destinatario.

    $mail->Subject = "Recuperação de Senha.";

    $mail->Body = 'Segue o login e a senha:<br>Usúario: ' . $usu->getNomeUsuario() . '<br>Senha: ' . $usu->getPwd();
            
    $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";


    if ($mail->Send()) {
        echo '<br>email enviado com sucesso!!!!';
        $redirect = "./index.php";
        header("location:$redirect");
    } else {
        echo "<br>Erro ao enviar Email:" . $mail->ErrorInfo;
        $redirect = "./index.php";
        header("location:$redirect");
    }
    
    
    
} else {
    echo 'email inválido';
    $redirect = "./index.php";
    header("location:$redirect");
}
 
 
    

?>

