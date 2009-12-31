<?php
/**
 * HatenaHook Helper
 *
 * An hook helper for Hatena hook system.
 *
 * @category Helper
 * @package  Croogo
 * @version  1.0
 * @author   makies <makies@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class HatenaHookHelper extends AppHelper {
	
	
/**
 * Other helpers used by this helper
 *
 * @var array
 * @access public
 */
    var $helpers = array('Html', 'Layout');
 
    function afterSetNode() {
        // field values can be changed from hooks
        $this->Layout->setNodeField('title', $this->Layout->node('title') . ' [Modified by ExampleHook]');
    }
 	
}