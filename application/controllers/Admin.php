<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');

        SecureLogin();
        SecureAdmin();
    }

    public function index()
    {
        $data['content'] = 'admin/dashboard';

        $data['total_permintaan'] = $this->Admin_model->getJumlahPermintaan();
        $data['total_riwayat'] = $this->Admin_model->getJumlahRiwayat();
        $data['total_users'] = $this->Admin_model->getJumlahUsers();

        $this->load->view('layout/wrapper', $data);
    }

    public function Permintaan()
    {
        $data['content'] = 'admin/permintaan';

        $data['permintaan'] = $this->Admin_model->getDataPermintaan();

        $this->load->view('layout/wrapper', $data);
    }

    public function Riwayat()
    {
        $data['content'] = 'admin/riwayat';

        $data['riwayat'] = $this->Admin_model->getDataRiwayat();

        $this->load->view('layout/wrapper', $data);
    }

    function DeletePermohonan()
    {
        $id_permintaan = $this->input->get('id');

        $this->Admin_model->deleteDataPermintaanById($id_permintaan);

        flashData('Berhasil hapus data!', 'Berhasil!', 'success');
        redirect('admin/riwayat', 'refresh');
    }

    public function file()
    {
        $id_permintaan = $this->input->get('id');
        $result = $this->Admin_model->getDataPermintaanById($id_permintaan);

        if ($result) {
            $file_path = 'assets/file/legalisir/' . $result['file_legalisir'];
            force_download($file_path, NULL);
        } else {
            echo "Data tidak ditemukan.";
        }
    }

    public function EditPermintaan($id_permintaan)
    {
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            flashData('Gagal mengubah permintaan legalisir', 'Edit Gagal', 'error');
            redirect('admin/permintaan', 'refresh');
        } else {
            if (!(int)str_replace(',', '', ltrim($this->input->post('estimasi_biaya'), 'Rp'))) {
                $data = [
                    'status' => $this->input->post('status')
                ];
            } else {
                $data = [
                    'status' => $this->input->post('status'),
                    'payment' => (int)str_replace(',', '', ltrim($this->input->post('estimasi_biaya'), 'Rp'))
                ];
            }

            $this->Admin_model->editDataPermintaan($id_permintaan, $data);
            flashData('Berhasil merubah data permintaan', 'Berhasil!', 'success');
            redirect('admin/permintaan', 'refresh');
        }
    }

    public function bukti()
    {
        $id_permintaan = $this->input->get('id');

        $result = $this->Admin_model->getDataPermintaanById($id_permintaan);

        if ($result) {
            $file_name = $result['file_pembayaran'];

            $file_path = 'assets/file/pembayaran/' . $file_name;

            force_download($file_path, NULL);
        } else {
            echo "Data tidak ditemukan.";
        }
    }

    public function EditUser($id_user)
    {
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            flashData('Gagal mengubah user', 'Edit Gagal', 'error');
            redirect('admin/users', 'refresh');
        } else {
            $data = [
                'role' => $this->input->post('role'),
            ];

            $this->Admin_model->editDataUser($id_user, $data);
            flashData('Berhasil merubah data user', 'Berhasil!', 'success');
            redirect('admin/users', 'refresh');
        }
    }

    public function Users()
    {
        $data['content'] = 'admin/users';

        $data['users'] = $this->Admin_model->getDataUsers();

        $this->load->view('layout/wrapper', $data);
    }

    public function DeleteUser()
    {
        $id_user = $this->input->get('id');

        $this->Admin_model->deleteDataUserById($id_user);

        flashData('Berhasil hapus data!', 'Berhasil!', 'success');
        redirect('admin/users', 'refresh');
    }

    public function Rekening() {
        $this->form_validation->set_rules('id_rek', 'ID Rekening', 'required');
        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'admin/rekening';

            $data['rekening'] = $this->Admin_model->getDataRekening();

            $this->load->view('layout/wrapper', $data);        
        } else {
            $data = [
                'nomor_rekening' => $this->input->post('nomor_rekening')
            ];
            $id_rek = $this->input->post('id_rek');
            // var_dump($data);
            // var_dump($id_rek);
            // die;
            $this->Admin_model->editRekening($id_rek, $data);

            flashData('Rekening berhasil diubah!', 'Berhasil!', 'success');
            redirect('admin/rekening', 'refresh');
        }
    }

    // ==================== AJAX =====================
    public function getDataModalEditPermintaan()
    {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($_POST['id_permohonan']) {
            $this->db->select('nama, nomor_ijazah, alamat, status, payment');
            $this->db->from('data_permohonan');
            $this->db->where('id_permohonan', $_POST['id_permohonan']);
            $data = $this->db->get()->row();
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }

    public function getDataModalEditUser()
    {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($_POST['id_user']) {
            $this->db->select('name, email, role');
            $this->db->from('data_user');
            $this->db->where('id', $this->input->post('id_user'));
            $data = $this->db->get()->row();
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }
}

/* End of file: Admin.php */
