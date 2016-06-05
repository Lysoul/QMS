<?php
App::uses('AppModel', 'Model');
/**
 * About Model
 *
 */
class About extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'header_name';

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
	);
}
