
<?php 

    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/OAuth.php';
    require 'phpmailer/src/POP3.php';


    $nome = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $mensagem = addslashes($_POST['mensagem']);

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;

    $mail->Username = 'potatogames248@gmail.com';
    $mail->Password = 'Marcos248';



    $mail->setFrom('bifrost.contato123@gmail.com');
    $mail->addAddress($email);

    $mail->SMTPDebug = 3;
    $mail->Debugoutput = 'html';
    $mail->setLanguage('pt');

    $mail->isHTML(true);
    $mail->Subject = 'Olá '.$nome;
    $mail->Body    = '<h1>Sua mensagem foi enviada com sucesso!</h1><p>'.$nome.', nós recebemos seu email com a seguinte mensagem: </p><p>'.$mensagem.'</p><p>Essa mensagem serve somente para informar que sua mensagem foi enviada e será lida por nós no nosso horário de atendimento.</p>';

    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
        echo "<script>alert('Sua mensagem foi enviada com sucesso');</script>";
    }

    header('location:index.html');
?>