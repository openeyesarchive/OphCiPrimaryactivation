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

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('onset_time'))?></td>
			<td><span class="big"><?php echo substr($element->onset_time,0,5)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('first_attender_time'))?></td>
			<td><span class="big"><?php echo substr($element->first_attender_time,0,5)?></span></td>
		</tr>
		<tr>
			<td width="30%">ECG readings</td>
			<td>
				<span class="big">
					<?php if ($element->lbbb && $element->rbbb) {
						echo "LBBB, RBBB";
					} else if ($element->lbbb) {
						echo "LBBB";
					} else if ($element->rbbb) {
						echo "RBBB";
					} else {
						foreach ($element->readings as $type => $positions) {
							echo "$type: ".implode(', ',$positions)."<br/>";
						}
					}?>
				</span>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('hospital_arrival_time'))?></td>
			<td><span class="big"><?php echo substr($element->hospital_arrival_time,0,5)?></span></td>
		</tr>
	</tbody>
</table>
