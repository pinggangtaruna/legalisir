<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getJumlahPermintaan() {
        return $this->db->select("* FROM data_permohonan WHERE status != 'Dikirim'")->get()->num_rows();
    }

    public function getJumlahRiwayat() {
        return $this->db->select("* FROM data_permohonan WHERE status = 'Dikirim'")->get()->num_rows();
    }

    public function getJumlahUsers() {
        return $this->db->get('data_user')->num_rows();
    }

    public function getDataPermintaan() {
        return $this->db->select("* FROM data_permohonan WHERE status != 'Dikirim'")->get()->result_array();
    }

    public function getDataRiwayat() {
        return $this->db->select("* FROM data_permohonan WHERE status = 'Dikirim'")->get()->result_array();
    }

    public function getDataPermintaanById($id) {
        return $this->db->get_where('data_permohonan', array('id_permohonan' => $id))->row_array();
    }

    public function getDataUsers() {
        return $this->db->get('data_user')->result_array();
    }

    function getDataRekening() {
        return $this->db->get('rekening')->row_array();
    }

    function editDataPermintaan($id_permintaan, $data) {
        $this->db->where('id_permohonan', $id_permintaan);
        $this->db->update('data_permohonan', $data);
    }
    
    function editDataUser($id_user, $data) {
        $this->db->where('id', $id_user);
        $this->db->update('data_user', $data);
    }

    function editRekening($id_rekening, $data) {
        $this->db->where('id_rekening', $id_rekening);
        $this->db->update('rekening', $data);
    }

    function deleteDataPermintaanById($id_permintaan) {
        $this->db->delete('data_permohonan', array('id_permohonan' => $id_permintaan));
    }

    function deleteDataUserById($id_user) {
        $this->db->delete('data_user', array('id' => $id_user));
    }
}

/* End of file: Admin_model.php */
