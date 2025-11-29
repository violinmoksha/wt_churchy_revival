/*
 * @package   Churchy - Nonprofit Joomla Template
 * @version   1.5.1 - 24 January 2016
 * @author    Webthemer - Web Development Studio http://www.webthemer.com | Framework: YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) 2012 - 2016 Webthemer | Framework: Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

(function ($) {

    $(document).ready(function () {

        var config = $('body').data('config') || {};

        // Using highlight.js
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block);
        });

        // Accordion menu  
        $('.menu-sidebar').accordionMenu({ mode: 'slide' });

        // Dropdown menu  
        // $('#menu').dropdownMenu({ mode: 'slide', dropdownSelector: 'div.dropdown'});  

        // Smoothscroller  
        $('a[href="#page"]').smoothScroller({ duration: 500 });

        // Social buttons  
        $('article[data-permalink]').socialButtons(config);

        // Match height and widths  
        var match = function () {
            $.matchWidth('grid-block', '.grid-block', '.grid-h').match();
        };

        match();

        $(window).bind("load", function () {

            // Dropdown menu
            $('#menu').dropdownMenu({ mode: ($.support.opacity ? 'slide' : 'showhide'), dropdownSelector: 'div.dropdown', fancy: { mode: 'move', duration: 300, transition: 'easeInOutCubic'} });

            match();

        });

    });

})(jQuery);


