<?php echo vsprintf(__('A new comment has been posted under: %s', true), $node['Node']['title']); ?> 

<?php echo Router::url($node['Node']['url'], true) ?>