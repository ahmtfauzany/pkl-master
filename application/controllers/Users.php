<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function index()
	{
		$ceks = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']   	 = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  	 = $this->Mcrud->get_users();
			$data['judul_web'] = "Man3-APP ";

			$this->load->view('users/header', $data);
			$this->load->view('users/beranda', $data);
			$this->load->view('users/footer');
		}
	}

	public function profile()
	{
		$ceks = $this->session->userdata('AhmadFauzan');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			= $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  	= $this->Mcrud->get_level_users();
			$data['judul_web'] 		= "Man3-APP ";

			$this->load->view('users/header', $data);
			$this->load->view('users/profile', $data);
			$this->load->view('users/footer');

			if (isset($_POST['btnupdate'])) {
				$nama_lengkap	 		= htmlentities(strip_tags($this->input->post('nama_lengkap')));
				$nip	 				= htmlentities(strip_tags($this->input->post('nip')));
				$alamat	 				= htmlentities(strip_tags($this->input->post('alamat')));
				$telp	 				= htmlentities(strip_tags($this->input->post('telp')));
				$pengalaman	 	  		= htmlentities(strip_tags($this->input->post('pengalaman')));
				$hoby	  		= htmlentities(strip_tags($this->input->post('hoby')));

				$data = array(
					'nama_lengkap' 		 => $nama_lengkap,
					'nip'			     => $nip,
					'alamat'			 => $alamat,
					'telp'				 => $telp,
					'pengalaman'	     => $pengalaman,
					'hoby'	  			 => $hoby,
					'status' 			 => 'aktif',
					'tgl_daftar' 	     => $tgl
				);
				$this->Mcrud->update_user(array('username' => $ceks), $data);

				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Profil berhasil disimpan.
					</div>'
				);
				redirect('users/profile');
			}

			if (isset($_POST['btnupdate2'])) {
				$password 	= htmlentities(strip_tags($this->input->post('password')));
				$password2 	= htmlentities(strip_tags($this->input->post('password2')));

				if ($password != $password2) {
					$this->session->set_flashdata(
						'msg2',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Gagal!</strong> Kata sandi tidak cocok.
						</div>'
					);
				} else {
					$data = array(
						'password'	=> md5($password)
					);
					$this->Mcrud->update_user(array('username' => $ceks), $data);

					$this->session->set_flashdata(
						'msg2',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Katasandi berhasil disimpan.
						</div>'
					);
				}
				redirect('users/profile');
			}
		}
	}

	public function user($aksi = '', $id = '')
	{
		$ceks = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);

			if ($data['user']->row()->level == 'admin' or $data['user']->row()->level == 'user') {
				redirect('404_content');
			}

			$this->db->order_by('id_user', 'DESC');
			$data['level_users']  = $this->Mcrud->get_level_users();

			if ($aksi == 't') {
				$p = "user_tambah";

				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'd') {
				$p = "user_detail";

				$data['query'] = $this->db->get_where("tbl_user", "id_user = '$id'")->row();
				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'e') {
				$p = "user_edit";

				$data['query'] = $this->db->get_where("tbl_user", "id_user = '$id'")->row();
				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'h') {

				$data['query'] = $this->db->get_where("tbl_user", "id_user = '$id'")->row();
				$data['judul_web'] 	  = "Man3-APP ";

				if ($ceks == $data['query']->username) {
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Gagal!</strong> Maaf, Anda tidak bisa menghapus Nama user "' . $ceks . '" ini.
						</div>'
					);
				} else {
					$this->Mcrud->delete_user_by_id($id);
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> user berhasil dihapus.
						</div>'
					);
				}
				redirect('users/user');
			} else {
				$p = "user";
				$data['judul_web'] 	  = "Man3-APP ";
			}

			$this->load->view('users/header', $data);
			$this->load->view("users/pengaturan/$p", $data);
			$this->load->view('users/footer');

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('d-m-Y H:i:s');

			if (isset($_POST['btnsimpan'])) {
				$username   	 		= htmlentities(strip_tags($this->input->post('username')));
				$password	 		  	= htmlentities(strip_tags($this->input->post('password')));
				$password2	 			= htmlentities(strip_tags($this->input->post('password2')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$cek_user = $this->db->get_where("tbl_user", "username = '$username'")->num_rows();
				if ($cek_user != 0) {
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Gagal!</strong> Nama user "' . $username . '" Sudah ada.
						</div>'
					);
				} else {
					if ($password != $password2) {
						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Gagal!</strong> Katasandi tidak cocok.
							</div>'
						);
					} else {
						$data = array(
							'username'	 	 	=> $username,
							'nama_lengkap'	 	=> $username,
							'password'	 	 	=> md5($password),
							'alamat' 			=> '-',
							'telp' 				 => '-',
							'pengalaman' 	 	=> '-',
							'hoby' 	 			=> '-',
							'status' 			=> 'aktif',
							'level'			 	=> $level,
							'tgl_daftar' 	 	=> $tgl
						);
						$this->Mcrud->save_user($data);

						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> user berhasil ditambahkan.
							</div>'
						);
					}
				}

				redirect('users/user/t');
			}

			if (isset($_POST['btnupdate'])) {
				$nama_lengkap	 		= htmlentities(strip_tags($this->input->post('nama_lengkap')));
				$nip	 				= htmlentities(strip_tags($this->input->post('nip')));
				$alamat	 				= htmlentities(strip_tags($this->input->post('alamat')));
				$telp	 				= htmlentities(strip_tags($this->input->post('telp')));
				$pengalaman	 	  		= htmlentities(strip_tags($this->input->post('pengalaman')));
				$hoby	  		= htmlentities(strip_tags($this->input->post('hoby')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$data = array(
					'nama_lengkap' 		 => $nama_lengkap,
					'nip'			     => $nip,
					'alamat'			 => $alamat,
					'telp'				 => $telp,
					'pengalaman'	     => $pengalaman,
					'hoby'	  			 => $hoby,
					'status' 			 => 'aktif',
					'level'			 	 => $level,
					'tgl_daftar' 	     => $tgl
				);
				$this->Mcrud->update_user(array('id_user' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> user berhasil diupdate.
					</div>'
				);
				redirect('users/user');
			}
		}
	}

	public function pegawai($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			if ($data['user']->row()->level == 'user') {
				redirect('404_content');
			}

			$this->db->join('tbl_user', 'tbl_pegawai.id_user=tbl_user.id_user');
			if ($data['user']->row()->level == 'user') {
				$this->db->where('tbl_pegawai.id_user', "$id_user");
			}
			$this->db->order_by('tbl_pegawai.nama_pegawai', 'ASC');
			$data['pegawai'] 		  = $this->db->get("tbl_pegawai");

			if ($aksi == 't') {
				$p = "pegawai_tambah";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}

				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'e') {
				$p = "pegawai_edit";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_pegawai", array('id_pegawai' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_pegawai", array('id_pegawai' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
				$this->Mcrud->delete_pegawai_by_id($id);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> GTK berhasil dihapus.
					</div>'
				);
				redirect('users/pegawai');
			} else {
				$p = "pegawai";
				$data['judul_web'] 	  = "Man3-APP ";
			}

			$this->load->view('users/header', $data);
			$this->load->view("users/pengaturan/$p", $data);
			$this->load->view('users/footer');
			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('d-m-Y H:i:s');
			if (isset($_POST['btnsimpan'])) {
				$nama_pegawai   	 	= htmlentities(strip_tags($this->input->post('nama_pegawai')));
				$nip_pegawai		   	 	= htmlentities(strip_tags($this->input->post('nip_pegawai')));
				$ttl  	 	= htmlentities(strip_tags($this->input->post('ttl')));
				$jenis_kelamin 	 	= htmlentities(strip_tags($this->input->post('jenis_kelamin')));
				$agama  	 	= htmlentities(strip_tags($this->input->post('agama')));
				$pangkat	   	 	= htmlentities(strip_tags($this->input->post('pangkat')));
				$jabatan 	 	= htmlentities(strip_tags($this->input->post('jabatan')));
				$data = array(
					'nama_pegawai'	 => $nama_pegawai,
					'nip_pegawai		'	 => $nip_pegawai,
					'ttl		'	 => $ttl,
					'jenis_kelamin	' => $jenis_kelamin,
					'agama		'	 => $agama,
					'pangkat	'	 => $pangkat,
					'jabatan		' => $jabatan,
					'id_user'		 => $id_user
				);
				$this->Mcrud->save_pegawai($data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> GTK berhasil ditambahkan.
					</div>'
				);
				redirect('users/pegawai/t');
			}

			if (isset($_POST['btnupdate'])) {
				$nama_pegawai   	 	= htmlentities(strip_tags($this->input->post('nama_pegawai')));
				$nip_pegawai		   	 	= htmlentities(strip_tags($this->input->post('nip_pegawai')));
				$ttl  	 	= htmlentities(strip_tags($this->input->post('ttl')));
				$jenis_kelamin 	 	= htmlentities(strip_tags($this->input->post('jenis_kelamin')));
				$agama  	 	= htmlentities(strip_tags($this->input->post('agama')));
				$pangkat	   	 	= htmlentities(strip_tags($this->input->post('pangkat')));
				$jabatan 	 	= htmlentities(strip_tags($this->input->post('jabatan')));

				$data = array(
					'nama_pegawai'	 => $nama_pegawai,
					'nip_pegawai		'	 => $nip_pegawai,
					'ttl		'	 => $ttl,
					'jenis_kelamin	' => $jenis_kelamin,
					'agama		'	 => $agama,
					'pangkat	'	 => $pangkat,
					'jabatan		' => $jabatan,
				);
				$this->Mcrud->update_pegawai(array('id_pegawai' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> GTK berhasil diupdate.
					</div>'
				);
				redirect('users/pegawai');
			}
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function siswa($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			if ($data['user']->row()->level == 'user') {
				redirect('404_content');
			}

			$this->db->join('tbl_user', 'tbl_siswa.id_user=tbl_user.id_user');
			if ($data['user']->row()->level == 'user') {
				$this->db->where('tbl_siswa.id_user', "$id_user");
			}
			$this->db->order_by('tbl_siswa.nama_siswa', 'ASC');
			$data['siswa'] 		  = $this->db->get("tbl_siswa");

			if ($aksi == 't') {
				$p = "siswa_tambah";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}

				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'e') {
				$p = "siswa_edit";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_siswa", array('id_siswa' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_siswa", array('id_siswa' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
				$this->Mcrud->delete_siswa_by_id($id);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> GTK berhasil dihapus.
					</div>'
				);
				redirect('users/siswa');
			} else {
				$p = "siswa";
				$data['judul_web'] 	  = "Man3-APP ";
			}

			$this->load->view('users/header', $data);
			$this->load->view("users/siswa/$p", $data);
			$this->load->view('users/footer');
			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('d-m-Y H:i:s');
			if (isset($_POST['btnsimpan'])) {
				$nama_siswa   	 	= htmlentities(strip_tags($this->input->post('nama_siswa')));
				$nim		   	 	= htmlentities(strip_tags($this->input->post('nim')));
				$nisn		   	 	= htmlentities(strip_tags($this->input->post('nisn')));
				$ttl  	 			= htmlentities(strip_tags($this->input->post('ttl')));
				$jenis_kelamin 	 	= htmlentities(strip_tags($this->input->post('jenis_kelamin')));
				$agama  		 	= htmlentities(strip_tags($this->input->post('agama')));
				$kelas	   		 	= htmlentities(strip_tags($this->input->post('kelas')));
				$jurusan 		 	= htmlentities(strip_tags($this->input->post('jurusan')));
				$telpon 	 		= htmlentities(strip_tags($this->input->post('telpon')));
				$data = array(
					'nama_siswa'	 => $nama_siswa,
					'nim		'	 => $nim,
					'nisn		'	 => $nisn,
					'ttl		'	 => $ttl,
					'jenis_kelamin'  => $jenis_kelamin,
					'agama		'	 => $agama,
					'kelas		'	 => $kelas,
					'jurusan	'	 => $jurusan,
					'telpon		'	 => $telpon,
					'id_user'		 => $id_user
				);
				$this->Mcrud->save_siswa($data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> GTK berhasil ditambahkan.
					</div>'
				);
				redirect('users/siswa/t');
			}

			if (isset($_POST['btnupdate'])) {
				$nama_siswa  	 	= htmlentities(strip_tags($this->input->post('nama_siswa')));
				$nim		   	 	= htmlentities(strip_tags($this->input->post('nim')));
				$nisn		   	 	= htmlentities(strip_tags($this->input->post('nisn')));
				$ttl  			 	= htmlentities(strip_tags($this->input->post('ttl')));
				$jenis_kelamin 	 	= htmlentities(strip_tags($this->input->post('jenis_kelamin')));
				$agama  		 	= htmlentities(strip_tags($this->input->post('agama')));
				$kelas	  	 	 	= htmlentities(strip_tags($this->input->post('kelas')));
				$jurusan 		 	= htmlentities(strip_tags($this->input->post('jurusan')));
				$telpon	 			= htmlentities(strip_tags($this->input->post('telpon')));

				$data = array(
					'nama_siswa'	 => $nama_siswa,
					'nim		'	 => $nim,
					'nisn		'	 => $nisn,
					'ttl		'	 => $ttl,
					'jenis_kelamin	' => $jenis_kelamin,
					'agama		'	 => $agama,
					'kelas	'	 => $kelas,
					'jurusan		' => $jurusan,
					'telpon		' => $telpon,
				);
				$this->Mcrud->update_siswa(array('id_siswa' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> GTK berhasil diupdate.
					</div>'
				);
				redirect('users/siswa');
			}
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function historysm($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		$data['user'] = $this->Mcrud->get_users_by_un($ceks);
		if (!isset($ceks)) {
			redirect('web/login');
		} elseif ($data['user']->row()->level == 'kepsek' or $data['user']->row()->level == 'ktu' or $data['user']->row()->level == 'admin' or $data['user']->row()->level == 's_admin') {
			$this->db->select('*');
			$this->db->from('tbl_sm');
			$this->db->order_by('tbl_sm.dibaca', 'asc');
			$this->db->where('dibaca =', '3');
			$data['historysm'] = $this->db->get();
			if ($aksi == 'd') {
				$p = "historysm_detail";
				$data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
			} else {
				$p = "historysm";
				$data['judul_web'] 	  = "Man3-APP ";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/pemrosesan/$p", $data);
			$this->load->view('users/footer');
		} else {
			redirect('404_content');
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function schistory($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		$data['user'] = $this->Mcrud->get_users_by_un($ceks);
		if (!isset($ceks)) {
			redirect('web/login');
		} elseif ($data['user']->row()->level == 'kepsek' or $data['user']->row()->level == 'ktu' or $data['user']->row()->level == 'admin' or $data['user']->row()->level == 's_admin') {
			$this->db->select('*');
			$this->db->from('tbl_sm');
			$this->db->order_by('tbl_sm.dibaca', 'asc');
			$this->db->where('dibaca =', '3');
			$data['schistory'] = $this->db->get();
			if ($aksi == 'd') {
				$p = "schistory_detail";
				$data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
			} else {
				$p = "schistory";
				$data['judul_web'] 	  = "Man3-APP ";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/pemrosesan/$p", $data);
			$this->load->view('users/footer');
		} else {
			redirect('404_content');
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function ktu($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		$data['user'] = $this->Mcrud->get_users_by_un($ceks);
		if (!isset($ceks)) {
			redirect('web/login');
		} elseif ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'ktu') {
			$this->db->select('*');
			$this->db->from('tbl_sm');
			$this->db->where('dibaca BETWEEN 1 AND', 2);
			$this->db->order_by('tbl_sm.no_sm', 'asc');
			$data['ktu'] = $this->db->get();
			if ($aksi == 'd') {
				$p = "ktu_detail";
				$data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
				if (isset($_POST['btnajuan'])) {
					$dibaca   	 	= htmlentities(strip_tags($this->input->post('dibaca')));
					$ajuan   	 	= htmlentities(strip_tags($this->input->post('tgl_ajuan')));
					$data2 = array(
						'dibaca' => $dibaca,
						'tgl_ajuan' => $ajuan
					);
					$this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);
					redirect('users/ktu');
				}
			} else {
				$p = "ktu";
				$data['judul_web'] 	  = "Man3-APP ";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/pemrosesan/$p", $data);
			$this->load->view('users/footer');
		} else {
			redirect('404_content');
		}
	}

	public function surat_cuti($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		$data['user'] = $this->Mcrud->get_users_by_un($ceks);
		if (!isset($ceks)) {
			redirect('web/login');
		} elseif ($data['user']->row()->level == 'kepsek' or $data['user']->row()->level == 'ktu') {
			$this->db->select('*');
			$this->db->from('tbl_cuti');
			$this->db->where('dibaca BETWEEN 1 AND', 2);
			$this->db->order_by('tbl_cuti.nip', 'asc');
			$data['surat_cuti'] = $this->db->get();
			if ($aksi == 'd') {
				$p = "surat_cuti_detail";
				$data['query'] = $this->db->get_where("tbl_cuti", array('id_cuti' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP";
				if (isset($_POST['btnajuan'])) {
					$dibaca   	 	= htmlentities(strip_tags($this->input->post('dibaca')));
					$ajuan   	 	= htmlentities(strip_tags($this->input->post('tgl_disetujui')));
					$catatan   	 	= htmlentities(strip_tags($this->input->post('catatan')));
					$data2 = array(
						'dibaca' => $dibaca,
						'tgl_disetujui' => $ajuan,
						'catatan' => $catatan
					);
					$this->Mcrud->update_cuti(array('id_cuti' => "$id"), $data2);
					redirect('users/surat_cuti');
				}
			} else {
				$p = "surat_cuti";
				$data['judul_web'] 	  = "Man3-APP";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/pemrosesan/$p", $data);
			$this->load->view('users/footer');
		} else {
			redirect('404_content');
		}
	}

	public function kepsek($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		$data['user'] = $this->Mcrud->get_users_by_un($ceks);

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d H:i:s');

		if (!isset($ceks)) {
			redirect('web/login');
		} elseif ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'kepsek') {
			$this->db->order_by('tbl_sm.tgl_sm', 'desc');
			$data['kepsek'] = $this->db->get_where("tbl_sm", array('dibaca' => '2'));
			if ($aksi == 'd') {
				$p = "kepsek_detail";
				$data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
				if (isset($_POST['btndisposisi'])) {
					$pegawai   	 		= htmlentities(strip_tags($this->input->post('pegawai')));
					$disposisi 			= implode("<br>", $_POST['disposisi']);
					$catatan   	 		= htmlentities(strip_tags($this->input->post('catatan')));
					$data2 = array(
						'dibaca' 	=> '3',
						'pegawai' 	=> $pegawai,
						'disposisi' => $disposisi,
						'catatan' 	=> $catatan,
						'tgl_disposisi' => $tgl
					);
					$this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);
					redirect('users/kepsek');
				}
				if (isset($_POST['btnpriview'])) {
					$file = 'lampiran/surat_masuk/004_13_10_21_asdf_SM_1634094537.pdf';
					$filename = 'lampiran/surat_masuk/004_13_10_21_asdf_SM_1634094537.pdf';

					header('Content-type: application/pdf');
					header('Content-Disposition: inline; filename="' . $filename . '"');
					header('Content-Transfer-Encoding: binary');
					header('Accept-Ranges: bytes');

					@readfile($file);
				}
			} else {
				$p = "kepsek";
				$data['judul_web'] 	  = "Man3-APP ";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/pemrosesan/$p", $data);
			$this->load->view('users/footer');
		} else {
			redirect('404_content');
		}
	}

	public function sm($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user'] = $this->Mcrud->get_users_by_un($ceks);
			$this->db->order_by('tbl_sm.no_sm', 'asc');
			$data['sm'] = $this->db->get("tbl_sm");
			if ($aksi == 't') {
				$p = "sm_tambah";
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['judul_web'] 	= "Man3-APP ";
			} elseif ($aksi == 'd') {
				$p = "sm_detail";
				$data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
				if (isset($_POST['btndisposisi'])) {
					$data2 = array(
						'disposisi' => '1'
					);
					$this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);
					redirect('users/sm');
				}
				if (isset($_POST['btndisposisi0'])) {
					$data2 = array(
						'disposisi' => '0'
					);
					$this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);
					redirect('users/sm');
				}
			} elseif ($aksi == 'e') {
				$p = "sm_edit";
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id", 'id_user' => "$id_user"))->row();
				$data['judul_web'] 	  = "Man3-APP ";

				if ($data['query']->level != '') {
					$data2 = array(
						'id_user'		   	 => ''
					);
					$this->Mcrud->update_sm(array('id_sm' => "$id"), $data2);
				} else {
					$query_h = $this->db->get_where("tbl_lampiran", array('token_lampiran' => $data['query']->token_lampiran));
					foreach ($query_h->result() as $baris) {
						unlink('./lampiran/surat_masuk/' . $baris->nama_berkas);
					}
					$this->Mcrud->delete_lampiran($data['query']->token_lampiran);
					$this->Mcrud->delete_sm_by_id($id);
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>BERHASIL!</strong> DATA BERHASIL DIHAPUS.
						</div>'
					);
				}

				redirect('users/sm');
			} elseif ($aksi == 'c') {
				$p = "sm_cetak";
				if ($data['user']->row()->level != 'admin') {
					redirect('404_content');
				}
				$data['sql'] = $this->db->get_where("tbl_sm", array('id_sm' => "$id"))->row();
				$data['judul_web'] = "Man3-APP";
			} else {
				$p = "sm";
				$data['judul_web'] 	  = "Man3-APP ";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/pemrosesan/$p", $data);
			$this->load->view('users/footer');
			if (isset($_POST['no_surat'])) {
				$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
				$namafile 		= date('Y-m-d') . '_' . 'SM_' . time() . $_FILES['userfiles']['name'];
				$this->upload->initialize(array(
					"file_name" => $namafile,
					"upload_path"   => "./lampiran/surat_masuk/",
					"allowed_types" => "*" //jpg|jpeg|png|gif|bmp|pdf,
				));

				if ($this->upload->do_upload('userfile')) {
					$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
					$no_surat   	 	= htmlentities(strip_tags($this->input->post('no_surat')));
					$tgl_sm   		= htmlentities(strip_tags($this->input->post('tgl_sm')));
					$tgl_awal  		= htmlentities(strip_tags($this->input->post('tgl_awal')));
					$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));
					$asal_instansi   	= htmlentities(strip_tags($this->input->post('asal_instansi')));
					$perihal   	 	= htmlentities(strip_tags($this->input->post('perihal')));
					$lampiran   	= htmlentities(strip_tags($this->input->post('lampiran')));
					date_default_timezone_set('Asia/Jakarta');
					$waktu = date('Y-m-d H:m:s');
					$tgl 	 = date('d-m-Y');

					$token = md5("$id_user-$no_surat-$waktu");

					$cek_status = $this->db->get_where('tbl_sm', "token_lampiran='$token'")->num_rows();
					if ($cek_status == 0) {
						$data = array(
							'no_sm'			=> $ns,
							'tgl_ns'		   	=> $tgl,
							'no_surat'		  	=> $no_surat,
							'tgl_awal'			=> $tgl_awal,
							'tgl_akhir'			=> $tgl_akhir,
							'asal_instansi'		   	=> $asal_instansi,
							'perihal'		   	=> $perihal,
							'token_lampiran' 	=> $token,
							'id_user'			=> $id_user,
							'tgl_sm'			=> $tgl_sm,
							'lampiran'			=> $lampiran,
							'dibaca'			=> '1'
						);
						$this->Mcrud->save_sm($data);
					}

					$nama   = $this->upload->data('file_name');
					$ukuran = $this->upload->data('file_size');

					$this->db->insert('tbl_lampiran', array('nama_berkas' => $nama, 'ukuran' => $ukuran, 'token_lampiran' => "$token"));
				}
			}
			if (isset($_POST['btnupdate'])) {
				$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
				$no_surat   	 	= htmlentities(strip_tags($this->input->post('no_surat')));
				$tgl_sm   		= htmlentities(strip_tags($this->input->post('tgl_sm')));
				$tgl_awal  		= htmlentities(strip_tags($this->input->post('tgl_awal')));
				$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));
				$asal_instansi   	= htmlentities(strip_tags($this->input->post('asal_instansi')));
				$perihal   	 	= htmlentities(strip_tags($this->input->post('perihal')));
				$lampiran   	= htmlentities(strip_tags($this->input->post('lampiran')));

				$data = array(
					'no_sm'			=> $ns,
					'no_surat'		  	=> $no_surat,
					'tgl_awal'			=> $tgl_awal,
					'tgl_akhir'			=> $tgl_akhir,
					'asal_instansi'		   	=> $asal_instansi,
					'perihal'		   	=> $perihal,
					'tgl_sm'			=> $tgl_sm,
					'lampiran'			=> $lampiran,

					'dibaca'			=> '1'
				);
				$this->Mcrud->update_sm(array('id_sm' => $id), $data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						</button>
						<strong>BERHASIL!</strong> DATA BERHASIL DIPERBAHARUI.
					</div>'
				);
				redirect('users/sm');
			}
		}
	}

	public function sk($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			$this->db->join('tbl_user', 'tbl_sk.id_user=tbl_user.id_user');
			$this->db->order_by('tbl_sk.no_sk', 'asc');
			$data['sk'] 		  = $this->db->get("tbl_sk");
			$this->db->order_by('tbl_pegawai.nama_pegawai', 'ASC');
			$data['pegawai'] 		  = $this->db->get_where("tbl_pegawai", "id_user='$id_user'")->result();
			if ($aksi == 't') {
				$p = "sk_tambah";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$data['judul_web'] 	  = "Man3-APP ";
			} elseif ($aksi == 'd') {
				$p = "sk_detail";
				$this->db->join('tbl_user', 'tbl_sk.id_user=tbl_user.id_user');
				$data['query'] = $this->db->get_where("tbl_sk", array('id_sk' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP ";
				if (isset($_POST['btndisposisi'])) {
					$data2 = array(
						'disposisi' => $_POST['pegawai']
					);
					$this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);

					redirect('users/sk');
				}
				if (isset($_POST['btndisposisi0'])) {
					$data2 = array(
						'disposisi' => '0'
					);
					$this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);

					redirect('users/sk');
				}
				if (isset($_POST['btnperingatan'])) {
					$data2 = array(
						'peringatan' => '1'
					);
					$this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);
					redirect('users/sk');
				}

				if (isset($_POST['btnperingatan0'])) {
					$data2 = array(
						'peringatan' => '0'
					);
					$this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);

					redirect('users/sk');
				}
			} elseif ($aksi == 'e') {
				$p = "sk_edit";
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}

				$data['query'] = $this->db->get_where("tbl_sk", array('id_sk' => "$id", 'id_user' => "$id_user"))->row();
				$data['judul_web'] 	  = "Man3-APP ";

				if ($data['query']->id_user == '') {
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Gagal!</strong> Maaf, Anda tidak berhak mengubah data surat keluar.
						</div>'
					);

					redirect('users/sk');
				}
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_sk", array('id_sk' => "$id", 'id_user' => "$id_user"))->row();
				$data['judul_web'] 	  = "Man3-APP ";

				if ($data['query']->level != '') {
					$data2 = array(
						'id_user'		   	 => ''
					);
					$this->Mcrud->update_sk(array('id_sk' => "$id"), $data2);
				} else {
					$query_h = $this->db->get_where("tbl_lampiran", array('token_lampiran' => $data['query']->token_lampiran));
					foreach ($query_h->result() as $baris) {
						unlink("./lampiran/surat_keluar/" . $baris->nama_berkas);
					}

					$this->Mcrud->delete_lampiran($data['query']->token_lampiran);
					$this->Mcrud->delete_sk_by_id($id);
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Surat keluar berhasil dihapus.
						</div>'
					);
				}

				redirect('users/sk');
			} else {
				$p = "sk";
				$data['judul_web'] 	  = "Man3-APP ";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/pemrosesan/$p", $data);
			$this->load->view('users/footer');
			if (isset($_POST['no_surat'])) {
				$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
				$namafile 		= date('Y-m-d') . '_' . 'SK_' . time() . $_FILES['userfiles']['name'];
				$this->upload->initialize(array(
					"file_name" => $namafile,
					"upload_path"   => "./lampiran/surat_keluar/",
					"allowed_types" => "*" //jpg|jpeg|png|gif|bmp
				));

				if ($this->upload->do_upload('userfile')) {
					$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
					$tgl_kegiatan   = htmlentities(strip_tags($this->input->post('tgl_kegiatan')));
					$no_surat   	= htmlentities(strip_tags($this->input->post('no_surat')));
					$tgl_sk   	 	= htmlentities(strip_tags($this->input->post('tgl_sk')));
					$perihal   	 	= htmlentities(strip_tags($this->input->post('perihal')));
					$asal_instansi   	 	= htmlentities(strip_tags($this->input->post('asal_instansi')));
					date_default_timezone_set('Asia/Jakarta');
					$waktu = date('Y-m-d H:m:s');
					$tgl 	 = date('d-m-Y');
					$token = md5("$id_user-$ns-$waktu");
					$cek_status = $this->db->get_where('tbl_sk', "token_lampiran='$token'")->num_rows();
					if ($cek_status == 0) {
						$data = array(
							'no_sk'			 	=> $ns,
							'tgl_kegiatan'	   	 	=> $tgl_kegiatan,
							'no_surat'			 	=> $no_surat,
							'tgl_sk'	 		 	=> $tgl_sk,
							'perihal'		   	 	=> $perihal,
							'asal_instansi'		   	 	=> $asal_instansi,
							'token_lampiran' 		=> $token,
							'id_user'				=> $id_user,
						);
						$this->Mcrud->save_sk($data);
					}
					$nama   = $this->upload->data('file_name');
					$ukuran = $this->upload->data('file_size');
					$this->db->insert('tbl_lampiran', array('nama_berkas' => $nama, 'ukuran' => $ukuran, 'token_lampiran' => "$token"));
				}
			}
			if (isset($_POST['btnupdate'])) {
				$tgl_kegiatan   = htmlentities(strip_tags($this->input->post('tgl_kegiatan')));
				$no_surat   	= htmlentities(strip_tags($this->input->post('no_surat')));
				$tgl_sk   	 	= htmlentities(strip_tags($this->input->post('tgl_sk')));
				$perihal   	 	= htmlentities(strip_tags($this->input->post('perihal')));
				$asal_instansi   	 	= htmlentities(strip_tags($this->input->post('asal_instansi')));
				$data = array(
					'no_surat'			 	=> $no_surat,
					'tgl_sk'	 		 	=> $tgl_sk,
					'perihal'		   	 	=> $perihal,
					'asal_instansi'		   	 	=> $tanasal_instansi,
					'bagian'				=> $bagian,
				);
				$this->Mcrud->update_sk(array('id_sk' => $id), $data);

				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Surat Keluar berhasil diupdate.
					</div>'
				);
				redirect('users/sk');
			}
		}
	}

	public function lap_sk()
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['judul_web']			= "Man3-APP ";

			$this->load->view('users/header', $data);
			$this->load->view('users/laporan/lap_sk', $data);
			$this->load->view('users/footer');

			if (isset($_POST['data_lap'])) {
				$tgl1 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
				$tgl2 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

				redirect("users/data_sk/$tgl1/$tgl2");
			}
		}
	}

	public function data_sk($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {

			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_sk WHERE (tgl_sk BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sk DESC");

				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "Man3-APP ";
				$this->load->view('users/header', $data);
				$this->load->view('users/laporan/data_sk', $data);
				$this->load->view('users/footer', $data);

				if (isset($_POST['btncetak'])) {
					redirect("users/cetak_sk/$tgl1/$tgl2");
				}
			} else {
				redirect('404_content');
			}
		}
	}
	public function cetak_sk($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_sk WHERE (tgl_sk BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sk DESC");
				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['users']  	 = $this->Mcrud->get_users();
				$data['judul_web'] = "Man3-APP ";
				$data['t_awal'] = $tgl1;
				$data['t_akhir'] = $tgl2;
				$this->load->view('users/laporan/cetak_sk', $data);
			} else {
				redirect('404_content');
			}
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////
	public function lap_cuti()
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['judul_web']			= "Man3-APP ";

			$this->load->view('users/header', $data);
			$this->load->view('users/laporan/lap_cuti', $data);
			$this->load->view('users/footer');

			if (isset($_POST['data_lap'])) {
				$tgl1 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
				$tgl2 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

				redirect("users/data_cuti/$tgl1/$tgl2");
			}
		}
	}

	public function data_cuti($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {

			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_cuti WHERE (tgl_cuti BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_cuti DESC");

				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "Man3-APP ";
				$this->load->view('users/header', $data);
				$this->load->view('users/laporan/data_cuti', $data);
				$this->load->view('users/footer', $data);

				if (isset($_POST['btncetak'])) {
					redirect("users/cetak_cuti/$tgl1/$tgl2");
				}
			} else {
				redirect('404_content');
			}
		}
	}

	public function cetak_cuti($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_cuti WHERE (tgl_cuti BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_cuti DESC");
				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "Man3-APP ";
				$data['t_awal'] = $tgl1;
				$data['t_akhir'] = $tgl2;
				$this->load->view('users/laporan/cetak_cuti', $data);
			} else {
				redirect('404_content');
			}
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////
	public function lap_sm()
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['judul_web']			= "Man3-APP ";

			$this->load->view('users/header', $data);
			$this->load->view('users/laporan/lap_sm', $data);
			$this->load->view('users/footer');

			if (isset($_POST['data_lap'])) {
				$tgl1 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
				$tgl2 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

				redirect("users/data_sm/$tgl1/$tgl2");
			}
		}
	}

	public function data_sm($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {

			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_sm WHERE (tgl_sm BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm DESC");

				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "Man3-APP ";
				$this->load->view('users/header', $data);
				$this->load->view('users/laporan/data_sm', $data);
				$this->load->view('users/footer', $data);

				if (isset($_POST['btncetak'])) {
					redirect("users/cetak_sm/$tgl1/$tgl2");
				}
			} else {
				redirect('404_content');
			}
		}
	}

	public function cetak_sm($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_sm WHERE (tgl_sm BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm DESC");
				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "Man3-APP ";
				$data['t_awal'] = $tgl1;
				$data['t_akhir'] = $tgl2;
				$this->load->view('users/laporan/cetak_sm', $data);
			} else {
				redirect('404_content');
			}
		}
	}
	// public function lap_sk()
	// {
	// 	$ceks 	 = $this->session->userdata('AhmadFauzan');
	// 	$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
	// 	if (!isset($ceks)) {
	// 		redirect('web/login');
	// 	} else {
	// 		$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
	// 		$data['judul_web']			= "Laporan Surat Keluar | MAN3-APP";

	// 		$this->load->view('users/header', $data);
	// 		$this->load->view('users/laporan/lap_sk', $data);
	// 		$this->load->view('users/footer');

	// 		if (isset($_POST['data_lap'])) {
	// 			$tgl1 	= htmlentities(strip_tags($this->input->post('tgl1')));
	// 			$tgl2 	= htmlentities(strip_tags($this->input->post('tgl2')));
	// 			redirect("users/data_sk/$tgl1/$tgl2");
	// 		}
	// 	}
	// }

	// public function data_sk($tgl1 = '', $tgl2 = '')
	// {
	// 	$ceks 	 = $this->session->userdata('AhmadFauzan');
	// 	$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
	// 	if (!isset($ceks)) {
	// 		redirect('web/login');
	// 	} else {

	// 		if ($tgl1 != '' and $tgl2 != '') {
	// 			$data['sql'] = $this->db->query("SELECT * FROM tbl_sk WHERE (no_sk BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sk DESC");
	// 			$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
	// 			$data['judul_web'] = "Data Laporan Surat Keluar | MAN3-APP";
	// 			$this->load->view('users/header', $data);
	// 			$this->load->view('users/laporan/data_sk', $data);
	// 			$this->load->view('users/footer', $data);

	// 			if (isset($_POST['btncetak'])) {
	// 				redirect("users/cetak_sk/$tgl1/$tgl2");
	// 			}
	// 		} else {
	// 			redirect('404_content');
	// 		}
	// 	}
	// }
	// public function cetak_sk($tgl1 = '', $tgl2 = '')
	// {
	// 	$ceks 	 = $this->session->userdata('AhmadFauzan');
	// 	$id_user = $this->session->userdata('zan');
	// 	$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
	// 	if (!isset($ceks)) {
	// 		redirect('web/login');
	// 	} else {
	// 		if ($tgl1 != '' and $tgl2 != '') {
	// 			$data['sql'] = $this->db->query("SELECT * FROM tbl_sk WHERE (no_sk BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sk ASC");
	// 			$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
	// 			$data['users']  	 = $this->Mcrud->get_users();
	// 			$data['judul_web'] = "Data Laporan Surat Keluar | MAN3-APP";
	// 			$data['t_awal'] = $this->db->get_where("tbl_sk", array('no_sk' => "$tgl1"))->row();
	// 			$data['t_akhir'] = $this->db->get_where("tbl_sk", array('no_sk' => "$tgl2"))->row();
	// 			$this->load->view('users/laporan/cetak_sk', $data);
	// 		} else {
	// 			redirect('404_content');
	// 		}
	// 	}
	// }

	// public function lap_sm()
	// {
	// 	$ceks 	 = $this->session->userdata('AhmadFauzan');
	// 	$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
	// 	if (!isset($ceks)) {
	// 		redirect('web/login');
	// 	} else {
	// 		$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
	// 		$data['judul_web']			= "Laporan Surat Masuk | MAN3-APP";

	// 		$this->load->view('users/header', $data);
	// 		$this->load->view('users/laporan/lap_sm', $data);
	// 		$this->load->view('users/footer');

	// 		if (isset($_POST['data_lap'])) {
	// 			$tgl1 	= htmlentities(strip_tags($this->input->post('tgl1')));
	// 			$tgl2 	= htmlentities(strip_tags($this->input->post('tgl2')));
	// 			redirect("users/data_sm/$tgl1/$tgl2");
	// 		}
	// 	}
	// }

	// public function data_sm($tgl1 = '', $tgl2 = '')
	// {
	// 	$ceks 	 = $this->session->userdata('AhmadFauzan');
	// 	$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
	// 	if (!isset($ceks)) {
	// 		redirect('web/login');
	// 	} else {

	// 		if ($tgl1 != '' and $tgl2 != '') {
	// 			$data['sql'] = $this->db->query("SELECT * FROM tbl_sm WHERE (no_surat BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm DESC");
	// 			$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
	// 			$data['judul_web'] = "Data Laporan Surat Masuk | MAN3-APP";
	// 			$this->load->view('users/header', $data);
	// 			$this->load->view('users/laporan/data_sm', $data);
	// 			$this->load->view('users/footer', $data);

	// 			if (isset($_POST['btncetak'])) {
	// 				redirect("users/cetak_sm/$tgl1/$tgl2");
	// 			}
	// 		} else {
	// 			redirect('404_content');
	// 		}
	// 	}
	// }

	// public function cetak_sm($tgl1 = '', $tgl2 = '')
	// {
	// 	$ceks 	 = $this->session->userdata('AhmadFauzan');
	// 	$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
	// 	if (!isset($ceks)) {
	// 		redirect('web/login');
	// 	} else {
	// 		if ($tgl1 != '' and $tgl2 != '') {
	// 			$data['sql'] = $this->db->query("SELECT * FROM tbl_sm WHERE (no_surat BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm ASC");
	// 			$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
	// 			$data['judul_web'] = "Data Laporan Surat Masuk | MAN3-APP";
	// 			$data['t_awal'] = $this->db->get_where("tbl_sm", array('no_surat' => "$tgl1"))->row();
	// 			$data['t_akhir'] = $this->db->get_where("tbl_sm", array('no_surat' => "$tgl2"))->row();
	// 			$this->load->view('users/laporan/cetak_sm', $data);
	// 		} else {
	// 			redirect('404_content');
	// 		}
	// 	}
	// }

	public function md()
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			$p = "md";
			$data['md'] 		  = $this->db->get_where("tbl_madrasah")->row(1);
			$data['judul_web'] 	  = "Man3-APP ";
		}
		$this->load->view('users/header', $data);
		$this->load->view("users/pengaturan/$p", $data);
		$this->load->view('users/footer');

		if (isset($_POST['btnupdate'])) {
			$id			 		= htmlentities(strip_tags($this->input->post('id')));
			$nm_kepala	 		= htmlentities(strip_tags($this->input->post('nm_kepala')));
			$nip	 			= htmlentities(strip_tags($this->input->post('nip')));
			$jabatan	 		= htmlentities(strip_tags($this->input->post('jabatan')));
			$madrasah			= htmlentities(strip_tags($this->input->post('madrasah')));
			$npsn	 	  		= htmlentities(strip_tags($this->input->post('npsn')));
			$nsm	 	  		= htmlentities(strip_tags($this->input->post('nsm')));
			$alamat	 	  		= htmlentities(strip_tags($this->input->post('alamat')));
			$tapel	 	  		= htmlentities(strip_tags($this->input->post('tapel')));
			$kop_1	 	  		= htmlentities(strip_tags($this->input->post('kop_1')));
			$kop_2	 	  		= htmlentities(strip_tags($this->input->post('kop_2')));
			$telp	 	  		= htmlentities(strip_tags($this->input->post('telp')));

			$data = array(
				'nm_kepala'			=> $nm_kepala,
				'nip'				=> $nip,
				'jabatan'			=> $jabatan,
				'madrasah'			=> $madrasah,
				'npsn'	 			=> $npsn,
				'nsm'	 			=> $nsm,
				'alamat'	 		=> $alamat,
				'tapel'	 			=> $tapel,
				'kop_1'	 			=> $kop_1,
				'kop_2'	 			=> $kop_2,
				'telp'	 			=> $telp,
			);
			$this->Mcrud->update_md(array('id' => $id), $data);
			$this->session->set_flashdata(
				'msg',
				'
				<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						</button>
						<strong>Sukses!</strong> Data Madrasah berhasil disimpan.
				</div>'
			);
			redirect('users/md');
		}
	}



	public function tugas($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user'] = $this->Mcrud->get_users_by_un($ceks);
			$this->db->order_by('tbl_tugas.id_sm', 'desc');
			$this->db->join('tbl_pegawai', 'tbl_tugas.id_pegawai=tbl_pegawai.id_pegawai');
			$data['tugas'] = $this->db->get("tbl_tugas");
			if ($aksi == 't') {
				$p = "tugas_tambah";
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['judul_web'] 	= "MAN3-APP";
			} elseif ($aksi == 'd') {
				$p = "tugas_detail";
				$this->db->join('tbl_pegawai', 'tbl_tugas.id_pegawai=tbl_pegawai.id_pegawai');
				$data['querytugas'] = $this->db->get_where("tbl_tugas", array('id_tugas' => "$id"))->row();
				$data['judul_web'] 	  = "MAN3-APP";
			} elseif ($aksi == 'e') {
				$p = "tugas_edit";
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$this->db->join('tbl_pegawai', 'tbl_tugas.id_pegawai=tbl_pegawai.id_pegawai');
				$data['query'] = $this->db->get_where("tbl_tugas", array('id_tugas' => "$id"))->row();
				$data['judul_web'] 	  = "MAN3-APP";
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_tugas", array('id_tugas' => "$id", 'id_user' => "$id_user"))->row();
				$data['judul_web'] 	  = "MAN3-APP";

				if ($data['query']->level != '') {
					$data2 = array(
						'id_user'		   	 => ''
					);
					$this->Mcrud->update_tugas(array('id_tugas' => "$id"), $data2);
				} else {
					$query_h = $this->db->get_where("tbl_lampiran", array('token_lampiran' => $data['query']->token_lampiran));
					foreach ($query_h->result() as $baris) {
						unlink('./lampiran/piagam/' . $baris->nama_berkas);
					}
					$this->Mcrud->delete_lampiran($data['query']->token_lampiran);
					$this->Mcrud->delete_tugas_by_id($id);
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>BERHASIL!</strong> DATA BERHASIL DIHAPUS.
						</div>'
					);
				}
				redirect('users/tugas');
			} else {
				$p = "tugas";
				$data['judul_web'] 	  = "MAN3-APP";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/tugas/$p", $data);
			$this->load->view('users/footer');

			if (isset($_POST['id_sm'])) {
				$sm   	 		= htmlentities(strip_tags($this->input->post('id_sm')));
				$pegawai   	 	= htmlentities(strip_tags($this->input->post('id_pegawai')));
				$namafile 		= date('Ymd') . '_' . 'PG_' . time() . $_FILES['userfiles']['name'];
				$this->upload->initialize(array(
					"file_name" => $namafile,
					"upload_path"   => "./lampiran/piagam/",
					"allowed_types" => "*" //jpg|jpeg|png|gif|bmp|pdf,
				));

				if ($this->upload->do_upload('userfile')) {
					$id_sm   	 	= htmlentities(strip_tags($this->input->post('id_sm')));
					$id_pegawai   	= htmlentities(strip_tags($this->input->post('id_pegawai')));
					$kegiatan	  	= htmlentities(strip_tags($this->input->post('kegiatan')));
					$lokasi  		= htmlentities(strip_tags($this->input->post('lokasi')));
					$tgl_awal   	= htmlentities(strip_tags($this->input->post('tgl_awal')));
					$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));
					date_default_timezone_set('Asia/Jakarta');
					$waktu = date('Y-m-d H:m:s');
					$tgl 	 = date('d-m-Y');
					$tgl1 = new DateTime($tgl_awal);
					$tgl2 = new DateTime($tgl_akhir);
					$selisih = $tgl2->diff($tgl1);
					$token = md5("$id_user-$kegiatan-$waktu");
					$cek_status = $this->db->get_where('tbl_tugas', "token_lampiran='$token'")->num_rows();
					if ($cek_status == 0) {
						$data = array(
							'id_sm'				=> $id_sm,
							'id_pegawai'		   	=> $id_pegawai,
							'kegiatan'		=> $kegiatan,
							'lokasi'			=> $lokasi,
							'tgl_awal'		   	=> $tgl_awal,
							'tgl_akhir'	 		=> $tgl_akhir,
							'lama'		 		=> $selisih->d,
							'token_lampiran' 	=> $token,
							'id_user'		 	=> $id_user,

						);
						$this->Mcrud->save_tugas($data);
					}
					$nama   = $this->upload->data('file_name');
					$ukuran = $this->upload->data('file_size');
					$this->db->insert('tbl_lampiran', array('nama_berkas' => $nama, 'ukuran' => $ukuran, 'token_lampiran' => "$token"));
				}
			}


			if (isset($_POST['btnupdate'])) {
				$id_sm   	 	= htmlentities(strip_tags($this->input->post('id_sm')));
				$id_pegawai   	= htmlentities(strip_tags($this->input->post('id_pegawai')));
				$kegiatan   	= htmlentities(strip_tags($this->input->post('kegiatan')));
				$lokasi  		= htmlentities(strip_tags($this->input->post('lokasi')));
				$tgl_awal   	= htmlentities(strip_tags($this->input->post('tgl_awal')));
				$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));
				$tgl1 = new DateTime($tgl_awal);
				$tgl2 = new DateTime($tgl_akhir);
				$selisih = $tgl2->diff($tgl1);

				$data = array(
					'id_sm'				=> $id_sm,
					'id_pegawai'		   	=> $id_pegawai,
					'kegiatan'		=> $kegiatan,
					'lokasi'			=> $lokasi,
					'tgl_awal'		   	=> $tgl_awal,
					'tgl_akhir'	 		=> $tgl_akhir,
					'lama'		 		=> $selisih->d,
					'id_user'		 	=> $id_user,
				);
				$this->Mcrud->update_tugas(array('id_tugas' => $id), $data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						</button>
						<strong>BERHASIL!</strong> DATA BERHASIL DIPERBAHARUI.
					</div>'
				);
				redirect('users/tugas');
			}
		}
	}

	public function lap_tugas()
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['judul_web']			= "MAN3-APP";

			$this->load->view('users/header', $data);
			$this->load->view('users/laporan/lap_tugas', $data);
			$this->load->view('users/footer');

			if (isset($_POST['data_lap'])) {
				$tgl1 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
				$tgl2 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

				redirect("users/data_tugas/$tgl1/$tgl2");
			}
		}
	}

	public function data_tugas($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_tugas INNER JOIN tbl_pegawai on tbl_tugas.id_pegawai=tbl_pegawai.id_pegawai WHERE (tgl_awal BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm DESC");
				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "MAN3-APP";
				$this->load->view('users/header', $data);
				$this->load->view('users/laporan/data_tugas', $data);
				$this->load->view('users/footer', $data);

				if (isset($_POST['btncetak'])) {
					redirect("users/cetak_tugas/$tgl1/$tgl2");
				}
			} else {
				redirect('404_content');
			}
		}
	}

	public function cetak_tugas($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_tugas INNER JOIN tbl_pegawai on tbl_tugas.id_pegawai=tbl_pegawai.id_pegawai WHERE (tgl_awal BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_sm DESC");
				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "MAN3-APP";
				$data['t_awal'] = $tgl1;
				$data['t_akhir'] = $tgl2;
				$this->load->view('users/laporan/cetak_tugas', $data);
			} else {
				redirect('404_content');
			}
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////
	public function cuti($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user'] = $this->Mcrud->get_users_by_un($ceks);
			$this->db->order_by('tbl_cuti.nip', 'asc');
			$data['cuti'] = $this->db->get("tbl_cuti");
			if ($aksi == 't') {
				$p = "cuti_tambah";
				if ($data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['judul_web'] 	= "Man3-APP";
			} elseif ($aksi == 'd') {
				$p = "cuti_detail";
				$data['query'] = $this->db->get_where("tbl_cuti", array('id_cuti' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP";
				if (isset($_POST['btndisposisi'])) {
					$data2 = array(
						'disposisi' => '1'
					);
					$this->Mcrud->update_cuti(array('id_cuti' => "$id"), $data2);
					redirect('users/cuti');
				}
				if (isset($_POST['btndisposisi0'])) {
					$data2 = array(
						'disposisi' => '0'
					);
					$this->Mcrud->update_cuti(array('id_cuti' => "$id"), $data2);
					redirect('users/cuti');
				}
			} elseif ($aksi == 'e') {
				$p = "cuti_edit";
				if ($data['user']->row()->level == '' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_cuti", array('id_cuti' => "$id"))->row();
				$data['judul_web'] 	  = "Man3-APP";
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == '' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_cuti", array('id_cuti' => "$id", 'id_user' => "$id_user"))->row();
				$data['judul_web'] 	  = "Man3-APP";

				if ($data['query']->level != '') {
					$data2 = array(
						'id_user'		   	 => ''
					);
					$this->Mcrud->update_cuti(array('id_cuti' => "$id"), $data2);
				} else {
					$query_h = $this->db->get_where("tbl_lampiran", array('token_lampiran' => $data['query']->token_lampiran));
					foreach ($query_h->result() as $baris) {
						unlink('./lampiran/surat_masuk/' . $baris->nama_berkas);
					}
					$this->Mcrud->delete_lampiran($data['query']->token_lampiran);
					$this->Mcrud->delete_cuti_by_id($id);
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>BERHASIL!</strong> DATA BERHASIL DIHAPUS.
						</div>'
					);
				}

				redirect('users/cuti/t');
			} elseif ($aksi == 'c') {
				$p = "cuti_cetak";
				if ($data['user']->row()->level != 'admin') {
					redirect('404_content');
				}
				$data['sql'] = $this->db->get_where("tbl_cuti", array('id_cuti' => "$id"))->row();
				$data['judul_web'] = "Cetak Surat Disposisi";
			} else {
				$p = "cuti";
				$data['judul_web'] 	  = "Man3-APP";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/cuti/$p", $data);
			$this->load->view('users/footer');
			if (isset($_POST['tgl_cuti'])) {
				$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
				$namafile 		= date('Y-m-d') . '_' . 'CUTI_' . time() . $_FILES['userfiles']['name'];
				$this->upload->initialize(array(
					"file_name" => $namafile,
					"upload_path"   => "./lampiran/surat_masuk/",
					"allowed_types" => "*" //jpg|jpeg|png|gif|bmp|pdf,
				));

				if ($this->upload->do_upload('userfile')) {
					$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
					$tgl_cuti   	= htmlentities(strip_tags($this->input->post('tgl_cuti')));
					$tgl_disetujui  	= htmlentities(strip_tags($this->input->post('tgl_disetujui')));
					$nama_pegawai   	= htmlentities(strip_tags($this->input->post('nama_pegawai')));
					$alasan   	 	= htmlentities(strip_tags($this->input->post('alasan')));
					$tgl_awal   	= htmlentities(strip_tags($this->input->post('tgl_awal')));
					$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));

					date_default_timezone_set('Asia/Jakarta');
					$waktu = date('Y-m-d H:m:s');
					$tgl 	 = date('d-m-Y');
					$tgl1 = new DateTime($tgl_awal);
					$tgl2 = new DateTime($tgl_akhir);
					$selisih = $tgl2->diff($tgl1);
					$token = md5("$id_user-$tgl_cuti-$waktu");

					$cek_status = $this->db->get_where('tbl_cuti', "token_lampiran='$token'")->num_rows();
					if ($cek_status == 0) {
						$data = array(
							'nip'			=> $ns,
							'tgl_ns'		   	=> $tgl,
							'tgl_disetujui'			=> $tgl_disetujui,
							'nama_pegawai'		   	=> $nama_pegawai,
							'alasan'		   	=> $alasan,
							'token_lampiran' 	=> $token,
							'id_user'			=> $id_user,
							'tgl_cuti'			=> $tgl_cuti,
							'tgl_awal'		   	=> $tgl_awal,
							'tgl_akhir'		   	=> $tgl_akhir,
							'lama'		 		=> $selisih->d,
							'dibaca'			=> '1'
						);
						$this->Mcrud->save_cuti($data);
					}

					$nama   = $this->upload->data('file_name');
					$ukuran = $this->upload->data('file_size');

					$this->db->insert('tbl_lampiran', array('nama_berkas' => $nama, 'ukuran' => $ukuran, 'token_lampiran' => "$token"));
				}
			}
			if (isset($_POST['btnupdate'])) {
				$ns   	 		= htmlentities(strip_tags($this->input->post('ns')));
				$tgl_cuti  		= htmlentities(strip_tags($this->input->post('tgl_cuti')));
				$tgl_disetujui  	= htmlentities(strip_tags($this->input->post('tgl_disetujui')));
				$nama_pegawai   	= htmlentities(strip_tags($this->input->post('nama_pegawai')));
				$alasan   	 	= htmlentities(strip_tags($this->input->post('alasan')));
				$tgl_awal   	= htmlentities(strip_tags($this->input->post('tgl_awal')));
				$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));
				$tgl1 = new DateTime($tgl_awal);
				$tgl2 = new DateTime($tgl_akhir);
				$selisih = $tgl2->diff($tgl1);

				$data = array(
					'nip'			=> $ns,
					'tgl_disetujui'	   	=> $tgl_disetujui,
					'nama_pegawai'		   	=> $nama_pegawai,
					'alasan'		   	=> $alasan,
					'tgl_cuti'			=> $tgl_cuti,
					'tgl_awal'		   	=> $tgl_awal,
					'tgl_akhir'	 		=> $tgl_akhir,
					'lama'		 		=> $selisih->d,
					'dibaca'			=> '1'
				);
				$this->Mcrud->update_cuti(array('id_cuti' => $id), $data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						</button>
						<strong>BERHASIL!</strong> DATA BERHASIL DIPERBAHARUI.
					</div>'
				);
				redirect('users/cuti/t');
			}
		}
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////
	public function izin($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user'] = $this->Mcrud->get_users_by_un($ceks);
			$this->db->order_by('tbl_izin.id_siswa', 'desc');
			$this->db->join('tbl_siswa', 'tbl_izin.id_siswa=tbl_siswa.id_siswa');
			$data['izin'] = $this->db->get("tbl_izin");
			if ($aksi == 't') {
				$p = "izin_tambah";
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['judul_web'] 	= "MAN3-APP";
			} elseif ($aksi == 'd') {
				$p = "izin_detail";
				$this->db->join('tbl_siswa', 'tbl_izin.id_siswa=tbl_siswa.id_siswa');
				$data['queryizin'] = $this->db->get_where("tbl_izin", array('id_izin' => "$id"))->row();
				$data['judul_web'] 	  = "MAN3-APP";
			} elseif ($aksi == 'e') {
				$p = "izin_edit";
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$this->db->join('tbl_siswa', 'tbl_izin.id_siswa=tbl_siswa.id_siswa');
				$data['query'] = $this->db->get_where("tbl_izin", array('id_izin' => "$id"))->row();
				$data['judul_web'] 	  = "MAN3-APP";
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'user') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_izin", array('id_izin' => "$id", 'id_user' => "$id_user"))->row();
				$data['judul_web'] 	  = "MAN3-APP";

				if ($data['query']->level != '') {
					$data2 = array(
						'id_user'		   	 => ''
					);
					$this->Mcrud->update_izin(array('id_izin' => "$id"), $data2);
				} else {
					$query_h = $this->db->get_where("tbl_lampiran", array('token_lampiran' => $data['query']->token_lampiran));
					foreach ($query_h->result() as $baris) {
						unlink('./lampiran/piagam/' . $baris->nama_berkas);
					}
					$this->Mcrud->delete_lampiran($data['query']->token_lampiran);
					$this->Mcrud->delete_izin_by_id($id);
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>BERHASIL!</strong> DATA BERHASIL DIHAPUS.
						</div>'
					);
				}
				redirect('users/izin');
			} else {
				$p = "izin";
				$data['judul_web'] 	  = "MAN3-APP";
			}
			$this->load->view('users/header', $data);
			$this->load->view("users/izin/$p", $data);
			$this->load->view('users/footer');

			if (isset($_POST['id_siswa'])) {
				$sw   	 		= htmlentities(strip_tags($this->input->post('id_siswa')));
				$siswa 	 	= htmlentities(strip_tags($this->input->post('id_siswa')));
				$namafile 		= date('Ymd') . '_' . 'PG_' . time() . $_FILES['userfiles']['name'];
				$this->upload->initialize(array(
					"file_name" => $namafile,
					"upload_path"   => "./lampiran/piagam/",
					"allowed_types" => "*" //jpg|jpeg|png|gif|bmp|pdf,
				));

				if ($this->upload->do_upload('userfile')) {
					$id_siswa   	= htmlentities(strip_tags($this->input->post('id_siswa')));
					$alasan	  	= htmlentities(strip_tags($this->input->post('alasan')));
					$keterangan 		= htmlentities(strip_tags($this->input->post('keterangan')));
					$tgl_awal   	= htmlentities(strip_tags($this->input->post('tgl_awal')));
					$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));
					date_default_timezone_set('Asia/Jakarta');
					$waktu = date('Y-m-d H:m:s');
					$tgl 	 = date('d-m-Y');
					$tgl1 = new DateTime($tgl_awal);
					$tgl2 = new DateTime($tgl_akhir);
					$selisih = $tgl2->diff($tgl1);
					$token = md5("$id_user-$alasan-$waktu");
					$cek_status = $this->db->get_where('tbl_izin', "token_lampiran='$token'")->num_rows();
					if ($cek_status == 0) {
						$data = array(
							'id_siswa'		   	=> $id_siswa,
							'alasan'		=> $alasan,
							'keterangan'			=> $keterangan,
							'tgl_awal'		   	=> $tgl_awal,
							'tgl_akhir'	 		=> $tgl_akhir,
							'lama'		 		=> $selisih->d,
							'token_lampiran' 	=> $token,
							'id_user'		 	=> $id_user,

						);
						$this->Mcrud->save_izin($data);
					}
					$nama   = $this->upload->data('file_name');
					$ukuran = $this->upload->data('file_size');
					$this->db->insert('tbl_lampiran', array('nama_berkas' => $nama, 'ukuran' => $ukuran, 'token_lampiran' => "$token"));
				}
			}

			if (isset($_POST['btnupdate'])) {
				$id_siswa  	= htmlentities(strip_tags($this->input->post('id_siswa')));
				$alasan   	= htmlentities(strip_tags($this->input->post('alasan')));
				$keterangan  		= htmlentities(strip_tags($this->input->post('keterangan')));
				$tgl_awal   	= htmlentities(strip_tags($this->input->post('tgl_awal')));
				$tgl_akhir   	= htmlentities(strip_tags($this->input->post('tgl_akhir')));
				$tgl1 = new DateTime($tgl_awal);
				$tgl2 = new DateTime($tgl_akhir);
				$selisih = $tgl2->diff($tgl1);

				$data = array(
					'id_siswa'		   	=> $id_siswa,
					'alasan'		=> $alasan,
					'keterangan'			=> $keterangan,
					'tgl_awal'		   	=> $tgl_awal,
					'tgl_akhir'	 		=> $tgl_akhir,
					'lama'		 		=> $selisih->d,
					'id_user'		 	=> $id_user,
				);
				$this->Mcrud->update_izin(array('id_izin' => $id), $data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						</button>
						<strong>BERHASIL!</strong> DATA BERHASIL DIPERBAHARUI.
					</div>'
				);
				redirect('users/izin');
			}
		}
	}

	public function lap_izin()
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['judul_web']			= "MAN3-APP";

			$this->load->view('users/header', $data);
			$this->load->view('users/laporan/lap_izin', $data);
			$this->load->view('users/footer');

			if (isset($_POST['data_lap'])) {
				$tgl1 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl1')))));
				$tgl2 	= date('Y-m-d', strtotime(htmlentities(strip_tags($this->input->post('tgl2')))));

				redirect("users/data_izin/$tgl1/$tgl2");
			}
		}
	}

	public function data_izin($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_izin INNER JOIN tbl_siswa on tbl_izin.id_siswa=tbl_siswa.id_siswa WHERE (tgl_awal BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_izin DESC");
				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "MAN3-APP";
				$this->load->view('users/header', $data);
				$this->load->view('users/laporan/data_izin', $data);
				$this->load->view('users/footer', $data);

				if (isset($_POST['btncetak'])) {
					redirect("users/cetak_izin/$tgl1/$tgl2");
				}
			} else {
				redirect('404_content');
			}
		}
	}

	public function cetak_izin($tgl1 = '', $tgl2 = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			if ($tgl1 != '' and $tgl2 != '') {
				$data['sql'] = $this->db->query("SELECT * FROM tbl_izin INNER JOIN tbl_siswa on tbl_izin.id_siswa=tbl_siswa.id_siswa WHERE (tgl_awal BETWEEN '$tgl1' AND '$tgl2') ORDER BY id_izin DESC");
				$data['user']  		 = $this->Mcrud->get_users_by_un($ceks);
				$data['judul_web'] = "MAN3-APP";
				$data['t_awal'] = $tgl1;
				$data['t_akhir'] = $tgl2;
				$this->load->view('users/laporan/cetak_izin', $data);
			} else {
				redirect('404_content');
			}
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////

	public function ska($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('AhmadFauzan');
		$id_user = $this->session->userdata('zan');
		$data['md'] = $this->db->get_where("tbl_madrasah")->row(1);
		if (!isset($ceks)) {
			redirect('web/login');
		} else {
			$data['user'] = $this->Mcrud->get_users_by_un($ceks);
			$this->db->join('tbl_user', 'tbl_ska.id_user=tbl_user.id_user');
			$this->db->order_by('tbl_ska.nomor_ska', 'asc');
			$this->db->join('tbl_siswa', 'tbl_ska.id_siswa=tbl_siswa.id');
			$data['ska'] 		  = $this->db->get("tbl_ska");
			if ($aksi == 't') {
				$p = "ska_tambah";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$data['judul_web'] 	  = "MAN3-APP";
			} elseif ($aksi == 'd') {
				$p = "ska_detail";
				$data['query'] = $this->db->get_where("tbl_ska", array('id_ska' => "$id"))->row();
				$data['judul_web'] 	  = "MAN3-APP";
			} elseif ($aksi == 'e') {
				$p = "ska_edit";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$this->db->join('tbl_siswa', 'tbl_ska.id_siswa=tbl_siswa.id');
				$data['query'] = $this->db->get_where("tbl_ska", array('id_ska' => "$id"))->row();
				$data['judul_web'] 	  = "MAN3-APP";
			} elseif ($aksi == 'h') {
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$data['query'] = $this->db->get_where("tbl_ska", array('id_ska' => "$id"))->row();
				$data['judul_web'] 	  = "MAN3-APP";
				$this->Mcrud->delete_ska_by_id($id);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Surat Keterangan Aktif berhasil dihapus.
					</div>'
				);
				redirect('users/ska');
			} elseif ($aksi == 'c') {
				$p = "ska_cetak";
				if ($data['user']->row()->level == 's_admin') {
					redirect('404_content');
				}
				$this->db->join('tbl_siswa', 'tbl_ska.id_siswa=tbl_siswa.id');
				$data['sql'] = $this->db->get_where("tbl_ska", array('id_ska' => "$id"))->row();
				$data['judul_web'] = "Surat_Keterangan";
			} else {
				$p = "ska";
				$data['judul_web'] 	  = "MAN3-APP";
			}

			$this->load->view('users/header', $data);
			$this->load->view("users/ska/$p", $data);
			$this->load->view('users/footer');

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d H:i:s');

			if (isset($_POST['btnsimpan'])) {
				$id_siswa   	= htmlentities(strip_tags($this->input->post('id_siswa')));
				$nomor_ska   	= htmlentities(strip_tags($this->input->post('nomor_ska')));
				$no_ska   	 	= htmlentities(strip_tags($this->input->post('no_ska')));
				$jenis_ska   	= htmlentities(strip_tags($this->input->post('jenis_ska')));
				$keterangan   	= htmlentities(strip_tags($this->input->post('keterangan')));
				$tgl_ska   	 	= htmlentities(strip_tags($this->input->post('tgl_ska')));
				$ttd   	 		= htmlentities(strip_tags($this->input->post('ttd')));

				$data = array(
					'id_siswa' 			=> $id_siswa,
					'nomor_ska'			=> $nomor_ska,
					'no_ska'			=> $no_ska,
					'jenis_ska'			=> $jenis_ska,
					'keterangan'		=> $keterangan,
					'tgl_ska'			=> $tgl_ska,
					'id_user'			=> $id_user,
					'date'				=> $tgl,
					'ttd'				=> $ttd,

				);
				$this->Mcrud->save_ska($data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Surat Keterangan Aktif berhasil ditambahkan.
					</div>'
				);

				redirect('users/ska/');
			}

			if (isset($_POST['btnupdate'])) {
				$id_siswa   	= htmlentities(strip_tags($this->input->post('id_siswa')));
				$nomor_ska   	= htmlentities(strip_tags($this->input->post('nomor_ska')));
				$no_ska   	 	= htmlentities(strip_tags($this->input->post('no_ska')));
				$jenis_ska   	= htmlentities(strip_tags($this->input->post('jenis_ska')));
				$keterangan   	= htmlentities(strip_tags($this->input->post('keterangan')));
				$tgl_ska   	 	= htmlentities(strip_tags($this->input->post('tgl_ska')));
				$ttd   	 		= htmlentities(strip_tags($this->input->post('ttd')));
				$data = array(
					'id_siswa' 			=> $id_siswa,
					'nomor_ska'			=> $nomor_ska,
					'no_ska'			=> $no_ska,
					'jenis_ska'			=> $jenis_ska,
					'keterangan'		=> $keterangan,
					'tgl_ska'			=> $tgl_ska,
					'id_user'			=> $id_user,
					'date'				=> $tgl,
					'ttd'				=> $ttd,
				);
				$this->Mcrud->update_ska(array('id_ska' => $id), $data);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Surat Keterangan Aktif berhasil diupdate.
					</div>'
				);
				redirect('users/ska');
			}
		}
	}
}
