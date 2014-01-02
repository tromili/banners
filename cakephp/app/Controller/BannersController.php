<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 */
class BannersController extends AppController {
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow(array('search','autoComplete','getData'));
  }

/**
 * Helpers
 *
 * @var array
 */
  public $helpers = array('Js');

/**
 * Components
 *
 * @var array
 */
  public $components = array('Paginator', 'RequestHandler');


/**
 * admin_index method
 *
 * @return void
 */
  public function admin_index() {
    $this->Banner->recursive = 0;
    $this->set('banners', $this->Paginator->paginate());
  }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_view($id = null) {
    if (!$this->Banner->exists($id)) {
      throw new NotFoundException(__('Invalid banner'));
    }
    $options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
    $this->set('banner', $this->Banner->find('first', $options));
  }

/**
 * admin_add method
 *
 * @return void
 */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Banner->create();
      if ($this->Banner->save($this->request->data)) {
        $this->Session->setFlash(__('The banner has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
      }
    }
  }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_edit($id = null) {
    if (!$this->Banner->exists($id)) {
      throw new NotFoundException(__('Invalid banner'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Banner->save($this->request->data)) {
        $this->Session->setFlash(__('The banner has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
      $this->request->data = $this->Banner->find('first', $options);
    }
  }

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_delete($id = null) {
    $this->Banner->id = $id;
    if (!$this->Banner->exists()) {
      throw new NotFoundException(__('Invalid banner'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Banner->delete()) {
      $this->Session->setFlash(__('The banner has been deleted.'));
    } else {
      $this->Session->setFlash(__('The banner could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }


/**
 * autoComplete method
 *
 * @return void
 */
  public function autoComplete($q=null) {
    $this->set('banners', $this->Banner->find('all',
      array('conditions'=>array(
        'Banner.name LIKE' => $this->request->query['term'].'%'),
        'limit' => 6,
        'fields' => array('id', 'name'),
        'order' => array('Banner.name' => 'asc')
    )));
    $this->layout = 'ajax';
  }

/**
 * getData method
 *
 * @return void
 */
  public function getData($q=null, $ac='nac', $option='N', $order='A', $size='') {
    $q = strtolower($q);
    $like = $q.'%';
    if ($ac == 'nac')
      $like = '%'.$like;
    if ($option == 'M')
      $option = 'Banner.measure';
    else
      $option = 'Banner.name';
    if ($order == 'D')
      $order = 'desc';
    else 
      $order = 'asc';
    if (!preg_match("/[A-Z]/", $size))
      $size = '%%';
    if (($q == 'todos') || ($q == ''))
      $this->Paginator->settings = array(
        'conditions' => array('Banner.measure LIKE' => $size),
        'fields' => array('id', 'name', 'description', 'measure', 'photo', 'photo_dir'),
        'order' => array($option => $order),
        'limit' => 10,
      );
    else
      $this->Paginator->settings = array(
        'conditions'=>array(
          'Banner.name LIKE' => $like,
          'Banner.measure LIKE' => $size
        ),
        'fields' => array('id', 'name', 'description', 'measure', 'photo', 'photo_dir'),
        'order' => array($option => $order),
        'limit' => 10,
      );
    $this->set('banners', $this->Paginator->paginate('Banner'));
    $this->layout = 'ajax';
  }

/**
 * search method
 *
 * @return void
 */
  public function search($q = null) {
    $this->set('banner', array('q'=>$q));
  }
}
