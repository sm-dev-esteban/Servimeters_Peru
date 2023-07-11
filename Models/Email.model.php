<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email
{

    private $correo;
    private $config;

    function __construct()
    {
        include_once('PhpMailer/Exception.php');
        include_once('PhpMailer/PHPMailer.php');
        include_once('PhpMailer/SMTP.php');
        $this->correo = new PHPMailer(true);
        require_once dirname(__DIR__) . "/LoadConfig.php";
        $this->config = LoadConfig::getConfig(dirname(__DIR__).'/email.json');
    }

    public function sendEmail($to, $cc, $subject, $body)
    {
        $address = [
            "noreaply" => [
                "name" => "no reaply",
                "mail" => $this->config->FROM_EMAIL
            ]
        ];

        $address = array_merge($address, is_array($to) ? $to : [
            [
                "mail" => $to
            ]
        ]);

        try {
            $this->correo->SMTPDebug = 0;
            $this->correo->isSMTP();
            $this->correo->Host = $this->config->HOST_EMAIL;
            $this->correo->SMTPAuth = true;
            $this->correo->Username = $this->config->USERNAME_EMAIL;
            $this->correo->Password = $this->config->PASS_EMAIL;
            $this->correo->SMTPSecure = "tls";
            $this->correo->Port = $this->config->PORT_EMAIL;

            $this->correo->setFrom($this->config->FROM_EMAIL, "Solicitud de Horas Extra");
            // $this->correo->addAddress($to);
            // $this->correo->addAddress($this->config->FROM_EMAIL);
            foreach ($address as $key => $value) {
                if (isset($value["mail"])) {
                    $this->correo->addAddress($value["mail"], (isset($value["name"]) ? $value["name"] : "Empleado"));
                }
            }
            $this->correo->addCC($cc);
            $this->correo->isHTML(true);
            $this->correo->Subject = $subject;
            $this->correo->Body = $body;
            $this->correo->CharSet = "UTF-8";
            // $this->correo->send(); // la funcion envia un correo cada que se ejecuata -- no descomentar

            // if (!$this->correo->send()) {
            //     echo 'Message could not be sent.';
            //     echo 'Mailer Error: ' . $this->correo->ErrorInfo;
            // } else {
            //     echo 'Message has been sent';
            // }

            return ["status" => ($this->correo->send() ? true : false)]; // en teoria esto nunca devulve false, pero uno nunca sabe
        } catch (Exception $e) {
            return ["status" => false, "error" => $this->correo->ErrorInfo];
        }
    }
}
