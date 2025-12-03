<?php
/**
 * @package   Churchy - Nonprofit Joomla Template
 * @version   1.5.1 - 24 January 2016
 * @author    Webthemer - Web Development Studio http://www.webthemer.com | Framework: YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) 2012 - 2016 Webthemer | Framework: Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

?>

<div id="system">

	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h1 class="title"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>

	<?php
	
	// init vars
	$articles = '';
	
	// leading articles
	foreach ($this->lead_items as $item) {
		$this->item = $item;
		$articles  .= '<div class="grid-box width100 leading">'.$this->loadTemplate('item').'</div>';
	}
	
	// intro articles
	$columns = array();
	$i       = 0;

	foreach ($this->intro_items as $item) {
		$column = $i++ % $this->params->get('num_columns', 2);

		if (!isset($columns[$column])) {
			$columns[$column] = '';
		}

		$this->item = $item;
		$columns[$column] .= $this->loadTemplate('item');
	}
	
	// render intro columns
	if ($count = count($columns)) {
		for ($i = 0; $i < $count; $i++) {
			$articles .= '<div class="grid-box width'.intval(100 / $count).'">'.$columns[$i].'</div>';
		}
	}

	if ($articles) {
		echo '<div class="items items-col-'.$count.' grid-block">'.$articles.'</div>';
	}

	?>

	<?php if (!empty($this->link_items)) : ?>
	<div class="item-list">
		<h3><?php echo JText::_('COM_CONTENT_MORE_ARTICLES'); ?></h3>
		<ul>
			<?php foreach ($this->link_items as &$item) : ?>
			<li>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug)); ?>"><?php echo $item->title; ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>

	<?php if (($this->params->def('show_pagination', 1) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
	<?php echo $this->pagination->getPagesLinks(); ?>
	<?php endif; ?>

</div>