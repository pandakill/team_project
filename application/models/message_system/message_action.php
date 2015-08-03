<?php
if (! defined ( 'BASEPATH' ))
    exit ( 'No direct script access allowed' );
/**
 * @类功能说明：消息的action类
 * @类修改者：
 * @修改日期：
 * @修改说明：
 * @公司名称：深圳市穗鑫网络购物有限公司
 * @作者：panda
 * @创建时间：2015-7-23 上午11:51:08
 * @版本：V1.0
 */
class message_action extends CI_Model
{
    private $url;
    public function __construct()
    {
        $this->url = my_server_url () . "MessageAction!";
        $this->load->model ( 'tool/get_html' );
        $this->load->model ( 'tool/json_helper' );
    }

    /**
     * @函数功能说明：http请求添加一条消息内容
     * @http传参： jstr:消息内容对象；reciever:消息接收者,格式为id1_id2_..._idn
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function addMessage( $message )
    {
        $jstr = $this->json_helper->encode ( $message );
        
        $data = array (
                "jstr" => $jstr 
        );
        $html = $this->get_html->doFileGetContentsget_html2 ( $this->url . "addMessage", $data );
        return $html;
    }

    /**
     * @函数功能说明：http请求删除一个消息内容，并将其关联的消息响应表删除
     * @创建人：panda 2015-7-23
     * @http传参: messageID
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function deleteMessageByMessageID( $message_id )
    {
        $data = "messageID=" . $message_id ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "deleteMessageByMessageID", $data );
        return $html;
    }
    
    /**
     * @函数功能说明：http请求删除一个消息响应表删除
     * @创建人：panda 2015-7-23
     * @http传参: messageResponseID
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function deleteMessageResponseByID( $message_response_id )
    {
        $data = "messageResponseID=" . $message_response_id ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "deleteMessageResponseByID", $data );
        return $html;
    }
    
    /**
     * @函数功能说明：获取所有的消息列表
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function getMessages()
    {
        $html = $this->get_html->doFileGetContentsget_html( $this->url . "getMessages");
        $obj = $this->json_helper->decode ( $html );
        return $obj;
    }
    
    /**
     * @函数功能说明：心跳监测,返回未读消息条数
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function checkHeart( $wrok_id )
    {
        $data = "workID=" . $wrok_id ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "checkHeart", $data );
        return $html;
    }
    
    /**
     * @函数功能说明：通过workID、status查找该员工某个状态的消息列表
     *              0--未读；1--已读；2--全部
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function getMessagesByWorkIDAndStatus( $wrok_id, $state )
    {
        $data = "workID=" . $wrok_id . "&state=" .$state ;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getMessagesByWorkIDAndStatus", $data );
        //$obj = $this->json_helper->decode($html);
        return $html;
    }
    
    /**
     * @函数功能说明：通过messageID查找消息内容
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function getMessageBymessageID( $message_id )
    {
        $data = "messageID=" . $message_id;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getMessageBymessageID", $data );
        $obj = $this->json_helper->decode($html);
        return $obj;
    }
    
    /**
     * @函数功能说明：通过messageResponseID查找消息响应
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function getMessageResponseByMessageResponseID( $message_response_id )
    {
        $data = "messageResponseID=" . $message_response_id;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getMessageResponseByMessageResponseID", $data );
        $obj = $this->json_decode($html);
        return $obj;
    }
    
    /**
     * @函数功能说明：通过发布者id查找该发布者的所有消息
     * @创建人：panda 2015-7-23
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function getMessagesBySender( $sender )
    {
        $data = "sender=" . $sender;
        $html = $this->get_html->doFileGetContentsget_html ( $this->url . "getMessagesBySender", $data );
        $obj = $this->json_decode($html);
        return $obj;
    }
}

?>