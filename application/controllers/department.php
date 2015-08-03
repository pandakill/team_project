<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends CI_Controller {

	
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');  
        $this->load->helper('my_config'); 
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model ( 'tool/some_tool' );
        $this->load->model ( 'employee_system/employee_action' );
        $this->load->model ( 'tool/power_helper' );
        $this->load->model ( 'tool/log_helper' );
    } 

    public function index()
	{
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }
        $this->display();
	}

    private function display()
    {
        $data['departments'] = $this->getDepartments();
        
        $category = "department_manage";

        $this->power_helper->loadHeader( $category );
        $this->load->view('department_manage',$data);
        $this->load->view('footer');
    }

    private function getDepartments()
    {
        return $this->employee_action->getDepartments();
    }

    public function addDepartment()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }

        $dep = new stdClass();
        $dep->name = $this->input->post("modal_department_name",true);
        $bool = $this->employee_action->addDepartment($dep);
        echo '<script>alert("添加'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();
    }

    public function updateDepartment()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }

        $dep = new stdClass();
        $dep->id = $this->input->post("modal_department_id",true);
        $dep->name = $this->input->post("modal_department_name",true);
        $bool = $this->employee_action->updateDepartment($dep);
        echo '<script>alert("修改'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();
    }

    public function deleteDepartment($id)
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }
        $bool = $this->employee_action->deleteDepartmentByID($id);
        echo '删除'.(true == $bool?'成功':'失败');
    }

}
?>