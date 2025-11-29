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

// include config	
include_once(dirname(__FILE__).'/config.php');

// get warp
$warp = Warp::getInstance();

// set messages
$title   = $this->title;
$error   = $this->error->get('code');
$message = $this->error->get('message');

// set 404 messages
if ($error == '404') {
	use Joomla\CMS\Language\Text;
	use Joomla\CMS\Uri\Uri;
	
	$title   = Text::_('TPL_WARP_404_PAGE_TITLE');
	$message = Text::sprintf('TPL_WARP_404_PAGE_MESSAGE', Uri::root(false), $warp['config']->get('site_name'));
}

// render error layout
echo $warp['template']->render('error', compact('title', 'error', 'message'));