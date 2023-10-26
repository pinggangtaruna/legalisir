<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = '';

    public function __construct() {
        parent::__construct();
    }

    public function cekDataPermohonanById($id_permohonan) {
        return $this->db->get_where('data_permohonan', array('id_permohonan' => $id_permohonan))->num_rows();
    }
    
    public function getJumlahMenungguAcc($email) {
        return $this->db->get_where('data_permohonan', array('status' => 'Menunggu Acc', 'email' => $email))->num_rows();
    }

    public function getJumlahMenungguPembayaran($email) {
        return $this->db->get_where('data_permohonan', array('status' => 'Menunggu Pembayaran', 'email' => $email))->num_rows();
    }

    public function getJumlahDiproses($email) {
        return $this->db->get_where('data_permohonan', array('status' => 'Diproses', 'email' => $email))->num_rows();
    }

    public function getJumlahDikirim($email) {
        return $this->db->get_where('data_permohonan', array('status' => 'Dikirim', 'email' => $email))->num_rows();
    }

    public function getDataUser($email) {
        $this->db->select('email, name');
        return $this->db->get_where('data_user', array('email' => $email))->row_array();
    }

    public function addPermohonanLegalisir($data) {
        $this->db->insert('data_permohonan', $data);
    }

    public function addPembayaran($data, $id) {
        $this->db->where('id_permohonan', $id);
        $this->db->update('data_permohonan', $data);
    }

    public function getAllPermohonanByEmail($email) {
        $this->db->order_by('date_created', 'DESC');
        return $this->db->get_where('data_permohonan', array('email' => $email))->result_array();
    }

    public function getPermohonanById($id) {
        return $this->db->get_where('data_permohonan', array('id_permohonan' => $id))->row_array();
    }

    public function editPermohonanById($id, $data) {
        $this->db->where('id_permohonan', $id);
        $this->db->update('data_permohonan', $data);
    }

    public function deletePermohonanById($id) {
        $this->db->delete('data_permohonan', array('id_permohonan' => $id));
    }
    
    public function getNomorRekening() {
        return $this->db->get('rekening')->row_array();;
    }

}

/* End of file: User_model.php */
