<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function index()
	{
		$this->db->order_by('username','ASC');
		$data['muser'] = $this->db->get('muser')->result_array();
		$data['menu'] = 'user';
		$this->load->view("includes/header", $data);
		$this->load->view("includes/sidebar");
		$this->load->view("user/index");
		$this->load->view("includes/footer");
	}

	public function tambah(){
		$data['menu'] = 'user';
		$this->load->view("includes/header", $data);
		$this->load->view("includes/sidebar");
		$this->load->view("user/tambah");
		$this->load->view("includes/footer");
	}

	public function tambah_post(){
		$post = $this->input->post();
		$this->db->where('userid', $post['userid']);
		$is_any = $this->db->get('muser')->row();
		if($is_any){
			$this->session->set_userdata('errormsg','user id sudah di gunakan');
			redirect('User/tambah');
		} else {
			if(strtolower($post['password']) != strtolower($post['password2'])){
				$this->session->set_userdata('errormsg','konfirmasi password salah');
				redirect('User/tambah');
			} else {
				$insert_data = [
					'userid' => $post['userid'],
					'username'=> $post['username'],
					'password' => $post ['password']
				];
				$this->db->insert('muser',$insert_data);
				$this->session->set_userdata('successmsg','data berhasil di simpan');
				redirect('User');
			}
		}
	}

	public function hapus($userid){
		$this->db->delete('muser',['userid'=>$userid]);
		$this->session->set_userdata('successmsg','data berhasil di hapus');
			redirect('User');
	}

	public function edit($userid){
		$this->db->where('userid',$userid);
		$data['muser'] = $this->db->get('muser')->row();
		$data['menu'] = 'user';
		$this->load->view("includes/header", $data);
		$this->load->view("includes/sidebar");
		$this->load->view("user/edit");
		$this->load->view("includes/footer");
	}

	public function edit_post(){
		$post = $this->input->post();
		$update = [
			'username' => $post['username']
		];
		$this->db->update('muser',$update,['userid' => $post['userid']]);
		$this->session->set_userdata('successmsg','data berhasil di ubah');
		redirect('User');
	}
}
