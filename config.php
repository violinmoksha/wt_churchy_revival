<?php
/**
 * @package   Churchy - Nonprofit Joomla Template
 * @version   1.5.1 - 24 January 2016
 * @author    Webthemer - Web Development Studio http://www.webthemer.com | Framework: YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) 2012 - 2016 Webthemer | Framework: Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// PHP 8.3 / Joomla 6 compatibility: Create class aliases for deprecated J3 classes
if (!class_exists('JHtml')) {
	class_alias('Joomla\CMS\HTML\HTMLHelper', 'JHtml');
}
if (!class_exists('JText')) {
	class_alias('Joomla\CMS\Language\Text', 'JText');
}
if (!class_exists('JFactory')) {
	class_alias('Joomla\CMS\Factory', 'JFactory');
}
if (!class_exists('JRoute')) {
	class_alias('Joomla\CMS\Router\Route', 'JRoute');
}
if (!class_exists('JUri')) {
	class_alias('Joomla\CMS\Uri\Uri', 'JUri');
}
if (!class_exists('JRequest')) {
	class_alias('Joomla\CMS\Input\Input', 'JRequest');
}
if (!class_exists('ContentHelperRoute')) {
	class_alias('Joomla\Component\Content\Site\Helper\RouteHelper', 'ContentHelperRoute');
}
if (!class_exists('JModuleHelper')) {
	class_alias('Joomla\CMS\Helper\ModuleHelper', 'JModuleHelper');
}
if (!class_exists('JApplication')) {
	class_alias('Joomla\CMS\Application\CMSApplication', 'JApplication');
}
if (!class_exists('JDocument')) {
	class_alias('Joomla\CMS\Document\Document', 'JDocument');
}
if (!class_exists('JRegistry')) {
	class_alias('Joomla\Registry\Registry', 'JRegistry');
}

require_once(dirname(__FILE__)."/warp/warp.php");

$warp = Warp::getInstance();

// add paths
$warp['path']->register(dirname(__FILE__).'/warp/systems/joomla/helpers','helpers');
$warp['path']->register(dirname(__FILE__).'/warp/systems/joomla/layouts','layouts');
$warp['path']->register(dirname(__FILE__).'/layouts','layouts');
$warp['path']->register(dirname(__FILE__).'/js', 'js');
$warp['path']->register(dirname(__FILE__).'/css', 'css');

// init system
$warp['system']->init();