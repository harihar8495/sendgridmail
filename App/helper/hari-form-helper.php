<?php
namespace se\App\helper;

class EmailHelper
{
    function FormSubmitAjax($action)
    {
        return wp_create_nonce($action);
    }
}
