<?php

namespace Config\providers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Proveedor que permite administrar el envio de email.
 */
final class MailerProvider
{

    /**
     * @var MailInfo
     */
    private $mailinfo;

    public function __construct(array $mailinfo = [
        'host' => 'smtp.yandex.com',
        'auth' => true,
        'user' => 'pru3b4@yandex.com',
        'pass' => 'pru3b4123',
        'secure' => 'ssl', //tls o ssl
        'port' => '465',//587 o 465
        'from' => 'pru3b4@yandex.com'
    ])
    {
        $this->mailinfo = $mailinfo;
    }

    /**
     * Configura y arma el cuerpo inicial del email
     * @param string $body Cuerpo html que se crea para ingresar a la plantilla base
     * @param array $to Arreglo de desinatarios
     * @return string subject Asunto del mensaje
     */
    public function sendMail(string $body, array $to, string $subject)
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = $this->mailinfo['host'];
            $mail->SMTPAuth = $this->mailinfo['auth'];
            $mail->Username = $this->mailinfo['user'];
            $mail->Password = $this->mailinfo['pass'];
            $mail->SMTPSecure = $this->mailinfo['secure'];
            $mail->Port = $this->mailinfo['port'];
            $mail->setFrom($this->mailinfo['from'], 'Cotizacion');
            $mail->FromName = 'Cotizacion';
            $mail->SMTPKeepAlive = true;
            $mail->isHTML();
            $mail->CharSet = 'UTF-8';

            $mail_body = '<!DOCTYPE html>
            <html>
                <head>
                    <title></title>
                </head>
                <body>
                    <div style="background-color: #f4f4f4;"><!-- [if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div style="margin: 0px auto; max-width: 600px;">
                    <table style="width: 100%;" role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                    <td style="direction: ltr; font-size: 0px; padding: 20px 0px 20px 0px; text-align: center;"><!-- [if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;">
                    <table style="vertical-align: top;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="font-size: 0px; padding: 0px 0px 0px 25px; padding-top: 0px; padding-bottom: 0px; word-break: break-word;" align="left">&nbsp;</td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><![endif]--></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div style="background: #FFFFFF; background-color: #ffffff; margin: 0px auto; max-width: 600px;">
                    <table style="background: #FFFFFF; background-image: -ms-linear-gradient(40deg, #1786d8 0%, #00aff0 100%)!important; background-color: #ffffff; width: 100%;" role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                    <td style="direction: ltr; font-size: 0px; padding: 20px 0; padding-bottom: 0px; padding-top: 0px; text-align: center;"><!-- [if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;">
                    <table style="vertical-align: top;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="font-size: 0px; padding: 30px 25px 10px 25px; word-break: break-word;" align="center">
                    <table style="border-collapse: collapse; border-spacing: 0px;" role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="width: 152px;"><img style="border: none; border-radius: px; display: block; outline: none; text-decoration: none; height: auto; width: 100%; font-size: 13px;" alt="" width="152" height="auto" /></td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><![endif]--></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div style="background: #FFFFFF; background-color: #ffffff; margin: 0px auto; max-width: 600px;">
                    <table style="background: #FFFFFF; background-color: #ffffff; width: 100%;" role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                    <td style="direction: ltr; font-size: 0px; padding: 20px 0; padding-bottom: 0px; padding-top: 0px; text-align: center;"><!-- [if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:middle;width:600px;" ><![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: middle; width: 100%;">
                    <table style="vertical-align: middle;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="font-size: 0px; padding: 40px 25px 0px 25px; word-break: break-word;" align="center">
                    <table style="border-collapse: collapse; border-spacing: 0px;" role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="width: 550px;"><img style="border: none; border-radius: px; display: block; outline: none; text-decoration: none; height: auto; width: 100%; font-size: 13px;" alt="" width="550" height="auto" /></td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td style="font-size: 0px; padding: 10px 25px 10px 25px; word-break: break-word;" align="left">
                    <div style="font-family: Arial, sans-serif; font-size: 13px; letter-spacing: normal; line-height: 1; text-align: left; color: #000000;">' . $body . '</div>
                    </td>
                    </tr>
                    <tr>
                    <td style="background: transparent; font-size: 0px; padding: 0px 25px 20px 25px; word-break: break-word;" align="center">
                    <table style="border-collapse: separate; line-height: 100%;" role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="border: none; border-radius: 3px; cursor: auto; mso-padding-alt: 10px 25px; background: #36eda4;" role="presentation" align="center" valign="middle" bgcolor="#36eda4">
                    <p style="display: inline-block; background: #1786d8; color: #ffffff; font-family: Arial, sans-serif; font-size: 13px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none; padding: 10px 25px; mso-padding-alt: 0px; border-radius: 3px;"><span style="color: #ffffff; font-size: 11px; background-color: #1786d8;"><strong>&nbsp; &nbsp; &nbsp; &nbsp;VISITA NUESTRO SITIO &nbsp; &nbsp; &nbsp;</strong></span></p>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><![endif]--></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div style="background: #ffffff; background-color: #ffffff; margin: 0px auto; max-width: 600px;">&nbsp;</div>
                    <!-- [if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
                    <div style="background: #FFFFFF; background-color: #ffffff; margin: 0px auto; max-width: 600px;">
                    <table style="background: #FFFFFF; background-color: #ffffff; width: 100%;" role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                    <td style="direction: ltr; font-size: 0px; padding: 20px 0; padding-bottom: 0px; padding-top: 0px; text-align: center;"><!-- [if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;">
                    <table style="vertical-align: top;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="background: transparent; font-size: 0px; padding: 0px 25px 20px 25px; word-break: break-word;" align="center">
                    <table style="border-collapse: separate; line-height: 100%;" role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="border: none; border-radius: 3px; cursor: auto; mso-padding-alt: 10px 25px; background: #36eda4;" role="presentation" align="center" valign="top" bgcolor="#36eda4">
                    <p style="display: inline-block; background: #1786d8; color: #ffffff; font-family: Arial, sans-serif; font-size: 13px; font-weight: normal; line-height: 120%; margin: 0; text-decoration: none; text-transform: none; padding: 10px 25px; mso-padding-alt: 0px; border-radius: 3px;"><span style="color: #ffffff; font-size: 11px; background-color: #1786d8; line-height: 13px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp;M&Aacute;S SERVICIOS &nbsp; &nbsp; &nbsp;</strong></span></p>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td style="font-size: 0px; padding: 10px 25px 10px 25px; word-break: break-word;" align="center">
                    <table style="border-collapse: collapse; border-spacing: 0px;" role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="width: 45px;"><img style="border: none; border-radius: px; display: block; outline: none; text-decoration: none; height: auto; width: 100%; font-size: 13px;" src="http://o4o9.mj.am/img/o4o9/b/1ovpx/u912.png" alt="" width="45" height="auto" /></td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td style="font-size: 0px; padding: 10px 25px; word-break: break-word;">
                    <p style="border-top: solid 2px #E6E6E6; font-size: 1; margin: 0px auto; width: 100%;">&nbsp;</p>
                    <!-- [if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 2px #E6E6E6;font-size:1;margin:0px auto;width:550px;" role="presentation" width="550px" ><tr><td style="height:0;line-height:0;"> &nbsp;
                                        </td></tr></table><![endif]--></td>
                    </tr>
                    <tr>
                    <td style="font-size: 0px; padding: 10px 25px; word-break: break-word;" align="center"><!-- [if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" ><tr><td><![endif]-->
                    <table style="float: none; display: inline-table;" role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                    <td style="padding: 4px;">
                    <table style="background: #3B5998; border-radius: 3px; width: 20px;" role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="font-size: 0; height: 20px; vertical-align: middle; width: 20px;"><a href="#" target="_blank" rel="noopener"><img style="border-radius: 3px; display: block;" src="https://www.mailjet.com/images/theme/v1/icons/ico-social/facebook.png" width="20" height="20" /></a></td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    <!-- [if mso | IE]></td><td><![endif]-->
                    <table style="float: none; display: inline-table;" role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                    <td style="padding: 4px;">
                    <table style="background: #1DA1F2; border-radius: 3px; width: 20px;" role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                    <td style="font-size: 0; height: 20px; vertical-align: middle; width: 20px;"><a href="#
                                                                                                                        target="><img style="border-radius: 3px; display: block;" src="https://www.mailjet.com/images/theme/v1/icons/ico-social/twitter.png" width="20" height="20" /></a></td>
                    </tr>
                    </tbody>
                    </table>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    <!-- [if mso | IE]></td>
                                        </tr></table><![endif]--></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><![endif]--></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <!-- [if mso | IE]></td></tr></table><![endif]--></div>
                </body>
            </html>';

            if (count($to) > 0) {
                foreach ($to as $d) {
                    $mail->addAddress($d);
                }
            } else {
                throw new Exception("Debe ingresar al menos un correo destino");
            }

            $mail->Subject = $subject;
            $mail->Body = $mail_body;
            $mail->send();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
