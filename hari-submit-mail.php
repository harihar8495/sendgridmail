<?php
if (isset ( $_POST ['submit'] ) ){
    //print_r($_POST);
    if ( ! isset( $_POST['my_nonce_action_field'] )
        || ! wp_verify_nonce( $_POST['my_nonce_action_field'], 'my_nonce_action' )
    ) {
        print 'Sorry, your nonce did not verify.';
        exit;
    } else {
        // process form data
        //print_r($_POST);
        $to_address = sanitize_text_field( $_POST['to_address'] );
        $to_name = sanitize_text_field( $_POST['to_name'] );
        $message = sanitize_textarea_field( $_POST['message'] );

        $send_email = new EmailPlugin();
        $send_email->hariSendGridMail( $to_address, $to_name, $message );
    }
}