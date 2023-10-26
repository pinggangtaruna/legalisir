<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    protected $table = '';

    public function __construct() {
        parent::__construct();
    }

    public function registration($data) {
        $this->db->insert('data_user', $data);
    }

}

/* End of file: Auth_model.php */
