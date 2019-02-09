<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelajar extends CI_Model{

    public function menambah()
    {
        $NIS=$this->input->post('NIS');
        $nama=$this->input->post('nama');
        $tanggal_lahir=$this->input->post('tanggal_lahir');
        $jenis_kelamin=$this->input->post('jenis_kelamin');
        $alamat=$this->input->post('alamat');
        $kota_asal=$this->input->post('kota_asal');

        $data_simpan = array('NIS'=>$NIS, 'nama'=>$nama, 'tanggal_lahir'=>$tanggal_lahir, 'jenis_kelamin'=>$jenis_kelamin, 'alamat'=>$alamat, 'kota_asal'=>$kota_asal);
        $this->db->insert('pelajar', $data_simpan);
        if ($this->db->affected_rows()>0) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function menampilkan()
    {
        $tampilkan = $this->db->join('kota', 'kota.id_kota = pelajar.kota_asal')->get('pelajar')->result();
        return $tampilkan;
    }

    public function mengubah($NIS, $nama, $tanggal_lahir, $jenis_kelamin, $alamat, $kota_asal)
    {
        $hasil = $this->db->query("UPDATE pelajar SET NIS='$NIS', nama='$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', kota_asal='$kota_asal' WHERE NIS='$NIS'");
        return $hasil;
    }

    public function menghapus($NIS)
    {
        $hasil = $this->db->query("DELETE FROM pelajar where NIS='$NIS'");
        return $hasil;
    }

    public function laki()
    {
        $laki = $this->db->query("SELECT * FROM pelajar where jenis_kelamin = 'Laki-laki'");
        $total = $laki->num_rows();
        return $total;
    }

    public function wanita()
    {
        $perempuan = $this->db->query("SELECT * FROM pelajar where jenis_kelamin = 'Perempuan'");
        $total = $perempuan->num_rows();
        return $total;
    }

    public function semua()
    {
        $semua = $this->db->query("SELECT * FROM pelajar");
        $total = $semua->num_rows();
        return $total;
    }

    public function tahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggal_lahir) as tahun, COUNT(YEAR(tanggal_lahir)) as jumlah FROM pelajar GROUP BY YEAR(tanggal_lahir) ORDER BY YEAR(tanggal_lahir) ASC");
        return $query->result();
    }

    public function kota()
    {
        $query = $this->db->query("SELECT nama_kota as kotaa, COUNT(kota_asal) as jumlah FROM pelajar INNER JOIN kota ON pelajar.kota_asal=kota.id_kota GROUP BY kota_asal ORDER BY jumlah DESC");
        return $query->result();
    }

}
