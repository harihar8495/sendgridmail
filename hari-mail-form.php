<?php
require_once 'hari-submit-mail.php';
?>

<div>
<form method="post" action="">
    <h1><?php  _e('Send Email', 'Sendgrid-email-plugin');?></h1>

<input type="text" name="to_address" placeholder="<?php  _e('To address', 'Sendgrid-email-plugin');?>"   />
<br />
<br />

<input type="text" name="to_name" placeholder="<?php  _e('Receiver name', 'Sendgrid-email-plugin');?>" />
<br />
<br />

<textarea name="message" cols="25" placeholder="<?php  _e('message', 'Sendgrid-email-plugin');?>"></textarea>
<br />
<br />

<button type="submit" name="submit"><?php  _e('Submit', 'Sendgrid-email-plugin');?></button>
    <?php wp_nonce_field( 'my_nonce_action', 'my_nonce_action_field' ); ?>
</form>
</div>


