<div class="types form">
    <h2><?php echo $this->pageTitle; ?></h2>

    <?php echo $form->create('Type');?>
        <fieldset>
            <div class="tabs">
                <ul>
                    <li><a href="#type"><?php __('Type'); ?></a></li>
                    <li><a href="#type-taxonomy"><?php __('Taxonomy'); ?></a></li>
                    <li><a href="#type-format"><?php __('Format'); ?></a></li>
                    <li><a href="#type-comments"><?php __('Comments'); ?></a></li>
                    <li><a href="#type-params"><?php __('Params'); ?></a></li>
                </ul>

                <div id="type">
                <?php
                    echo $form->input('id');
                    echo $form->input('title');
                    echo $form->input('alias', array('disabled' => 'disabled'));
                    echo $form->input('description');
                ?>
                </div>

                <div id="type-taxonomy">
                <?php
                    echo $form->input('Vocabulary.Vocabulary');
                ?>
                </div>

                <div id="type-format">
                <?php
                    echo $form->input('format_show_author', array(
                        'label' => __('Show author\'s name', true),
                    ));
                    echo $form->input('format_show_date', array(
                        'label' => __('Show date', true),
                    ));
                ?>
                </div>

                <div id="type-comments">
                <?php
                    $options = array(
                        '0' => __('Disabled', true),
                        '1' => __('Read only', true),
                        '2' => __('Read/Write', true),
                    );
                    echo $form->input('comment_status', array(
                        'type' => 'radio',
                        'div' => array('class' => 'radio'),
                        'options' => $options,
                    ));
                    echo $form->input('comment_approve', array(
                        'label' => __('Auto approve comments',true),
                    ));
                    echo $form->input('comment_spam_protection', array(
                        'label' => __('Spam protection (requires Akismet API key)',true),
                    ));
                    echo $form->input('comment_captcha', array(
                        'label' => __('Use captcha (requires Recaptcha API key)',true),
                    ));
                ?>

                    <p>
                    <?php
                        echo $html->link(__('You can manage your API keys here.', true), array(
                            'controller' => 'settings',
                            'action' => 'prefix',
                            'Service',
                        ));
                    ?>
                    </p>
                </div>

                <div id="type-params">
                <?php
                    echo $form->input('Type.params');
                ?>
                </div>
            </div>
        </fieldset>
    <?php echo $form->end(__('Submit',true));?>
</div>