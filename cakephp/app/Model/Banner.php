<?php
App::uses('AppModel', 'Model');
/**
 * Banner Model
 *
 */
class Banner extends AppModel {

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'name';

/**
 * Plugin cakephp-upload
 * 
 * @var array
 */ 
  public $actsAs = array(
    'Upload.Upload' => array(
      'photo' => array(
        'fields' => array(
            'dir' => 'photo_dir'
        )
      )
    )
  );

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'id' => array(
      'notEmpty' => array(
        'rule' => array('notEmpty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'name' => array(
      'notEmpty' => array(
        'rule' => array('notEmpty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'measure' => array(
      'notEmpty' => array(
        'rule' => array('notEmpty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'photo' => array(
      'Rule1'=> array(
        'rule' => 'isFileUpload',
        'message' => 'File was missing from submission'
      ),
      'Rule2'=> array(
        'rule' => 'isCompletedUpload',
        'message' => 'File was not successfully uploaded'
      )
    ),
  );
}
