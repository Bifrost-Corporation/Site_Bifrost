<?php

    if(isset($_POST['email']) && !empty($_POST['email'])){

    $nome = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $mensagem = addslashes($_POST['mensagem']);

    $to = "douglas.dans@gmail.com";
    $subject = "Formulario de contato";
    $body = "Nome: ".$nome."\r \n".
            "Email: ".$email."\r \n".
            "Mensagem: ".$mensagem."\r \n";

    $header = "From:mh7505570@gmail.com"."\r \n".
              "Reply-To: ".$email."\e\n".
              "X-Maller.PHP/".phpversion();
            
    if(mail($to, $subject, $body, $header)){

        echo("EMAIL ENVIADO COM SUCESSO!");
        
    }else{

        echo("O EMAIL NÃO PODE SER ENVIADO");
    }


    }

?>