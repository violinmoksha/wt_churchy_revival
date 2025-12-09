<?php
/**
 * @package   Churchy - Nonprofit Joomla Template
 * @version   1.5.1 - 24 January 2016
 * @author    Webthemer - Web Development Studio http://www.webthemer.com | Framework: YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) 2012 - 2016 Webthemer | Framework: Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// get template configuration
include($this['path']->path('layouts:template.config.php'));
	
?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>">
<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body id="page" class="page <?php echo $this['config']->get('body_classes'); ?>" data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>
<?php if ($this['modules']->count('absolute')) : ?>
<div id="absolute"> <?php echo $this['modules']->render('absolute'); ?> </div>
<?php endif; ?>
<?php if ($this['config']->get('fixed')) : ?>
<div id="fixed-page" class="wrapper clearfix">
	<?php endif; ?>
	<header id="header">
		<?php if ($this['modules']->count('toolbar-l + toolbar-r') || $this['config']->get('date')) : ?>
		<div id="toolbar_wrapper">
			<div class="wrapper">
				<div id="toolbar" class="clearfix">
					<?php if ($this['modules']->count('toolbar-l') || $this['config']->get('date')) : ?>
					<div class="float-left">
						<?php if ($this['config']->get('date')) : ?>
						<time datetime="<?php echo $this['config']->get('datetime'); ?>"><?php echo $this['config']->get('actual_date'); ?></time>
						<?php endif; ?>
						<?php echo $this['modules']->render('toolbar-l'); ?> </div>
					<?php endif; ?>
					<?php if ($this['modules']->count('toolbar-r')) : ?>
					<div class="float-right"><?php echo $this['modules']->render('toolbar-r'); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div id="headerbar" class="clearfix">
			<?php if ($this['modules']->count('logo')) : ?>
			<div id="header_wrapper">
				<div class="wrapper clearfix">
					<div id="logo" class="float-left"><a href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['modules']->render('logo'); ?></a></div>
					<div class="float-right headerbar"><?php echo $this['modules']->render('headerbar'); ?></div>
				</div>
			</div>
			<?php endif; ?>
			<?php if ($this['modules']->count('menu')) : ?>
			<div id="menubar_wrapper">
				<div class="wrapper clearfix">
					<nav id="menu"><?php echo $this['modules']->render('menu'); ?></nav>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</header>
	<?php if (true) : /* Static slideshow replacing Widgetkit */ ?>
	<div id="top-a_wrapper">
		<div class="wrapper clearfix">
			<section id="top-a" class="grid-block">
				<div class="grid-box width100 grid-h">
					<div class="module mod-box deepest">
						<div id="slideshow-homepage" class="wk-slideshow-static">
							<div class="slides-wrapper">
								<ul class="slides">
									<li class="slide active">
										<article class="wk-content clearfix">
											<a href="/index.php">
												<img src="/images/lightbox_images_homepage/CTS-family-camp2023-980px.jpg" alt="Chiang Mai Theological Seminary" width="980" height="300" />
												<div class="overlay">
													<h3><span style="color: white;">Chiang Mai Theological Seminary</span></h3>
												</div>
											</a>
										</article>
									</li>
									<li class="slide">
										<article class="wk-content clearfix">
											<a href="/index.php/blogs/gleanings-from-the-field/256-a-brief-survey-of-thai-bible-translations">
												<img src="/images/lightbox_images_homepage/bible_thai_john_980_300.jpg" alt="Thai Bible" width="980" height="300" />
												<div class="overlay">
													<h3><span style="color: white;">Thai Bible</span></h3>
												</div>
											</a>
										</article>
									</li>
									<li class="slide">
										<article class="wk-content clearfix">
											<a href="/index.php">
												<img src="/images/lightbox_images_homepage/skytrain_sunset_bangkok_980_300.jpg" alt="Sunset in Bangkok" width="980" height="300" />
												<div class="overlay">
													<h3><span style="color: white;">Sunset in Bangkok</span></h3>
												</div>
											</a>
										</article>
									</li>
								</ul>
								<div class="next" onclick="nextSlide()"></div>
								<div class="prev" onclick="prevSlide()"></div>
							</div>
							<ul class="nav">
								<li onclick="goToSlide(0)"><span></span></li>
								<li onclick="goToSlide(1)"><span></span></li>
								<li onclick="goToSlide(2)"><span></span></li>
							</ul>
						</div>
						<script>
						let currentSlide = 0;
						const slides = document.querySelectorAll('#slideshow-homepage .slide');
						const navDots = document.querySelectorAll('#slideshow-homepage .nav li');
						
						function showSlide(n) {
							slides.forEach(s => s.classList.remove('active'));
							navDots.forEach(d => d.classList.remove('active'));
							currentSlide = (n + slides.length) % slides.length;
							slides[currentSlide].classList.add('active');
							navDots[currentSlide].classList.add('active');
						}
						
						function nextSlide() {
							showSlide(currentSlide + 1);
						}
						
						function prevSlide() {
							showSlide(currentSlide - 1);
						}
						
						function goToSlide(n) {
							showSlide(n);
						}
						
						// Auto-advance every 5 seconds
						setInterval(nextSlide, 5000);
						</script>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($this['modules']->count('top-b')) : ?>
	<div id="top-b_wrapper">
		<div class="wrapper clearfix">
			<section id="top-b" class="grid-block"><?php echo $this['modules']->render('top-b', array('layout'=>$this['config']->get('top-b'))); ?></section>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($this['modules']->count('innertop + innerbottom + sidebar-a + sidebar-b') || $this['config']->get('system_output')) : ?>
	<div id="main_wrapper">
		<div class="wrapper clearfix">
			<div class="main-shadow-top"></div>
			<div id="main" class="grid-block">
				<div id="maininner" class="grid-box">
					<?php if ($this['modules']->count('innertop')) : ?>
					<section id="innertop" class="grid-block"><?php echo $this['modules']->render('innertop', array('layout'=>$this['config']->get('innertop'))); ?></section>
					<?php endif; ?>
					<?php if ($this['modules']->count('breadcrumbs')) : ?>
					<section id="breadcrumbs"><?php echo $this['modules']->render('breadcrumbs'); ?></section>
					<?php endif; ?>
					<?php if ($this['config']->get('system_output')) : ?>
					<section id="content" class="grid-block"><?php echo $this['template']->render('content'); ?></section>
					<?php endif; ?>
					<?php if ($this['modules']->count('innerbottom')) : ?>
					<section id="innerbottom" class="grid-block"><?php echo $this['modules']->render('innerbottom', array('layout'=>$this['config']->get('innerbottom'))); ?></section>
					<?php endif; ?>
				</div>
				<!-- maininner end -->
				<?php if ($this['modules']->count('sidebar-a')) : ?>
				<aside id="sidebar-a" class="grid-box"><?php echo $this['modules']->render('sidebar-a', array('layout'=>'stack')); ?></aside>
				<?php endif; ?>
				<?php if ($this['modules']->count('sidebar-b')) : ?>
				<aside id="sidebar-b" class="grid-box"><?php echo $this['modules']->render('sidebar-b', array('layout'=>'stack')); ?></aside>
				<?php endif; ?>
			</div>
			<!-- main end -->
		</div>
	</div>
	<?php endif; ?>
	<?php if ($this['modules']->count('bottom-a')) : ?>
	<div id="bottom-a_wrapper">
		<div class="wrapper clearfix">
			<div class="main-shadow-bottom"></div>
			<section id="bottom-a" class="grid-block"><?php echo $this['modules']->render('bottom-a', array('layout'=>$this['config']->get('bottom-a'))); ?> </section>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($this['modules']->count('bottom-b')) : ?>
	<div id="bottom-b_wrapper">
		<div class="wrapper clearfix">
			<section id="bottom-b" class="grid-block"><?php echo $this['modules']->render('bottom-b', array('layout'=>$this['config']->get('bottom-b'))); ?></section>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($this['modules']->count('footer-left + debug + footer-right') || $this['config']->get('warp_branding') || $this['config']->get('totop_scroller')) : ?>
	<div id="footer_wrapper">
		<div class="wrapper clearfix">
			<footer id="footer" class="clearfix">
				<div class="float-left copyright footer-left">
					<?php
								echo $this['modules']->render('footer-left');
								$this->output('warp_branding');
								echo $this['modules']->render('debug');
								?>
				</div>
				<div class="float-right footer-right">
					<?php	echo $this['modules']->render('footer-right'); ?>
				</div>
			</footer>
			<?php if ($this['config']->get('totop_scroller')) : ?>
			<div class="totop text-center clearfix"> <a class="align-center" id="totop-scroller" href="#page"></a> </div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($this['config']->get('fixed')) : ?>
</div>
<?php endif; ?>
<?php echo $this->render('footer'); ?>
</body>
</html>