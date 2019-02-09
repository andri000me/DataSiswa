<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller{

    public function index()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function simpan()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $this->load->model('m_admin');
                if ($this->m_admin->masuk() == TRUE) {
                    $this->session->set_flashdata('pesan', 'Sukses Simpan');
                    redirect('website','refresh');
                }
                else {
                    $this->session->set_flashdata('pesan', 'Gagal Simpan');
                    redirect('website/register','refresh');
                }
            }
            else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect('website/register','refresh');
            }
        }
    }

    public function proses_login()
    {
        if ($this->input->post('login')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $this->load->model('m_admin');
                if ($this->m_admin->get_login()->num_rows()>0) {
                    $data=$this->m_admin->get_login()->row();
                    $array = array(
                        'login'    => TRUE,
                        'nama'     => $data->nama,
                        'username' => $data->username,
                        'password' => $data->password,
                        'id_admin' => $data->id_admin
                    );
                    $this->session->set_userdata($array);
                    redirect('website/dashboard', 'refresh');
                }
                else {
                    $this->session->set_flashdata('pesan', 'Username dan Password Salah');
                    redirect('website','refresh');
                }
            }
            else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect('website','refresh');
            }
        }
    }

    public function dashboard()
    {
        if ($this->session->userdata("login") == true) {
            $this->load->model('m_pelajar');
            $data['judul'] = "Dashboard";
            $data['konten'] = "dashboard";
            $data['pelajar'] = $this->m_pelajar->menampilkan();
            $data['jeniskelaminl'] = $this->m_pelajar->laki();
            $data['jeniskelaminp'] = $this->m_pelajar->wanita();
            $data['jeniskelamins'] = $this->m_pelajar->semua();
            $this->load->view('template', $data);
        }
        else {
            redirect('website', 'refresh');
        }
    }

    public function tambah()
    {
        if ($this->input->post('tambahdata')) {
            $this->load->model('m_pelajar');
            if ($this->m_pelajar->menambah() == true) {
                redirect('website/dashboard','refresh');
            }
            else {
                redirect('website/dashboard','refresh');
            }
        }
    }

    public function ubah()
    {
        $NIS=$this->input->post('NIS');
        $nama=$this->input->post('nama');
        $tanggal_lahir=$this->input->post('tanggal_lahir');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $alamat=$this->input->post('alamat');
        $kota_asal=$this->input->post('kota_asal');

        $this->load->model('m_pelajar');
        $this->m_pelajar->mengubah($NIS, $nama, $tanggal_lahir, $jenis_kelamin, $alamat, $kota_asal);
        redirect('website/dashboard', 'refresh');
    }

    public function hapus($NIS)
    {
        $this->load->model('m_pelajar');
        $this->m_pelajar->menghapus($NIS);
        redirect('website/dashboard', 'refresh');
    }

    public function chart()
    {
        if ($this->session->userdata("login") == true) {
            $this->load->model('m_pelajar');
            $data['judul'] = "Chart";
            $data['jeniskelaminl'] = $this->m_pelajar->laki();
            $data['jeniskelaminp'] = $this->m_pelajar->wanita();
            $data['tahun'] = $this->m_pelajar->tahun();
            $data['kota'] = $this->m_pelajar->kota();
            $data['konten'] = "chart";
            $this->load->view('template', $data);
        }
        else {
            redirect('website', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('website','refresh');
    }

}
