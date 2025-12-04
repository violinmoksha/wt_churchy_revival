<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/*
	Class: WarpMenuPre
		Menu base class
*/
class WarpMenuPre extends WarpMenu {

	/*
		Function: process

		Returns:
			Object
	*/		
	public function process($module, $element) {

		// has ul ?
		if (!$element->first('ul:first')) {
			return false;
		}

		// init vars
		$menu   = JFactory::getApplication()->getMenu();
		$images = strpos($module->parameter->get('class_sfx'), 'images-off') === false;        

		foreach ($element->find('li') as $li) {
			if (!$li) continue;

			// get menu item
			if (preg_match('/item-(\d+)/', $li->attr(version_compare(JVERSION, '1.7.0', '>=') ? 'class' : 'id'), $matches)) {
				$item = $menu->getItem($matches[1]);
			}

			// set id
			if (isset($item)) {
				$li->attr('data-id', $item->id);
			}

			// set current and active
			if ($li->hasClass('active')) {
				$li->attr('data-menu-active', $li->hasClass('current') == 'current' ? 2 : 1);
			}

			// set columns and width
			$itemParams = isset($item) ? $item->getParams() : null;
			if ($itemParams && strpos($itemParams->get('pageclass_sfx'), 'column') !== false) {

				if (preg_match('/columns-(\d+)/', $itemParams->get('pageclass_sfx'), $matches)) {
					$li->attr('data-menu-columns', $matches[1]);
				}
				
				if (preg_match('/columnwidth-(\d+)/', $itemParams->get('pageclass_sfx'), $matches)) {
					$li->attr('data-menu-columnwidth', $matches[1]);
				}
				
			}
			
			// set image
			if ($itemParams && $images && ($image = $itemParams->get('menu_image'))) {
				if ($image != -1) {
					$li->attr('data-menu-image', JURI::base().$image);
				}
			}
			
			// set title span and clean empty text nodes
			if (!$li || !method_exists($li, 'children')) continue;
			$children = $li->children('a,span');
			if ($children) {
				foreach ($children as $child) {
					if ($child && method_exists($child, 'html')) {
						$child->html(sprintf('<span>%s</span>', trim($child->text())));
					}
				}
			}

			$li->removeAttr('id')->removeAttr('class');
		}	

		// Remove Joomla 6 menu toggle buttons that aren't needed for Warp theme
		foreach ($element->find('button.mod-menu__toggle-sub') as $button) {
			if ($button) {
				$button->remove();
			}
		}
		
		return $element;
	}

}