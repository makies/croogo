<div class="node-more-info">
<?php
    $type = $types_for_layout[$layout->node('type')];

    if (is_array($layout->node['Term']) && count($layout->node['Term']) > 0) {
        $nodeTerms = Set::combine($layout->node, 'Term.{n}.slug', 'Term.{n}.title');
        $nodeTermLinks = array();
        if (count($nodeTerms) > 0) {
            foreach ($nodeTerms AS $termSlug => $termTitle) {
                $nodeTermLinks[] = $html->link($termTitle, array(
                    'controller' => 'nodes',
                    'action' => 'term',
                    'type' => $layout->node('type'),
                    'slug' => $termSlug,
                ));
            }
            echo vsprintf(__('Posted in %s',true),implode(', ', $nodeTermLinks));
        }
    }

    if ($this->params['action'] != 'view' &&
        $type['Type']['comment_status']) {
        if (isset($nodeTerms) && count($nodeTerms) > 0) {
            echo ' | ';
        }

        $commentCount = '';
        if ($layout->node('comment_count') == 0) {
            $commentCount = __('Leave a comment', true);
        } elseif ($layout->node('comment_count') == 1) {
            $commentCount = $layout->node('comment_count') . ' ' . __('Comment', true);
        } else {
            $commentCount = $layout->node('comment_count') . ' ' . __('Comments', true);
        }
        echo $html->link($commentCount, $html->url($layout->node('url'), true) . '#comments');
    }
?>
</div>