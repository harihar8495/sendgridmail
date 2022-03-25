<?php
namespace se\App\Controller;

class MailValidate
{

    public function SendGridMailValidate()
    {

        /*
         * form validation
         */

//        $input_fields = ['to_address', 'to_name' , 'message'];
//        $input_errors = ['Enter Correct Email Address', 'Enter Name', 'Enter Message'];
//        $input_values = [];


        if ( !isset( $_POST[ 'mail_nonce_action_field' ] )
            || !wp_verify_nonce( $_POST[ 'mail_nonce_action_field' ], 'mail_nonce_action') ) {

            wp_send_json( 'Verification Error');

        }
//
//        foreach ($input_fields as $field => $value ){
//            foreach ($input_errors as $field_error){
//                if (empty($_POST[$field])){
//                    $field[$value] = $input_errors[$field_error];
//            }else{
//                $input_values[$field] = $_POST[$field];
//            }
//            }
//        }


        if ( !empty( $_POST['to_address'] ) && is_email( $_POST[ 'to_address' ] ) ) {

            $to_address = sanitize_email( $_POST[ 'to_address' ] );

        } else {
            $data = array(
                'status' => true,
                'message' => 'Enter Correct Email Address'
            );
             wp_send_json( $data );

        }
        if( !empty( $_POST[ 'to_name' ] ) ){
            $to_name = trim( $_POST[ 'to_name' ] );
            $to_name .= stripslashes( $_POST[ 'to_name' ] );
            $to_name .= sanitize_text_field( $_POST[ 'to_name' ] );

        }else{
            $data = array(
                'status' => true,
                'message' => 'Enter Name'
            );
             wp_send_json( $data );

        }
        if( !empty( $_POST[ 'message' ] ) ){

            $message = sanitize_textarea_field( $_POST[ 'message' ] );


        }else {
            $data = array(
                'status' => true,
                'message' => 'Enter message'
            );
             wp_send_json( $data );
        }
        $this->sendGridMailAfterSubmitted( $to_address, $to_name, $message );

    }

    public function sendGridMailAfterSubmitted( $to_address, $to_name, $message)
    {
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
            CURLOPT_POSTFIELDS => '{
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
        "email": "harishragav8495@outlook.com",
        "name": "raja"
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
        $data = array(
            'status' => true,
            'message' => 'Message sent'
        );
        wp_send_json( $data );

    }


}

