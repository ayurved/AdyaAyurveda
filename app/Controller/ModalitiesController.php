<?php
App::uses('AppController', 'Controller');

class ModalitiesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('bodyClass', 'modalities');
		$this->Auth->allow();
		$this->layout = 'admin';
	}
	
	function admin_index() {
		$modalities = $this->Modality->find('all');
		$title_for_layout = __('Modalities');
		
		$headerButtons[] = array(
			'title' => '<i class="fa fa-plus-square large"></i>',
			'url' => array('controller' => 'modalities', 'action' => 'add'),
			'options' => array(
				'class' => 'btn btn-success',
				'escape' => false,
			),
		);


		$this->set(compact(array('headerButtons', 'modalities', 'title_for_layout')));
	}
	
	function admin_add() {
		if (!empty($this->request->data)) {
			$this->Modality->create();
			if ($this->Modality->save($this->request->data)) {
				$this->Session->setFlash(__('Modality %s has been saved.', $this->request->data['Modality']['modality']), 'flash_success');
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('Modality could not be saved, please try again.'), 'flash_failure');
			}
		}
		
		$headerButtons[] = array(
			'title' => '<i class="fa fa-reply"></i> ' . __('Back'),
			'url' => array('controller' => 'modalities', 'action' => 'index'),
			'options' => array(
				'class' => 'btn btn-danger',
				'escape' => false,
			),
		);

		$title_for_layout = __('Modality :: New Modality');
		$this->set(compact(array('headerButtons', 'title_for_layout')));
	}
	
	function admin_edit() {
		if (empty($this->request->params['modality'])) {
			$this->Session->setFlash(__('Invalid Request'), 'flash_failure');
			$this->redirect($this->referer());
		}
		
		if (!empty($this->request->data)) {
			if ($this->Modality->save($this->request->data)) {
				$this->Session->setFlash(__('Modality %s has been saved.', $this->request->data['Modality']['modality']), 'flash_success');
				$this->redirect('index');
			} else {
				$this->Session->setFlash(__('Modality could not be saved, please try again.'), 'flash_failure');
			}
		}

		$headerButtons[] = array(
			'title' => '<i class="fa fa-reply"></i> ' . __('Back'),
			'url' => array('controller' => 'modalities', 'action' => 'index'),
			'options' => array(
				'class' => 'btn btn-danger',
				'escape' => false,
			),
		);
		
		$this->Modality->contain();
		$modality = $this->Modality->findById($this->request->params['modality']);
		
		$title_for_layout = __('Modality :: Edit %s', $modality['Modality']['modality']);
		$this->set(compact(array('headerButtons', 'title_for_layout', 'modality')));
	}
	
	function admin_delete() {
		if (empty($this->request->params['modality'])) {
			$this->Session->setFlash(__('Invalid Request'), 'flash_failure');
		} else {
			$this->Modality->contain();
			$modality = $this->Modality->findById($this->request->params['modality']);
			
			if ($this->Modality->delete($this->request->params['modality'])) {
				$this->Session->setFlash(__('Modality %s has been deleted.', $modality['Modality']['modality']), 'flash_success');
			} else {
				$this->Session->setFlash(__('Modality %s could not be deleted, please try again.', $modality['Modality']['modality']), 'flash_failure');
			}
		}
		$this->redirect($this->referer());
	}
}
