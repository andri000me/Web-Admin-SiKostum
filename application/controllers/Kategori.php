<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
	var $API = "";
	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/RESTT";
		$user = $this->session->userdata('Admin');

		if (!isset($user)) {
			echo "<script> alert ('Login terlebih dahulu'); window.location.href='login';</script>";
		}else{
			return true;
		}
	}

	public function index()
	{
        $data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
        $data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$data['kategori'] = json_decode($this->curl->simple_get($this->API.'/Admin/kategori/kategori'));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('dataKategori',$data);
	}

	public function tambahKategori(){
		if(isset($_POST['submit'])){
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'));
        $insert = $this->curl->simple_post($this->API.'/Admin/Kategori/kategori', $data, array(CURLOPT_BUFFERSIZE => 10));
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
	public function editKategori(){

		if(isset($_POST['submit'])){
        $data = array(
        	'id_kategori' => $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori'));
        $insert = $this->curl->simple_put($this->API.'/Admin/Kategori/kategori', $data, array(CURLOPT_BUFFERSIZE => 10));
        if($insert)
        {
            $this->session->set_flashdata('hasil','Edit Data Berhasil');
        }else
        {
            $this->session->set_flashdata('hasil','Insert Data Gagal');
        }
        redirect('Kategori');
    }
	}
	public function hapusKategori(){
if(isset($_POST['submit'])){
        $data = array(
        	'id_kategori' => $this->input->post('id_kategori'));
        $insert = $this->curl->simple_delete($this->API.'/Admin/Kategori/kategori', $data, array(CURLOPT_BUFFERSIZE => 10));
        if($insert)
        {
            $this->session->set_flashdata('hasil','Hapus Data Berhasil');
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