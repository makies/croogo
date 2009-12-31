<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title_for_layout; ?> | <?php echo Configure::read('Site.title'); ?></title>
    <?php
        echo $layout->meta();
        echo $layout->feed();
        echo $javascript->link(array(
			'jquery/jquery.min',
		));
        echo $layout->js();
        echo $html->css(array('reset', 'default', 'theme'));
        if (Configure::read('debug')) {
	        echo $html->css(array('debug'));
        }
        echo $scripts_for_layout;
    ?>
</head>
<body>
	<div id="bg_star">
		
	</div>
	<div id="container">
		<div id="header">
			<div id="top">
				<?php echo $html->link(__('Site Admin', true), array('admin' => true)); ?>
				<div id="search">
					<?php 
					echo $form->create('Search', array('type' => 'get', 'url' => array('controller' => 'nodes', 'action' => 'search')));
					echo $form->input('q', array('label' => false, 'div' => false, 'id' => 'search_field', 'value' => (isset($this->params['url']['q']) ? $this->params['url']['q'] : '')));
					echo $form->submit(__('Search',true), array('div' => false));
					echo $form->end();
					?>
				</div>
			</div>
			<h1 id="logo" class="left"><?php echo $html->link($html->image('logo/croogo.jp.gif', array('alt'=>Configure::read('Site.title'))), array(), null, false, false); ?></h1>
			<div id="tagline" class="left"><?=Configure::read('Site.tagline')?></div>
			<div class="breaker"></div>
		</div>
		<div id="main">
			<div id="nav">
				<?php echo $layout->menu('main', array('dropdown' => true)); ?>
			</div>
			<div id="content">
				<?php
				$layout->sessionFlash();
				echo $content_for_layout;
				?>
			</div>
			<div id="sidebar">
				<?php echo $layout->blocks('right'); ?>
			</div>
			<div class="breaker"></div>
		</div>
		<div id="cork">
			<?php echo $layout->blocks('footer'); ?>
		</div>
		<div id="footer">
			<div class="left">Copyright &copy; <?=date('Y')?> <?=Configure::read('Site.title')?>, All Rights Reserved.</div>
			<div class="right">Powered by <a href="http://croogo.org/">Croogo</a>, Built with <a href="http://cakephp.org/">CakePHP</a></div>
			<div class="breaker"></div>
		</div>
	</div>
</body>
</html>