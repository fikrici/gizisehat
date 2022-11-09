<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_data_model');
        cek_login();
        //cek 
        if ($_SESSION['role_id'] != 1) {
            redirect('user/index');
        }
    }

    function index()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->Admin_data_model->sesion();
        $data['jmlakg'] = $this->Admin_data_model->jumlahakg();
        $data['jmldkbm'] = $this->Admin_data_model->jumlahdkbm();
        $data['jmluser'] = $this->Admin_data_model->jumlahuser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_admin', $data);
        $this->load->view('templates/topbar/topbar_admin', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('templates/footer');
    }

    function data_dkbm()
    {
        $data['title'] = 'Data DKBM ( Daftar Komposisi Bahan Makanan )';
        $data['user'] = $this->Admin_data_model->sesion();
        $data['dkbm'] = $this->Admin_data_model->getalldkbm();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_admin', $data);
        $this->load->view('templates/topbar/topbar_admin', $data);
        $this->load->view('admin/data/data_dkbm', $data);
        $this->load->view('templates/footer');
    }

    function data_akg()
    {
        $data['title'] = 'Data AKG ( Angka Kecukupan Gizi )';
        $data['user'] = $this->Admin_data_model->sesion();
        $data['akg'] = $this->Admin_data_model->getallakg();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_admin', $data);
        $this->load->view('templates/topbar/topbar_admin', $data);
        $this->load->view('admin/data/data_akg', $data);
        $this->load->view('templates/footer');
    }

    function data_user()
    {
        $data['title'] = 'Data USER';
        $data['user'] = $this->Admin_data_model->sesion();
        $data['getuser'] = $this->Admin_data_model->getalluser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_admin', $data);
        $this->load->view('templates/topbar/topbar_admin', $data);
        $this->load->view('admin/data/data_user');
        $this->load->view('templates/footer');
    }

    function profil()
    {
        $data['title'] = 'Profil';
        $data['user'] = $this->Admin_data_model->sesion();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_admin', $data);
        $this->load->view('templates/topbar/topbar_admin', $data);
        $this->load->view('admin/profil/profil');
        $this->load->view('templates/footer');
    }
    function informasi()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Informasi Gizi';
        $data['user'] = $this->Admin_data_model->sesion();
        $data['getuser'] = $this->Admin_data_model->getuser($id);
        $data['data_gizi'] = $this->Admin_data_model->getdatagizi($id);
        $data['getakg'] = $this->Admin_data_model->getakg($data['getuser']);

        $kg = $data['getakg'];
        $gu = $data['getuser'];
        $bb_aktual = $gu['bb'];
        $bb_tabel = $kg['bb'];
        $energi = ($bb_aktual / $bb_tabel) * $kg['energi'];
        $lemak = ($bb_aktual / $bb_tabel) * $kg['lemak'];
        $protein = ($bb_aktual / $bb_tabel) * $kg['protein'];
        $karbohidrat = ($bb_aktual / $bb_tabel) * $kg['karbohidrat'];
        $data['perbandingan'] = array(
            'total_energi' => floor($energi),
            'total_lemak' => floor($lemak),
            'total_protein' => floor($protein),
            'total_karbohidrat' => floor($karbohidrat),
            'kelompok' => $kg['kelompok']

        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_admin', $data);
        $this->load->view('templates/topbar/topbar_admin', $data);
        $this->load->view('admin/informasi/informasi', $data);
        $this->load->view('templates/footer');
    }
    function detailgizi()
    {
        $id = $this->uri->segment(3);
        $tgl = $this->uri->segment(4);
        $data['tgl'] = $tgl;
        $data['title'] = 'Detail Informasi Gizi';
        $data['user'] = $this->Admin_data_model->sesion();
        $data['getuser'] = $this->Admin_data_model->getuser($id);
        $data['data_gizi'] = $this->Admin_data_model->getdatagizi($id);
        $data['detail'] = $this->Admin_data_model->getdetailgizi($tgl, $data['getuser']);
        $data['getakg'] = $this->Admin_data_model->getakg($data['getuser']);
        $kg = $data['getakg'];
        $gu = $data['getuser'];
        $bb_aktual = $gu['bb'];
        $bb_tabel = $kg['bb'];
        $energi = ($bb_aktual / $bb_tabel) * $kg['energi'];
        $lemak = ($bb_aktual / $bb_tabel) * $kg['lemak'];
        $protein = ($bb_aktual / $bb_tabel) * $kg['protein'];
        $karbohidrat = ($bb_aktual / $bb_tabel) * $kg['karbohidrat'];
        $data['perbandingan'] = array(
            'total_energi' => $energi,
            'total_lemak' => $lemak,
            'total_protein' => $protein,
            'total_karbohidrat' => $karbohidrat,
            'kelompok' => $kg['kelompok']

        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_admin', $data);
        $this->load->view('templates/topbar/topbar_admin', $data);
        $this->load->view('admin/informasi/detailgizi', $data);
        $this->load->view('templates/footer');
    }
    function cetakdetail()
    {
        $id = $this->uri->segment(3);
        $tgl = $this->uri->segment(4);
        $data['tgl'] = $tgl;
        $data['title'] = 'Detail Informasi Gizi';
        $data['user'] = $this->Admin_data_model->sesion();
        $data['getuser'] = $this->Admin_data_model->getuser($id);
        $data['data_gizi'] = $this->Admin_data_model->getdatagizi($id);
        $data['detail'] = $this->Admin_data_model->getdetailgizi($tgl, $data['getuser']);
        $data['getakg'] = $this->Admin_data_model->getakg($data['getuser']);
        $kg = $data['getakg'];
        $gu = $data['getuser'];
        $bb_aktual = $gu['bb'];
        $bb_tabel = $kg['bb'];
        $energi = ($bb_aktual / $bb_tabel) * $kg['energi'];
        $lemak = ($bb_aktual / $bb_tabel) * $kg['lemak'];
        $protein = ($bb_aktual / $bb_tabel) * $kg['protein'];
        $karbohidrat = ($bb_aktual / $bb_tabel) * $kg['karbohidrat'];
        $data['perbandingan'] = array(
            'total_energi' => $energi,
            'total_lemak' => $lemak,
            'total_protein' => $protein,
            'total_karbohidrat' => $karbohidrat,
            'kelompok' => $kg['kelompok']

        );
        $this->load->view('admin/informasi/cetakdetail', $data);
    }

    function tambah_user()
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
            $data['title'] = 'Tambah Data User';
            $data['user'] = $this->Admin_data_model->sesion();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_admin', $data);
            $this->load->view('templates/topbar/topbar_admin', $data);
            $this->load->view('admin/tambah/t_user', $data);
            $this->load->view('templates/footer');
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
            Data User Berhasil Ditambahkan.</div>');
            redirect('admin/data_user');
        }
    }

    function tambah_akg()
    {
        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required|trim', ['required' => 'ID Kelompok harus diisi!']);
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim', ['required' => 'kelompok harus diisi!']);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', ['required' => 'umur harus diisi!']);
        $this->form_validation->set_rules('tb', 'Tb', 'required|trim', ['required' => 'Tinggi Badan harus diisi!']);
        $this->form_validation->set_rules('bb', 'Bb', 'required|trim', ['required' => 'Berat Badan harus diisi!']);
        $this->form_validation->set_rules('energi', 'Energi', 'required|trim', ['required' => 'Energi harus diisi!']);
        $this->form_validation->set_rules('protein', 'Protein', 'required|trim', ['required' => 'Protein harus diisi!']);
        $this->form_validation->set_rules('lemak', 'Lemak', 'required|trim', ['required' => 'Lemak harus diisi!']);
        $this->form_validation->set_rules('karbohidrat', 'Karbohidrat', 'required|trim', ['required' => 'Karbohidrat harus diisi!']);
        $this->form_validation->set_rules('serat', 'Serat', 'required|trim', ['required' => 'Serat harus diisi!']);
        $this->form_validation->set_rules('air', 'Air', 'required|trim', ['required' => 'Air harus diisi!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data AKG';
            $data['user'] = $this->Admin_data_model->sesion();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_admin', $data);
            $this->load->view('templates/topbar/topbar_admin', $data);
            $this->load->view('admin/tambah/t_akg', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelompok' => htmlspecialchars($this->input->post('id_kelompok', true)),
                'kelompok' => htmlspecialchars($this->input->post('kelompok', true)),
                'umur' => htmlspecialchars($this->input->post('umur', true)),
                'tb' => htmlspecialchars($this->input->post('tb', true)),
                'bb' => htmlspecialchars($this->input->post('bb', true)),
                'energi' => htmlspecialchars($this->input->post('energi', true)),
                'protein' => htmlspecialchars($this->input->post('protein', true)),
                'lemak' => htmlspecialchars($this->input->post('lemak', true)),
                'karbohidrat' => htmlspecialchars($this->input->post('karbohidrat', true)),
                'serat' => htmlspecialchars($this->input->post('serat', true)),
                'air' => htmlspecialchars($this->input->post('air', true)),
            ];
            $this->db->insert('akg', $data);
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Data AKG Berhasil Ditambahkan.</div>');
            redirect('admin/data_akg');
        }
    }

    function tambah_dkbm()
    {
        $this->form_validation->set_rules('foodgroup', 'foodgroup', 'required|trim', ['required' => 'Grup makanan harus diisi!']);
        $this->form_validation->set_rules('foodname', 'foodname', 'required|trim', ['required' => 'Nama makanan harus diisi!']);
        $this->form_validation->set_rules('energy', 'energy');
        $this->form_validation->set_rules('protein', 'protein');
        $this->form_validation->set_rules('fats', 'fats');
        $this->form_validation->set_rules('carbhdrt', 'carbhdrt');
        $this->form_validation->set_rules('f_edible', 'f_edible', 'required|trim', ['required' => 'Berat harus diisi!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data DKBM';
            $data['user'] = $this->Admin_data_model->sesion();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_admin', $data);
            $this->load->view('templates/topbar/topbar_admin', $data);
            $this->load->view('admin/tambah/t_dkbm', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'foodgroup' => htmlspecialchars($this->input->post('foodgroup', true)),
                'foodname' => htmlspecialchars($this->input->post('foodname', true)),
                'energy' => htmlspecialchars($this->input->post('energy', true)),
                'protein' => htmlspecialchars($this->input->post('protein', true)),
                'fats' => htmlspecialchars($this->input->post('fats', true)),
                'carbhdrt' => htmlspecialchars($this->input->post('carbhdrt', true)),
                'f_edible' => htmlspecialchars($this->input->post('f_edible', true))
            ];

            $this->db->insert('dkbm', $data);
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Data DKBM Berhasil Ditambahkan.</div>');
            redirect('admin/data_dkbm');
        }
    }

    function hapus_user($getId)
    {
        $id = encode_php_tags($getId);
        $this->Admin_data_model->hapususer($id);
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Dihapus</div>');
        redirect('admin/data_user');
    }

    function hapus_akg($getId)
    {
        $id = encode_php_tags($getId);
        $this->Admin_data_model->hapusakg($id);
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Dihapus</div>');
        redirect('admin/data_akg');
    }

    function hapus_dkbm($getId)
    {
        $id = encode_php_tags($getId);
        $this->Admin_data_model->hapusdkbm($id);
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Dihapus</div>');
        redirect('admin/data_dkbm');
    }

    function hapus_info()
    {
        $id = $this->uri->segment(3);
        $tgl = $this->uri->segment(4);
        $data['getuser'] = $this->Admin_data_model->getuser($id);
        $this->Admin_data_model->hapus_info($tgl, $data['getuser']);
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Dihapus</div>');
        redirect('admin/informasi/' . $id);
    }
    function hapus_detail()
    {
        $id = $this->uri->segment(3);
        $id_user = $this->uri->segment(4);
        $tgl = $this->uri->segment(5);
        $this->Admin_data_model->hapus_detail($id);
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Dihapus</div>');
        redirect('admin/detailgizi/' . $id_user . '/' . $tgl);
    }

    function cetak()
    {
        $starttgl = $this->input->post('starttgl');
        $endtgl = $this->input->post('endtgl');
        $id = $this->input->post('id');
        $data['title'] = 'Informasi Gizi';
        $data['getuser'] = $this->Admin_data_model->getuser($id);
        $data['data_gizi'] = $this->Admin_data_model->getdatagizi($id);
        $data['getakg'] = $this->Admin_data_model->getakg($data['getuser']);

        $kg = $data['getakg'];
        $gu = $data['getuser'];
        $bb_aktual = $gu['bb'];
        $bb_tabel = $kg['bb'];
        $energi = ($bb_aktual / $bb_tabel) * $kg['energi'];
        $lemak = ($bb_aktual / $bb_tabel) * $kg['lemak'];
        $protein = ($bb_aktual / $bb_tabel) * $kg['protein'];
        $karbohidrat = ($bb_aktual / $bb_tabel) * $kg['karbohidrat'];
        $data['perbandingan'] = array(
            'total_energi' => floor($energi),
            'total_lemak' => floor($lemak),
            'total_protein' => floor($protein),
            'total_karbohidrat' => floor($karbohidrat),
            'kelompok' => $kg['kelompok']

        );
        $data['cetak'] = $this->Admin_data_model->cetak($starttgl, $endtgl, $data['getuser']);
        $this->load->view('admin/informasi/cetak', $data);
    }

    function edit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama harus diisi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi!']);
        $this->form_validation->set_rules('tanggallahir', 'Tanggallahir', 'required', ['required' => 'Tanggal Lahir harus diisi!']);
        $this->form_validation->set_rules('tb', 'tb', 'required', ['required' => 'Tinggi Badan harus diisi!']);
        $this->form_validation->set_rules('bb', 'bb', 'required|trim', ['required' => 'Berat Badan harus diisi!']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profil';
            $data['user'] = $this->Admin_data_model->sesion();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_admin', $data);
            $this->load->view('templates/topbar/topbar_admin', $data);
            $this->load->view('admin/profil/editprofil');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $tb = $this->input->post('tb');
            $bb = $this->input->post('bb');
            $this->db
                ->set('nama', $nama)
                ->set('alamat', $alamat)
                ->set('tb', $tb)
                ->set('bb', $bb)
                ->where('id', $id)
                ->update('user');
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Profil Berhasil di Perbaharui</div>');
            redirect('admin/profil');
        }
    }

    function edit_dkbm()
    {
        $this->form_validation->set_rules('foodgroup', 'foodgroup', 'required|trim', ['required' => 'Grup makanan harus diisi!']);
        $this->form_validation->set_rules('foodname', 'foodname', 'required|trim', ['required' => 'Nama makanan harus diisi!']);
        $this->form_validation->set_rules('energy', 'energy');
        $this->form_validation->set_rules('protein', 'protein');
        $this->form_validation->set_rules('fats', 'fats');
        $this->form_validation->set_rules('carbhdrt', 'carbhdrt');
        $this->form_validation->set_rules('f_edible', 'f_edible', 'required|trim', ['required' => 'Berat harus diisi!']);
        if ($this->form_validation->run() == false) {
            $id = $this->uri->segment(3);
            $data['title'] = 'Edit Data DKBM';
            $data['user'] = $this->Admin_data_model->sesion();
            $data['e_dkbm'] = $this->Admin_data_model->getdkbm($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_admin', $data);
            $this->load->view('templates/topbar/topbar_admin', $data);
            $this->load->view('admin/edit/e_dkbm', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $foodgroup = $this->input->post('foodgroup');
            $foodname = $this->input->post('foodname');
            $energy = $this->input->post('energy');
            $protein = $this->input->post('protein');
            $fats = $this->input->post('fats');
            $carbhdrt = $this->input->post('carbhdrt');
            $f_edible = $this->input->post('f_edible');

            $this->db
                ->set('foodgroup', $foodgroup)
                ->set('foodname', $foodname)
                ->set('energy', $energy)
                ->set('protein', $protein)
                ->set('fats', $fats)
                ->set('carbhdrt', $carbhdrt)
                ->set('f_edible', $f_edible)
                ->where('id', $id)
                ->update('dkbm');
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Data DKBM Berhasil Diperbaharui.</div>');
            redirect('admin/data_dkbm');
        }
    }

    function edit_akg()
    {
        $this->form_validation->set_rules('id_kelompok', 'Id_kelompok', 'required|trim', ['required' => 'ID Kelompok harus diisi!']);
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim', ['required' => 'kelompok harus diisi!']);
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim', ['required' => 'umur harus diisi!']);
        $this->form_validation->set_rules('tb', 'Tb', 'required|trim', ['required' => 'Tinggi Badan harus diisi!']);
        $this->form_validation->set_rules('bb', 'Bb', 'required|trim', ['required' => 'Berat Badan harus diisi!']);
        $this->form_validation->set_rules('energi', 'Energi', 'required|trim', ['required' => 'Energi harus diisi!']);
        $this->form_validation->set_rules('protein', 'Protein', 'required|trim', ['required' => 'Protein harus diisi!']);
        $this->form_validation->set_rules('lemak', 'Lemak', 'required|trim', ['required' => 'Lemak harus diisi!']);
        $this->form_validation->set_rules('karbohidrat', 'Karbohidrat', 'required|trim', ['required' => 'Karbohidrat harus diisi!']);
        $this->form_validation->set_rules('serat', 'Serat', 'required|trim', ['required' => 'Serat harus diisi!']);
        $this->form_validation->set_rules('air', 'Air', 'required|trim', ['required' => 'Air harus diisi!']);

        if ($this->form_validation->run() == false) {
            $id = $this->uri->segment(3);
            $data['title'] = 'Edit Data AKG';
            $data['user'] = $this->Admin_data_model->sesion();
            $data['e_akg'] = $this->Admin_data_model->get_akg($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_admin', $data);
            $this->load->view('templates/topbar/topbar_admin', $data);
            $this->load->view('admin/edit/e_akg', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $id_kelompok = $this->input->post('id_kelompok');
            $kelompok = $this->input->post('kelompok');
            $umur = $this->input->post('umur');
            $tb = $this->input->post('tb');
            $bb = $this->input->post('bb');
            $energi = $this->input->post('energi');
            $protein = $this->input->post('protein');
            $lemak = $this->input->post('lemak');
            $karbohidrat = $this->input->post('karbohidrat');
            $serat = $this->input->post('serat');
            $air = $this->input->post('air');

            $this->db
                ->set('id_kelompok', $id_kelompok)
                ->set('kelompok', $kelompok)
                ->set('umur', $umur)
                ->set('tb', $tb)
                ->set('bb', $bb)
                ->set('energi', $energi)
                ->set('protein', $protein)
                ->set('lemak', $lemak)
                ->set('karbohidrat', $karbohidrat)
                ->set('serat', $serat)
                ->set('air', $air)
                ->where('id', $id)
                ->update('akg');
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Data AKG Berhasil Diperbaharui.</div>');
            redirect('admin/data_akg');
        }
    }

    function edit_user()
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
            $id = $this->uri->segment(3);
            $data['title'] = 'Edit Data User';
            $data['user'] = $this->Admin_data_model->sesion();
            $data['e_user'] = $this->Admin_data_model->get_user($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_admin', $data);
            $this->load->view('templates/topbar/topbar_admin', $data);
            $this->load->view('admin/edit/e_user', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $tanggallahir = $this->input->post('tanggallahir');
            $jeniskelamin = $this->input->post('jeniskelamin');
            $tb = $this->input->post('tinggibadan');
            $bb = $this->input->post('beratbadan');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $role_id = 2;
            $this->db
                ->set('nama', $nama)
                ->set('alamat', $alamat)
                ->set('tanggallahir', $tanggallahir)
                ->set('jeniskelamin', $jeniskelamin)
                ->set('tb', $tb)
                ->set('bb', $bb)
                ->set('email', $email)
                ->set('password', $password)
                ->set('role_id', $role_id)
                ->where('id', $id)
                ->update('user');

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Data User Berhasil Diperbaharui.</div>');
            redirect('admin/data_user');
        }
    }
}
