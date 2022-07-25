<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin_model extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('registrasi')->result();
    }

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($data, $table)
    {
        $this->db->update($table, $data);
    }

    function update_register($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function data_register()
    {

        return $this->db->get('registrasi')->row();
    }

    public function tampil_registrasi($no_nik)
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->where('registrasi.no_nik', $no_nik);
        return $this->db->get()->row();
    }

    // public function customer($no_nik)
    // {
    //     $this->db->select('*');
    //     $this->db->from('registrasi');
    //     $this->db->where('registrasi.no_nik', $no_nik);
    //     return $this->db->get()->row();
    // }

    public function data_skrining()
    {

        return $this->db->get('skrining')->row();
    }

    public function data_admin()
    {

        $this->db->select('nama_admin');
        return $this->db->get('admin')->row();
    }

    public function data_transaksi()
    {

        return $this->db->get('transaksi')->row();
    }

    public function data_vaksin()
    {
        return $this->db->get('vaksin')->row();
    }

    public function vaksin_anak()
    {

        return $this->db->get('imunisasi')->row();
    }

    public function delete($no_nik)
    {
        return $this->db->delete('registrasi', array('no_nik' => $no_nik));
    }

    function total_row_registrasi()
    {
        return $this->db->get('registrasi')->num_rows();
    }

    function total_row_imunisasi()
    {
        return $this->db->get('imunisasi')->num_rows();
    }

    function total_row_skrining()
    {
        return $this->db->get('skrining')->num_rows();
    }

    function total_row_vaksin()
    {
        return $this->db->get('vaksin')->num_rows();
    }

    public function hasil_skrining()
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->join('skrining', 'skrining.no_nik=registrasi.no_nik');
        return $this->db->get()->result();
    }

    public function cetak_skrining($no_nik)
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->join('skrining', 'skrining.no_nik=registrasi.no_nik');
        $this->db->where('registrasi.no_nik', $no_nik);
        return $this->db->get()->row();
    }

    public function hasil_vaksin()
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->join('vaksin', 'vaksin.no_nik=registrasi.no_nik');
        return $this->db->get()->result();
    }

    public function cetak_vaksin($no_nik)
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->join('vaksin', 'vaksin.no_nik=registrasi.no_nik');
        $this->db->where('registrasi.no_nik', $no_nik);
        return $this->db->get()->row();
    }

    public function hasil_imun()
    {
        $this->db->select('*');
        $this->db->from('registrasi');
        $this->db->join('imunisasi', 'imunisasi.no_nik=registrasi.no_nik');
        return $this->db->get()->result();
    }
}