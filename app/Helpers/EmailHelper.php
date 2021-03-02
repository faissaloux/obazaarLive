<?php


namespace App\Helpers;


class EmailHelper {
    private static $to;
    private static $with;
    private static $email;
    private static $subject;
    private static $API_KEY;
    private static $from = 'contact@o-bazaar.com';
    private static $fromName = 'O-Bazaar';
    private static $CURLOPT_URL = 'https://api.elasticemail.com/v2/email/send';

    public function __construct(){
        self::$API_KEY  = '70DBBC7B971EA3328F99EFFAB5FEB560942A612D534A8223289C408AB12B0EB3F764080947D5867AB7A16361CF5C7A26';
    }

    public static function to($to){
        self::$to = $to;
        return new self;
    }

    public static function with($with){
        self::$with = $with;;
        return new self;
    }

    public static function email($email){
        self::$email = $email;
        return new self;
    }

    public static function subject($subject){
        self::$subject = $subject;
        return new self;
    }

    public static function send(){
        try{
            $post = array(  'from' => self::$from,
                            'fromName' => self::$fromName,
                            'apikey' => self::$API_KEY,
                            'subject' => self::$subject,
                            'to' => self::$to,
                            'bodyHtml' => view(self::$email, self::$with),
                            'isTransactional' => false
                        );

            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => self::$CURLOPT_URL,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));

            $result=curl_exec ($ch);
            curl_close ($ch);
            return true;
        }catch(Exception $ex){
            echo $ex->getMessage();
            return false;
        }
    }

}