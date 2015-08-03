<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mission extends CI_Controller {

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
	
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');  
        $this->load->helper('my_config'); 
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model ( 'tool/power_helper' );
        $this->load->model ( 'project_system/mission_action' );
    } 

    public function index()
	{
        $this->load->view('login');
	}

    //打开任务中心,显示正在做,将要做,已完成的任务列表  panda 2015-7-24
    public function my_task()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else{

            //获取员工id
            $work_id = $this->session->userdata ( 'employee_workId' );

            $data['getMissionsWillDos'] = $this->mission_action->getMissionsWillDo($work_id);
            $data['getMissionsIsDoings'] = $this->mission_action->getMissionsIsDoing($work_id);
            $data['getMissionsFinisheds'] = $this->mission_action->getMissionsFinished($work_id);

            $category = "project_mytask";

            $this->power_helper->loadHeader( $category );
            $this->load->view('my_tasks',$data);
            $this->load->view('footer');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */