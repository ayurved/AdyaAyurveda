<?php
App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');

class AppController extends Controller {
	public $components = array(
		'Security' => array(
			'setHash' => 'md5',
			'validatePost' => false,
			'csrfCheck' => false,
		),
		'Acl',
		'Auth' => array(
			'authorize' => array(
				'Actions' => array('actionPath' => 'controllers')
			),
			'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => null),
			'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'email'),
				),
			),
			'userScope' => array(
				'User.active' => true,
				'User.deleted' => false,
			),
			'autoRedirect' => false,
		),
		'Session',
		'Email',
		/* 'DebugKit.Toolbar', */
	);
	public $helpers = array('Html', 'Form', 'Session', 'Number', 'Time', 'Text');
	
	public $userGenders = array(
		'Mal' => 'Male',
		'Fem' => 'Female',
	);
	
	public $userMaritalStatuses = array(
		'Single' => 'Single',
		'Married' => 'Married',
		'Partnership' => 'Partnership',
		'Divorced' => 'Divorced',
		'Widowed' => 'Widowed'
	);
	
	public $userTitles = array(
		'Mr' => 'Mr',
		'Mrs' => 'Mrs',
		'Miss' => 'Miss',
		'Dr' => 'Dr',
	);
	
	public $userFieldTypes = array(
		'list' => 'List',
		'boolean' => 'True or False',
		'text' => 'Text',
		'textarea' => 'Long Text',
	);
	
	public $patientTypes = array(
		'Adult' => 'Adult',
		'Child' => 'Child',
	);
	
	public $allowedUploadExtensions = array(
		'doc' => 'doc',
		'docx' => 'docx',
		'xls' => 'xls',
		'xlsx' => 'xlsx',
		'pdf' => 'pdf',
		'jpg' => 'jpg',
		'jpeg' => 'jpeg',
		'gif' => 'gif',
		'png' => 'png',
		'tiff' => 'tiff',
	);
	
	function beforeFilter() {
		//Configure SecurityComponent
		// Security::setHash('md5');
		
		if ($this->Auth->user()) {
			$this->currentUser = $this->Auth->user();
			$this->set('currentUser', $this->currentUser);
		}
		
		$userTitles = $this->userTitles;
		$allowedUploadExtensions = $this->allowedUploadExtensions;
		
		// Get the Nav
		$this->_getNavigation();
		
		$this->set(compact(array('userTitles', 'allowedUploadExtensions')));
	}
	
	function _getNavigation() {
		App::import('Model', 'Page');
		$this->Page = new Page();
		$this->Page->contain(array(
			'ChildPage' => array(
				'ChildPage'
			),
		));
		$options = array(
			'fields' => array(
				'label',
				'url'
			),
			'conditions' => array(
				'Page.parent_page_id' => null,
				'Page.url !=' => '/',
				'Page.publish' => true,
			),
		);
		$pagesInNav = $this->Page->find('all', $options);
		// debug($pagesInNav); die;
		$this->set(compact(array('pagesInNav')));
	}
	
	function _checkAndUploadFile($folder, $file, $filename = null){
		
		App::import('Sanitize');
		if(!is_array($file)){
			return $file;
		} elseif($file['size']){
			if($filename){
				$file['name'] = $filename;
			} else {
				$file['name'] = basename(Sanitize::paranoid($file['name'],array('.', '-', '_')));
			}
			
			if (!file_exists('files/'.$folder)) {
				$pathToCreate = 'files/'.$folder;
				mkdir($pathToCreate, 0777, true);
			}
			
			move_uploaded_file($file['tmp_name'], 'files/'.$folder.'/'.$file['name']);
			return '/files/'.$folder.'/'.$file['name'];
		} else {
			return NULL;
		}
	}
}