<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $add_menu = '';
	public $unp_menu = '';
	public $edit_menu = '';
	public $reorder_menu = '';
        public $defaultAction = 'ajaxMenu';

        public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);	
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
        /**
        * Display left menu item content by AJAX
        * It uses url manager configuration
        */
        public function actionAjaxMenu($menu='index'){
            if( Yii::app()->request->isAjaxRequest ){
                $this->renderPartial('ajax-menu/'.$menu);
                Yii::app()->end();
            }
            $this->render('ajax-menu/'.$menu);
        }
        
	public function actionMap()
	{
	    $this->render('map');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

        public function actionSendemail() {
            $email = Yii::app()->request->getPost('email');
            if($email) {
                mail('deeptim@mail.ubc.ca','Email from CEE beta', $email);
            }

            return json_encode(['result' => 'success']);
        }

        /**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	    
		if(!Yii::app()->user->isGuest) {
		    $this->redirect(Yii::app()->request->baseUrl.'/site/addpage');
		    exit;
		}
		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->request->baseUrl.'/site/addpage');
		}
		// display the login form
		$this->layout = 'admin';
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 **/
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionAddpage()
	{

	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }
	    
	    if(isset($_GET['parameter'])){
		$step = $_GET['parameter'];
	    }else{
		$step = false;
	    }
	    $this->add_menu = 'actives';
	    $this->layout = 'admin_login';    
	    switch($step) {
		case 'case':			    
		    $model = new Template();
		    $data_model = $model->search();
		    $sections = $data_model->getData();
		    $data["sections"] = array();
		    foreach($sections as $key=>$itm) {
			if($itm->type == $step){
			    $data["sections"][$key]->id = $itm->id;
			    $data["sections"][$key]->name = $itm->name;
			    $data["sections"][$key]->img_url = $itm->img_url;
			    $data["sections"][$key]->ahref = '/site/createnewpage/'.$itm->id;
			}
		    }
		    $data["title"] = '<p>Add Page : Case Studies</p><p>Step 2 : Select a Template</p>';		    
		    $this->render('select_template',$data);
		break;
		case 'energy':
		    $model = new Template();
		    $data_model = $model->search();
		    $sections = $data_model->getData();
		    $data["sections"] = array();
		    foreach($sections as $key=>$itm) {			
			if($itm->type == $step){
			    $data["sections"][$key]->id = $itm->id;
			    $data["sections"][$key]->name = $itm->name;
			    $data["sections"][$key]->img_url = $itm->img_url;
			    $data["sections"][$key]->ahref = '/site/createnewpage/'.$itm->id;
			}
		    }
		    $data["title"] = '<p>Add Page : Energy in Context</p><p>Step 2 : Select a Template</p>';
		    $this->render('select_template',$data);
		break;
		case 'renewable':
		    $model = new Template();
		    $data_model = $model->search();
		    $sections = $data_model->getData();
		    $data["sections"] = array();
		    foreach($sections as $key=>$itm) {			
			if($itm->type == $step){
			    $data["sections"][$key]->id = $itm->id;
			    $data["sections"][$key]->name = $itm->name;
			    $data["sections"][$key]->img_url = $itm->img_url;
			    $data["sections"][$key]->ahref = '/site/createnewpage/'.$itm->id;
			}
		    }
		    $data["title"] = '<p>Add Page : Renewable Energy</p><p>Step 2 : Select a Template</p>';
		    $this->render('select_template',$data);
		break;
		default:
		    $model = new Section();
		    $data_model = $model->search();
		    $data["sections"] = $data_model->getData();
		    $data["title"] = '<p>Add Page.</p><p>Step 1: Select a Section.</p>';
		    $data['ahref'] = '/site/addpage/';
		    $this->render('first_step',$data);
		break;
	    }
	}
	
	public function actionCreateNewPage()
	{

	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }
	   
	    if(isset($_GET['id'])){
		$step = $_GET['id'];
	    }else{
		$this->redirect(Yii::app()->request->baseUrl.'/site/editpage/create');
	    }
	     
	    $this->layout = 'admin_login';
	    $code = null;
	    
	    $model = new Template();
	    $modelSec = new SectionTemplate();
	    $data_modelSec = $modelSec->search();
	    $data_modelSec = $data_modelSec->getData();
	    $data_model = $model->search();
	    $data_model = $data_model->getData();
	    foreach ($data_model as $key=>$itm) {
		if($itm->id == $step){		    
		    $code = $model->getTemplateHtml($itm->id);
		    foreach($data_modelSec as $itm){
			if($itm->template_id == $step){
			    $section_id = $itm->section_id;
			}
		    }   
		    
		}
	    }
	    
	    
	    
	    if(empty($code)){
		$this->redirect(Yii::app()->request->baseUrl.'/site/editpage/create');
	    }
	    $data['code'] = $code;
	    $model_page = new Page();
	    $id_insert = $model_page->addNewPage($code,$section_id,$step);
	    
	    $this->redirect(Yii::app()->request->baseUrl.'/site/editexistpage/'.$id_insert);
	}
	
	public function actionPreSavePage() {
	    
	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }
	    
	    if(isset($_GET['id'])){
		$step = $_GET['id'];
	    }else{
		$this->redirect(Yii::app()->request->baseUrl.'/site/editpage/create');
	    }
	    
	    $exist = false;
	    $data = array();
	    $this->layout = 'admin_login';
	    $this->add_menu = 'actives';
	    
	    $model = new Page();
	    $data_model = $model->searchAll();
	    $pages = $data_model->getData();
	    foreach($pages as $itm){
		if($step == $itm->id && $itm->display == 0){
		    $exist = true;
		    $data['id_pg'] = $itm->id;
		    $section_id = $itm->section_id;
		}
	    }	  
	    
	    if(!$exist){
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
	    }
	    
	    
	    $data["pages"] = array();
	    $data['sections'] = array();
	    $data_template = array();
	    $model = new Page();
	    $data_model = $model->search($section_id);
	    $pages = $data_model->getData();
	    foreach($pages as $itm){
		if($itm->section_id == $section_id){
		    $data["pages"][] = $itm;
		}
	    }
	    $data["title"] = '<p>Step 3 : Select Positioning</p>';		    
	    $this->render('list_pre_save',$data);
	    
	}
	
	public function actionEditExistPage()
	{

	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }
	    
	    if(isset($_GET['id'])){
		$step = $_GET['id'];
	    }else{
		$this->redirect(Yii::app()->request->baseUrl.'/site/editpage/create');
	    }
	    $exist = false;
	    $data = array();
	    $this->layout = 'admin_login';
	    $this->add_menu = 'actives';
	    
	    $model = new Page();
	    $data_model = $model->searchAll();
	    $pages = $data_model->getData();
	    
	    foreach($pages as $itm){
		if($step == $itm->id){
		    $exist = true;
		    $data['code'] = $itm->html;
		    $data['display'] = $itm->display;
		    $data['id_pg'] = $itm->id;
		}
	    }
	    
	    if(!$exist) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/editpage/create');
	    }
	    $data['step'] = $step;
	    $this->render('edit_exist_page',$data);	    
	}
	
	public function actionUnPublishPage()
	{
	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }
	    
	    $this->layout = 'admin_login';
	    $this->unp_menu = 'actives';
	    
	    if(isset($_GET['parameter'])){
		$step = $_GET['parameter'];
	    }else{
		$step = false;
	    }
	    
	    switch($step) {
		case 'case':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $data_model = $model->search();
		    $data["section_id"] = 4;
		    $data["pages"] = $data_model->getData();
		    $data["title"] = '<p>Unpublish or Delete Pages : Case Studies</p><p>Step 2 : Unpublish or delete</p>';		    
		    $this->render('unpublish_page',$data);
		break;
		case 'energy':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $data_model = $model->search();
		    $data["section_id"] = 2;
		    $data["pages"] = $data_model->getData();
		    $data["title"] = '<p>Unpublish or Delete Pages : Energy in Context</p><p>Step 2 : Unpublish or delete</p>';		    
		    $this->render('unpublish_page',$data);
		break;
		case 'renewable':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $data_model = $model->search();
		    $data["section_id"] = 3;
		    $data["pages"] = $data_model->getData();
		    $data["title"] = '<p>Unpublish or Delete Pages : Renewable Energy</p><p>Step 2 : Unpublish or delete</p>';		    
		    $this->render('unpublish_page',$data);
		break;
		default:
		    $data["sections"] = array();
		    $model = new Section();
		    $modelP = new Page();
		    $data_modelP = $modelP->search();
		    $data_model = $model->search();
		    $pages = $data_modelP->getData();
		    $sections = $data_model->getData();
		    
		    foreach ($sections as $key=>$itm) {
			$data["sections"][$key]->id = $itm->id;
			$data["sections"][$key]->parent_id = $itm->parent_id;
			$data["sections"][$key]->name = $itm->name;
			$data["sections"][$key]->img_url = $itm->img_url;
			$data["sections"][$key]->ahref = $itm->ahref;
			$data["sections"][$key]->message = "Currently you don't have any pages";
			foreach($pages as $it){
			    if($it->section_id == $itm->id){
				$data["sections"][$key]->message = "";
			    }
			}
		    }
		    $data["title"] = '<p>Unpublish or Delete Pages.</p><p>Step 1: Select a Section.</p>';
		    $data['ahref'] = '/site/unpublishpage/';
		    $this->render('first_step',$data);
		break;
	    }
	}
	
	public function actionEditPage()
	{
	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }	    
	    $this->layout = 'admin_login';
	    $this->edit_menu = 'actives';
	    
	    if(isset($_GET['parameter'])){
		$step = $_GET['parameter'];
	    }else{
		$step = false;
	    }
	    
	    switch($step) {
		case 'case':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $template_model = new Template();
		    $data_model = $model->search();
		    $data_template_model = $template_model->search();
		    $data_template_tmp = $data_template_model->getData();
		    foreach ($data_template_tmp as $itm) {
			$data_template[$itm->id] = $itm;
		    }
		    $pages = $data_model->getData();
		    
		    foreach ($pages as $key=>$itm) {
			if($itm->publish == 0 && $itm->section_id == 4){
			    @$data['sections'][$key]->ahref = '/site/editexistpage/'.$itm->id;
			    @$data['sections'][$key]->img_url = $data_template[$itm->template_id]->img_url;
			    @$data['sections'][$key]->name = $itm->name.'<br><br>'.$data_template[$itm->template_id]->name;
			}
		    }
		    $data["title"] = '<p>Edit Drafts : Case Studies</p><p>Step 2 : Select a Drafts</p>';		    
		    $this->render('select_template',$data);
		break;
		case 'energy':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $template_model = new Template();
		    $data_model = $model->search();
		    $data_template_model = $template_model->search();
		    $data_template_tmp = $data_template_model->getData();
		    foreach ($data_template_tmp as $itm) {
			$data_template[$itm->id] = $itm;
		    }
		    $pages = $data_model->getData();
		    
		    foreach ($pages as $key=>$itm) {
			if($itm->publish == 0 && $itm->section_id == 2){
			    @$data['sections'][$key]->ahref = '/site/editexistpage/'.$itm->id;
			    @$data['sections'][$key]->img_url = $data_template[$itm->template_id]->img_url;
			    @$data['sections'][$key]->name = $itm->name.'<br><br>'.$data_template[$itm->template_id]->name;
			}
		    }
		    $data["title"] = '<p>Edit Drafts : Energy in Context</p><p>Step 2 : Select a Drafts</p>';		    
		    $this->render('select_template',$data);
		break;
		case 'renewable':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $template_model = new Template();
		    $data_model = $model->search();
		    $data_template_model = $template_model->search();
		    $data_template_tmp = $data_template_model->getData();
		    foreach ($data_template_tmp as $itm) {
			$data_template[$itm->id] = $itm;
		    }
		    $pages = $data_model->getData();
		    
		    foreach ($pages as $key=>$itm) {
			if($itm->publish == 0 && $itm->section_id == 3){
				@$data['sections'][$key]->ahref = '/site/editexistpage/'.$itm->id;
				@$data['sections'][$key]->img_url = $data_template[$itm->template_id]->img_url;
				@$data['sections'][$key]->name = $itm->name.'<br><br>'.$data_template[$itm->template_id]->name;			    
			}
		    }
		    $data["title"] = '<p>Edit Drafts : Renewable Energy</p><p>Step 2 : Select a Drafts</p>';		    
		    $this->render('select_template',$data);
		break;
		default:
		    $data["sections"] = array();
		    $model = new Section();
		    $modelP = new Page();
		    $data_modelP = $modelP->search();
		    $data_model = $model->search();
		    $pages = $data_modelP->getData();
		    $sections = $data_model->getData();
		    
		    foreach ($sections as $key=>$itm) {
			$data["sections"][$key]->id = $itm->id;
			$data["sections"][$key]->parent_id = $itm->parent_id;
			$data["sections"][$key]->name = $itm->name;
			$data["sections"][$key]->img_url = $itm->img_url;
			$data["sections"][$key]->ahref = $itm->ahref;
			$data["sections"][$key]->message = "Currently you don't have any drafts";
			foreach($pages as $it){
			    if($it->section_id == $itm->id && $it->publish == 0){
				$data["sections"][$key]->message = "";
			    }
			}
		    }
		    $data["title"] = '<p>Edit Drafts.</p><p>Step 1: Select a Section.</p>';
		    $data['ahref'] = '/site/editpage/';
		    $this->render('first_step',$data);
		break;
	    }
	}
	
	public function actionReorderPage()
	{
	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }
	    
	    $this->layout = 'admin_login';
	    $this->reorder_menu = 'actives';
	    
	    if(isset($_GET['parameter'])){
		$step = $_GET['parameter'];
	    }else{
		$step = false;
	    }
	    
	    switch($step) {
		case 'case':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $data_model = $model->search();
		    $data["section_id"] = 4;
		    $data["pages"] = $data_model->getData();
		    $data["title"] = '<p>Reorder Pages : Case Studies</p><p>Step 2 : Reorder Pages</p>';		    
		    $this->render('edit_page',$data);
		break;
		case 'energy':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $data_model = $model->search();
		    $data["section_id"] = 2;
		    $data["pages"] = $data_model->getData();
		    $data["title"] = '<p>Reorder Pages : Energy in Context</p><p>Step 2 : Reorder Pages</p>';		    
		    $this->render('edit_page',$data);
		break;
		case 'renewable':
		    $data['sections'] = array();
		    $data_template = array();
		    $model = new Page();
		    $data_model = $model->search();
		    $data["section_id"] = 3;
		    $data["pages"] = $data_model->getData();
		    $data["title"] = '<p>Reorder Pages : Renewable Energy</p><p>Step 2 : Reorder Pages</p>';		    
		    $this->render('edit_page',$data);
		break;
		default:	
		    $data["sections"] = array();
		    $model = new Section();
		    $modelP = new Page();
		    $data_modelP = $modelP->search();
		    $data_model = $model->search();
		    $pages = $data_modelP->getData();
		    $sections = $data_model->getData();
		    
		    foreach ($sections as $key=>$itm) {
			$data["sections"][$key]->id = $itm->id;
			$data["sections"][$key]->parent_id = $itm->parent_id;
			$data["sections"][$key]->name = $itm->name;
			$data["sections"][$key]->img_url = $itm->img_url;
			$data["sections"][$key]->ahref = $itm->ahref;
			$data["sections"][$key]->message = "Currently you don't have any pages for reorder";
			foreach($pages as $it){
			    if($it->section_id == $itm->id){
				$data["sections"][$key]->message = "";
			    }
			}
		    }
		    $data["title"] = '<p>Reorder Pages.</p><p>Step 1: Select a Section.</p>';
		    $data['ahref'] = '/site/reorderpage/';
		    $this->render('first_step',$data);
		break;
	    }
	}
	
	public function actionInit_reorder_page() {
	    if(Yii::app()->user->isGuest) {
		exit(false);
	    }
	    $order =Yii::app()->request->getPost('data_order');
	    $model = new Page();	    
	    $model->setReorder($order);
	}
	
	public function actionInit_unpbl_page() {
	    if(Yii::app()->user->isGuest) {
		exit(false);
	    }
	    $id = Yii::app()->request->getPost('data_id');
	    $type = Yii::app()->request->getPost('data_type');
	    $model = new Page();	    
	    $model->unpublishDeletePage($type,$id);
	}
	
    public function actionfilesUploadHandle() {


	if ($_FILES) {
	    $response = new stdClass();
	    $response_files = array();

	    $f = $_FILES['files'];
	    $f['size'][0];
	    $type = explode('.', $f['name'][0]);
	    $type_count = count($type);
	    $type = strtolower($type[($type_count - 1)]);
	    if ($type != 'png' && $type && 'jpeg' && $type != 'jpg' && $type != 'gif' && $type != 'pdf') {
		exit;
	    }

	    $name_without_extension = pathinfo($f['name'][0], PATHINFO_FILENAME);
	    $extension = pathinfo($f['name'][0], PATHINFO_EXTENSION);
	    $new_file = md5($name_without_extension. time()).'.'.$extension;
	    $moved = move_uploaded_file($f['tmp_name'][0], $_SERVER['DOCUMENT_ROOT'] . '/template_media/' . $new_file);
	    if($moved) {
		$response_item->result = 'ok';
		$response_item->result_file_path = '/template_media/' . $new_file;
		echo json_encode($response_item);
	    } else {
		$response_item->result = 'error';
		echo json_encode($response_item);
	    }
	}
    }
    
    public function actionSaveTemplate() {
	    if(Yii::app()->user->isGuest) {
		$this->redirect(Yii::app()->request->baseUrl.'/site/login');
		exit;
	    }
	    $id = Yii::app()->request->getPost('template_id');
	    $code = Yii::app()->request->getPost('data_save');
	    $template_model = new Page();
	    $template_model->updatePage($code,$id);
    }
    
    public function actionTestSnap() {
	$this->layout = 'admin_login';
	$this->render('test');
    }
  
}