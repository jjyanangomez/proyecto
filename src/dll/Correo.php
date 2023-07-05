<?php

    use PHPMailer\PHPMailer\PHPMailer;	
	use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';

    if(isset($_POST["correo"])){
        $correo = $_POST['correo'];
        $codigo = md5($correo);
        $mail = new PHPMailer(true); // Passing `true` enables exceptions  
        include ("config.php");
		include ("class_mysql.php");
        $miconexion = new clase_mysqli;
		$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
		$miconexion->consulta("select * from usuario where Correo='$correo'");
		$list=$miconexion->consulta_lista();
        if($list[0]){
            try {
                //Server settings
                //$mail->SMTPDebug = 0; // Enable verbose debug output                                 
                $mail->isSMTP(); //Set mailer to use SMTP                                      
                $mail->Host = 'smtp-mail.outlook.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'Sis_GamificEv@outlook.com'; // SMTP username
                $mail->Password = 'SistemaGami_0204'; // SMTP application password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587; // TCP port to connect to
    
                //Recipients
                $mail->setFrom('Sis_GamificEv@outlook.com', 'GamificEv'); // Sender email and name
                $mail->addAddress($correo,$list[5]); // Reciver email
    
                // if you want to send email to multiple users, then add the email addresses you which you want to send.
                //$mail->addAddress('reciver2@gmail.com');
                //$mail->addAddress('reciver3@gmail.com');
    
                //For Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');  // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // You can specify the file name
    
                //Content
                $mail->isHTML(true);// Set email format to HTML                                  
                $mail->Subject = "Correo para recuperar contraseña del Sistema GamificEv"; // Subject of the email
                $mensaje = "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Mensaje</title>
                
                <style>
                    * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    }
                
                    .container {
                    max-width: 1000px;
                    width: 90%;
                    margin: 0 auto;
                    }
                    .bg-dark {
                    background: #343a40;
                    margin-top: 40px;
                    padding: 20px 0;
                    }
                    .alert {
                    font-size: 1.5em;
                    position: relative;
                    padding: .75rem 1.25rem;
                    margin-bottom: 2rem;
                    border: 1px solid transparent;
                    border-radius: .25rem;
                    }
                    .alert-primary {
                    color: #004085;
                    background-color: #cce5ff;
                    border-color: #b8daff;
                    }
                
                    .img-fluid {
                    max-width: 100%;
                    height: auto;
                    }
                
                    .mensaje {
                    width: 80%;
                    font-size: 20px;
                    margin: 0 auto 40px;
                    color: #eee;
                    }
                
                    .texto {
                    margin-top: 20px;
                    }
                
                    .footer {
                    width: 100%;
                    background: #48494a;
                    text-align: center;
                    color: #ddd;
                    padding: 10px;
                    font-size: 14px;
                    }
                    h1,h3{
                        text-align: center;
                        color: #ddd;
                    }
                    .footer span {
                    text-decoration: underline;
                    }
                    .button {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 200px;
                    height: 50px;
                    background-color: #1c415d;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: center;
                    text-decoration: none;
                    text-transform: uppercase;
                    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
                    }
                </style>
                </head>
                <body>
                <div class='container'>
                    <div class='bg-dark'>
                    <h1>Correo de cambio de contraseña <br></h1>
                    <h3>SISTEMA GAMIFICEV<br>-------------------------------------</h3>
                    <div class='alert alert-primary'>
                        <strong>$correo</strong><br>
                        <strong>Hola $list[5], para restalecer tu contraseña</strong>
                    </div>
                
                    <div class='mensaje'>
                
                        <a class='button' href='http://localhost/Tesis/UnificacionPlatform/src/views/Teacher/index.php?correo=$correo&code=$codigo'> Da click Aquí</a>
                    </div>
                
                    <div class='footer'>
                        SISTEMA GAMIFICEV
                    </div>
                    </div>
                </div>
                </body>
                </html>
                ";
                $mail->Body    = $mensaje;
    
                $mail->send();
                echo '<script>alert("Revise su correo Electronico");</script>';
                header("Location: ../../src/views/Teacher/Login.html");
            } catch (Exception $e) {
                echo $mensaje;
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                
            }
        }else{
            echo '<script>alert("Correo Electronico no existe");</script>';
	        echo "<script>location.href='../../src/views/Teacher/Login.html'</script>";
        }
                                   
    }

?>