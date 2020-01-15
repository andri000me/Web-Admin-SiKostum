<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
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
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['jmlUser'] = json_decode($this->curl->simple_get($this->API.'/Admin/beranda/user'));
		$data['jmlTempat'] = json_decode($this->curl->simple_get($this->API.'/Admin/beranda/tempatSewa'));
		$data['jmlSewa'] = json_decode($this->curl->simple_get($this->API.'/Admin/beranda/sewa'));
		$data['jmlKomentar'] = json_decode($this->curl->simple_get($this->API.'/Admin/beranda/komentar'));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('beranda',$data);


		
		
	}

	


}

/* End of file  */
/* Location: ./application/controllers/ */