<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clocking extends CI_Controller {

	/**
	 * 考勤controller文件
     * @author panda <https://github.com/pandakill>
	 */
	
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');  
        $this->load->helper('my_config'); 
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('clocking_system/clocking_action');
        $this->load->model ( 'tool/power_helper' );
    } 

    /**
     * @函数功能说明：如果url重定向直接访问clocking,则返回登录页面
     * @创建人：panda 2015-7-23
     */
    public function index()
    {
        $this->load->view('login');
    }

    /**
     * @函数功能说明：签到,返回success--打卡成功；返回fail--打卡失败
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function clocking_in()
    {
        if(!$this->power_helper->checkLogin($this))
        {
         return;
     }else{

            //获取员工id
        $workID = $this->session->userdata ( 'employee_workId' );
        $comment = $this->input->post( 'comment', TRUE );
        $action = $this->input->post( 'action', TRUE );

            //新建一个考勤对象
        $attendance = new stdClass();

        $attendance->workId = $workID;
        $attendance->action = $action;
        $attendance->time = date ( 'Y-m-d H:i:s' );;
        $attendance->comment = $comment;

        $flag = $this->clocking_action->addAttendance( $attendance );

        if( "true" == $flag ){
            echo "success";
        }else{
            echo "fail";
        }
    }   
}

    /**
     * @函数功能说明：读取个人考勤信息
     * @创建人：panda 2015-7-24
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function personal_clocking()
    {
        if(!$this->power_helper->checkLogin($this))
        {
         return;
     }else{

            //获取员工id
        $workID = $this->session->userdata ( 'employee_workId' );

        $date = "-";

        $data['this_page'] = "个人考勤统计";

        $data['this_name'] = $this->session->userdata ( 'employee_name' );
        $data['clockings'] = $this->clocking_action->getClockingsByWorkIDAndDate( $workID, $date );

        $category = "personal_clocking";

        $this->power_helper->loadHeader( $category );
        $this->load->view( 'personal_clocking', $data );
        $this->load->view('footer');
    }
}

    /**
     * @函数功能说明：读取所有考勤信息
     * @创建人：panda 2015-7-24
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function all_clocking()
    {
        if(!$this->power_helper->checkLogin($this))
        {
         return;
     }else{

            //获取员工id
        $workID = $this->session->userdata ( 'employee_workId' );

        $date = "-";

        $data['this_page'] = "所有考勤统计";

        $data['clockings'] = $this->clocking_action->getClockings();

        $category = "all_clocking";

        $this->power_helper->loadHeader( $category );
        $this->load->view( 'personal_clocking', $data );
        $this->load->view('footer');
    }
}

}

/* End of file clocking.php */
/* Location: ./application/controllers/clocking.php */