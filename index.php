<?php
/**
 * @package   Churchy - Nonprofit Joomla Template
 * @version   1.5.1 - 24 January 2016
 * @author    Webthemer - Web Development Studio http://www.webthemer.com | Framework: YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) 2012 - 2016 Webthemer | Framework: Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

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

// include config	
include_once(dirname(__FILE__).'/config.php');

// get warp
$warp = Warp::getInstance();

// load main template file, located in /layouts/template.php
echo $warp['template']->render('template');