<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        SecureLogin();
        SecureUser();
    }

    public function index()
    {
        $data['content'] = 'dashboard';
        $email = $this->session->userdata('email');

        $data['jumlah_menungguacc'] = $this->User_model->getJumlahMenungguAcc($email);
        $data['jumlah_menunggupembayaran'] = $this->User_model->getJumlahMenungguPembayaran($email);
        $data['jumlah_diproses'] = $this->User_model->getJumlahDiproses($email);
        $data['jumlah_dikirim'] = $this->User_model->getJumlahDikirim($email);

        $this->load->view('layout/wrapper', $data);
    }

    public function Permohonan()
    {
        $email = $this->session->userdata('email');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|integer');
        $this->form_validation->set_rules('nomor_ijazah', 'Nomor Ijazah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'permohonan';
            $data['user'] = $this->User_model->getDataUser($email);
            $this->load->view('layout/wrapper', $data);
            
        } else {
            if (!empty($_FILES['fileLegalisir']['name'])) {
                // CEK SECURITY IMAGE
                // cek tempat penyimpanan image
                $config['upload_path'] = './assets/file/legalisir/';
                // cek image apa saja yang boleh diupload
                $config['allowed_types'] = 'pdf|docx';
                // cek maxsimum size yang bisa di upload
                $config['max_size']     = '3072';
                $this->load->library('upload', $config);

                // file yang diupload ada error atau tidak, jika iya maka tampilkan error
                if (!$this->upload->do_upload('fileLegalisir')) {
                    if ($this->upload->display_errors()) {
                        flashData(strip_tags($this->upload->display_errors()), 'Gagal', 'error');
                        redirect('user/permohonan', 'refresh');
                    }
                } else {
                    $file_legalisir = array('file_legalisir' => $this->upload->data());

                    $data = [
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'alamat' => $this->input->post('alamat'),
                        'telepon' => $this->input->post('telepon'),
                        'nomor_ijazah' => $this->input->post('nomor_ijazah'),
                        'file_legalisir' => $file_legalisir['file_legalisir']['file_name'],
                        'status' => 'Menunggu Acc'
                    ];

                    $this->User_model->addPermohonanLegalisir($data);

                    flashData('Berhasil menambahkan Permohonan!', 'Tambah Data', 'success');
                    redirect('user/data-permohonan', 'refresh');
                }
            } else {
                flashData('File belum diupload', 'Gagal', 'error');
                redirect('user/permohonan', 'refresh');
            }
        }
    }

    public function DataPermohonan()
    {
        $email = $this->session->userdata('email');
        $data['nomor_rekening'] = $this->User_model->getNomorRekening();
        $data['content'] = 'data-permohonan';
        $data['permohonan'] = $this->User_model->getAllPermohonanByEmail($email);      
        $this->load->view('layout/wrapper', $data);
    }

    public function EditPermohonan($id_permohonan)
    {
        if ($this->User_model->cekDataPermohonanById($id_permohonan) < 1) {
            redirect('user/data-permohonan', 'refresh');
        }

        $email = $this->session->userdata('email');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required');

        if ($this->form_validation->run() == FALSE) {
            flashData('Input data tidak sesuai atau salah', 'Gagal', 'error');
            redirect('user/data-permohonan', 'refresh');
        } else {
            if (!empty($_FILES['fileLegalisir']['name'])) {
                if (strlen($_FILES['fileLegalisir']['name']) > 128) {
                    flashData('Nama file terlalu panjang!', 'Gagal', 'error');
                    redirect('user/data-permohonan', 'refresh');
                }
                // CEK SECURITY IMAGE
                // cek tempat penyimpanan image
                $config['upload_path'] = './assets/file/legalisir/';
                // cek image apa saja yang boleh diupload
                $config['allowed_types'] = 'pdf|docx';
                // cek maxsimum size yang bisa di upload
                $config['max_size']     = '3072';
                $this->load->library('upload', $config);

                // file yang diupload ada error atau tidak, jika iya maka tampilkan error
                if (!$this->upload->do_upload('fileLegalisir')) {
                    if ($this->upload->display_errors()) {
                        flashData(strip_tags($this->upload->display_errors()), 'Gagal', 'error');
                        redirect('user/permohonan', 'refresh');
                    }
                } else {
                    $file_legalisir = array('file_legalisir' => $this->upload->data());

                    $data = [
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'alamat' => $this->input->post('alamat'),
                        'file_legalisir' => $file_legalisir['file_legalisir']['file_name'],
                    ];

                    $old_file = $this->User_model->getPermohonanById($id_permohonan)['file_legalisir'];
                    unlink(FCPATH . 'assets/file/legalisir/' . $old_file);

                    $this->User_model->editPermohonanById($id_permohonan, $data);

                    flashData('Edit Data Permohonan Berhasil!', 'Edit Data', 'success');

                    // flashData('Gambar Profile berhasil diubah!', 'Ganti Gambar Profile', 'success');
                    redirect('user/data-permohonan', 'refresh');
                }
            } else {
                $data = [
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon')
                ];

                flashData('Edit Data Permohonan Berhasil!', 'Edit Data', 'success');

                $this->User_model->editPermohonanById($id_permohonan, $data);
            }
        }
        redirect('user/data-permohonan', 'refresh');
    }

    public function DeletePermohonan()
    {
        $id = $this->input->get('id');

        $old_file = $this->User_model->getPermohonanById($id)['file_legalisir'];
        unlink(FCPATH . 'assets/file/legalisir/' . $old_file);

        $this->User_model->deletePermohonanById($id);

        flashData('Delete Data Permohonan Berhasil!', 'Delete Data', 'success');

        redirect('user/data-permohonan', 'refresh');
    }

    public function pembayaran($id_permohonan)
    {
        if (!empty($_FILES['buktiPembayaran']['name'])) {
            // CEK SECURITY IMAGE
            // cek tempat penyimpanan image
            $config['upload_path'] = './assets/file/pembayaran/';
            // cek image apa saja yang boleh diupload
            $config['allowed_types'] = 'pdf|docx|png|jpg|jpeg';
            // cek maxsimum size yang bisa di upload
            $config['max_size']     = '3072';
            $this->load->library('upload', $config);

            // file yang diupload ada error atau tidak, jika iya maka tampilkan error
            if (!$this->upload->do_upload('buktiPembayaran')) {
                if ($this->upload->display_errors()) {
                    flashData(strip_tags($this->upload->display_errors()), 'Gagal', 'error');
                    redirect('user/permohonan', 'refresh');
                }
            } else {
                $file_pembayaran = array('file_pembayaran' => $this->upload->data());

                $old_file = $this->User_model->getPermohonanById($id_permohonan)['file_pembayaran'];

                if ($old_file == '') {
                    $data = [
                        'file_pembayaran' => $file_pembayaran['file_pembayaran']['file_name']
                    ];
    
                    $this->User_model->addPembayaran($data, $id_permohonan);
                } else {
                    $data = [
                        'file_pembayaran' => $file_pembayaran['file_pembayaran']['file_name']
                    ];
                    
                    unlink(FCPATH . 'assets/file/pembayaran/' . $old_file);

                    $this->User_model->addPembayaran($data, $id_permohonan);
                }

                flashData('Berhasil menambahkan Pembayaran!', 'Tambah Data', 'success');
                redirect('user/data-permohonan', 'refresh');
            }
        } else {
            flashData('File pembayaran belum di upload!', 'Gagal', 'error');
            redirect('user/data-permohonan', 'refresh');
        }
    }

    // ===================== AJAX ===================
    public function getDataModalEditPermohonan()
    {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($_POST['id_permohonan']) {
            $this->db->select('email, nama, alamat, file_legalisir, telepon');
            $this->db->from('data_permohonan');
            $this->db->where('id_permohonan', $_POST['id_permohonan']);
            $data = $this->db->get()->row();
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }

    public function getDataModalPembayaran()
    {
        // Menangkap data ajax. cek script view data-user dan myscript.js
        if ($_POST['id_permohonan']) {
            $this->db->select('payment, file_pembayaran');
            $this->db->from('data_permohonan');
            $this->db->where('id_permohonan', $_POST['id_permohonan']);
            $data = $this->db->get()->row();
            echo json_encode($data);
        } else {
            redirect('auth/blocked');
        }
    }
}

/* End of file: Admin.php */
