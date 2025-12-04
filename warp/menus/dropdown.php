<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/*
	Class: WarpMenuDropdown
		Menu base class
*/
class WarpMenuDropdown extends WarpMenu {

	/*
		Function: process

		Returns:
			Object
	*/	
	public function process($module, $element) {
		try {
			//return $element; // Disabled due to DOM memory issues in PHP 8.3
			
			foreach ($element->find('ul.level2') as $ul) {
				if (!$ul) continue;

				// get parent li
				$li = $ul->parent();
				if (!$li) continue;
				
				// Skip if dropdown already exists
				if ($li->first('div.dropdown')) continue;
				
				// get columns
				$columns = (int) $li->attr('data-menu-columns');
				if ($columns <= 1) {
					// Single column - just wrap in dropdown div
					$li->append('<div class="dropdown columns1"><div class="dropdown-bg"><div><div class="width100 column"></div></div></div></div>');
					$columnDiv = $li->first('div.dropdown div.dropdown-bg div div.width100.column');
					if ($columnDiv) {
						$columnDiv->append($ul);
					}
					continue;
				}

				if ($columns > 1) {

					$i = 0;
					$column = -1;
					$children = $ul->children('li');
					if (!$children) continue;

					if ($children->length > $columns) {
						$remainder = $children->length % $columns;
						$colrows = ($children->length - $remainder) / $columns;
					} else {
						$remainder = 0;
						$colrows = 1;
					}

					foreach ($children as $child) {
						if (!$child) continue;

						if ($i-- == 0) {
							$i = $remainder-- > 0 ? $colrows : $colrows - 1;
							$column++;
						}
						
						$liUls = $li->children('ul');
						if ($liUls && $liUls->length == $column) {
							$li->append('<ul class="level2"></ul>');
						}
						
						if ($column > 0 && $liUls) {
							$liUls->item($column)->append($child);
						}
					}

					$columns = $column + 1;

				} else {
					$columns = 1;
				}

				// get width
				$width = (int) $li->attr('data-menu-columnwidth');
				$style = $width > 0 ? sprintf(' style="width:%spx;"', $columns * $width) : null;

				// Check if dropdown already exists
				if (!$li->first('div.dropdown')) {
					// append dropdown divs		
					$li->append(sprintf('<div class="dropdown columns%d"%s><div class="dropdown-bg"><div></div></div></div>', $columns, $style));
				}
				$dropdownDiv = $li->first('div.dropdown');
				if (!$dropdownDiv) continue;
				
				$div = $dropdownDiv->first('div.dropdown-bg div:first');
				if (!$div) continue;

				$liUls = $li->children('ul');
				if ($liUls) {
					foreach ($liUls as $i => $u) {
						if (!$u) continue;
						$columnDiv = $div->append(sprintf('<div class="width%d column"></div>', floor(100 / $columns)));
						if ($columnDiv && $columnDiv->children('div')) {
							$columnDiv->children('div')->item($i)->append($u);
						}
					}
				}
			}

			return $element;			
		} catch (Exception $e) {
			// Log error but don't break the site
			error_log('Dropdown processing error: ' . $e->getMessage());
			return $element;
		}
	}

}