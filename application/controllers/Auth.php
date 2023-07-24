<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login(){
		$data = [
			'title' => 'Login'
		];
		$this->load->view('login/loginfront',$data);
	
	}
	public function post_login(){
			//ambil data
			$post = $this->input->post('userid');
			$password = $this->input->post('password');
			$muser = $this->db->get_where('muser', ['userid' => $post])->row_array();
			
			//jika user ada
			if($muser){
				
				//Cek apakah password yang di input sama dengan yang sudah terdaftar
				if(strtolower($muser['password']) == strtolower($password)){

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
					redirect('Auth/login');
				}
		
			//jika user tidak ada
			}else{
				$this->session->set_userdata('errormsg','<div class="alert alert-danger" role="alert">
				ID belum terdaftar!
				</div>
				');
				redirect('Auth/login');
			}
			
			
		}
	

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
