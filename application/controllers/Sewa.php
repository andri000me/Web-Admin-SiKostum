<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sewa extends CI_Controller {
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
		$data['sewa']=json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewa'));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('dataSewa',$data);
	}

	public function detailSewa()
	{
		$id_sewa = array('id_sewa'=> $this->uri->segment(3));
		$data['total'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/totalPesan',$id_sewa));
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		
		$data['sewa']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/sewa',$id_sewa));
		$data['detail']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailSewa',$id_sewa));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('detailSewa',$data);
	}

	public function detailPemesanan(){
		$id_sewa = array('id_sewa'=> $this->uri->segment(3),'id_tempat'=> $this->input->post('id_tempat'));
		$data['total'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/totalPesan'));
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$data['sewa']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/sewa',$id_sewa));
		$data['detailku']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailPesan',$id_sewa));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('detailPemesanan',$data);
	}

	public function statusTransfer(){
	 if(isset($_POST['submit'])){
            $data = array(
            	'id_sewa' => $this->input->post('id_sewa'),
                'status_sewa' => $this->input->post('status_sewa'));
            $update = $this->curl->simple_put($this->API.'/Admin/Sewa/statusTransaksi', $data, array(CURLOPT_BUFFERSIZE => 10));
            if($update)
            {
                $this->session->set_flashdata('hasil','Status Berhasil');
            }
            else
            {
                $this->session->set_flashdata('hasil','Status Gagal');
            }
            redirect('Sewa','refresh');
        }else{
        	$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
            $data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
            $params = array('id_user'=> $this->uri->segment(3));
            $data['sewa'] = json_decode($this->curl->simple_get($this->API.'Admin/Sewa/sewa',$params));
            $this->load->view('detailSewa',$data);
        }
	}

	public function updateValid(){
	
            $data = array('id_log' => $this->input->post('id_log'));
            $update = $this->curl->simple_put($this->API.'/Admin/sewa/validSewa', $data, array(CURLOPT_BUFFERSIZE => 10));

            $data['total'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/totalPesan'));
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$id_sewa = array('id_sewa'=> $this->uri->segment(3),'id_tempat'=> $this->input->post('id_tempat'));
		$data['sewa']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/sewa',$id_sewa));
		$data['detailku']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailPesan',$id_sewa));
		$data['detail']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailSewa',$id_sewa));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('detailPemesanan',$data);
            
        
           
	}

	public function updateTidak(){

		$data = array('id_log' => $this->input->post('id_log'));
            $update = $this->curl->simple_put($this->API.'/Admin/sewa/tidakSewa', $data, array(CURLOPT_BUFFERSIZE => 10));

            $data['total'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/totalPesan'));
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$id_sewa = array('id_sewa'=> $this->uri->segment(3),'id_tempat'=> $this->input->post('id_tempat'));
		$data['sewa']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/sewa',$id_sewa));
		$data['detailku']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailPesan',$id_sewa));
		$data['detail']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailSewa',$id_sewa));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('detailPemesanan',$data);

	}

	public function updateTransfer(){
		
            $data = array('id_log' => $this->input->post('id_log'));
            $update = $this->curl->simple_put($this->API.'/Admin/sewa/transferSewa', $data, array(CURLOPT_BUFFERSIZE => 10));

            $data['total'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/totalPesan'));
		$data['proses'] = json_decode($this->curl->simple_get($this->API.'/Admin/sewa/sewaMenunggu'));
		$data['menunggu'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/userMenunggu'));
		$id_sewa = array('id_sewa'=> $this->uri->segment(3),'id_tempat'=> $this->input->post('id_tempat'));
		$data['detail']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailSewa',$id_sewa));
		$data['sewa']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/sewa',$id_sewa));
		$data['detailku']=json_decode($this->curl->simple_get($this->API.'/Admin/Sewa/detailPesan',$id_sewa));
		$id_user = $this->session->userdata('id_user');
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/Admin/user/profil?id_user='.$id_user));
		$this->load->view('detailPemesanan',$data);
           
	
}

}

/* End of file  */
/* Location: ./application/controllers/ */