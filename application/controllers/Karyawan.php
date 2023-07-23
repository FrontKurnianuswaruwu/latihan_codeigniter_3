<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function index(){
		$this->db->order_by('namakaryawan','ASC');
		$data['karyawan'] = $this->db->get('karyawan')->result_array();
		$data['menu'] = 'karyawan';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('karyawan/index');
		$this->load->view('includes/footer');
	}

	public function tambahkaryawan(){
		$data['menu'] = 'karyawan';
		$this->load->view('includes/header',$data);
		$this->load->view('includes/sidebar');
		$this->load->view('karyawan/tambahkaryawan');
		$this->load->view('includes/footer');
	}

	public function tambahkaryawan_post(){
		$post = $this->input->post();
		$this->db->where('idkaryawan',$post['idkaryawan']);	
		$is_any = $this->db->get('karyawan')->row();
		if($is_any){
			$this->session->set_userdata('errormsg', 'id karyawan sudah terdaftar');
			redirect('Karyawan/tambahkaryawan');
		} else {
			$insert_data = [
				'idkaryawan' => $post['idkaryawan'],
				'namakaryawan' => $post['namakaryawan'],
				'alamat' => $post['alamat'],
				'nowa' => $post['nowa']
			];
			$this->db->insert('karyawan',$insert_data);
			$this->session->set_userdata('successmsg','Data berhasil di tambah');
			redirect('Karyawan');
		}
	}

	public function hapus($idkaryawan){
		$this->db->delete('karyawan',['idkaryawan' =>$idkaryawan]);
		$this->session->set_userdata('successmsg', 'Data berhasil di hapus');
		redirect('Karyawan');
	}

	public function edit($idkaryawan){
		$this->db->where('idkaryawan',$idkaryawan);
		$data['karyawan'] = $this->db->get('karyawan')->row();
		$data['menu'] = 'karyawan';
		$this->load->view("includes/header", $data);
		$this->load->view("includes/sidebar");
		$this->load->view("karyawan/editkaryawan");
		$this->load->view("includes/footer");
	}
	public function editkaryawan_post(){
		$post = $this->input->post();
		$update = [
			'namakaryawan' => $post['namakaryawan']
		];
		$this->db->update('karyawan',$update,['idkaryawan' => $post['idkaryawan']]);
		$this->session->set_userdata('successmsg','data berhasil di ubah');
		redirect('Karyawan');
	}
		
}