<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined('_JEXEC') or die;

?>

<?php if (($this->params->get('address_check') > 0) &&  ($this->item->address || $this->item->suburb  || $this->item->state || $this->item->country || $this->item->postcode)) : ?>
<div class="address">
	<h3><?php echo JText::_('COM_CONTACT_ADDRESS'); ?></h3>
	<ul class="blank">
	
		<?php if ($this->item->address && $this->params->get('show_street_address')) : ?>
		<li class="street"><?php echo nl2br($this->item->address); ?></li>
		<?php endif; ?>
		
		<?php if ($this->item->suburb && $this->params->get('show_suburb')) : ?>
		<li class="suburb"><?php echo $this->item->suburb; ?></li>
		<?php endif; ?>
		
		<?php if ($this->item->state && $this->params->get('show_state')) : ?>
		<li class="state"><?php echo $this->item->state; ?></li>
		<?php endif; ?>
		
		<?php if ($this->item->postcode && $this->params->get('show_postcode')) : ?>
		<li class="postcode"><?php echo $this->item->postcode; ?></li>
		<?php endif; ?>
		
		<?php if ($this->item->country && $this->params->get('show_country')) : ?>
		<li class="country"><?php echo $this->item->country; ?></li>
		<?php endif; ?>

	</ul>
</div>
<?php endif; ?>

<?php if ( ($this->item->email_to && $this->params->get('show_email')) || 
			($this->item->telephone && $this->params->get('show_telephone')) || 
			($this->item->fax && $this->params->get('show_fax')) || 
			($this->item->mobile && $this->params->get('show_mobile')) || 
			($this->item->webpage && $this->params->get('show_webpage'))) : ?>
<div class="contact">
	<h3><?php echo JText::_('COM_CONTACT_DETAILS'); ?></h3>
	<ul class="blank">
	
		<?php if ($this->item->email_to && $this->params->get('show_email')) : ?>
		<li><?php echo $this->item->email_to; ?></li>
		<?php endif; ?>
	
		<?php if ($this->item->telephone && $this->params->get('show_telephone')) : ?>
		<li><?php echo nl2br($this->item->telephone); ?></li>
		<?php endif; ?>
		
		<?php if ($this->item->fax && $this->params->get('show_fax')) : ?>
		<li><?php echo nl2br($this->item->fax); ?></li>
		<?php endif; ?>
		
		<?php if ($this->item->mobile && $this->params->get('show_mobile')) :?>
		<li><?php echo nl2br($this->item->mobile); ?></li>
		<?php endif; ?>
		
		<?php if ($this->item->webpage && $this->params->get('show_webpage')) : ?>
		<li><a href="<?php echo $this->item->webpage; ?>" target="_blank"><?php echo $this->item->webpage; ?></a></li>
		<?php endif; ?>

	</ul>
</div>
<?php endif;