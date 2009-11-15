<?php
    $javascript->link(array('nodes'), false);
    if (Configure::read('Writing.wysiwyg')) {
        $javascript->codeBlock($tinymce->fileBrowserCallBack(), array('inline' => false));
        $javascript->codeBlock($tinymce->init('NodeBody'), array('inline' => false));
    }
?>
<div class="nodes form">
    <h2><?php echo $this->pageTitle; ?></h2>

    <?php
        echo $form->create('Node', array('url' => array(
            'action' => 'translate',
            'locale' => $this->params['named']['locale'],
        )));
    ?>
    <fieldset>
        <div class="tabs">
            <ul>
                <li><a href="#node-main"><span><?php __($type['Type']['title']); ?></span></a></li>
            </ul>

            <div id="node-main">
            <?php
                foreach ($fields AS $field) {
                    echo $form->input('Node.'.$field);
                }
             ?>
             </div>
        </div>
    </fieldset>
    <?php echo $form->end('Submit');?>
</div>