<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No fileect script access allowed' );
/**
 * 20150723 1150
 * 作者：panda
 */
class power_helper extends CI_Model
{
	public function __construct()
	{
		parent::__construct ();
		
        $this->load->helper ( 'my_config' );
		$this->load->library ( 'session' );
		$this->load->model ( 'tool/json_helper' );
		$this->load->library ( 'input' );
        $this->load->helper ( 'file' );

	}     

    /**
     * 检验是否非法登陆操作
     * 
     * @return boolean:false为非法登陆操作;true为正常登陆操作
     */
    public function checkLogin($controller)
    {
        $id = $this->session->userdata ( 'employee_workId' );
        $logined_seviral = $this->session->userdata ( 'employee_seviral' );
        $logined_token = $this->session->userdata ( 'employee_token' );
        $cookie_obj = $this->json_helper->decode ( $this->input->cookie ( "employee_logined" ) );
        

        if (null == $id || 

        ! ($id == $cookie_obj->employee_workId && 

        $logined_seviral == $cookie_obj->employee_seviral && 

        $logined_token == $cookie_obj->employee_token))
        {
            $controller->load->view('login');
            return false;
        } 
        return true;
    }

    /**
     * 检验是否非法登陆操作,再检查管理员权限
     * @param power 需要的权限
     * @return [boolean] 
     */
    public function checkPower($controller , $power)
    {
        if($this->log_helper->checkLogin($controller))
        {
            $powers = $this->session->userdata ( 'powers' );
            if ((strpos ( $powers, '超级管理员' ) !== false) ||
                 (strpos ( $powers, $power ) !== false))
            {
                return true;
            }
            else
            {
                echo '<script>alert("没有权限!");</script>';
                //重定向浏览器 
                header('Location: http://'.$_SERVER['HTTP_HOST'].my_base_url().'/admin/index');
            }
        }
        return false;
    }

    public function loadHeader( $category )
    {
        $data ['logined'] ['name'] = $this->session->userdata ( 'employee_name' );
        $data ['logined'] ['job'] = $this->session->userdata ( 'employee_job' );
        $data ['logined'] ['power'] = $this->session->userdata ( 'employee_authority' );
        $data ['category'] = $category;
        
        $this->load->view('header',$data);
    }
}
