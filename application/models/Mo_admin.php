<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_admin extends CI_Model {


	//Register Kelas
	public function register_jeniskelas_process()
	{
		$data=array(
			'id_macam_kelas'=>null,
			'macam_kelas'=>$this->input->post('macam_kelas'));
		$this->db->insert('jenis_kelas',$data);
		if ($this->db->affected_rows() > 0 ) {
			return true;
		}
		else{
			return false;
		}		
	}

	public function get_macamkelas_process()
	{
		return $this->db->get('jenis_kelas')->result();
	}

	public function get_datakelasdipakai_process()
	{
		return $this->db->join('kelas', 'kelas.id_user = user.id_user')->get('user')->result();
	}

	//Delete Macam Kelas 
	public function delete_macamkelas_process($id_macam_kelas)
	{
		$where=array('id_macam_kelas'=>$id_macam_kelas);
		$this->db->where($where)->delete('jenis_kelas');
	}

	//Delete Kelas diajar process
	public function delete_kelas_process($id_kelas)
	{
		$where=array('id_kelas'=>$id_kelas);
		$this->db->where($where)->delete('kelas');
	}

	//-----------------Data Pengajar-----------------//
	public function get_datapengajar_process()
	{
		return $this->db->where('status','pengajar')->get('user')->result();
	}
	public function register_pengajar_process()
	{
		$data=array(
			'id_user'=>null,
			'namaus'=>$this->input->post('namaus'),
			'emailus'=>$this->input->post('emailus'),
			'passwordus'=>$this->input->post('passwordus'),
			'status'=>'pengajar');
		$this->db->insert('user',$data);
		if ($this->db->affected_rows() > 0 ) {
			return true;
		}
		else{
			return false;
		}		
	}

	//---------------Data Siswa----------------//
	public function getdata_siswa_process($id_user)
	{
		$where=array('data_siswa.id_user'=>$id_user);
		return $this->db->join('kelas', 'kelas.id_kelas = data_siswa.id_kelas')->where($where)->get('data_siswa')->result();
	}


}

/* End of file Mo_admin.php */
/* Location: ./application/models/Mo_admin.php */