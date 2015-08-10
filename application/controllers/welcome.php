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
	
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');  
        $this->load->helper('my_config'); 
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('message_system/message_action');
        $this->load->model('clocking_system/clocking_action');
        $this->load->model('employee_system/employee_action');
        $this->load->model ( 'tool/power_helper' );
    } 

    /**
     * @函数功能说明：网站绑定欢迎页,如果无登录,则跳转至登陆页面,否则进入主页
     * @创建人：panda 2015-7-23
     */
    public function index()
	{

        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else{

            //获取员工id
            $work_id = $this->session->userdata ( 'employee_workId' );
            
            //读取该登陆用户的所有消息
            $state = 2;
            $data['messages'] = $this->message_action->getMessagesByWorkIDAndStatus( $work_id, $state );
            $data['message_count'] = count($data['messages']);

            //获取登陆员工今天的考勤,判断该用户是否已经签到\签退\请假
            //如果已经请假,则不显示任何按钮;如果已经签到,则只显示签退按钮;如果仍未有动作,则显示签到或者请假按钮
            $today = date( "Y-m-d" );
            $today_clocking = $this->clocking_action->getClockingsByWorkIDAndDate( $work_id, $today);
            if ( null != $today_clocking ) {
                foreach ($today_clocking as $clocking ) {
                    if( $clocking->action == 0 || $clocking->action == 3 ){
                        $data['have_come'] = true;
                    }else if( $clocking->action == 1 || $clocking->action == 4 ){
                        $data['have_off'] = true;
                    }else if( $clocking->action == 2 ){
                        $data['have_leave'] = true;
                    }
                }
            }

            //获取所有的考勤列表,考勤列表包括员工id和员工姓名、头像
            $data['clockings'] = $this->clocking_action->getClockings();

            //将考勤列表分类
            foreach ( $data['clockings'] as $clocking ) {
                switch ( $clocking->action ) {
                    case '0':
                        $data['clocking_in'][] = $clocking;
                        break;
                    case '2':
                        $data['clocking_in'][] = $clocking;
                        break;
                    case '3':
                        $data['clocking_in'][] = $clocking;
                        break;
                    case '1':
                        $data['clocking_out'][] = $clocking;
                        break;
                    case '4':
                        $data['clocking_out'][] = $clocking;
                        break;
                    default:
                        break;
                }
            }

            //获取所有员工列表,并获取员工数目
            $data['employees'] = $this->employee_action->getEmployees();
            $data['employees_count'] = count( $data['employees'] );

            $category = "index";

            $this->power_helper->loadHeader( $category );
            $this->load->view( 'index', $data );
            $this->load->view('footer');
        }
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */