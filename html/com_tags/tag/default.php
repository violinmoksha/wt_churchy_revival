<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;

// Joomla 6 compatibility: Create class aliases for deprecated J3 classes
if (!class_exists('JHtml')) {
	class_alias('Joomla\CMS\HTML\HTMLHelper', 'JHtml');
}
if (!class_exists('JFactory')) {
	class_alias('Joomla\CMS\Factory', 'JFactory');
}
if (!class_exists('JUri')) {
	class_alias('Joomla\CMS\Uri\Uri', 'JUri');
}
if (!class_exists('JRoute')) {
	class_alias('Joomla\CMS\Router\Route', 'JRoute');
}
if (!class_exists('TagsHelperRoute')) {
	class_alias('Joomla\CMS\Helper\TagsHelperRoute', 'TagsHelperRoute');
}
if (!class_exists('JText')) {
	class_alias('Joomla\CMS\Language\Text', 'JText');
}

\Joomla\CMS\HTML\HTMLHelper::addIncludePath(JPATH_COMPONENT.'/helpers');
require_once JPATH_COMPONENT.'/helpers/route.php';

?>

<div id="system">

	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1 class="title"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>

	<?php if ($this->params->get('show_tag_title', 1)) : ?>
	<h2 class="subtitle">Articles Tagged ‘<?php echo \Joomla\CMS\HTML\HTMLHelper::_('content.prepare', $this->document->title, '', 'com_tag.tag'); ?>’</h2>
	<?php endif; ?>

	<?php // We only show a tag description if there is a single tag. ?>
	<?php if (count($this->item) == 1 && (($this->params->get('tag_list_show_tag_image', 1) == 1 && !empty($images->image_fulltext)) || ($this->params->get('tag_list_show_tag_description') == 1 && $this->item[0]->description))) : ?>
	<div class="description">
		<?php $images = json_decode($this->item[0]->images); ?>
		<?php if ($this->params->get('tag_list_show_tag_image', 1) == 1 && !empty($images->image_fulltext)) : ?>
			<img src="<?php echo htmlspecialchars($images->image_fulltext);?>">
		<?php endif; ?>
		<?php if ($this->params->get('tag_list_show_tag_description') == 1 && $this->item[0]->description) : ?>
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('content.prepare', $this->item[0]->description, '', 'com_tags.tag'); ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php // If there are multiple tags and a description or image has been supplied use that. ?>
	<?php if (($this->params->get('tag_list_description', '') > '') || ($this->params->get('show_description_image', 1) == 1 && $this->params->get('tag_list_image'))): ?>
	<div class="description">
		<?php if ($this->params->get('show_description_image', 1) == 1 && $this->params->get('tag_list_image')) :?>
			<img src="<?php echo $this->params->get('tag_list_image');?>">
		<?php endif; ?>
		<?php if ($this->params->get('tag_list_description', '') > '') :?>
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('content.prepare', $this->params->get('tag_list_description'), '', 'com_tags.tag'); ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>

</div>