<div class="extensions-locales">
    <h2><?php echo $this->pageTitle; ?></h2>
    <?php
        echo $form->create('Locale', array(
            'url' => array(
                'plugin' => 'extensions',
                'controller' => 'extensions_locales',
                'action' => 'add',
            ),
            'type' => 'file',
        ));
    ?>
    <fieldset>
    <?php
        echo $form->input('Locale.file', array('label' => __('Upload', true), 'type' => 'file',));
    ?>
    </fieldset>
    <?php echo $form->end(__('Submit',true));?>
</div>