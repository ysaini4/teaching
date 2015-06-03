<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
//		Disp::disp_table(Sql::getArray("show tables"));
//		Disp::disp_table(Sql::getArray("show tables"));
//		print_r(Fun::smilymsg(55));

		$this->load->view('Template/top',array("inp"=>array()));
		$this->load->view('Template/navbar');
		$this->load->view('index');
		$this->load->view('Template/footer');
		$this->load->view('Template/bottom');
	}
    
    public function joinus()
	{
		$this->load->view('Template/top',array("inp"=>array()));
		$this->load->view('Template/navbar');
		$this->load->view('joinus');
		$this->load->view('Template/footer');
		$this->load->view('Template/bottom');
	}

	public function login()
	{
		$this->load->view('Template/top',array("inp"=>array()));
		$this->load->view('Template/navbar');
		$this->load->view('login');
		$this->load->view('Template/footer');
		$this->load->view('Template/bottom');
	}
    
    public function signup()
	{
		$this->load->view('Template/top',array("inp"=>array()));
		$this->load->view('Template/navbar');
		$this->load->view('signup');
		$this->load->view('Template/footer');
		$this->load->view('Template/bottom');
	}
    
    public function newsearch()
	{
		$this->load->view('Template/top',array("inp"=>array("css"=>array("jquery/jRating.jquery.css","css/materialize.min.css","css/custom-stylesheet.css","css/jquery.bxslider.css"))));
		$this->load->view('Template/navbar');
		$this->load->view('newsearch');
		$this->load->view('Template/footer');
		$this->load->view('Template/bottom');
	}
    

    public function myaccount()
	{
		$this->load->view('Template/top',array("inp"=>array("css"=>array("jquery/jRating.jquery.css","css/materialize.min.css","css/custom-stylesheet.css","css/jquery.bxslider.css"))));
		$this->load->view('Template/navbar');
		$this->load->view('myaccount');
		$this->load->view('Template/footer');
		$this->load->view('Template/bottom');
	}   

	public function mohit($tid=122,$saini="Mohit"){
///		show_404();
//		echo $this->input->get("timepass");
		echo session_id();
		$this->load->view('mohit',array("tid"=>$tid,'saini'=>$saini));
	}

public function set_news()
{
	$this->load->helper('url');

	$slug = url_title($this->input->post('title'), 'dash', TRUE);

	$data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text')
	);

	return $this->db->insert('news', $data);
}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('index');

		}
		else
		{
			$this->news_model->set_news();
			$this->load->view('mohit');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */