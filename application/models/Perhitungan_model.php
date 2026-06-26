<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan_model extends CI_Model
{

    public function get_kriteria()
    {
        return $this->db
            ->order_by('id_kriteria', 'ASC')
            ->get('kriteria')
            ->result();
    }

    public function get_alternatif()
    {
        return $this->db
            ->query("
            SELECT *
            FROM asli
            ORDER BY CAST(SUBSTRING(kode_alternatif,2) AS UNSIGNED) ASC
        ")
            ->result();
    }

    public function get_alt($id_asli)
    {
        return $this->db->query("
        SELECT *
        FROM asli
        WHERE id_asli NOT IN ($id_asli)
        ORDER BY id_asli ASC
    ")->result();
    }

    /*
    |--------------------------------------------------------------------------
    | Ambil nilai asli
    |--------------------------------------------------------------------------
    */

    public function data_nilai($id_alternatif, $id_kriteria)
    {
        return $this->db
            ->where('id_alternatif', $id_alternatif)
            ->where('id_kriteria', $id_kriteria)
            ->get('penilaian')
            ->row_array();
    }

    /*
    |--------------------------------------------------------------------------
    | PREPROCESSING
    |--------------------------------------------------------------------------
    */

    public function nilai_preprocessing($alternatif, $kriteria)
    {
        $data_nilai = $this->data_nilai(
            $alternatif->id_asli,
            $kriteria->id_kriteria
        );

        $nilai_asli = isset($data_nilai['nilai'])
            ? $data_nilai['nilai']
            : 0;

        $hasil = 0;

        /*
        |--------------------------------------------------------------------------
        | C1 = Kepadatan Penduduk
        | Tidak dipreprocessing (tetap menggunakan data asli)
        |--------------------------------------------------------------------------
        */

        if ($kriteria->kode_kriteria == 'C1') {

            $hasil = $nilai_asli;

        }

        /*
        |--------------------------------------------------------------------------
        | C2 - C10 = Proporsi
        | nilai indikator / jumlah penduduk
        |--------------------------------------------------------------------------
        */ else {

            if ($alternatif->jumlah_penduduk > 0) {

                $hasil = $nilai_asli / $alternatif->jumlah_penduduk;

            } else {

                $hasil = 0;

            }

        }

        return $hasil;
    }

    /*
    |--------------------------------------------------------------------------
    | Hasil akhir
    |--------------------------------------------------------------------------
    */

    public function get_hasil()
    {
        return $this->db
            ->select('hasil.*, asli.kode_alternatif, asli.nama')
            ->from('hasil')
            ->join('asli', 'asli.id_asli = hasil.id_asli')
            ->order_by('hasil.nilai', 'DESC')
            ->get()
            ->result();
    }

    public function get_hasil_alternatif($id_asli)
    {
        return $this->db
            ->where('id_asli', $id_asli)
            ->get('asli')
            ->row_array();
    }

    public function insert_nilai_hasil($hasil = [])
    {
        return $this->db->insert('hasil', $hasil);
    }

    public function hapus_hasil()
    {
        return $this->db->query("TRUNCATE TABLE hasil");
    }
}