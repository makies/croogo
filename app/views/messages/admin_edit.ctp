<div class="messages form">
    <h2><?php echo $this->pageTitle; ?></h2>

    <?php echo $form->create('Message');?>
        <fieldset>
        <?php
            echo $form->input('id');
            echo $form->input('name');
            echo $form->input('email');
            echo $form->input('title');
            echo $form->input('body');
            echo $form->input('phone');
            echo $form->input('address');
        ?>
        </fieldset>
    <?php echo $form->end(__('Submit',true));?>
</div>