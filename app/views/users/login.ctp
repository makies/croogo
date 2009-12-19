<div class="users form">
    <h2><?php __('Login'); ?></h2>
    <?php echo $form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
        <fieldset>
        <?php
            echo $form->input('username',array("label"=>"Username"));
            echo $form->input('password',array("label"=>"Password"));
        ?>
        </fieldset>
    <?php echo $form->end(__('Submit',true));?>
</div>