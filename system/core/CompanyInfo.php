<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
/**
 *
 * @author Roo
 *         客户信息<br>
 *         String company_id:公司ID<br>
 *         String password:密码 <br>
 *         String letter:昵称 <br>
 *         String name:真实名字 <br>
 *         int age:年龄 <br>
 *         String email:<br>
 *         String mobile_phone:手机 <br>
 *         String company:公司 <br>
 *         String office_phone:办公电话 <br>
 *         String com_adress:公司地址 <br>
 *         String login_date:登陆时间 <br>
 *         int lock:屏蔽作用 <br>
 *         int vip:会员等级 <br>
 *         int integral:积分 <br>
 *         int is_del:预删除，默认为0<br>
 */
class CI_CompanyInfo extends CI_Model
{
	public $company_id;
	public $password;
	public $letter;
	public $name;
	public $age;
	public $email;
	public $mobile_phone;
	public $company;
	public $office_phone;
	public $com_address;
	public $login_date;
	public $lock;
	public $vip;
	public $integral;
	public $is_del;
	public function __construct()
	{
		parent::__construct ();
	}
}

?>