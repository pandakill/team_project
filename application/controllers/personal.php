<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {

    public function __construct()
    {
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

    public function display()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }

        $id = $this->session->userdata ( 'employee_workId' );

        $emp = new stdClass();
        $emp = $this->employee_action->getEmployeeByWorkID($id);

        $data['emp'] = $emp;

        $category = "info_pinfo";

        $this->power_helper->loadHeader( $category );
        $this->load->view('personal_profile',$data);
        $this->load->view('footer');
    }

    /**
     * 函数功能说明 更新员工信息<br>
     * 作者名字 RO<br>
     * 创建日期 2015-7-24<br>
     */
    public function updateEmployee()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }

        $id = $this->session->userdata ( 'employee_workId' );

        $emp = new stdClass();
        $emp = $this->employee_action->getEmployeeByWorkID($id);

        $emp->name = $this->input->post("name",true);
        $sex = $this->input->post("sex",true);
        $emp->sex = $sex[0];
        $emp->birthday = $this->input->post("birthday",true);
        $emp->politicalStatus = $this->input->post("political_status",true);
        $emp->nativePlace = $this->input->post("native_place",true);
        $education = $this->input->post("education",true);
        $emp->education = $education[0];
        $emp->school = $this->input->post("school",true);
        $emp->tel = $this->input->post("tel",true);
        $emp->email = $this->input->post("email",true);
        $emp->address = $this->input->post("address",true);
        $emp->image = $this->input->post("image",true);
        $emp->habbit = $this->input->post("habbit",true);
        $emp->identification = $this->input->post("identification",true);
        $emp->experience = $this->input->post("experience",true);
        $emp->certificate = $this->input->post("certificate",true);
        $emp->qq = $this->input->post("qq",true);
        $emp->weixin = $this->input->post("weixin",true);

        // var_dump($emp);

        $bool = $this->employee_action->updateEmployee($emp);

        echo '<script>alert("保存'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();
    }

    public function changePassword()
    {
        $password = $this->input->post("password",true);
        $new_password = $this->input->post("new_password",true);
        $confirm_password = $this->input->post("confirm_password",true);

        if($new_password != $confirm_password)
        {
            echo '<script>alert("两次密码不相同");</script>';
            $this->display();
            return ;
        }

        $id = $this->session->userdata ( 'employee_workId' );

        $bool = $this->employee_action->login($id , $password);
        if(0 == $bool)
        {
            echo '<script>alert("原密码错误");</script>';
            $this->display();
            return ;
        }

        $emp = new stdClass();
        $emp = $this->employee_action->getEmployeeByWorkID($id);

        $emp->password = md5($new_password);
        $bool = $this->employee_action->updateEmployee($emp);

        echo '<script>alert("修改'.(true == $bool?'成功':'失败').'");</script>';
        
        $this->display();
    }

}
?>