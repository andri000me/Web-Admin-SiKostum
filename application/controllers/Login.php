<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	var $API = "";

	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/RESTT";
	}

	public function index()
	{
		$this->load->view('login');
	}

	function proses_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
			);
		$cek = json_decode($this->curl->simple_post($this->API.'/Admin/login/login', $where,array(CURLOPT_BUFFERSIZE => 10)));
		if($cek){
			foreach ($cek as $key => $value) {
			    $value;
			}
			$id_user = $value;
			if (!empty($id_user)) {
				$data_session = array(
				'username' => $username,
				'password' => $password,
				
				);
 
			$this->session->set_userdata('Admin',$data_session);
			$this->session->set_userdata('id_user',$id_user);
			redirect('beranda','refresh');
			}else{
				$this->session->set_flashdata('hasil','Login Gagal');
				redirect('login','refresh');
			}
			
 
		}else{
			$this->session->set_flashdata('hasil','Login Gagal');
			redirect('login','refresh');
		}
	}

	function logout() {
            $this->session->sess_destroy();
            redirect('login');
    } 

}

/* End of file  */
/* Location: ./application/controllers/ */