<?php

if (!defined('BASEPATH')) {

    exit('No direct script access allowed');

}


function current_admin() {


    $CI = & get_instance();

    if ((bool) $CI->session->userdata('loggedin')) {

        $CI            = & get_instance();

        $obj           = new stdClass();

        $obj->admin_id       = $CI->session->userdata('admin_id');

        $obj->admin_name = $CI->session->userdata('admin_name');

        return $obj;


    }


}

function current_seller() {


    $CI = & get_instance();

    if ((bool) $CI->session->userdata('loggedin')) {

        $CI            = & get_instance();

        $obj           = new stdClass();

        $obj->seller_id       = $CI->session->userdata('seller_id');

        $obj->seller_name = $CI->session->userdata('seller_name');

        return $obj;


    }
}

function current_user() {
    $CI = & get_instance();
    if ((bool) $CI->session->userdata('user_loggedin')) {
        $CI            = & get_instance();
        $obj           = new stdClass();
        $obj->user_id       = $CI->session->userdata('user_id');
        $obj->user_name = $CI->session->userdata('user_name');
        return $obj;
    }
}









?>