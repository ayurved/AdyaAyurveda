<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	var $name = 'User';
	var $displayField = 'fullnameNoTitle';
	var $actsAs = array('Containable', 'Acl' => array('type' => 'requester', 'enabled' => false));
	var $hasMany = array(
		'UserDataValue',
		'UserNote',
		'UserAttachment' => array(
			'className' => 'Upload', 
			'conditions' => array(
				'UserAttachment.model_name' => 'User',
			), 
			'foreignKey' => 'model_id',
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'patient_id',
		),
		'Appointment'
	);
	
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
		),
	);
	
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->virtualFields['fullname'] = sprintf('CONCAT(%s.title, " ", %s.firstname, " ", %s.lastname)', $this->alias, $this->alias, $this->alias);
		$this->virtualFields['fullnameNoTitle'] = sprintf('CONCAT(%s.firstname, " ", %s.lastname)', $this->alias, $this->alias);
	}
	
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}
	
	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
	
	function wasRegistered($check){
		$this->contain();
		$deleted = $this->field('deleted', array('User.email' => $check));
		if($deleted == 1){
			return false;
		} else {
			return true;
		}
	}
	function isRegistered($check, $id){
		$this->contain();
		$id = $this->field('id', array('User.email' => $check));
		if($id){
			return false;
		} else {
			return true;
		}
	}
	var $validate = array(
		'group_id' => array(
			'rule' => 'notEmpty',
			'message' => 'This is a required field and cannot be left empty'
		),
		/* 'email' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This is a required field and cannot be left empty',
			),
			'validEmail' => array(
				'rule' => 'email',
				'message' => 'Please supply a valid email address' 
			),
			'isRegistered' => array(
				'rule' => 'isRegistered',
				'message' => 'This email address is already registered with us.',
				'on' => 'create'
			),
			'wasRegistered' => array(
				'rule' => 'wasRegistered',
				'message' => 'This email address was registered with us, please contact us to reactivate',
				'on' => 'create'
			)
		), */
		'firstname' => array(
			'rule' => 'notEmpty',
			'message' => 'This is a required field and cannot be left empty'
		),
		'lastname' => array(
			'rule' => 'notEmpty',
			'message' => 'This is a required field and cannot be left empty'
		),
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
    }
	
	public function getAdminList() {
		$this->contain();
		$options = array(
			'conditions' => array(
				'User.group_id' => '52346d30-68f8-4e91-b19b-1368d96041f1',
			),
			'fields' => array(
				'id',
				'title',
				'firstname',
				'lastname',
			),
			'order' => array(
				'firstname' => 'ASC'
			),
		);
		$users = $this->find('all', $options);
		
		$formattedUsers = array();
		foreach ($users as $user) {
			$formattedUsers[$user['User']['id']] = $user['User']['title'].' '.$user['User']['firstname'].' '.$user['User']['lastname'];
		}
		return $formattedUsers;
	}

	public function getPatientList() {
		$this->contain();
		$options = array(
			'conditions' => array(
				'User.group_id' => '5234723b-bdbc-4e50-930c-1368d96041f1',
			),
			'fields' => array(
				'id',
				'title',
				'firstname',
				'lastname',
			),
			'order' => array(
				'firstname' => 'ASC'
			),
		);
		$patients = $this->find('all', $options);
		
		$formattedPatients = array();
		foreach ($patients as $patient) {
			$formattedPatients[$patient['User']['id']] = $patient['User']['title'].' '.$patient['User']['firstname'].' '.$patient['User']['lastname'];
		}
		return $formattedPatients;
	}
}