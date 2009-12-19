<?php
/**
 * Roles Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class RolesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    var $name = 'Roles';
/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
    var $uses = array('Role');

    function admin_index() {
        $this->pageTitle = __('Roles', true);

        $this->Role->recursive = 0;
        $this->paginate['Role']['order'] = "Role.id ASC";
        $this->set('roles', $this->paginate());
    }

    function admin_add() {
        $this->pageTitle = __("Add Role", true);

        if (!empty($this->data)) {
            $this->Role->create();
            if ($this->Role->save($this->data)) {
                $this->Session->setFlash(__('The Role has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Role could not be saved. Please, try again.', true));
            }
        }
    }

    function admin_edit($id = null) {
        $this->pageTitle = __("Edit Role", true);

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Role', true));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->Role->save($this->data)) {
                $this->Session->setFlash(__('The Role has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Role could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Role->read(null, $id);
        }
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Role', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Role->delete($id)) {
            $this->Session->setFlash(__('Role deleted', true));
            $this->redirect(array('action'=>'index'));
        }
    }

}
?>