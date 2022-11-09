<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email harus diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required|trim', ['required' => 'Password harus diisi!']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Log In';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'bb_aktual' => $user['bb']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/index');
                    } elseif ($user['role_id'] == 2) {
                        redirect('user/index');
                    } else {
                        redirect('auth');
                    }
                } else {
                    //gagal
                    $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Password Salah!!</div>');
                    redirect('auth');
                }
            }
        } else {
            //gagal
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar</div>');
            redirect('auth');
        }
    }


    public function registration()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi!']);
        $this->form_validation->set_rules('tanggallahir', 'Tanggallahir', 'required', ['required' => 'Tanggal Lahir harus diisi!']);
        $this->form_validation->set_rules('jeniskelamin', 'Jeniskelamin', 'required', ['required' => 'Jenis Kelamin harus diisi!']);
        $this->form_validation->set_rules('tinggibadan', 'Tinggibadan', 'required|trim', ['required' => 'Tinggi Badan harus diisi!']);
        $this->form_validation->set_rules('beratbadan', 'Beratbadan', 'required|trim', ['required' => 'Berat Badan harus diisi!']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['required' => 'Email harus diisi!', 'is_unique' => 'Email Sudah Terdaftar']);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|matches[password1]', ['matches' => 'Password tidak sama', 'min_length' => 'password terlalu pendek', 'required' => 'Password harus diisi!']);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign Up';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tanggallahir' => htmlspecialchars($this->input->post('tanggallahir', true)),
                'jeniskelamin' => htmlspecialchars($this->input->post('jeniskelamin', true)),
                'tb' => htmlspecialchars($this->input->post('tinggibadan', true)),
                'bb' => htmlspecialchars($this->input->post('beratbadan', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Selamat Pendaftaran Berhasil. Silahkan Login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Anda telah keluar. Terimakasih!!</div>');
        redirect('auth');
    }
    public function cariemail()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email harus diisi!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Kata sandi';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/cari');
            $this->load->view('templates/auth/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {
                $this->session->set_userdata('reset_email', $email);
                redirect('auth/katasandi');
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Email belum terdaftar!!</div>');
                redirect('auth/cariemail');
            }
            // var_dump($user);
            // die;
        }
    }
    public function katasandi()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password1]', ['matches' => 'Password tidak sama', 'min_length' => 'password terlalu pendek', 'required' => 'Password harus diisi!']);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password]', ['matches' => 'Password tidak sama', 'min_length' => 'password terlalu pendek', 'required' => 'Password harus diisi!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Reset Kata sandi';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/katasandi');
            $this->load->view('templates/auth/auth_footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password)
                ->where('email', $email)
                ->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
                Kata Sandi Berhasil Direset. Silangkan Login</div>');
            redirect('auth');
        }
    }
}
