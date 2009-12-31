<div id="comment-<?php echo $comment['Comment']['id']; ?>" class="comment<?php if ($node['Node']['user_id'] == $comment['Comment']['user_id']) { echo ' author'; } ?>">
    <div class="comment-info">
        <span class="date"><?php echo vsprintf(__('%s', true), $time->format(Configure::read('Comment.date_time_format'), $comment['Comment']['created'])); ?></span>
        <span class="name">
        <?php
            if ($comment['Comment']['website'] != null) {
                echo $html->link($comment['Comment']['name'], $comment['Comment']['website'], array('target' => '_blank'));
            } else {
                echo $comment['Comment']['name'];
            }
        ?>
        </span>
        <span class="avatar"><?php echo $html->image('http://www.gravatar.com/avatar/' . md5(strtolower($comment['Comment']['email'])) . '?s=32') ?></span>
    </div>
    <div class="comment-body"><?php echo nl2br($comment['Comment']['body']); ?></div>
    <div class="comment-reply">
    <?php
        if ($level <= Configure::read('Comment.level')) {
            echo $html->link(__('Reply to this comment', true), array(
                'controller' => 'comments',
                'action' => 'add',
                $node['Node']['id'],
                $comment['Comment']['id'],
            ));
        }
    ?>
    </div>
    
    <?php
        if (isset($comment['children']) && count($comment['children']) > 0) {
            foreach ($comment['children'] AS $childComment) {
                echo $this->element('comment', array('comment' => $childComment, 'level' => $level + 1));
            }
        }
    ?>
</div>