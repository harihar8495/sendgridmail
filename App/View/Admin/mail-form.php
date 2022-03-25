<?php

?>

<div>

    <h1><?php  _e('Send Email', 'Sendgrid-email-plugin');?></h1>
<form method="post" action="" name="contact-me" >

<input type="text" name="to_address" required placeholder="<?php  _e('To address', 'Sendgrid-email-plugin');?>" /><br><br>

<input type="text" name="to_name" required placeholder="<?php  _e('Receiver name', 'Sendgrid-email-plugin');?>" /><br><br>

<textarea name="message" cols="25" required placeholder="<?php  _e('message', 'Sendgrid-email-plugin');?>" ></textarea><br><br>

<button type="submit" name="submit" id="form-submit"><?php  _e('Submit', 'Sendgrid-email-plugin');?></button>

<input type="hidden" value="sendGridMailValidate" name="action">
    <?php wp_nonce_field( 'mail_nonce_action', 'mail_nonce_action_field' ); ?>

        <h3 id="response_msg"></h3>
</form>
</div>

