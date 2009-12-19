<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2009-12-19 19:12:58 : 1261219558*/
class AppSchema extends CakeSchema {
	var $name = 'App';

	var $connection = 'merge';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $aros = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'model' => array('type' => 'string', 'null' => true),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'alias' => array('type' => 'string', 'null' => true),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $aros_acos = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'aro_id' => array('type' => 'integer', 'null' => false, 'length' => 10),
		'aco_id' => array('type' => 'integer', 'null' => false, 'length' => 10),
		'_create' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_read' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_update' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'_delete' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 2),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $blocks = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'region_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'title' => array('type' => 'string', 'null' => false, 'length' => 100),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'body' => array('type' => 'text', 'null' => false),
		'show_title' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'class' => array('type' => 'string', 'null' => false),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'element' => array('type' => 'string', 'null' => false),
		'visibility_roles' => array('type' => 'text', 'null' => false),
		'visibility_paths' => array('type' => 'text', 'null' => false),
		'visibility_php' => array('type' => 'text', 'null' => false),
		'params' => array('type' => 'text', 'null' => false),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'alias' => array('column' => 'alias', 'unique' => 1))
	);
	var $comments = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'node_id' => array('type' => 'integer', 'null' => false, 'length' => 20),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20),
		'name' => array('type' => 'string', 'null' => false, 'length' => 50),
		'email' => array('type' => 'string', 'null' => false, 'length' => 100),
		'website' => array('type' => 'string', 'null' => false, 'length' => 200),
		'ip' => array('type' => 'string', 'null' => false, 'length' => 100),
		'title' => array('type' => 'string', 'null' => false),
		'body' => array('type' => 'text', 'null' => false),
		'rating' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'notify' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'type' => array('type' => 'string', 'null' => false, 'length' => 100),
		'comment_type' => array('type' => 'string', 'null' => false, 'default' => 'comment', 'length' => 100),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $contacts = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false),
		'alias' => array('type' => 'string', 'null' => false),
		'body' => array('type' => 'text', 'null' => false),
		'name' => array('type' => 'string', 'null' => false),
		'position' => array('type' => 'string', 'null' => false),
		'address' => array('type' => 'text', 'null' => false),
		'address2' => array('type' => 'text', 'null' => false),
		'state' => array('type' => 'string', 'null' => false, 'length' => 100),
		'country' => array('type' => 'string', 'null' => false, 'length' => 100),
		'postcode' => array('type' => 'string', 'null' => false, 'length' => 100),
		'phone' => array('type' => 'string', 'null' => false),
		'fax' => array('type' => 'string', 'null' => false),
		'email' => array('type' => 'string', 'null' => false, 'length' => 100),
		'message_status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'message_archive' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'message_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'message_spam_protection' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'message_captcha' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'message_notify' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $i18n = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'locale' => array('type' => 'string', 'null' => false, 'length' => 6, 'key' => 'index'),
		'model' => array('type' => 'string', 'null' => false, 'key' => 'index'),
		'foreign_key' => array('type' => 'integer', 'null' => false, 'length' => 10, 'key' => 'index'),
		'field' => array('type' => 'string', 'null' => false, 'key' => 'index'),
		'content' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'locale' => array('column' => 'locale', 'unique' => 0), 'model' => array('column' => 'model', 'unique' => 0), 'row_id' => array('column' => 'foreign_key', 'unique' => 0), 'field' => array('column' => 'field', 'unique' => 0))
	);
	var $languages = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false),
		'native' => array('type' => 'string', 'null' => false),
		'alias' => array('type' => 'string', 'null' => false),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $links = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'menu_id' => array('type' => 'integer', 'null' => false, 'length' => 20),
		'title' => array('type' => 'string', 'null' => false),
		'description' => array('type' => 'text', 'null' => false),
		'link' => array('type' => 'string', 'null' => false),
		'target' => array('type' => 'string', 'null' => false),
		'rel' => array('type' => 'string', 'null' => false),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'visibility_roles' => array('type' => 'text', 'null' => false),
		'params' => array('type' => 'text', 'null' => false),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $menus = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false),
		'alias' => array('type' => 'string', 'null' => false, 'key' => 'unique'),
		'description' => array('type' => 'text', 'null' => false),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'link_count' => array('type' => 'integer', 'null' => false),
		'params' => array('type' => 'text', 'null' => false),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'alias' => array('column' => 'alias', 'unique' => 1))
	);
	var $messages = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'contact_id' => array('type' => 'integer', 'null' => false),
		'name' => array('type' => 'string', 'null' => false, 'length' => 100),
		'email' => array('type' => 'string', 'null' => false, 'length' => 100),
		'title' => array('type' => 'string', 'null' => false),
		'body' => array('type' => 'text', 'null' => false),
		'website' => array('type' => 'string', 'null' => false),
		'phone' => array('type' => 'string', 'null' => false),
		'address' => array('type' => 'text', 'null' => false),
		'message_type' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $meta = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'model' => array('type' => 'string', 'null' => false, 'default' => 'Node'),
		'foreign_key' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'key' => array('type' => 'string', 'null' => false),
		'value' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $nodes = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20),
		'title' => array('type' => 'string', 'null' => false),
		'slug' => array('type' => 'string', 'null' => false, 'key' => 'unique'),
		'body' => array('type' => 'text', 'null' => false, 'key' => 'index'),
		'excerpt' => array('type' => 'text', 'null' => false),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'mime_type' => array('type' => 'string', 'null' => false, 'length' => 100),
		'comment_status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
		'comment_count' => array('type' => 'integer', 'null' => true, 'default' => '0'),
		'promote' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'path' => array('type' => 'string', 'null' => false),
		'terms' => array('type' => 'text', 'null' => false),
		'sticky' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'visibility_roles' => array('type' => 'text', 'null' => false),
		'type' => array('type' => 'string', 'null' => false, 'default' => 'node', 'length' => 100),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'slug' => array('column' => 'slug', 'unique' => 1), 'body' => array('column' => 'body', 'unique' => 0))
	);
	var $nodes_terms = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'node_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'vocabulary_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'term_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $regions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'length' => 100),
		'alias' => array('type' => 'string', 'null' => false, 'length' => 100, 'key' => 'unique'),
		'description' => array('type' => 'text', 'null' => false),
		'block_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'alias' => array('column' => 'alias', 'unique' => 1))
	);
	var $roles = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'length' => 100),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'alias' => array('column' => 'alias', 'unique' => 1))
	);
	var $settings = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'key' => array('type' => 'string', 'null' => false, 'length' => 64, 'key' => 'unique'),
		'value' => array('type' => 'text', 'null' => false),
		'title' => array('type' => 'string', 'null' => false),
		'description' => array('type' => 'string', 'null' => false),
		'input_type' => array('type' => 'string', 'null' => false, 'default' => 'text'),
		'editable' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'params' => array('type' => 'text', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'key' => array('column' => 'key', 'unique' => 1))
	);
	var $terms = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'vocabulary_id' => array('type' => 'integer', 'null' => false, 'length' => 10),
		'title' => array('type' => 'string', 'null' => false),
		'slug' => array('type' => 'string', 'null' => false, 'key' => 'unique'),
		'description' => array('type' => 'text', 'null' => false),
		'lft' => array('type' => 'integer', 'null' => false),
		'rght' => array('type' => 'integer', 'null' => false),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'slug' => array('column' => 'slug', 'unique' => 1))
	);
	var $types = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false),
		'alias' => array('type' => 'string', 'null' => false, 'key' => 'unique'),
		'description' => array('type' => 'text', 'null' => false),
		'format_show_author' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'format_show_date' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'comment_status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
		'comment_approve' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'comment_spam_protection' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'comment_captcha' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'params' => array('type' => 'text', 'null' => false),
		'plugin' => array('type' => 'string', 'null' => false),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'alias' => array('column' => 'alias', 'unique' => 1))
	);
	var $types_vocabularies = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'type_id' => array('type' => 'integer', 'null' => false, 'length' => 10),
		'vocabulary_id' => array('type' => 'integer', 'null' => false, 'length' => 10),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $users = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'role_id' => array('type' => 'integer', 'null' => false),
		'username' => array('type' => 'string', 'null' => false, 'length' => 60),
		'password' => array('type' => 'string', 'null' => false, 'length' => 100),
		'name' => array('type' => 'string', 'null' => false, 'length' => 50),
		'email' => array('type' => 'string', 'null' => false, 'length' => 100),
		'website' => array('type' => 'string', 'null' => false, 'length' => 100),
		'activation_key' => array('type' => 'string', 'null' => false, 'length' => 60),
		'image' => array('type' => 'string', 'null' => false),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $vocabularies = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false),
		'alias' => array('type' => 'string', 'null' => false, 'key' => 'unique'),
		'description' => array('type' => 'text', 'null' => false),
		'required' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'multiple' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'tags' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'plugin' => array('type' => 'string', 'null' => false),
		'term_count' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'alias' => array('column' => 'alias', 'unique' => 1))
	);
}
?>