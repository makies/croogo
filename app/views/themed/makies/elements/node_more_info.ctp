<div class="node-more-info">
<?php
    $type = $types_for_layout[$layout->node('type')];

    
//    // twitter
//	$twitter_array['onclick'] = "window.open('http://twitter.com/home?status='+encodeURIComponent(location.href)+'%20'+encodeURIComponent(document.title)+'');";
//	$twitter_array['title'] = "ReTweet";
//	$twitter_array['class'] = "twitter";
//	echo $html->link('Twitterでつぶやく', 'javascript:void(0);', $twitter_array);    

	// コメント
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
        echo $html->link($commentCount, $html->url($layout->node('url'), true) . '#comments', array('class' => 'comment'));
    }

    // ブログツール (AddClips)
    $script = "<!--
  AddClipsUrl    = location.href;
  AddClipsTitle  = document.title;
  AddClipsId = '1216ECB4CB80C';
  AddClipsBcolor='#FF6600';
  AddClipsNcolor='#FF9900';
  AddClipsTcolor='#FFFFFF';
  AddClipsType='1';
  AddClipsVerticalAlign='middle'; 
  AddClipsDefault='bookmark'; 
// -->";

echo $javascript->codeBlock($script, array('inline'=>false));
echo $javascript->link('http://js.addclips.org/v2/addclips.js');
?>

</div>