<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
/** 
* 类说明 任务信息管理<br>
* 作者名字 Sec<br>
* 创建日期  2015-7-23<br>
*/
class Mission_action extends CI_Model
{
    
    private $url;
    public function __construct()
    {
        $this->url = my_server_url () . "MissionAction!";
        $this->load->model ( 'tool/get_html' );
        $this->load->model ( 'tool/json_helper' );
    }

    /** 
    * 函数功能说明 添加节点<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： 编辑者workID, mission对象<br>
    * @return <br>
    */
    public function addMission($workID, $mission) {
        $jstr = $this->json_helper->encode ( $mission );
        $data = array (
            "workID" => $workID,
            "jstr" => $jstr
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addMission", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 删除节点<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： 编辑者workID, missionID, projectID<br>
    * @return <br>
    */
    public function deleteMission($workId, $missionId, $projectId) {
        $data = "workID=" . $workId . "&missionID=" . $missionId . "&projectID=" . $projectId;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "deleteMission", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 更新节点<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： 编辑者workID, mission对象<br>
    * @return <br>
    */
    public function updateMission($workId, $mission) {
        $jstr = $this->json_helper->encode ( $mission );
        $data = array (
            "workID" => $workId,
            "jstr" => $jstr,
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "updateMission", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 获取一个项目中的所有节点<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： projectID<br>
    * @return <br>
    */
    public function getMissionByProjectId($projectId) {
        $data = "projectID=" . $projectId;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "getMissionByProjectId", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }
    
    /** 
    * 函数功能说明 添加依赖关系<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： projectID, fromMissionID, toMissionID, 编辑者workID<br>
    * @return <br>
    */
    public function addDependency($projectID, $fromMissionID, $toMissionID, $workID) {
        $data = "projectID=" . $projectID . "&fromMissionID=" . $fromMissionID . "&toMissionID=" . $toMissionID . "&workID=" . $workID;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "addDependency", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 删除依赖关系<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： projectID, fromMissionID, toMissionID, 编辑者workID<br>
    * @return <br>
    */
    public function deleteDependency($projectID, $fromMissionID, $toMissionID, $workID) {
        $data = "projectID=" . $projectID . "&fromMissionID=" . $fromMissionID . "&toMissionID=" . $toMissionID . "&workID=" . $workID;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "deleteDependency", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 添加评价<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： missionID, projectID, evaluation评价, workID<br>
    * @return <br>
    */
    public function addEvaluation($missionID, $projectID, $evaluation, $workID) {
        $data = "missionID=" . $missionID . "&projectID=" . $projectID . "&evaluation=" . $evaluation . "&workID=" . $workID;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "addEvaluation", $data );
        return $html;
    }

    /** 
    * 函数功能说明 获取现在要做的子任务<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： workId<br>
    * @return <br>
    */
    public function getMissionsWillDo($workID) {
        $data = "workID=".$workID;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "getMissionsWillDo", $data );
        $obj = $this->json_helper->decode( $html );
        return $obj;
    }
    
    /** 
    * 函数功能说明 获取将要做的子任务<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： workId<br>
    * @return <br>
    */
    public function getMissionsIsDoing($workID) {
        $data = "workID=".$workID;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "getMissionsIsDoing", $data );
        $obj = $this->json_helper->decode( $html );
        return $obj;
    }
    
    /** 
    * 函数功能说明 获取已经完成的子任务<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： workId<br>
    * @return <br>
    */
    public function getMissionsFinished($workID) {
        $data = "workID=".$workID;
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "getMissionsFinished", $data );
        $obj = $this->json_helper->decode( $html );
        return $obj;
    }
    
    /** 
    * 函数功能说明 获取一个时间段内属于自己的任务<br>
    * 作者名字 Sec<br>
    * 创建日期  2015-7-23<br>
    * @参数： fromTime, toTime, workID<br>
    * @return <br>
    */
    public function findMissionBetween($fromTime, $toTime, $workID) {
        $data = array (
            "fromTime" => $fromTime,
            "toTime" => $toTime,
            "workID" => $workID,
        );
        $html = $this->get_html->doFileGetContentsget_html2( $this->url . "findMissionBetween", $data );
        $obj = $this->json_helper->decode( $html );
        return $obj;
    }
}

?>