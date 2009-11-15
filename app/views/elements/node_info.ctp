<div class="node-info">
<?php
    $type = $types_for_layout[$node['Node']['type']];

    if ($type['Type']['format_show_author']) {
        if ($node['User']['website'] != null) {
            $author = $html->link($node['User']['name'], $node['User']['website']);
        } else {
            $author = $node['User']['name'];
        }
        $author = $html->tag('span', $author, array(
            'class' => 'author',
        ));
	    if ($type['Type']['format_show_author'] || $type['Type']['format_show_date']) {
	    	echo vsprintf(__('Posted by %s',true), $author);
	    }else{
	    	echo vsprintf(__('By %s',true), $author);
	    }
        
    }
    if ($type['Type']['format_show_date']) {
        echo ' ' . vsprintf(__('on %s', true), $html->tag('span', $time->nice($node['Node']['created']), array('class' => 'date'))) . ' ';
    }
?>
</div>