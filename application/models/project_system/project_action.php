<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );

/** 
* 类说明 项目信息管理<br>
* 作者名字 Sec<br>
* 创建日期  2015-7-23<br>
*/
class Project_action extends CI_Model
{
    
    private $url;
    public function __construct() {
        $this->url = my_server_url () . "ProjectAction!";
        $this->load->model ( 'tool/get_html' );
        $this->load->model ( 'tool/json_helper' );
    }
    
    /** 
    * 函数功能说明 添加一个项目<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： project对象<br>
    * @return <br>
    */
    public function addProject($project) {
        $jstr = $this->json_helper->encode ( $project );

        $data = array (
            "jstr" => $jstr
        );

        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addProject", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 删除一个项目<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： id<br>
    * @return <br>
    */
    public function deleteProject($id) {
        $data = "id=" . $id;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "deleteProject", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 修改一个项目信息<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： project对象<br>
    * @return <br>
    */
    public function updateProject($project) {
        $jstr = $this->$json_helper->encode ( $project );

        $data = array(
            "jstr" => $jstr
        );
        $html = $this->get_html->doFileGetContentsget_html2( $this->url . "updateProject", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 查询所有项目<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： <br>
    * @return <br>
    */
    public function getAllProject() {
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "getAllProject" );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }
    
    /** 
    * 函数功能说明 根据名字查询项目<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： name<br>
    * @return <br>
    */
    public function getProjectByName($name) {
        $data = "name=" . $name;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getProjectByName", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * @函数功能说明：根据项目id获取项目信息
     * @创建人：panda 2015-7-24
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function getProjectById( $id ){
        $data = "id=" . $id;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getProjectById", $data );
        $obj = $this->json_helper->decode($html);
        return $obj;
    }
}

?>