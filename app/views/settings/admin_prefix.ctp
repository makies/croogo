<div class="settings form">
    <h2><?php echo $this->pageTitle; ?></h2>

    <form method="post" action="<?php echo $html->url(array('controller' => 'settings', 'action' => 'prefix', $prefix)); ?>">
        <fieldset>
        <?php
            $i = 0;
            foreach ($settings AS $setting) {
                $key = $setting['Setting']['key'];
                $keyE = explode('.', $key);
                $keyTitle = Inflector::humanize($keyE['1']);

                $label = $keyTitle;
                if ($setting['Setting']['title'] != null) {
                    $label = $setting['Setting']['title'];
                }

                $inputType = 'text';
                if ($setting['Setting']['input_type'] != null) {
                    $inputType = $setting['Setting']['input_type'];
                }

                echo '<div class="setting">';
                    echo $form->input("Setting.$i.id", array('value' => $setting['Setting']['id']));
                    echo $form->input("Setting.$i.key", array('type' => 'hidden', 'value' => $key));
                    if ($setting['Setting']['input_type'] == 'checkbox') {
                        if ($setting['Setting']['value'] == 1) {
                            echo $form->input("Setting.$i.value", array(
                                'label' => __($label,true),
                                'type' => $setting['Setting']['input_type'],
                                'checked' => 'checked',
                                'rel' => $setting['Setting']['description'],
                            ));
                        } else {
                            echo $form->input("Setting.$i.value", array(
                                'label' => __($label,true),
                                'type' => $setting['Setting']['input_type'],
                                'rel' => $setting['Setting']['description'],
                            ));
                        }
                    } else {
                        echo $form->input("Setting.$i.value", array(
                            'label' => __($label,true),
                            'type' => $inputType,
                            'value' => $setting['Setting']['value'],
                            'rel' => $setting['Setting']['description'],
                        ));
                    }
                echo "</div>";
                $i++;
            }
        ?>
        </fieldset>
    <?php echo $form->end(__("Submit",true)); ?>
</div>