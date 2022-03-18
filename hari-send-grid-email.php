<?php
/**
 * Plugin Name:Sendgrid-email-plugin
 * Plugin URI:http://localhost:8000
 * Version:1.0.0
 * Description:plugin to send email using sendgrid
 * Author:Ram
 * Author URI:http://localhost:8000
 * License :GPL or later
 * Text Domain:Sendgrid-email-plugin
 *
 */
class EmailPlugin{
    function __construct()
    {
        add_action('admin_menu',array($this,'menuAdding'));

    }
    function menuAdding(){

        add_menu_page('Email Plugin',//page title
            'Email plugin',// menu title
            'manage_options',// capability
            'Email plugin',//menu slug
            array($this,'sendGridFileInclude'));

    }
    public function sendGridFileInclude(){
        include "hari-mail-form.php";

    }

    public function hariSendGridMail( $to_address, $to_name, $message) {
       /*print_r($to_address);
        print_r($to_name);
        print_r($message);*/


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sendgrid.com/v3/mail/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
    "personalizations": [
        {
            "to": [
                {
                    "email": "'.$to_address.'",
                    "name": "'.$to_name.'"
                }
            ],
            "subject": "This is for verification three"
        }
    ],
    "content": [
        {
            "type": "text/plain",
            "value": "'.$message.'"
        }
    ],
    "from": {
        "email": "ilaiyaraja221197@outlook.com",
        "name": "rishi"
    },
    "reply_to": {
        "email": "rishish8495@outlook.com",
        "name": "rishi"
    }
}',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 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',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }
}
$createEmail = new EmailPlugin();
//$createEmail->hariSendGridMail();