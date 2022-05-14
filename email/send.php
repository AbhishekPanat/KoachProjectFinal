<?php
require '../include/all.php';
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$html = '<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; chaRs. et=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-Rs. pace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectoRs. ] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 15px;" bgcolor="#3E7399">
                           
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"
                                class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                    style="max-width:300px;">
                                    <tr>
                                        <td align="center" valign="top"
                                            style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <img style="height: 3rem;" src="https://www.texephyr.in/images-event/Logotex.png" alt="Tex Logo" >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;"
                            bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png"
                                            width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2
                                            style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                            Greetings From Team Texephyr </h2>
                                            <h2
                                            style="font-size: 15px; font-weight: 800; line-height: 52px; color: #333333; margin: 0;">
                                            Hello! Abhishek Panat, Thanks For Registering </h2>
                                            <p
                                            style="font-size: 14px; font-weight: 800; line-height: 20px; color: #333333;">
                                            Your Fest Id is <span style="font-size: 16px;color: #3E7399;">TEX08842</span>
                                            </p>
                                            <p
                                            style="font-size: 14px; font-weight: 800; line-height: 20px; color: #333333;">
                                            Congrats!!! You are now officially a part of TEXEPHYR 2022.
                                            </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   

                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p
                                            style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                            To Know More Details Visit <a href="https://texephyr.in/profile" target="_blank"
                                                style="color: #777777;">Texephyr Website</a>. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';

/*function sendEmail($html1='')
{
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom( FROM_EMAIL , FROM_NAME );
    $email->setSubject("Sending with SendGrid is Fun");
    $email->addTo("abhipanat767@gmail.com", "Example User");
    $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent(
        "text/html", $html1
    );
    $sendgrid = new \SendGrid( SENDGRID_API_KEY );
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo "Caught exception: ". $e->getMessage() ."\n";
    }
}*/

echo $html1 = workshop_content('Abhishek Panat','TEX95367');
//echo sendEmail($html1,'Team Texephyr 2022',"abhipanat676@gmail.com","Abhishek Panat");

/*$email = new \SendGrid\Mail\Mail(); 
$email->setFrom( FROM_EMAIL , FROM_NAME );
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("abhipanat767@gmail.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", $html1
);
$sendgrid = new \SendGrid( SENDGRID_API_KEY );
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo "Caught exception: ". $e->getMessage() ."\n";
}*/

?>