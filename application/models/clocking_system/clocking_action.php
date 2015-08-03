<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
/**
 * @类功能说明： 考勤action
 * @类修改者：
 * @修改日期：
 * @修改说明：
 * @公司名称：深圳市穗鑫网络购物有限公司
 * @作者：panda
 * @创建时间：2015-7-23 上午11:44:32
 * @版本：V1.0
 */
class clocking_action extends CI_Model
{
    private $url;
    public function __construct()
    {
        $this->url = my_server_url () . "ClockingAction!";
        $this->load->model ( 'tool/get_html' );
        $this->load->model ( 'tool/json_helper' );
    }

    /** 
    * 函数功能说明 添加一条考勤记录<br>
    * 作者名字 panda<br>
    * 创建日期  2015-7-22<br>
    * @参数： <br>
    * @return <br>
    */
    public function addAttendance( $attendance )
    {
        $jstr = $this->json_helper->encode( $attendance );
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addAttendance", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 传入考勤记录的对象json，修改考勤记录<br>
    * 作者名字 panda<br>
    * 创建日期  2015-7-22<br>
    * @参数： <br>
    * @return <br>
    */
    public function updateAttendance( $attendance )
    {
        $jstr = $this->json_helper->encode( $attendance );
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "updateAttendance", $data );
        return $html;
    }
    
    /** 
    * 函数功能说明 传入workID、date查找某个员工在某天的考勤情况<br>
    * 作者名字 RO<br>
    * 创建日期  2015-7-22<br>
    * @参数： workID、date<br>
    * @return <br>
    */
    public function getClockingsByWorkIDAndDate( $work_id, $date )
    {
        $data = "workID=" . $work_id . "&date=" . $date ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getClockingsByWorkIDAndDate", $data );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }

    /**
     * @函数功能说明：获取所有的考勤列表
     * @创建人：panda 2015-7-24
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function getClockings()
    {
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getClockings" );
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }
}

?>