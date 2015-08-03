<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

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
        $this->load->model ( 'tool/power_helper' );
        $this->load->model ( 'tool/json_helper' );
        $this->load->model ( 'project_system/mission_action' );
        $this->load->model ( 'project_system/project_action' );
        $this->load->model ( 'employee_system/employee_action' );
        $projects = new stdClass();
    } 


    public function index()
	{
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else{

            $data['all_project'] = $this->project_action->getAllProject();
            $data['all_employee'] = $this->employee_action->getEmployees();

            $category = "projects";

            $this->power_helper->loadHeader( $category );
            $this->load->view('projects',$data);
            $this->load->view('footer');
        }
	}

    //打开项目树
    public function project_tree( $project_id = "" )
    {
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else{
            
            //$project_id = 3;
            $this->projects = $this->mission_action->getMissionByProjectId( $project_id );

            $root_mission = $this->find_root_mission($this->projects);

            if( $root_mission != null ){
                $tree_obj = $this->build_tree($root_mission->id);
                $data['tree_jsonStr'] = $this->json_helper->encode($tree_obj);
            }
            

            $data['all_employee'] = $this->employee_action->getEmployees();
            $data['all_mission'] = $this->projects;
            $data['project_id'] = $project_id;

            $category = "project_tree";

            $this->power_helper->loadHeader( $category );
            $this->load->view('project_tree',$data);
            $this->load->view('footer');
        }
    }

    //通过id,在整个项目中查找mission 2015-7-24 sec
    private function find_mission($id) {
        for ($i=0; $i<count($this->projects); $i++) {
            if ($this->projects[$i]->id == $id) {
                return $this->projects[$i];
            }
        }
    }

    //在整个项目所有节点中查找根节点  215-7-24 sec
    private function find_root_mission($projects) {
        for ($i=0; $i<count($projects); $i++) {
            if ($projects[$i]->parent == -1) {
                return $projects[$i];
            }
        }
    }

    //构建项目树  2015-7-24 sec
    //将数据库的XXXX-XX-XX XX:XX:XX格式转为xxxx/xx/xx格式  panda 2015-7-27
    private function build_tree($id) {
        //本节点对象
        $m = $this->find_mission($id);
        $obj = new stdClass();
        $obj->id = $m->id;
        if( isset($m->dependentItems) ){
            $m->dependence = substr($m->dependentItems, 1, count($m->dependentItems)-2);
        }
        if( isset($m->evaluation) ){
            $m->histroy_evaluation = $m->evaluation;
        }
        if( isset($m->parent) ){
            $m->parentId = $m->parent;
        }
        //将数据库的XXXX-XX-XX XX:XX:XX格式转为xxxx/xx/xx格式
        $st = explode(" ", $m->startDate);
        $et = explode(" ", $m->endDate);
        $m->startDate = str_replace("-", "/", $st[0]);
        $m->endDate = str_replace("-", "/", $et[0]);
        $obj->name = $m->name;
        $obj->data = $m;
        $obj->children = array();
        if( isset($m->son)){
            $a = $this->json_helper->decode($m->son);

            for ($i=0; $i < count($a); $i++) {
                $obj->children[] = $this->build_tree($a[$i]);
            }
        }

        return $obj;
    }

    //添加任务点
    public function add_mission(){
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else
        {
            $workId = $this->session->userdata('employee_workId');

            $project_id = $this->input->post( 'project_id', TRUE );
            $parent = $this->input->post( 'parent_id', TRUE );
            $name = $this->input->post( 'name', TRUE );
            $leader = $this->input->post( 'leader', TRUE );
            $pay = $this->input->post( 'pay', TRUE );
            $start_date_1 = $this->input->post( 'start_date', TRUE );
            $end_date_1 = $this->input->post( 'end_date', TRUE );
            $descript = $this->input->post( 'descript', TRUE );
            $dependence = $this->input->post( 'dependence', TRUE );

            if( count($dependence) == 0 ){
                $dependentItems = "[";
                for ($i=0; $i < count($dependence); $i++) { 
                    if( $i == 0){
                        $dependentItems .= $dependence[0];
                    }else{
                        $dependentItems .= ",".$dependence[$i];
                    }
                }
                $dependentItems .= "]";
            }

            $start_date = str_replace("/", "-", $start_date_1);
            $end_date = str_replace("/", "-", $end_date_1);

            $start_date .= " 00:00:00";
            $end_date .= " 00:00:00";

            $mission = new stdClass();

            $mission->name = $name;
            $mission->leader = $leader;
            $mission->descript = $descript;
            $mission->startDate = $start_date;
            $mission->endDate = $end_date;
            $mission->finished = 0;
            $mission->pay = $pay;
            $mission->parent = $parent;
            $mission->projectId = $project_id;
            if( isset($dependentItems) ){
                $mission->dependentItems = $dependentItems;
            }


            $flag = $this->mission_action->addMission( $workId, $mission );

            print_r($flag);
        }
    }

    /**
     * @函数功能说明：ajax添加项目
     * @创建人：panda 2015-7-24
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function add_project(){
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else
        {
            $name = $this->input->post('name',TRUE);
            $leader = $this->input->post('leader',TRUE);
            $daterange = $this->input->post('daterange',TRUE);
            $descript = $this->input->post('descript',TRUE);
            $pay = $this->input->post('pay',TRUE);

            $date = explode(" - ", $daterange);
            $start_date = str_replace("/", "-", $date[0]);
            $end_date = str_replace("/", "-", $date[1]);

            $project = new stdClass();

            $project->name = $name;
            $project->leader = $leader;
            $project->descript = $descript;
            $project->pay = $pay;
            $project->startDate = $start_date;
            $project->endDate = $end_date;

            $flag = $this->project_action->addProject($project);

            print_r($flag);
        }
    }

    /**
     * @函数功能说明：ajax修改任务
     * @创建人：panda 2015-7-27
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function update_mission(){
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else
        {
            $workId = $this->session->userdata('employee_workId');
            $workName = $this->session->userdata('employee_name');

            $name = $this->input->post( 'name', TRUE );
            $leader = $this->input->post( 'leader', TRUE );
            $finished = $this->input->post( 'finished', TRUE );
            if( $finished[0] == 1 ){
                $finish_time = $this->input->post( 'finish_time', TRUE );
            }
            $pay = $this->input->post( 'pay', TRUE );
            $evaluation = $this->input->post( 'evaluation', TRUE );
            $history_evaluation = $this->input->post( 'history_evaluation', TRUE );
            $start_date_1 = $this->input->post( 'start_date', TRUE );
            $end_date_1 = $this->input->post( 'end_date', TRUE );
            $descript = $this->input->post( 'descript', TRUE );
            $dependence = $this->input->post( 'dependence', TRUE );

            $project_id = $this->input->post( 'project_id', TRUE );
            $id = $this->input->post( 'id', TRUE );
            $mission_id = $this->input->post( 'mission_id', TRUE );
            $parent = $this->input->post( 'parent_id', TRUE );
            $dependented_items = $this->input->post( 'dependented_items', TRUE );
            $son = $this->input->post( 'son', TRUE );

            if( count($dependence) == 0 ){
                $dependentItems = "[";
                for ($i=0; $i < count($dependence); $i++) { 
                    if( $i == 0){
                        $dependentItems .= $dependence[0];
                    }else{
                        $dependentItems .= ",".$dependence[$i];
                    }
                }
                $dependentItems .= "]";
            }

            $start_date = str_replace("/", "-", $start_date_1);
            $end_date = str_replace("/", "-", $end_date_1);

            $now_time = date("Y-m-d H:i:s");

            $evaluation = $workName . "(" . $now_time . ")：" . $evaluation . "<br/>" . $history_evaluation;

            $mission = new stdClass();

            $mission->name = $name;
            $mission->leader = $leader;
            $mission->descript = $descript;
            $mission->startDate = $start_date;
            $mission->endDate = $end_date;
            $mission->finished = $finished[0];
            if( $finished[0] == 1 ){
                $mission->finishTime = $finish_time." 00:00:00";
            }
            $mission->pay = $pay;
            $mission->id = $id;
            $mission->missionId = $mission_id;
            $mission->projectId = $project_id;
            $mission->parent = $parent;
            $mission->son = $son;
            $mission->evaluation = $evaluation;
            if( isset($dependentItems) ){
                $mission->dependentItems = $dependentItems;
            }
            $mission->dependentedItems = $dependented_items;


            $flag = $this->mission_action->updateMission( $workId, $mission );

            print_r($flag);
        }
    }

    /**
     * @函数功能说明：ajax删除项目
     * @创建人：panda 2015-7-27
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function delete_project(){
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else
        {
            $id = $this->input->post ("id", TRUE);
            $flag = $this->project_action->deleteProject($id);
            print_r($flag);
        }
    }

    /**
     * @函数功能说明：ajax修改任务
     * @创建人：panda 2015-7-27
     * @修改者：
     * @修改时间：
     * @修改内容：
     * @修改说明
     */
    public function update_project(){
        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else
        {
            print_r("update_project");
        }
    }

    public function delete_mission(){

        if(!$this->power_helper->checkLogin($this))
        {
           return;
        }else
        {
            $work_id = $this->session->userdata('employee_workId');
          
            $mission_id = $this->input->post( "mission_id", TRUE );
            $project_id = $this->input->post( "project_id", TRUE );
            $flag = $this->mission_action->deleteMission( $work_id, $mission_id, $project_id );
            echo $flag;
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */