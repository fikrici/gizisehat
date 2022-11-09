<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('User_data_model');

        //cek 
        if ($_SESSION['role_id'] != 2) {
            redirect('admin/index');
        }
    }

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->User_data_model->sesion();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_user', $data);
        $this->load->view('templates/topbar/topbar_user', $data);
        $this->load->view('user/home/index');
        $this->load->view('templates/footer');
    }

    function cek()
    {
        $data['title'] = 'Cek Gizi';
        $data['user'] = $this->User_data_model->sesion();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_user', $data);
        $this->load->view('templates/topbar/topbar_user', $data);
        $this->load->view('user/gizi/cek', $data);
        $this->load->view('templates/footer');
    }

    function inputgizi()
    {
        $i = 0;
        $id_user = $this->input->post('id_user', true);
        $tgl = $this->input->post('tgl', true);
        $jeniskelamin = $this->input->post('jeniskelamin', true);
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        // $umur = $this->input->post('umur', true);
        $tinggibadan = $this->input->post('tinggibadan', true);
        $beratbadan = $this->input->post('beratbadan', true);
        $bahanmakanan = $this->input->post('bahanmakanan', true);
        $urt = $this->input->post('urt', true);
        $berat = $this->input->post('berat', true);
        $energi = $this->input->post('energi', true);
        $lemak = $this->input->post('lemak', true);
        $protein = $this->input->post('protein', true);
        $karbohidrat = $this->input->post('karbohidrat', true);

        // var_dump($jeniskelamin);
        // die;
        if ($bahanmakanan[0] !== null) {
            foreach ($bahanmakanan as $a) {
                if ($bulan[$i] < 12) {
                    $id_kelompok = 1;
                    $umur = $bulan[$i];
                } else {
                    if ($tahun[$i] < 10) {
                        $id_kelompok = 2;
                        $umur = $tahun[$i];
                    } else if ($tahun[$i] < 91) {
                        $id_kelompok = 3;
                        $umur = $tahun[$i];
                    }
                }
                $data = [
                    'id_user' => $id_user[$i],
                    'tgl' => $tgl[$i],
                    'id_kelompok' => $id_kelompok,
                    'jeniskelamin' => $jeniskelamin[$i],
                    'umur' => $umur,
                    'tinggibadan' => $tinggibadan[$i],
                    'beratbadan' => $beratbadan[$i],
                    'bahanmakanan' => $a,
                    'urt' => $urt[$i],
                    'berat' => $berat[$i],
                    'energi' => $energi[$i],
                    'lemak' => $lemak[$i],
                    'protein' => $protein[$i],
                    'karbohidrat' => $karbohidrat[$i],
                ];
                $insert = $this->db->insert('gizi', $data);
                if ($insert) {
                    $i++;
                }
            }
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Ditambahkan</div>');
            redirect('user/cek');
        }
    }

    function get_autocomplete()
    {
        $bahanmakanan = $this->input->get('bahanmakanan');
        $fieldName = $this->input->get('fieldName');
        $food = $this->User_data_model->getfood($bahanmakanan, $fieldName);
        echo json_encode($food);
        exit;
    }

    function informasi()
    {
        $tgl = $this->uri->segment(3);
        $data['title'] = 'Informasi Gizi';
        $data['user'] = $this->User_data_model->sesion();
        $data['kecukupan'] = $this->User_data_model->getkecukupan($data['user']);
        $data['detail'] = $this->User_data_model->getdetailgizi($tgl, $data['user']);
        $data['getakg'] = $this->User_data_model->getakg($data['user']);
        $kg = $data['getakg'];
        $bb_aktual = $this->session->userdata('bb_aktual');
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
        $detail = $data['detail'];
        $e = 0;
        $p = 0;
        $l = 0;
        $k = 0;
        foreach ($detail as $total) {
            $e += $total['energi'];
            $p += $total['protein'];
            $l += $total['lemak'];
            $k += $total['karbohidrat'];
        }
        var_dump($data['detail']);
        var_dump($tgl);
        // ORDER BY foodname LIMIT 15
        if ($e < $energi and $l < $lemak and $p < $protein and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 400 AND fats > 20 AND protein > 10 AND carbhdrt > 30  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak and  $p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50 || protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $p < $protein and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || protein > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak and  $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($l < $lemak and $p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE fats > 50 || protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($l < $lemak and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE fats > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($p < $protein and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE protein > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($l < $lemak) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE fats > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } else {
            $r = $this->db->query('SELECT * FROM DKBM WHERE carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_user', $data);
        $this->load->view('templates/topbar/topbar_user', $data);
        $this->load->view('user/gizi/informasi', $data);
        $this->load->view('templates/footer');
    }

    function detailgizi()
    {
        $tgl = $this->uri->segment(3);
        $data['tgl'] = $tgl;
        $data['title'] = 'Detail Informasi Gizi';
        $data['user'] = $this->User_data_model->sesion();
        $data['total'] = $this->User_data_model->gethitungtotal($data['user']);
        $data['detail'] = $this->User_data_model->getdetailgizi($tgl, $data['user']);
        $data['getakg'] = $this->User_data_model->getakg($data['user']);
        // perhitungan
        $kg = $data['getakg'];
        $bb_aktual = $this->session->userdata('bb_aktual');
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
        // rekomendasi
        $detail = $data['detail'];
        $e = 0;
        $p = 0;
        $l = 0;
        $k = 0;
        foreach ($detail as $total) {
            $e += $total['energi'];
            $p += $total['protein'];
            $l += $total['lemak'];
            $k += $total['karbohidrat'];
        }
        // ORDER BY foodname LIMIT 15
        if ($e < $energi and $l < $lemak and $p < $protein and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 400 AND fats > 20 AND protein > 10 AND carbhdrt > 30  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak and  $p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50 || protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $p < $protein and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || protein > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak and  $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $l < $lemak) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || fats > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($e < $energi and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE energy > 700 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($l < $lemak and $p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE fats > 50 || protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($l < $lemak and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE fats > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($p < $protein and $k < $karbohidrat) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE protein > 50 || carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($l < $lemak) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE fats > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } elseif ($p < $protein) {
            $r = $this->db->query('SELECT * FROM DKBM WHERE protein > 50  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        } else {
            $r = $this->db->query('SELECT * FROM DKBM WHERE carbhdrt > 90  LIMIT 15')->result_array();
            $data['rekomendasi'] = $r;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_user', $data);
        $this->load->view('templates/topbar/topbar_user', $data);
        $this->load->view('user/gizi/detail', $data);
        $this->load->view('templates/footer');
    }

    function profil()
    {
        $data['title'] = 'Profilku';
        $data['user'] = $this->User_data_model->sesion();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar/sidebar_user', $data);
        $this->load->view('templates/topbar/topbar_user', $data);
        $this->load->view('user/profil/profil');
        $this->load->view('templates/footer');
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
            $data['user'] = $this->User_data_model->sesion();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar/sidebar_user', $data);
            $this->load->view('templates/topbar/topbar_user', $data);
            $this->load->view('user/profil/editprofil');
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
            redirect('user/profil');
        }
    }
    function hapusinformasi()
    {
        $tgl = $this->uri->segment(3);
        $data['user'] = $this->User_data_model->sesion();
        $this->User_data_model->hapus($tgl, $data['user']);
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Dihapus</div>');
        redirect('user/informasi');
    }
    function hapus_mkn()
    {
        $id = $this->uri->segment(3);
        $tgl = $this->uri->segment(4);
        $data['user'] = $this->User_data_model->sesion();
        $this->User_data_model->hapusmakanan($id);
        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">
            Berhasil Dihapus</div>');
        redirect('user/detailgizi/' . $tgl);
    }
    function cetak()
    {
        $starttgl = $this->input->post('starttgl');
        $endtgl = $this->input->post('endtgl');
        $data['title'] = 'Informasi Gizi';
        $data['user'] = $this->User_data_model->sesion();
        $data['kecukupan'] = $this->User_data_model->getkecukupan($data['user']);
        $data['getakg'] = $this->User_data_model->getakg($data['user']);
        $kg = $data['getakg'];
        $bb_aktual = $this->session->userdata('bb_aktual');
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
        $data['cetak'] = $this->User_data_model->cetak($starttgl, $endtgl, $data['user']);
        $this->load->view('user/gizi/cetak', $data);
    }
    function cetakdetail()
    {
        $tgl = $this->uri->segment(3);
        $data['tgl'] = $tgl;
        $data['title'] = 'Cetak Detail Informasi Gizi';
        $data['user'] = $this->User_data_model->sesion();
        $data['total'] = $this->User_data_model->gethitungtotal($data['user']);
        $data['detail'] = $this->User_data_model->getdetailgizi($tgl, $data['user']);
        $data['getakg'] = $this->User_data_model->getakg($data['user']);
        $kg = $data['getakg'];
        $bb_aktual = $this->session->userdata('bb_aktual');
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
        $this->load->view('user/gizi/cetakdetail', $data);
    }
}
