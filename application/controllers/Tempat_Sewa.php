<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tempat_Sewa extends CI_Controller {
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
		$data['tempat'] = json_decode($this->curl->simple_get($this->API.'/Admin/tempatSewa/tempatSewa'));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('dataTempatSewa',$data);
	}

	public function detailTempat()
	{
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$id_tempat = array('id_tempat'=> $this->uri->segment(3));
		$data['alamat'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/alamat',$id_tempat));
		$data['kostum']=json_decode($this->curl->simple_get($this->API.'/Admin/tempatSewa/kostum',$id_tempat));
		$data['tempat']=json_decode($this->curl->simple_get($this->API.'/Admin/tempatSewa/tempatSewa',$id_tempat));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('detailTempat',$data);
	}

	public function izinTempat(){
		if(isset($_POST['submit'])){
            $data = array(
            	'id_tempat' => $this->input->post('id_tempat'),
                'izin' => $this->input->post('izin'));
            $update = $this->curl->simple_put($this->API.'/Admin/tempatSewa/izin', $data, array(CURLOPT_BUFFERSIZE => 10));
            if($update)
            {
                $this->session->set_flashdata('hasil','Edit Data Berhasil');
            }
            else
            {
                $this->session->set_flashdata('hasil','Edit Data Gagal');
            }
            redirect('Tempat_Sewa','refresh');
        }else{
        	$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
            $data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
            $params = array('id_tempat'=> $this->uri->segment(3));
            $data['tempat'] = json_decode($this->curl->simple_get($this->API.'Admin/tempatSewa/tempatSewa',$params));
            $this->load->view('detailTempat',$data);
        }
	}


}

/* End of file  */
/* Location: ./application/controllers/ */