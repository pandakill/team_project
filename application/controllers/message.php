<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

	/**
	 * 消息的controller文件
	 * @author panda <https://github.com/pandakill>
	 */
	
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');  
        $this->load->helper('my_config'); 
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('message_system/message_action');
        $this->load->model ( 'tool/power_helper' );
    } 

    public function index()
	{
        $this->load->view('login');
	}

    /**
     * @函数功能说明：心跳监测,返回新消息数目
     * @创建人：panda 2015-7-24
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function checkHeart()
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else{

            //获取员工id
            $workID = $this->session->userdata ( 'employee_workId' );
            $state = 0;

            //$new_message_count = $this->message_action->checkHeart( $workID );
            $new_messages = $this->message_action->getMessagesByWorkIDAndStatus( $workID, $state );
            $new_messages_count = count($new_messages);

            //$new = $this->json_helper->decode($new_messages);
            print_r($new_messages);
        }
        
    }

}

/* End of file message.php */
/* Location: ./application/controllers/message.php */