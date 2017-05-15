<?php
	defined('_JEXEC') or die;
	
	/**
		* Template for Joomla! CMS, created with Artisteer.
		* See readme.txt for more details on how to use the template.
	*/
	
	require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';
	
	// Create alias for $this object reference:
	$document = $this;
	
	// Shortcut for template base url:
	$templateUrl = $document->baseurl . '/templates/' . $document->template;
	
	Artx::load("Artx_Page");
	
	// Initialize $view:
	$view = $this->artx = new ArtxPage($this);
	
	// Decorate component with Artisteer style:
	$view->componentWrapper();
	
	JHtml::_('behavior.framework', true);
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $document->language; ?>">
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
		<jdoc:include type="head" />
		<link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/system.css" />
		<link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/general.css" />
		
		<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
		<!--[if lte IE 7]><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.ie7.css" media="screen" /><![endif]-->
		
		
		<script>if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
		<script src="<?php echo $templateUrl; ?>/jquery.js"></script>
		<script>jQuery.noConflict();</script>
		
		<script src="<?php echo $templateUrl; ?>/script.js"></script>
		<script src="<?php echo $templateUrl; ?>/modules.js"></script>
		<?php $view->includeInlineScripts() ?>
		<script>if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.css" media="screen" type="text/css" />
		<script src="<?php echo $templateUrl; ?>/custom.js"></script>
	</head>
	<body>
		
		<div id="main">
			<header class="header">
				<div class="wrapper">
					<div class="main-header">
						<div class="row">
							<?php if ($view->containsModules('menu-left')) : ?>
							<div class="col-sm-5">
								<?php echo $view->position('menu-left'); ?>
							</div>
							<? endif;?>
							<?php if ($view->containsModules('logo')) : ?>
							<div class="col-sm-2">
								<?php echo $view->position('logo'); ?>
							</div>
							<? endif;?>
							
							<?php if ($view->containsModules('menu-right')) : ?>
							<div class="col-sm-5">
								<nav class="nav">
									<?php echo $view->position('menu-right'); ?>
								</nav>
							</div>
							<? endif;?>
						</div>
					</div>
				</div>
				
				<?php if ($view->containsModules('user3', 'extra1', 'extra2')) : ?>
				
				
				<?php if ($view->containsModules('extra1')) : ?>
				<div class="hmenu-extra1"><?php echo $view->position('extra1'); ?></div>
				<?php endif; ?>
				<?php if ($view->containsModules('extra2')) : ?>
				<div class="hmenu-extra2"><?php echo $view->position('extra2'); ?></div>
				<?php endif; ?>
				<?php echo $view->position('user3'); ?>
				
				
				<?php endif; ?>
				
				<?php echo $view->position('header', 'nostyle'); ?>
			</header>
			<div class="sheet clearfix">
				<?php echo $view->position('banner1', 'nostyle'); ?>
				<?php echo $view->positions(array('top1' => 33, 'top2' => 33, 'top3' => 34), 'block'); ?>
				<div class="layout-wrapper">
					<div class="content-layout">
						<div class="content-layout-row">
							<?php if ($view->containsModules('left')) : ?>
							<div class="layout-cell sidebar1">
								<?php echo $view->position('left', 'block'); ?>
								
								
								
								
							</div>
							<?php endif; ?>
							<div class="layout-cell content">
								<?php
									echo $view->position('banner2', 'nostyle');
									if ($view->containsModules('breadcrumb'))
									echo artxPost($view->position('breadcrumb'));
									echo $view->positions(array('user1' => 50, 'user2' => 50), 'article');
									echo $view->position('banner3', 'nostyle');
									echo artxPost(array('content' => '<jdoc:include type="message" />', 'classes' => ' messages'));
									echo '<jdoc:include type="component" />';
									echo $view->position('banner4', 'nostyle');
									echo $view->positions(array('user4' => 50, 'user5' => 50), 'article');
									echo $view->position('banner5', 'nostyle');
								?>
								
								
								
							</div>
						</div>
					</div>
				</div>
				<?php echo $view->positions(array('bottom1' => 33, 'bottom2' => 33, 'bottom3' => 34), 'block'); ?>
				<?php echo $view->position('banner6', 'nostyle'); ?>
				
				
			</div>
			<footer class="footer">
				<div class="footer-inner">
					<?php if ($view->containsModules('copyright')) : ?>
					<?php echo $view->position('copyright', 'nostyle'); ?>
					<?php else: ?>
					<p><a href="#">Link1</a> | <a href="#">Link2</a> | <a href="#">Link3</a></p>
					<p>Copyright © 2017. All Rights Reserved.</p>
					<?php endif; ?>
				</div>
			</footer>
			
		</div>
		
		
		<?php echo $view->position('debug'); ?>
	</body>
</html>									