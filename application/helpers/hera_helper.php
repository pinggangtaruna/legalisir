<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Menyingkat flashdata sweetalert agar lebih mudah digunakan
function flashData($message, $tittle, $icon)
{
    $CI = &get_instance();

    $CI->session->set_flashdata(
        'message',
        $message
    );
    $CI->session->set_flashdata(
        'tittle',
        $tittle
    );
    $CI->session->set_flashdata(
        'icon',
        $icon
    );
}

function SecureLogin() {
    $CI =& get_instance();

    if (!($CI->session->userdata('email'))) {
        redirect('auth', 'refresh');
    }
}

function SecureAdmin() {
    $CI =& get_instance();

    if (strtolower($CI->session->userdata('role')) != 'admin') {
        redirect('auth/blocked/404', 'refresh');
    }
}

function SecureUser() {
    $CI =& get_instance();

    if (strtolower($CI->session->userdata('role')) != 'user') {
        redirect('auth/blocked/404', 'refresh');
    }
}