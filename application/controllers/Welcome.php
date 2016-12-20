<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

       // $this->load->helper('url');
	    if (empty($_POST['sid']))
	    {
            $this->load->model('Insert_model');
            $query = $this->Insert_model->view_students();
            $data['Students'] = null;
            if($query)
            {
                $data['Students'] = $query;
            }
            $this->load->view('welcome_message',$data);

        }
        else{
            $data = array(
                "Sid" => $this->input->post('sid'),
                "Sname" => $this->input->post('sname')
            );
            $this->load->model('Insert_model');
            $this->Insert_model->insert_data($data);
        }

	}

	public function insert_all()
    {
        $cnt = $_POST['count'];

        for($i=0; $i<$cnt; $i++)
        {
            $entries[] = array(
                'sid' => $_POST['sid'][$i],
                'sname' => $_POST['sname'][$i],
            );
        }
        $this->db->insert_batch('student', $entries);
        echo json_encode($entries);
    }
}
