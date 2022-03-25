<?php
namespace se\App;
use se\App\Controller\MailValidate;


    class Router
    {

        public function __construct(){

            $this->mail = new MailValidate();

        }

        public function init(){
            add_action( 'init' , [ $this, 'initAdminHooks' ] );
        }

        public function menuAdding()
        {

            add_menu_page(__('Email Plugin','Sendgrid-email-plugin'),//page title
                __('Email plugin','Sendgrid-email-plugin'),// menu title
                'manage_options',// capability
                'email_plugin',//menu slug
                [$this, 'sendGridFileInclude'] );

        }
        public function sendGridFileInclude()
        {
            /*
             * path for View file
             */
            if ( current_user_can( 'manage_options' ) ) {
                require_once SE_ADMIN_VIEW_PATH . '/mail-form.php';
            }
        }
        public function initAdminHooks()
        {
            add_action('admin_menu', [ $this, 'menuAdding'] );
            add_action('admin_enqueue_scripts', [ $this, 'sendGridMailRequest' ] );
            add_action('wp_ajax_sendGridMailValidate', [$this->mail, 'sendGridMailValidate' ] );

        }

        public function sendGridMailRequest()
        {
            wp_enqueue_script('ajax_js', SE_JS_PATH.'/form.js', array( 'jquery' ), '', true);
            wp_localize_script('ajax_js', 'se_form_submit',
                array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                )
            );
        }
    }

