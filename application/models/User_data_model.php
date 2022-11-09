<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_data_model extends CI_model
{
    public function sesion()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }
    public function getakg($user)
    {
        // tanggal lahir
        $umr = $user['tanggallahir'];
        $jk = $user['jeniskelamin'];
        $tanggal = strtotime($umr);
        $sekarang = strtotime(date('y-m-d'));
        $diff = $sekarang - $tanggal;
        // tanggal hari ini
        // tahun
        $bulan = floor($diff / (60 * 60 * 24 * 30));
        $tahun = floor($diff / (60 * 60 * 24 * 365));
        // var_dump($jk);
        // var_dump($bulan);
        // var_dump($tahun);
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

    public function getfood($bahanmakanan, $fieldName)
    {
        if (empty($fieldName)) {
            $fieldName = 'bahanmakanan';
        }
        $bahanmakanan = strtolower(trim($bahanmakanan));
        $query = $this->db
            ->select('*')
            ->from('dkbm')
            ->where("LOWER($fieldName) LIKE '$bahanmakanan%'")
            ->limit(20)
            ->get();

        return $query->result_array();
    }

    public function getkecukupan($user)
    {
        $id = $user['id'];
        $query = $this->db
            ->select('*')
            ->select_sum('energi')
            ->select_sum('protein')
            ->select_sum('lemak')
            ->select_sum('karbohidrat')
            ->from('gizi')
            ->where('id_user', $id)
            ->group_by('tgl')
            ->order_by('tgl', 'DESC')
            ->get();

        return $query->result_array();
    }

    public function getdetailgizi($tgl, $user)
    {
        $id = $user['id'];
        $query = $this->db
            ->select('*')
            ->from('gizi')
            ->where('id_user', $id)
            ->where('tgl', $tgl)
            ->get();
        return $query->result_array();
    }
    public function gethitungtotal($user)
    {
        $id = $user['id'];
        $query = $this->db
            ->select('*')
            ->select_sum('energi')
            ->select_sum('protein')
            ->select_sum('lemak')
            ->select_sum('karbohidrat')
            ->from('gizi')
            ->where('id_user', $id)
            ->get();

        return $query->row_array();
    }
    public function hapus($tgl, $user)
    {
        $id = $user['id'];
        $query = $this->db
            ->where('id_user', $id)
            ->where('tgl', $tgl)
            ->delete('gizi');
    }
    public function hapusmakanan($id)
    {
        $query = $this->db
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
