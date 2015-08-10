<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mission extends CI_Controller {

	/**
	 * 任务的controller文件
	 * @author panda <https://github.com/pandakill>
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

/* End of file mission.php */
/* Location: ./application/controllers/mission.php */