<?php
    $javascript->link(array('vocabularies'), false);
?>
<div class="vocabularies form">
    <h2><?php echo $this->pageTitle; ?></h2>
    <?php echo $form->create('Vocabulary');?>
        <fieldset>
            <div class="tabs">
                <ul>
                    <li><span><a href="#vocabulary-basic"><?php __('Vocabulary'); ?></a></span></li>
                    <li><span><a href="#vocabulary-options"><?php __('Options'); ?></a></span></li>
                </ul>

                <div id="vocabulary-basic">
                    <?php
                        echo $form->input('title');
                        echo $form->input('alias', array('class' => 'alias'));
                        echo $form->input('description');
                        echo $form->input('Type.Type');
                    ?>
                </div>

                <div id="vocabulary-options">
                    <?php
                        echo $form->input('required');
                        echo $form->input('multiple');
                        echo $form->input('tags');
                    ?>
                </div>
            </div>
        </fieldset>
   <?php echo $form->end(__('Submit',true));?>
</div>