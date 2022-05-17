<?php 
    require 'email/vendor/autoload.php';
    define('SENDGRID_API_KEY','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');
    define('FROM_EMAIL','info.abhishekpanat@gmail.com');
    define('FROM_NAME','Abhishek Panat');

    function sendEmail($html1='',$subject='',$to_email='',$to_name='')
    {
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom( FROM_EMAIL , FROM_NAME );
        $email->setSubject($subject);
        $email->addTo($to_email, $to_name);
        //$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", $html1
        );
        $sendgrid = new \SendGrid( SENDGRID_API_KEY );
        try {
            $response = $sendgrid->send($email);
            return $response->statusCode();
        } catch (Exception $e) {
            echo "Caught exception: ". $e->getMessage() ."\n";
        }
    }

    function getBody($name='',$org='',$no='',$email='',$msg='')
    {
            $html = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#f9f9f9" id="bodyTable">
                <tbody>
                <tr>
                    <td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:600px">
                        <tbody>
                        <tr>
                            <td align="center" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard" style="background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;">
                                <tbody>
                                <tr>
                                    <td style="background-color:#00d2f4;font-size:1px;line-height:3px" class="topBorder" height="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 60px; padding-bottom: 20px;" align="center" valign="middle" class="emailLogo">
                                    <a href="#" style="text-decoration:none" target="_blank">
                                        <img alt="" border="0" src="http://email.aumfusion.com/vespro/img/hero-img/blue/logo.png" style="width:100%;max-width:150px;height:auto;display:block" width="150">
                                    </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 30px; padding-left: 20px; padding-right: 20px;" align="left" valign="top" class="mainTitle">
                                    <h4 class="text" style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size: 16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:left;padding:0;margin:0">Name:- '.$name.'</h4>
                                    <h4 class="text" style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size: 16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:left;padding:0;margin:0">Organisation:- '.$org.'</h4>
                                    <h4 class="text" style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size: 16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:left;padding:0;margin:0">Number:- '.$no.'</h4>
                                    <h4 class="text" style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size: 16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:left;padding:0;margin:0">Email:- '.$email.'</h4>
                                    <h4 class="text" style="color:#000;font-family:Poppins,Helvetica,Arial,sans-serif;font-size: 16px;font-weight:500;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:left;padding:0;margin:0">Message:- '.$msg.'</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:1px;line-height:1px" height="20">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                                <tbody>
                                <tr>
                                    <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                </tbody>
            </table>';
        return $html;
    }
    
 

    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        $Organisation = $_POST['Organisation'];
        $Number = $_POST['Number'];
        $Email = $_POST['Email'];
        $Message = $_POST['Message'];

        $body = getBody($name,$Organisation,$Number,$Email,$Message);

        $check = sendEmail($body,'Contact Us',$Email,$name);
        if($check)
        {
            echo json_encode(array("status" => 1,"msg"=>"Message Sent Successfully!"));
        }
        else{
            echo json_encode(array("status" => 0,"msg"=>"Message Not Send Successfully!"));
        }
    }
    

?>