<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentar extends CI_Controller {
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
		$data['komentar']=json_decode($this->curl->simple_get($this->API.'/Admin/komentar/komentar'));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('dataKomentar',$data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */