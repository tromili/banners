<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
  public $components = array('Paginator');


/**
 * index method
 *
 * @return void
 */
  public function index() {
    $this->Product->recursive = 0;
    $this->set('products', $this->Paginator->paginate());
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->Product->exists($id)) {
      throw new NotFoundException(__('Invalid product'));
    }
    $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
    $this->set('product', $this->Product->find('first', $options));
  }

/**
 * add method
 *
 * @return void
 */
  public function add() {
    if ($this->request->is('post')) {
      $this->Product->create();
      if ($this->Product->save($this->request->data)) {
        $this->Session->setFlash(__('The product has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
      }
    }
    $materials = $this->Product->Material->find('list');
    $this->set(compact('materials'));
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function edit($id = null) {
    if (!$this->Product->exists($id)) {
      throw new NotFoundException(__('Invalid product'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Product->save($this->request->data)) {
        $this->Session->setFlash(__('The product has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
      $this->request->data = $this->Product->find('first', $options);
    }
    $materials = $this->Product->Material->find('list');
    $this->set(compact('materials'));
  }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function delete($id = null) {
    $this->Product->id = $id;
    if (!$this->Product->exists()) {
      throw new NotFoundException(__('Invalid product'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Product->delete()) {
      $this->Session->setFlash(__('The product has been deleted.'));
    } else {
      $this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }

/**
 * autoComplete method
 *
 * @return void
 */
  public function autoComplete($q=null) {
    $this->set('products', $this->Product->find('all',
      array('conditions'=>array(
        'Product.name LIKE' => $this->request->query['term'].'%'),
        'limit' => 6,
        'fields' => array('id', 'name'),
        'order' => array('Product.name' => 'asc')
    )));
    $this->layout = 'ajax';
  }

/**
 * getData method
 *
 * @return void
 */
  public function getData($q=null, $ac='nac', $option='N', $order='A') {
    $like = $q.'%';
    if ($ac=='nac')
      $like = '%'.$like;
    if ($option == 'P')
      $option = 'Product.price';
    else
      $option = 'Product.name';
    if ($order == 'D')
      $order = 'desc';
    else 
      $order = 'asc';
    $this->set('products', $this->Product->find('all',
      array('conditions'=>array(
        'Product.name LIKE' => $like),
        'fields' => array('id', 'name', 'description', 'price'),
        'order' => array($option => $order)
    )));
    $this->layout = 'ajax';
  }

/**
 * search method
 *
 * @return void
 */
  public function search($q = null, $id = null) {
    $this->set('product', array('q'=>$q, 'id'=>$id));
  }
}