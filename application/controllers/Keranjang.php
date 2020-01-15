<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang extends CI_Controller {
	var $API = "";
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/RESTT";
		
	}

	public function index()
	{
     $this->load->view('Keranjang');   
	}

	public function tambahKategori(){
		if(isset($_POST['submit'])){
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'));
        $insert = $this->curl->simple_post($this->API.'/Admin/Keranjang/sewa', $data, array(CURLOPT_BUFFERSIZE => 10));
        if($insert)
        {
            $this->session->set_flashdata('hasil','Insert Data Berhasil');
        }else
        {
            $this->session->set_flashdata('hasil','Insert Data Gagal');
        }
        redirect('Kategori');
    }
	}

	

}

/* End of file  */
/* Location: ./application/controllers/ */