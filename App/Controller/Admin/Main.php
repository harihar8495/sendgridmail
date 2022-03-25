<?php
namespace se\App\Controller\Admin;



use se\App\Controller\MailValidate;
use se\App\Router;

class Main
{
    public $mail;
    public function __construct()
    {
        $this->mail = empty( $mail ) ? new MailValidate() : '';

    }


}

