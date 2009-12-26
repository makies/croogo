<div class="node-more-info">
<?php
    $type = $types_for_layout[$layout->node('type')];

    if ($this->params['action'] != 'view' &&
        $type['Type']['comment_status']) {
        if (isset($nodeTerms) && count($nodeTerms) > 0) {
            echo ' | ';
        }

        $commentCount = '';
        if ($layout->node('comment_count') == 0) {
            $commentCount = __('No comments yet', true);
        } elseif ($layout->node('comment_count') == 1) {
            $commentCount = $layout->node('comment_count') . ' ' . __('Comment', true);
        } else {
            $commentCount = $layout->node('comment_count') . ' ' . __('Comments', true);
        }
        echo $html->link($commentCount, $html->url($layout->node('url'), true) . '#comments', array("class"=>"comment_count"));
    }
?>
</div>