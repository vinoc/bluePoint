<?php


class Mail
{
    private $_addressRecipient;
    private $_adressSender;
    private $_message;
    private $_subject;

    public function __construct(array $data)
    {
        $this->_adressSender = 'hello@cheezpa.com';
        try{
            $this->setMessage($data['message']);
            $this->setAddressRecipient($data['recipient']);
            $this->setSubject($data['subject']);
        }
        catch(Exception $e){
            echo 'erreur : ',  $e->getMessage(), "\n";
        }
    }

    public function setAddressRecipient($addressRecipient): void
    {
        $this->_addressRecipient = htmlspecialchars($addressRecipient);
    }

    public function setMessage($message): void
    {
        $this->_message = $message;
    }

    public function setSubject($subject): void
    {
        $this->_subject = $subject;
    }


    public function sendMail(){

//        $to = $this->_addressRecipient;
        $to =$this->_addressRecipient;
        $subject = $this->_subject;
        $message = $this->_message;

//        $headers = array(
//            'MIMIE-Version' => '1.0',
//            'From' => $this->_adressSender,
//            'To' => $this->_addressRecipient,
//            'Reply-To' => $this->_adressSender,
////            'X-Mailer' => 'PHP/' . phpversion(),
//            'Content-Type' => 'text/html',
//            'charset' => 'utf-8'
//
//        );

//        $headers= 'MIME-Version: 1.0';
//        $headers.='From :'.$this->_adressSender;
//        $headers.='reply-To : '.$this->_adressSender;
//        $headers.='X-Mailer: PHP/'.phpversion();
//
//        $headers.= 'Content-type: text/html; charset=utf-8';


        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

//        // En-têtes additionnels
        $headers[] = 'To: <'.$this->_addressRecipient.'>';
        $headers[] = 'From: BluePoint <hello@cheezpa.com>';
       $headers[] = 'Cc: ';
       $headers[] = 'Bcc: ';

        mail($to, $subject, $message,  implode("\r\n", $headers));
    }
}