<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
/**
 * @类功能说明：人员信息管理 <br>
 * @公司名称：穗鑫网络技术有限公司 <br>
 * @作者： panda <br>
 * @创建时间： 2015-07-23<br>
 * @类修改者： <br>
 * @修改日期： <br>
 * @修改说明： <br>
 */
class employee_action extends CI_Model
{
    private $url;
    public function __construct()
    {
        $this->url = my_server_url () . "EmployeeAction!";
        $this->load->model ( 'tool/get_html' );
        $this->load->model ( 'tool/json_helper' );
    }

    /**
     * 函数功能说明 判断工号存在性<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数：String wpandakID 工号<br>
     * @return 如果存在，返回1，否则返回0<br>
     */
    public function checkWorkID($workID)
    {
        $data = "workID=" . $workID ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "checkWorkID", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 登陆<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： String wpandakID 工号 <br>
     *      String password 密码 <br>
     * @return i. 判断工号存在性，假如不存在，返回-1 <br>
     *         ii. 判断工号、密码是否匹配，是进行下一步，否则返回0 <br>
     *         iii. 判断密码是否为身份证后六位，如果是，返回2，否则返回1 <br>
     */
    public function login($workID,$password)
    {
        $data = "workID=" . $workID . '&password=' . $password;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "login", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 新增员工<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： EmployeeForm 员工<br>
     * @return boolean<br>
     */
    public function addEmployee($employeeForm)
    {
        $jstr = $this->json_helper->encode ( $employeeForm );
        
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addEmployee", $data );
        return $html;
    }

    /**
     * 
     * 函数功能说明 通过ID获取员工对象<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数：int ID <br>
     * @return EmployeeForm<br>
     */
    public function getEmployeeByID($id)
    {
        $data = "id=" . $id ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getEmployeeByID", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 通过员工ID获取员工对象<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： String workID<br>
     * @return EmployeeForm<br>
     */
    public function getEmployeeByWorkID($workID)
    {
        $data = "workID=" . $workID ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getEmployeeByWorkID", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 通过部门ID获取员工列表<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： int departmentID<br>
     * @return List(EmployeeForm)<br>
     * 
     */
    public function getEmployeesByDepartmentID($departmentID)
    {
        $data = "departmentID=" . $departmentID ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getEmployeesByDepartmentID", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 通过员工的状态获取员工列表<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： int status<br>
     * @return List（EmployeeForm）<br>
     */
    public function getEmployeesByStatus($status)
    {
        $data = "status=" . $status ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getEmployeesByStatus", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 获取所有员工列表<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @return List（EmployeeForm）<br>
     */
    public function getEmployees()
    {
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "getEmployees");
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }
    /**
     * 
     * 函数功能说明 更新员工信息<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数：EmployeeForm <br>
     * @return boolean<br>
     */
    public function updateEmployee($employeeForm)
    {
        $jstr = $this->json_helper->encode ( $employeeForm );
        
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "updateEmployee", $data );
        return $html;
    }

    /**
     * 
     * 函数功能说明 跟新员工状态<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： String workID<br>
     *      int status<br>
     * @return boolean<br>
     */
    public function updateEmployeeStatus($workID,$status)
    {
        $data = "workID=" . $workID . '&status=' . $status;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "updateEmployeeStatus", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 更新员工部门<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： String workID<br>
     *      int departmentID<br>
     * @return boolean<br>
     */
    public function updateEmployeeDepartment($workID,$departmentID)
    {
        $data = "workID=" . $workID . '&departmentID=' . $departmentID;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "updateEmployeeDepartment", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 新增应聘者<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： Resume<br>
     * @return boolean<br>
     */
    public function addResume($resume)
    {
        $jstr = $this->json_helper->encode ( $resume );
        
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addResume", $data );
        return $html;
    }

    /**
     * 
     * 函数功能说明 通过ID获取应聘者<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： int id<br>
     * @return Resume<br>
     */
    public function getResumeByID($id)
    {
        $data = "id=" . $id ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getResumeByID", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 通过状态获取应聘者列表<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： int status<br>
     * @return List（Resume）<br>
     */
    public function getResumesByStatus($status)
    {
        $data = "status=" . $status ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getResumesByStatus", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 获取应聘者列表<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @return List（Resume）<br>
     */
    public function getResumes()
    {
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getResumes");
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 跟新应聘者<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-21<br>
     * 修改日期 2015-7-23<br>
     * 
     * @参数： int id<br>
     *      int status<br>
     *      int department_id<br>
     * @return boolean<br>
     */
    public function updateResumeStatus($id,$status,$department_id)
    {
        $data = "id=" . $id . '&status=' . $status. '&department_id=' . $department_id;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "updateResumeStatus", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 新增部门<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-22<br>
     * 
     * @参数：DepartmentForm <br>
     * @return boolean<br>
     */
    public function addDepartment($departmentForm )
    {
        $jstr = $this->json_helper->encode ( $departmentForm );
        
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addDepartment", $data );
        return $html;
    }

    /**
     * 
     * 函数功能说明 通过部门ID获取部门对象<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-22<br>
     * 
     * @参数： int id<br>
     * @return DepartmentForm<br>
     */
    public function getDepartmentByID($id)
    {
        $data = "id=" . $id ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getDepartmentByID", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 更新部门信息<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-22<br>
     * 
     * @参数： DepartmentForm<br>
     * @return boolean<br>
     */
    public function updateDepartment($departmentForm)
    {
        $jstr = $this->json_helper->encode ( $departmentForm );
        
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "updateDepartment", $data );
        return $html;
    }

    /**
     * 
     * 函数功能说明 删除部门<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-22<br>
     * 
     * @参数： int id 部门ID<br>
     * @return boolean<br>
     */
    public function deleteDepartmentByID($id)
    {
        $data = "id=" . $id ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "deleteDepartmentByID", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * 
     * 函数功能说明 获取所有部门信息<br>
     * 作者名字 panda<br>
     * 创建日期 2015-7-22<br>
     * 
     * @return List<Department><br>
     */
    public function getDepartments()
    {
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getDepartments");
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    public function addMission($workID,$mission)
    {
        $jstr = $this->json_helper->encode ( $mission );
    
        $data = array (
                "workID" => $workID,
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addMission", $data );
        return $html;
    }
}

?>