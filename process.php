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

    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        $Organisation = $_POST['Organisation'];
        $Number = $_POST['Number'];
        $Email = $_POST['Email'];
        $Message = $_POST['Message'];

        $check = sendEmail('testing','testing',$Email,$name);
        if($check)
        {
            echo json_encode(array("status" => 1,"msg"=>"Message Send Successfully !!!"));
        }
        else{
            echo json_encode(array("status" => 0,"msg"=>"Message Not Send Successfully !!!"));
        }
    }
    

?>