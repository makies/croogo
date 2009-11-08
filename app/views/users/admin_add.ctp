<<<<<<< HEAD
<div class="users form">
    <h2><?php __('Add User'); ?></h2>
    <?php echo $form->create('User');?>
        <fieldset>
        <?php
            echo $form->input('role_id', array('selected' => '2'));
            echo $form->input('username');
            echo $form->input('password');
            echo $form->input('name');
            echo $form->input('email');
            echo $form->input('website');
            echo $form->input('status');
        ?>
        </fieldset>
    <?php echo $form->end(__('Submit',true));?>
=======
<div class="users form">
    <h2><?php __('Add User'); ?></h2>
    <?php echo $form->create('User');?>
    <fieldset>
    <?php
        echo $form->input('role_id');
        echo $form->input('username');
        echo $form->input('password');
        echo $form->input('name');
        echo $form->input('email');
        echo $form->input('website');
        echo $form->input('status');
    ?>
    </fieldset>
    <?php echo $form->end('Submit');?>
>>>>>>> 82da0d45404005b68d5e2fedf16396a0cf86c947
</div>