<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
     * 人才你储备管理controller文件
     * @author panda <https://github.com/pandakill>
    */
class Resume extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');  
        $this->load->helper('my_config'); 
        $this->load->library('session');
        $this->load->library('form_validation');
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

    /**
     * @函数功能说明：打开view视图,将数据输出方法
     * @创建人：panda 2015-7-23
     */
    private function display()
    {
        $data['departments'] = $this->getDepartments();
        $data['resumes'] = $this->getResumes();
        $category = "resume_manage";

        $this->power_helper->loadHeader( $category );
        $this->load->view('resume_manage',$data);
        $this->load->view('footer');
    }

    private function getResumes()
    {
        return $this->employee_action->getResumes();
    }
    private function getDepartments()
    {
        return $this->employee_action->getDepartments();
    }

    public function addResume()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }
        
        $res = new stdClass();

        $res->id = $this->input->post("id",true);
        $res->name = $this->input->post("name",true);

        $sex = $this->input->post("sex",true);
        $res->sex = $sex[0];
        $res->birthday = $this->input->post("birthday",true);
        $res->politicalStatus = $this->input->post("political_status",true);
        $res->nativePlace = $this->input->post("native_place",true);
        $res->education = $this->input->post("education",true);
        $res->school = $this->input->post("school",true);
        $res->tel = $this->input->post("tel",true);
        $res->email = $this->input->post("email",true);
        $res->address = $this->input->post("address",true);
        $res->image = $this->input->post("image",true);
        $res->habbit = $this->input->post("habbit",true);
        $res->identification = $this->input->post("identification",true);
        $res->job = $this->input->post("job",true);
        $res->experience = $this->input->post("experience",true);
        $res->certificate = $this->input->post("certificate",true);
        $res->type = $this->input->post("type",true);
        $res->status = $this->input->post("status",true);

        $bool = $this->employee_action->addResume($res);

        echo '<script>alert("添加'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();

    }

    public function updateResumeStatus()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }

        $id = $this->input->post("interview_id",true);
        $status = $this->input->post("status",true);
        $bool = $this->employee_action->updateResumeStatus($id,$status[0],0);
        echo '<script>alert("修改'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();
    }

    /**
     * @函数功能说明：将人才从简历中录取为员工
     * @创建人：panda 2015-7-23
     */
    public function updateResumeStatus2Department()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }

        $id = $this->input->post("hire_id",true);
        $department = $this->input->post("department",true);
        $bool = $this->employee_action->updateResumeStatus($id,2, $department);
        echo '<script>alert("修改'.((true == $bool)?'成功':'失败').'");</script>';
        $this->display();
    }

}

/* End of file resume.php */
/* Location: ./application/controllers/resume.php */