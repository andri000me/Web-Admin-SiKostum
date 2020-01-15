<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {
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
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('editProfil',$data);
	}

	public function editProfil(){
		 if(isset($_POST['submit'])){
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin'=> $this->input->post('jenis_kelamin'),
            	'email' => $this->input->post('email'),
            	'no_hp' => $this->input->post('no_hp'),
            	'foto_user' => $this->input->post('foto_user'),
            	'username' => $this->input->post('username'),
            	'password' => $this->input->post('password'));
            $update = $this->curl->simple_put($this->API.'/Admin/User/profil', $data, array(CURLOPT_BUFFERSIZE => 10));
            if($update)
            {
                $this->session->set_flashdata('hasil','Edit Data Profil Berhasil');
            }
            else
            {
                $this->session->set_flashdata('hasil','Edit Data Profil Gagal');
            }
            redirect('Profil');
        }else{
            $data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
           $data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
            $params = array('id_user'=> $this->uri->segment(3));
            $data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/User/profil',$params));
      
            $this->load->view('Profil',$data);
        }
	}

}

/* End of file  */
/* Location: ./application/controllers/ */