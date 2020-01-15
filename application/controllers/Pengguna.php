<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller {
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
		
		$data['pengguna'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/user'));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('dataPengguna',$data);
	}

	public function detailPengguna(){
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));

		$id_pengguna = array('id_user'=> $this->uri->segment(3));
        $data['pengguna'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/user',$id_pengguna));
        $data['alamat'] = json_decode($this->curl->simple_get($this->API.'/Admin/User/alamat',$id_pengguna));
        $this->load->view('detailPengguna',$data);

       
	}

	public function verifikasiPengguna(){
	 if(isset($_POST['submit'])){
            $data = array(
            	'id_identitas' => $this->input->post('id_identitas'),
                'status' => $this->input->post('status'));
            $update = $this->curl->simple_put($this->API.'/Admin/User/verifikasi', $data, array(CURLOPT_BUFFERSIZE => 10));
            if($update)
            {
                $this->session->set_flashdata('hasil','Edit Data Berhasil');
            }
            else
            {
                $this->session->set_flashdata('hasil','Edit Data Gagal');
            }
            redirect('Pengguna','refresh');
        }else{
        	$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
            $data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
            $params = array('id_user'=> $this->uri->segment(3));
            $data['user'] = json_decode($this->curl->simple_get($this->API.'Admin/user/user',$params));
            $this->load->view('detailPengguna',$data);
        }
	}

	


}

/* End of file  */
/* Location: ./application/controllers/ */