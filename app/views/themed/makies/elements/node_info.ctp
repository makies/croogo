<div class="node-info">
<?php
    $type = $types_for_layout[$layout->node('type')];

    // はてブ件数表示画像
	$url = $html->url($layout->node('path'), true);
	$hatebu_img_url = "http://b.hatena.ne.jp/entry/image/" . $url;
    echo $html->image($hatebu_img_url, array());
    // はてブ件数表示画像　終了

    // 日付
    if ($type['Type']['format_show_date']) {
        echo $html->tag('span', $time->format(Configure::read('Reading.date_time_format'), $layout->node('created')), array('class' => 'date'));
    }
    
	// タグ
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
    ?>
</div>
