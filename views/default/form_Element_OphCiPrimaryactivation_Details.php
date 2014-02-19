<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<?php echo $form->textField($element, 'onset_time', array('style'=>'width: 50px'))?>
	<?php echo $form->textField($element, 'first_attender_time', array('style'=>'width: 50px'))?>
	<?php echo $form->radioBoolean($element, 'lbbb')?>
	<?php echo $form->radioBoolean($element, 'rbbb')?>
	<div id="div_Element_OphCiPrimaryactivation_Details_readings" class="eventDetail">
		<div class="label">Readings:</div>
		<div class="data">
			<?php
			$n=1;
			for ($i=0; $i<3; $i++) {
				for ($j=0; $j<4; $j++) {?>
					<span class="readingLabel"><?php echo CHtml::encode($element->getAttributeLabel('reading'.($n).'_id'))?></span>
					<?php echo $form->dropDownList($element, 'reading'.$n.'_id', CHtml::listData(OphCiPrimaryactivation_ECG_Reading::model()->notDeletedOrPk($element->{'reading'.$n.'_id'})->findAll(array('order'=>'display_order')),'id','name'),array('nowrapper'=>true, 'class'=>'readingValue', 'disabled' => ($element->lbbb || $element->rbbb)));
					$n++;
				}
				echo "<br/>";
			}?>
		</div>
	</div>
	<?php echo $form->textField($element, 'hospital_arrival_time', array('style'=>'width: 50px'))?>
</div>
<script type="text/javascript">
	$('input[name="Element_OphCiPrimaryactivation_Details[lbbb]"]').click(function() {
		toggleReadings();
	});
	$('input[name="Element_OphCiPrimaryactivation_Details[rbbb]"]').click(function() {
		toggleReadings();
	});

	function toggleReadings() {
		if ($('#Element_OphCiPrimaryactivation_Details_lbbb_1').is(':checked') || $('#Element_OphCiPrimaryactivation_Details_rbbb_1').is(':checked')) {
			$('select.readingValue').attr('disabled','disabled');
		} else {
			$('select.readingValue').removeAttr('disabled');
		}
	}
</script>
