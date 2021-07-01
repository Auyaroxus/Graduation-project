<?php 
    if(isset($_POST['submit'])){
        $name =  $_POST['cont-name'];
        $email = $_POST['cont-email'];
        $subject = $_POST['cont-subject'];
        $message = $_POST['cont-mess'];

        $myEmail = 'bboy-111@seznam.cz';
        $head_email = 'From: '.$email;
        $text = 'Přišla vám zpráva od: '.$name.'\n \n'.$message;

        if (empty($name) || empty($email) || empty($subject) || empty($message)){
            header("Location: ../kontakt?event=empty");
            exit();
        }
        else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../kontakt?event=email&name=$name&subject=$subject&message=$message");
                exit();
            }
            else {
                mail($myEmail, $subject, $text, $head_email);
                header("Location: ../kontakt?event=send");
                exit();
            }
        }
    }
    else {
        header("Location: ../kontakt?event=error");
        exit();
    }



