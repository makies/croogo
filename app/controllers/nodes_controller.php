<?php
/**
 * Nodes Controller
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
class NodesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    var $name = 'Nodes';
/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
    var $uses = array(
        'Node',
        'Language',
    );

    function beforeFilter() {
        parent::beforeFilter();

        if (isset($this->params['slug'])) {
            $this->params['named']['slug'] = $this->params['slug'];
        }
        if (isset($this->params['type'])) {
            $this->params['named']['type'] = $this->params['type'];
        }
    }

    function admin_index() {
        $this->pageTitle = __('Content', true);

        $this->Node->recursive = 0;
        $this->paginate['Node']['order'] = 'Node.id DESC';
        $this->paginate['Node']['conditions'] = array();

        $types = $this->Node->Term->Vocabulary->Type->find('all');
        $typeAliases = Set::extract('/Type/alias', $types);
        $this->paginate['Node']['conditions']['Node.type'] = $typeAliases;

        if (isset($this->params['named']['filter'])) {
            $filters = $this->Croogo->extractFilter();
            foreach ($filters AS $filterKey => $filterValue) {
                if (strpos($filterKey, '.') === false) {
                    $filterKey = 'Node.' . $filterKey;
                }
                $this->paginate['Node']['conditions'][$filterKey] = $filterValue;
            }
            $this->set('filters', $filters);
        }

        $nodes = $this->paginate('Node');
        $this->set(compact('nodes', 'types', 'typeAliases'));

        if (isset($this->params['named']['links'])) {
            $this->layout = 'ajax';
            $this->render('admin_links');
        }
    }

    function admin_create() {
        $this->pageTitle = __('Create content', true);

        $types = $this->Node->Term->Vocabulary->Type->find('all', array(
            'order' => array(
                'Type.alias' => 'ASC',
            ),
        ));
        $this->set(compact('types'));
    }

    function admin_add($typeAlias = 'node') {
        $type = $this->Node->Term->Vocabulary->Type->findByAlias($typeAlias);
        if (!isset($type['Type']['alias'])) {
            $this->Session->setFlash(__('Content type does not exist.', true));
            $this->redirect(array('action' => 'create'));
        }

        $this->pageTitle = __("Create content: ", true) . $type['Type']['title'];
        $this->Node->type = $type['Type']['alias'];
        $this->Node->Behaviors->attach('Tree', array('scope' => array('Node.type' => $this->Node->type)));

        if (!empty($this->data)) {
            $this->Node->create();
            $this->data['Node']['user_id'] = $this->Session->read('Auth.User.id');
            $this->data['Node']['path'] = $this->Croogo->getRelativePath(array(
                'admin' => false,
                'controller' => 'nodes',
                'action' => 'view',
                'type' => $this->Node->type,
                'slug' => $this->data['Node']['slug'],
            ));
            if ($this->Node->saveWithMeta($this->data)) {
                $this->Session->setFlash(vprintf(__('%s has been saved.', true),$type['Type']['title']));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(vprintf__('%s could not be saved. Please, try again.', true),$type['Type']['title']);
            }
        }

        $nodes = $this->Node->generatetreelist();
        $terms = array();
        foreach ($type['Vocabulary'] AS $vocabulary) {
            $vocabularyTitle = $vocabulary['title'];
            $termsConditions = array('Term.vocabulary_id' => $vocabulary['id']);
            $terms[$vocabularyTitle] = $this->Node->Term->generatetreelist($termsConditions);
        }
        $this->set(compact('typeAlias', 'type', 'nodes', 'terms'));
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid content', true));
            $this->redirect(array('action'=>'index'));
        }
        
        $this->Node->id = $id;
        $typeAlias = $this->Node->field('type');
        
        $type = $this->Node->Term->Vocabulary->Type->findByAlias($typeAlias);
        if (!isset($type['Type']['alias'])) {
            $this->Session->setFlash(__('Content type does not exist.', true));
            $this->redirect(array('action' => 'create'));
        }

        $this->pageTitle = __("Edit content: ", true) . $type['Type']['title'];
        $this->Node->type = $type['Type']['alias'];
        $this->Node->Behaviors->attach('Tree', array('scope' => array('Node.type' => $this->Node->type)));

        if (!empty($this->data)) {
            $this->data['Node']['user_id'] = $this->Session->read('Auth.User.id');
            $this->data['Node']['path'] = $this->Croogo->getRelativePath(array(
                'admin' => false,
                'controller' => 'nodes',
                'action' => 'view',
                'type' => $this->Node->type,
                'slug' => $this->data['Node']['slug'],
            ));
            if ($this->Node->saveWithMeta($this->data)) {
                $this->Session->setFlash(__($type['Type']['title'] . ' has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__($type['Type']['title'] . ' could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Node->read(null, $id);
        }

        $nodes = $this->Node->generatetreelist();
        $terms = array();
        foreach ($type['Vocabulary'] AS $vocabulary) {
            $vocabularyTitle = $vocabulary['title'];
            $termsConditions = array('Term.vocabulary_id' => $vocabulary['id']);
            $terms[$vocabularyTitle] = $this->Node->Term->generatetreelist($termsConditions);
        }
        $this->set(compact('typeAlias', 'type', 'nodes', 'terms'));
    }

    function admin_translate($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid content', true));
            $this->redirect(array('action'=>'index'));
        }

        if (!isset($this->params['named']['locale'])) {
            $this->Session->setFlash(__('Invalid locale', true));
            $this->redirect(array('action' => 'index'));
        }

        $language = $this->Language->find('first', array(
            'conditions' => array(
                'Language.alias' => $this->params['named']['locale'],
                'Language.status' => 1,
            ),
        ));
        if (!isset($language['Language']['id'])) {
            $this->Session->setFlash(__('Invalid Language', true));
            $this->redirect(array('action' => 'index'));
        }

        $this->Node->id = $id;
        $typeAlias = $this->Node->field('type');

        $type = $this->Node->Term->Vocabulary->Type->findByAlias($typeAlias);
        if (!isset($type['Type']['alias'])) {
            $this->Session->setFlash(__('Content type does not exist.', true));
            $this->redirect(array('action' => 'create'));
        }

        $this->pageTitle  = __('Translate content:', true) . ' ';
        $this->pageTitle .= $language['Language']['title'] . ' (' . $language['Language']['native'] . ')';

        $this->Node->type = $type['Type']['alias'];
        $this->Node->Behaviors->attach('Tree', array('scope' => array('Node.type' => $this->Node->type)));

        $this->Node->locale = $this->params['named']['locale'];
        $fields = $this->Node->getTranslationFields();
        if (!empty($this->data)) {
            if ($this->Node->saveTranslation($this->data)) {
                $this->Session->setFlash(__($type['Type']['title'] . ' has been translated', true));
                $this->redirect(array('action'=>'translations', $id));
            } else {
                $this->Session->setFlash(__($type['Type']['title'] . ' could not be translated. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Node->read(null, $id);
        }
        $this->set(compact('typeAlias', 'type', 'fields', 'language'));
    }

    function admin_translations($id = null) {
        if ($id == null) {
            $this->Session->setFlash(__('Invalid Node.', true));
            $this->redirect(array('action' => 'index'));
        }

        $node = $this->Node->findById($id);
        if (!isset($node['Node']['id'])) {
            $this->Session->setFlash(__('Invalid Node.', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->pageTitle = __('Translations: ', true) . $node['Node']['title'];

        $runtimeModel =& $this->Node->translateModel();
        $runtimeModelAlias = $runtimeModel->alias;
        $translations = $runtimeModel->find('all', array(
            'conditions' => array(
                $runtimeModelAlias.'.model' => $this->Node->name,
                $runtimeModelAlias.'.foreign_key' => $id,
                $runtimeModelAlias.'.field' => 'title',
            ),
        ));

        $this->set(compact('runtimeModelAlias', 'translations', 'node', 'id'));
    }

    function admin_delete_translation($locale = null, $id = null) {
        if ($locale == null || $id == null) {
            $this->Session->setFlash(__('Invalid Locale or Node', true));
            $this->redirect(array('action' => 'index'));
        }

        $node = $this->Node->findById($id);
        if (!isset($node['Node']['id'])) {
            $this->Session->setFlash(__('Invalid Node', true));
            $this->redirect(array('action' => 'index'));
        }

        $runtimeModel =& $this->Node->translateModel();
        $runtimeModelAlias = $runtimeModel->alias;
        if ($runtimeModel->deleteAll(array(
                $runtimeModelAlias.'.model' => $this->Node->name,
                $runtimeModelAlias.'.foreign_key' => $id,
                $runtimeModelAlias.'.locale' => $locale,
            ))) {
            $this->Session->setFlash(__('Translation for the locale deleted successfully.', true));
        } else {
            $this->Session->setFlash(__('Translation for the locale could not be deleted.', true));
        }

        $this->redirect(array('action' => 'translations', $id));
    }

    function admin_update_paths() {
        $types = $this->Node->Term->Vocabulary->Type->find('list', array(
            'fields' => array(
                'Type.id',
                'Type.alias',
            ),
        ));
        $typesAlias = array_values($types);

        $nodes = $this->Node->find('all', array(
            'conditions' => array(
                'Node.type' => $typesAlias,
            ),
            'fields' => array(
                'Node.id',
                'Node.slug',
                'Node.type',
                'Node.path',
            ),
            'recursive' => '-1',
        ));
        foreach ($nodes AS $node) {
            $node['Node']['path'] = $this->Croogo->getRelativePath(array(
                'admin' => false,
                'controller' => 'nodes',
                'action' => 'view',
                'type' => $node['Node']['type'],
                'slug' => $node['Node']['slug'],
            ));
            $this->Node->id = false;
            $this->Node->save($node);
        }

        $this->Session->setFlash(__('Paths updated.', true));
        $this->redirect(array('action' => 'index'));
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Node', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Node->delete($id)) {
            $this->Session->setFlash(__('Node deleted', true));
            $this->redirect(array('action'=>'index'));
        }
    }

    function admin_delete_meta($id = null) {
        $success = false;
        if ($id != null && $this->Node->Meta->delete($id)) {
            $success = true;
        }

        $this->set(compact('success'));
    }

    function admin_add_meta() {
        $this->layout = 'ajax';
    }

    function admin_process() {
        $action = $this->data['Node']['action'];
        $ids = array();
        foreach ($this->data['Node'] AS $id => $value) {
            if ($id != 'action' && $value['id'] == 1) {
                $ids[] = $id;
            }
        }

        if (count($ids) == 0 || $action == null) {
            $this->Session->setFlash(__('No items selected.', true));
            $this->redirect(array('action' => 'index'));
        }

        if ($action == 'delete' &&
            $this->Node->deleteAll(array('Node.id' => $ids), true, true)) {
            $this->Session->setFlash(__('Nodes deleted.', true));
        } elseif ($action == 'publish' &&
            $this->Node->updateAll(array('Node.status' => 1), array('Node.id' => $ids))) {
            $this->Session->setFlash(__('Nodes published', true));
        } elseif ($action == 'unpublish' &&
            $this->Node->updateAll(array('Node.status' => 0), array('Node.id' => $ids))) {
            $this->Session->setFlash(__('Nodes unpublished', true));
        } elseif ($action == 'promote' &&
            $this->Node->updateAll(array('Node.promote' => 1), array('Node.id' => $ids))) {
            $this->Session->setFlash(__('Nodes promoted', true));
        } elseif ($action == 'unpromote' &&
            $this->Node->updateAll(array('Node.promote' => 0), array('Node.id' => $ids))) {
            $this->Session->setFlash(__('Nodes unpromoted', true));
        } else {
            $this->Session->setFlash(__('An error occurred.', true));
        }

        $this->redirect(array('action' => 'index'));
    }

    function index() {
        if (!isset($this->params['named']['type'])) {
            $this->params['named']['type'] = 'node';
        }

        $this->paginate['Node']['order'] = 'Node.id DESC';
        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
        $this->paginate['Node']['conditions'] = array(
            'Node.status' => 1,
        );
        if (isset($this->params['named']['type'])) {
            $type = $this->Node->Term->Vocabulary->Type->findByAlias($this->params['named']['type']);
            if (!isset($type['Type']['id'])) {
                $this->Session->setFlash(__('Invalid content type.', true));
                $this->redirect('/');
            }

            $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
            $this->pageTitle = $type['Type']['title'];
        }
        $nodes = $this->paginate('Node');

        $this->set(compact('type', 'nodes'));
    }

    function term() {
        $term = $this->Node->Term->findBySlug($this->params['named']['slug']);
        if (!isset($term['Term']['id'])) {
            $this->Session->setFlash(__('Invalid Term.', true));
            $this->redirect('/');
        }

        if (!isset($this->params['named']['type'])) {
            $this->params['named']['type'] = 'node';
        }

        $this->paginate['Node']['order'] = 'Node.id DESC';
        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
        $this->paginate['Node']['conditions'] = array(
            'Node.status' => 1,
            'Node.terms LIKE' => '%"' . $this->params['named']['slug'] . '"%',
        );
        if (isset($this->params['named']['type'])) {
            $type = $this->Node->Term->Vocabulary->Type->findByAlias($this->params['named']['type']);
            if (!isset($type['Type']['id'])) {
                $this->Session->setFlash(__('Invalid content type.', true));
                $this->redirect('/');
            }

            $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
            $this->pageTitle = $type['Type']['title'];
        }
        $nodes = $this->paginate('Node');

        $this->set(compact('term', 'type', 'nodes'));
    }

    function promoted() {
        $this->pageTitle = __('Nodes', true);

        $this->paginate['Node']['order'] = 'Node.id DESC';
        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
        $this->paginate['Node']['conditions'] = array(
            'Node.status' => 1,
            'Node.promote' => 1,
        );

        if (isset($this->params['named']['type'])) {
            $type = $this->Node->Term->Vocabulary->Type->findByAlias($this->params['named']['type']);
            if (!isset($type['Type']['id'])) {
                $this->Session->setFlash(__('Invalid content type.', true));
                $this->redirect('/');
            }

            $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
            $this->pageTitle = $type['Type']['title'];
            $this->set(compact('type'));
        }

        $nodes = $this->paginate('Node');
        $this->set(compact('nodes'));
    }

    function view($id = null) {
        if (isset($this->params['named']['slug']) && isset($this->params['named']['type'])) {
            $this->Node->type = $this->params['named']['type'];
            $type = $this->Node->Term->Vocabulary->Type->findByAlias($this->Node->type);
            $node = $this->Node->find('first', array(
                'conditions' => array(
                    'Node.slug' => $this->params['named']['slug'],
                    'Node.type' => $this->params['named']['type'],
                    'Node.status' => 1,
                ),
            ));
        } elseif ($id == null) {
            $this->Session->setFlash(__('Invalid content', true));
            $this->redirect('/');
        } else {
            $node = $this->Node->find('first', array(
                'conditions' => array(
                    'Node.id' => $id,
                    'Node.status' => 1,
                ),
            ));
        }

        if (!isset($node['Node']['id'])) {
            $this->Session->setFlash(__('Invalid content', true));
            $this->redirect('/');
        }

        if ($node['Node']['comment_count'] > 0) {
            $comments = $this->Node->Comment->find('threaded', array(
                'conditions' => array(
                    'Comment.node_id' => $node['Node']['id'],
                    'Comment.status' => 1,
                ),
                'contain' => array(
                    'User',
                ),
            ));
        } else {
            $comments = array();
        }

        $this->pageTitle = $node['Node']['title'];
        $this->set(compact('node', 'type', 'comments'));

        if (isset($node['CustomFields']['theme'])) {
            $this->theme = $node['CustomFields']['theme'];
        }
        if (isset($node['CustomFields']['layout'])) {
            $this->layout = $node['CustomFields']['layout'];
        }
        if (isset($node['CustomFields']['view'])) {
            $this->render($node['CustomFields']['view']);
        }
    }

}
?>