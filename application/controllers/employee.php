<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 员工的controller文件
 * @author panda <https://github.com/pandakill>
 */
class Employee extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct ();
        $this->load->helper ( 'url' );
        $this->load->helper ( 'my_config' );
        $this->load->library ( 'session' );
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
        $data['emps'] = $this->getEmployees();
        //将权限传回前端
        $data['power'] = $this->session->userdata ( 'employee_authority' );

        $category = "employee_manage";

        $this->power_helper->loadHeader( $category );
        $this->load->view('employee_manage',$data);
        $this->load->view('footer');
    }

    private function getEmployees()
    {
        return $this->employee_action->getEmployees();
    }

    private function getDepartments()
    {
        return $this->employee_action->getDepartments();
    }

    /**
     * 函数功能说明 新增员工<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-24<br>
     */
    public function addEmployee()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }
        
        $emp = new stdClass();

        $emp->id = $this->input->post("id",true);
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
        $emp->job = $this->input->post("job",true);
        $emp->qq = $this->input->post("qq",true);
        $emp->weixin = $this->input->post("weixin",true);

        $status = $this->input->post("status",true);
        
        if('实习' == $status)
        {    
            $emp->status = 0;
        }
        else if('正式' == $status)
        {
            $emp->status = 1;
        }
        else if('离职' == $status)
        {
            $emp->status = 2;
        }
        
        $authority = $this->input->post("authority",true);
        $emp->authority = $authority[0];
        $emp->password = $this->input->post("password",true);
        $emp->department = $this->input->post("department",true);
        
        $bool = $this->employee_action->addEmployee($emp);

        echo '<script>alert("添加'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();
    }

    /**
     * 函数功能说明 更新员工信息<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-24<br>
     */
    public function updateEmployee()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }

        $emp = new stdClass();

        $emp->id = $this->input->post("id",true);
        $emp = $this->employee_action->getEmployeeByID($emp->id);
        
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
        $emp->job = $this->input->post("job",true);
        $emp->qq = $this->input->post("qq",true);
        $emp->weixin = $this->input->post("weixin",true);

        $status = $this->input->post("status",true);

        if('实习' == $status)
        {    
            $emp->status = 0;
        }
        else if('正式' == $status)
        {
            $emp->status = 1;
        }
        else if('离职' == $status)
        {
            $emp->status = 2;
        }

        $authority = $this->input->post("authority",true);
        $emp->authority = $authority[0];
        $emp->department = $this->input->post("department",true);
        
        $bool = $this->employee_action->updateEmployee($emp);

        echo '<script>alert("保存'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();
    }


}
/* End of file employee.php */
/* Location: ./application/controllers/employee.php */