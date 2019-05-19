<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Level_model');
        $this->load->model('Status_model');
    }
    
    public function index()
    {
        $user           = $this->User_model->getUser()->result_array();
        $level          = $this->Level_model->getLevel()->result_array();
        $status         = $this->Status_model->getStatus()->result_array();
        $jumlahuser     = $this->User_model->getUser()->num_rows();
        $useraktif      = $this->User_model->userAktif()->num_rows();
        $usertidakaktif = $this->User_model->userTidakAktif()->num_rows();
        $data = array(
            'user'              => $user,
            'level'             => $level,
            'status'            => $status,
            'jumlahuser'        => $jumlahuser,
            'useraktif'         => $useraktif,
            'usertidakaktif'    => $usertidakaktif,
        );
        $this->load->view('Admin/User/index', $data);
    }

    public function detail($kode)
    {
        $user       = $this->User_model->detailUser($kode)->row_array();
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'user'      => $user,
            'level'     => $level,
            'status'    => $status,
        );
        $this->load->view('Admin/User/detail', $data);
    }

    public function tambah()
    {
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'level'         => $level,
            'status'        => $status,
        );
        $this->load->view('Admin/User/tambah', $data);
    }

    public function p_tambah()
    {
        // VALIDASI
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|valid_emails|is_unique[user.email]');
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'trim|required|xss_clean|matches[password]');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
        $this->form_validation->set_message('is_unique', 'Maaf! <b>%s</b> Telah Digunakan. Harap Menggunakan Akun lain.');
        $this->form_validation->set_message('valid_email', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('valid_emails', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('matches', 'Maaf! <b>%s</b> Tidak Sama.');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('Admin/User/tambah');
        }
        else
        {
            $this->User_model->createUser();
            $this->session->set_flashdata('sukses', 'Berhasil Melakukan Registrasi!');
            redirect(base_url('user'));
        }
    }

    public function daftar($kode)
    {
        $user       = $this->User_model->detailUser($kode)->row_array();
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'user'          => $user,
            'level'         => $level,
            'status'        => $status,
        );
        $this->load->view('Admin/User/daftar', $data);
    }

    public function p_daftar()
    {
        // VALIDASI
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|valid_emails');
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', 'trim|required|xss_clean|matches[password]');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
        $this->form_validation->set_message('valid_email', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('valid_emails', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('matches', 'Maaf! <b>%s</b> Tidak Sama.');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.');

        $kode = $this->input->post('user_kode');

        if($this->form_validation->run() == FALSE)
        {
            $user       = $this->User_model->detailUser($kode)->row_array();
            $level      = $this->Level_model->getLevel()->result_array();
            $status     = $this->Status_model->getStatus()->result_array();
            $data = array(
                'user'          => $user,
                'level'         => $level,
                'status'        => $status,
            );
            $this->load->view('Admin/User/daftar', $data);
        }
        else
        {
            $this->User_model->createUserRelawan();
            $this->session->set_flashdata('sukses', 'Berhasil Melakukan Registrasi!');
            redirect(base_url('user'));
        }
    }

    public function edit($kode)
    {
        $user       = $this->User_model->detailUser($kode)->row_array();
        $level      = $this->Level_model->getLevel()->result_array();
        $status     = $this->Status_model->getStatus()->result_array();
        $data = array(
            'user'      => $user,
            'level'     => $level,
            'status'    => $status,
        );
        $this->load->view('Admin/User/edit', $data);
    }

    public function p_edit()
    {
        // VALIDASI
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|valid_emails|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|min_length[10]|max_length[13]|xss_clean');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('j_kel', 'Jenis Kelamin', 'trim|required|xss_clean');
        $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');

        // PESAN VALIDASI
        $this->form_validation->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
        $this->form_validation->set_message('valid_email', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('valid_emails', 'Maaf! <b>%s</b> Tidak Valid');
        $this->form_validation->set_message('numeric', 'Maaf! <b>%s</b> Harus Berformat Angka');
        $this->form_validation->set_message('min_length', 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter');
        $this->form_validation->set_message('max_length', 'Maaf! <b>%s</b> Maksimal <b>%s</b> Karakter');

        $kode = $this->input->post('user_kode');

        if($this->form_validation->run() == FALSE)
        {
            $user       = $this->User_model->detailUser($kode)->row_array();
            $level      = $this->Level_model->getLevel()->result_array();
            $status     = $this->Status_model->getStatus()->result_array();
            $data = array(
                'user'      => $user,
                'level'     => $level,
                'status'    => $status,
            );
            $this->load->view('Admin/User/edit', $data);
        }
        else
        {
            $this->User_model->updateUser($kode);
            $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
            redirect(base_url('user'));
        }
    }

    public function hapus($kode)
    {
        $this->User_model->deleteUser($kode);
        $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
        redirect(base_url('user'));
    }

    public function relawan()
    {
        $relawan            = $this->User_model->newRelawan()->result_array();
        $level              = $this->Level_model->getLevel()->result_array();
        $status             = $this->Status_model->getStatus()->result_array();
        $data = array(
            'relawan'       => $relawan,
            'level'         => $level,
            'status'        => $status,
        );
        $this->load->view('Admin/User/relawan', $data);
    }

    public function Ubah_status($status,$kode)
    {
        if($status=='1')
        {
            $password=$this->send_email_aktivasi($kode);
            if($password!=FALSE)
            {
                $data=array(
                    'password'=>password_hash($password, PASSWORD_BCRYPT),
                    'id_status'=>'1'
                );
                if($this->User_model->Update($kode,$data))
                {
                    $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
                    redirect(base_url('user'));
                }
                else
                {
                    $this->session->set_flashdata('gagal', 'Gagal Mengubah Data');
                    redirect(base_url('user'));
                }
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Gagal Mengirim Email');
                redirect(base_url('user'));
            }
        }
        elseif($status=='2')
        {
            $word='Di NonAktifkan';
            $password=$this->send_email_nonaktif($kode);
            if($password!=FALSE)
            {
                $data=array(
                    'id_status'=>'2'
                );
                if($this->User_model->Update($kode,$data))
                {
                    $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
                    redirect(base_url('user'));
                }
                else
                {
                    $this->session->set_flashdata('gagal', 'Gagal Mengubah Data');
                    redirect(base_url('user'));
                }
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Gagal Mengirim Email');
                redirect(base_url('user'));
            }
        }
        elseif($status=='3')
        {
            $word='Di BANNED';
            $password=$this->send_email_nonaktif($kode);
            if($password!=FALSE)
            {
                $data=array(
                    'id_status'=>'3'
                );
                if($this->User_model->Update($kode,$data))
                {
                    $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
                    redirect(base_url('user'));
                }
                else
                {
                    $this->session->set_flashdata('gagal', 'Gagal Mengubah Data');
                    redirect(base_url('user'));
                }
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Gagal Mengirim Email');
                redirect(base_url('user'));
            }
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Error update status');
            redirect(base_url('User'));
        }
    }

    public function send_email_aktivasi($kode)
    {
        date_default_timezone_set("Asia/Jakarta");
        $password = substr(number_format(time() * rand(),0,'',''),0,6);
        $user=$this->User_model->rowUser($kode)->row_array();

        $ci = get_instance();
		$ci->load->library('email');

		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "testingemailmahasiswa@gmail.com";
		$config['smtp_pass'] = "akusayangkamu123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
				
		$ci->email->initialize($config);

		$isi = '<table>';
		$isi .= '<tr><td><h4>Pemberitahuan Akun Sosial Bencana!</h4></td></tr>';
		$isi .= '<tr><td><p>Halo <b>' . $user['email'] . '</b> terima kasih telah melakukan pendaftaran di Sosial Bencana. Kami beritahukan kepada Anda bahwa akun anda telah di AKTIFKAN dan dapat digunakan.</p></td></tr>';
		$isi .= '<tr><td>Password akun anda adalah <b>'. $password .'</b></td></tr>';
		$isi .= '<tr><td><p>Terima Kasih, Admin Sosial Bencana</p></td></tr>';
        $isi .= '</table>';

		$ci->email->from('noreply@sosialbencana.com', 'Sosial Bencana');
		$ci->email->to($user['email']);
		$ci->email->subject('AKTIFASI AKUN Sosial Bencana');
        $ci->email->message($isi);
        if($this->email->send())
        {
            return $password;
        }
        else
        {
            return FALSE;
        }

    }

    public function send_email_nonaktif($kode)
    {
        date_default_timezone_set("Asia/Jakarta");
        $user=$this->User_model->rowUser($kode)->row_array();

        $ci = get_instance();
		$ci->load->library('email');

		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "testingemailmahasiswa@gmail.com";
		$config['smtp_pass'] = "akusayangkamu123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
				
		$ci->email->initialize($config);

		$isi = '<table>';
		$isi .= '<tr><td><h4>Pemberitahuan Akun Sosial Bencana!</h4></td></tr>';
		$isi .= '<tr><td><p>Halo <b>' . $user['email'] . '</b> terima kasih telah melakukan pendaftaran di Sosial Bencana. Kami beritahukan kepada Anda bahwa akun anda telah Di NONAKTIFKAN / DI BANNED.</p></td></tr>';
		$isi .= '<tr><td>HARAP MENGHUBUNGI ADMIN</b></td></tr>';
		$isi .= '<tr><td><p>Terima Kasih, Admin Sosial Bencana</p></td></tr>';
        $isi .= '</table>';

		$ci->email->from('noreply@sosialbencana.com', 'Sosial Bencana');
		$ci->email->to($user['email']);
		$ci->email->subject('PEMBERITAHUAN SOSIAL BENCANA');
        $ci->email->message($isi);
        if($this->email->send())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }
}