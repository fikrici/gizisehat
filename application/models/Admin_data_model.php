<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_data_model extends CI_model
{
    public function sesion()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getallakg()
    {
        return $this->db->get('akg')->result_array();
    }

    public function get_akg($id)
    {
        return $this->db->get_where('akg', ['id' => $id])->row_array();
    }

    public function jumlahakg()
    {
        return $this->db->get('akg')->num_rows();
    }

    public function getalldkbm()
    {
        return $this->db->get('dkbm')->result_array();
    }

    public function getdkbm($id)
    {
        return $this->db->get_where('dkbm', ['id' => $id])->row_array();
    }

    public function jumlahdkbm()
    {
        return $this->db->get('dkbm')->num_rows();
    }

    public function getalluser()
    {
        return $this->db->get('user')->result_array();
    }
    public function get_user($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function jumlahuser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function getuser($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function getdatagizi($data_gizi)
    {
        //var_dump($data_gizi);
        $query = $this->db
            ->select('*')
            ->select_sum('energi')
            ->select_sum('protein')
            ->select_sum('lemak')
            ->select_sum('karbohidrat')
            ->from('gizi')
            ->where('id_user', $data_gizi)
            ->group_by('tgl')
            ->get();

        return $query->result_array();
    }

    public function getdetailgizi($tgl, $getuser)
    {
        $id = $getuser['id'];
        $query = $this->db
            ->select('*')
            ->from('gizi')
            ->where('id_user', $id)
            ->where('tgl', $tgl)
            ->get();
        return $query->result_array();
    }

    public function getakg($getuser)
    {
        // tanggal lahir
        $umr = $getuser['tanggallahir'];
        $jk = $getuser['jeniskelamin'];
        $tanggal = strtotime($umr);
        $sekarang = strtotime(date('y-m-d'));
        $diff = $sekarang - $tanggal;
        // tanggal hari ini
        // tahun
        $bulan = floor($diff / (60 * 60 * 24 * 30));
        $tahun = floor($diff / (60 * 60 * 24 * 365));
        $kel = $bulan < 12 == 'Bayi';
        $kel = $tahun < 10 == 'anak';
        if ($bulan < 12 && $kel == 'Bayi') {
            return  $this->db->query('SELECT * FROM akg WHERE umur = ' . $bulan . ' AND id_kelompok = 1')->row_array();
        } else {
            if ($tahun < 10 && $kel == 'anak') {
                return  $this->db->query('SELECT * FROM akg WHERE umur =  ' . $tahun . '  AND id_kelompok = 2')->row_array();
            } else if ($tahun > 9 && $jk == 'laki-laki') {
                return  $this->db->query('SELECT * FROM akg WHERE umur = ' . $tahun . ' AND id_kelompok = 3 AND kelompok = "laki-laki"')->row_array();
            } else if ($tahun > 9 && $jk == 'perempuan') {
                return  $this->db->query('SELECT * FROM akg WHERE umur = ' . $tahun . ' AND id_kelompok = 3 AND kelompok = "perempuan"')->row_array();
            }
        }
    }

    public function hapususer($id)
    {
        $this->db
            ->where('id', $id)
            ->delete('user');
    }
    public function hapusakg($id)
    {
        $this->db
            ->where('id', $id)
            ->delete('akg');
    }
    public function hapusdkbm($id)
    {
        $this->db
            ->where('id', $id)
            ->delete('dkbm');
    }

    public function hapus_info($tgl, $getuser)
    {
        $id = $getuser['id'];
        $this->db
            ->where('id_user', $id)
            ->where('tgl', $tgl)
            ->delete('gizi');
    }

    public function hapus_detail($id)
    {
        $this->db
            ->where('id', $id)
            ->delete('gizi');
    }

    public function cetak($starttgl, $endtgl, $user)
    {
        $id_user = $user['id'];
        //return  $this->db->query('SELECT * FROM gizi WHERE id_user = "' . $id_user . '" AND tgl BETWEEN "' . $starttgl . '" AND "' . $endtgl . '" GROUP BY tgl')->result_array();
        $query = $this->db
            ->select('*')
            ->select_sum('energi')
            ->select_sum('protein')
            ->select_sum('lemak')
            ->select_sum('karbohidrat')
            ->from('gizi')
            ->where('id_user', $id_user)
            ->where('tgl >=', $starttgl)
            ->where('tgl <=', $endtgl)
            ->group_by('tgl')
            ->get();
        return $query->result_array();
    }
}
