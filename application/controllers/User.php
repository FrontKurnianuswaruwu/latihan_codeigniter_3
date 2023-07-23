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
					'password' => $post['password']
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
	public function login(){
		$data = [
			'title' => 'Login'
		];
		
		//validasi jika userid dan password tidak di isi dan ada space
		$this->load->library('form_validation');
		$this->form_validation->set_rules('userid', 'UserID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() == false){
			$this->load->view('login/loginfront',$data);
		} else {
			//validasi sukses
			$post = $this->input->post('userid');
			$password = $this->input->post('password');
			$muser = $this->db->get_where('muser', ['userid' => $post])->row_array();
			
			//jika user ada
			if($muser){
				
				//Cek apakah password yang di input sama dengan yang sudah terdaftar
				if($muser['password'] == $password){

					$simpan = [
						'userid' => $muse['userid'],
						'password' => $muse['password']
					];
					$this->session->set_userdata($simpan);
					$this->session->set_userdata('successmsg','<div class="alert alert-success col-3" role="alert">
					Berhasil Log In
			  		</div>');
					redirect('User');	
				//kondisi jika password tidak ada
				}else{
					$this->session->set_userdata('errormsg','<div class="alert alert-danger" role="alert">
					Password Salah!
				  	</div>
				  	');
					redirect('User/login');
				}
		
			//jika user tidak ada
			}else{
				$this->session->set_userdata('errormsg','<div class="alert alert-danger" role="alert">
				ID belum terdaftar!
				</div>
				');
				redirect('User/login');
			}
			
			
		}
	}

	//proses logout
	public function logout(){

		//membersihkan session
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('password');
		$this->session->set_userdata('successmsg','<div class="alert alert-success " role="alert">
		Berhasil Log out!
		</div>');
		redirect('User/login/');
	}
}