<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>

<div id="system">

	<?php
	$this->subtemplatename = 'articles';
	
	// Create proper data object for Joomla 6 layout
	$displayData = new stdClass();
	$displayData->params = isset($this->category->params) ? $this->category->params : Joomla\CMS\Factory::getApplication()->getParams();
	$displayData->category = $this->category;
	$displayData->items = $this->items ?? [];
	$displayData->children = $this->children ?? [];
	$displayData->subtemplatename = $this->subtemplatename;
	$displayData->maxLevel = 0;
	$displayData->pageclass_sfx = $this->pageclass_sfx ?? '';
	
	// Add required methods
	$displayData->get = function($key) use ($displayData) {
		return $displayData->$key ?? null;
	};
	$displayData->escape = function($text) {
		return $this->escape($text);
	};
	$displayData->loadTemplate = function($name = null) {
		return $this->loadTemplate($name);
	};
	
	echo Joomla\CMS\Layout\LayoutHelper::render('joomla.content.category_default', $displayData);
	?>

</div>