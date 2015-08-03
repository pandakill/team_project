<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 20150723
 * 作者：Ro
 */
class employee_login extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct ();
        $this->load->helper ( 'url' );
        $this->load->helper ( 'my_config' );
        $this->load->library ( 'session' );
        $this->load->model ( 'tool/power_helper' );
        $this->load->model ( 'tool/some_tool' );
        $this->load->model ( 'employee_system/employee_action' );
        $this->load->model ( 'tool/log_helper' );
    }

    public function index()
    { 
        $this->load->view('login');
    }

    /**
     * 函数功能说明 判断工号存在性<br>
     * 作者名字 RO<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数：String wrokID 工号<br>
     * @return 如果存在，返回1，否则返回0<br>
     */
    // public function checkWorkID()
    // {
    //     $id = $this->input->post("id",true);
    //     echo $this->employee_action->checkWorkID($id);
    // }

    /**
     * 
     * 函数功能说明 登陆<br>
     * 作者名字 RO<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： String wrokID 工号 <br>
     *      String password 密码 <br>
     * @return i. 判断工号存在性，假如不存在，bool为-1 <br>
     *         ii. 判断工号、密码是否匹配，是进行下一步，否则bool为0 <br>
     *         iii. 判断密码是否为身份证后六位，如果是，bool为2，否则bool为1 <br>
     */
    public function login()
    {
        $id = $this->input->post("id",true);
        $psw = $this->input->post("psw",true);
        $is_login = $this->input->post("is_login",true);

        $flag = false;
        $bool = 0;
        $bool = $this->employee_action->login($id , $psw);
        if(0 < $bool)
        {
            $flag = true;
        }
        

        if($flag)
        {
            // 登陆成功后的动作
            $employee = $this->employee_action->getEmployeeByWorkID($id);

            $employee_logined = array (
                    'employee_workId' => $employee->workId,
                    'employee_name' => $employee->name,
                    'employee_job' => $employee->job,
                    'employee_authority' => $employee->authority,
                    'employee_seviral' => md5 ( rand ( 10000, 999999 ) ),
                    'employee_token' => md5 ( rand ( 10000, 999999 ) ) 
            );
                        
            //如果用户选择记住登陆
            //cookie
            if( $is_login )
            {
                $this->input->set_cookie ( "employee_logined", $this->json_helper->encode ( $employee_logined ), 60 * 60 * 24 * 7  );
            }
            else
            {
                $this->input->set_cookie ( "employee_logined", $this->json_helper->encode ( $employee_logined ), 60 * 60 * 24 );
            }

            //session
            $this->config->set_item ( 'sess_expiration', 60 * 60 * 24 );
            $this->session->set_userdata ( $employee_logined );

            //记录日志
            $this->log_helper->writeLog($employee->name,'login');

            if(2 == $bool)
            {
                $data['id']=$employee->workId;
                $this->load->view('modify_password',$data);  
                return;
            }

            //如果登陆成功,则跳转至首页url  panda修改于2015-7-23 23::02:50
            echo '<script>window.location.href="http://'.my_base_url().'"</script>';
            $this->load->view('footer');
        }
        else
        {
            echo '<script>alert("'.((-1 == $bool)?'帐号':'密码').'错误");</script>';
            $this->load->view('login');
        }
    }

    public function forget_password()
    {
        $this->load->view('forget_password');
    }

    public function change_password($first = 0)
    {
        $id = $this->input->post("id",true);
        $password1 = $this->input->post("password1",true);
        $password2 = $this->input->post("password2",true);

        if($password1 != $password2)
        {
            echo '<script>alert("两次密码不相同");</script>';
            $this->load->view('forget_password');
            return ;
        }

        $employee = $this->employee_action->getEmployeeByWorkID($id);
        if(null == $employee)
        {
            echo '<script>alert("工号不存在");</script>';
            $this->load->view('forget_password');
            return ;
        }

        if(0 == $first)
        {
            $idk = $this->input->post("idk",true);
            if($idk != $employee->identification)
            {
                echo '<script>alert("身份证号不正确");</script>';
                $this->load->view('forget_password');
                return ;
            }
        }

        $employee->password = md5($password1);
        $bool = $this->employee_action->updateEmployee($employee);

        echo '<script>alert("修改'.(true == $bool?'成功':'失败').'");</script>';
        if($bool)
        {
            $this->load->view('login');
            return ;
        }
        else if(0 == $first)
        {
            $this->load->view('forget_password');
        }
        $data['id']=$id;
        $this->load->view('modify_password',$data);  
    }

    public function logout()
    {
        $this->log_helper->writeLog($this->session->userdata ( 'employee_name' ),'logout');

        $this->session->unset_userdata ( 'employee_workId' );
        $this->session->unset_userdata ( 'employee_name' );
        $this->session->unset_userdata ( 'employee_job' );
        $this->session->unset_userdata ( 'employee_authority' );
        $this->session->unset_userdata ( 'employee_seviral' );
        $this->session->unset_userdata ( 'employee_token' );
        
        $this->input->set_cookie ( "employee_logined", null );
        
        $this->load->view('login');
    }

}
?>