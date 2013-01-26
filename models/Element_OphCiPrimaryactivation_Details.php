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

/**
 * This is the model class for table "et_ophciprimaryactivation_details".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $onset_time
 * @property string $first_attender_time
 * @property integer $reading1_id
 * @property integer $lbbb
 * @property integer $rbbb
 * @property string $hospital_arrival_time
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property Address $reading1
 */

class Element_OphCiPrimaryactivation_Details extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophciprimaryactivation_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, onset_time, first_attender_time, reading1_id, reading2_id, reading3_id, reading4_id, reading5_id, reading6_id, reading7_id, reading8_id, reading9_id, reading10_id, reading11_id, reading12_id, lbbb, rbbb, hospital_arrival_time, ', 'safe'),
			array('onset_time, first_attender_time, reading1_id, lbbb, rbbb, hospital_arrival_time, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, onset_time, first_attender_time, reading1_id, lbbb, rbbb, hospital_arrival_time, ', 'safe', 'on' => 'search'),
		);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'reading1' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading1_id'),
			'reading2' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading2_id'),
			'reading3' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading3_id'),
			'reading4' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading4_id'),
			'reading5' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading5_id'),
			'reading6' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading6_id'),
			'reading7' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading7_id'),
			'reading8' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading8_id'),
			'reading9' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading9_id'),
			'reading10' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading10_id'),
			'reading11' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading11_id'),
			'reading12' => array(self::BELONGS_TO, 'OphCiPrimaryactivation_ECG_Reading', 'reading12_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'onset_time' => 'Pain onset time',
			'first_attender_time' => 'First attender time',
			'reading1_id' => 'I',
			'reading2_id' => 'aVr',
			'reading3_id' => 'V1',
			'reading4_id' => 'V4',
			'reading5_id' => 'II',
			'reading6_id' => 'aVl',
			'reading7_id' => 'V2',
			'reading8_id' => 'V5',
			'reading9_id' => 'III',
			'reading10_id' => 'aVf',
			'reading11_id' => 'V3',
			'reading12_id' => 'V6',
			'lbbb' => 'LBBB',
			'rbbb' => 'RBBB',
			'hospital_arrival_time' => 'Hospital arrival time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('onset_time', $this->onset_time);
		$criteria->compare('first_attender_time', $this->first_attender_time);
		$criteria->compare('reading1_id', $this->reading1_id);
		$criteria->compare('lbbb', $this->lbbb);
		$criteria->compare('rbbb', $this->rbbb);
		$criteria->compare('hospital_arrival_time', $this->hospital_arrival_time);
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function afterFind() {
		$this->onset_time = substr($this->onset_time,0,5);
		$this->first_attender_time = substr($this->onset_time,0,5);
		$this->hospital_arrival_time = substr($this->onset_time,0,5);
	}

	public function setDefaultOptions() {
		if (Yii::app()->getController()->getAction()->id == 'create') {
			$this->onset_time = date('H:i');
			$this->first_attender_time = date('H:i');
			$this->hospital_arrival_time = date('H:i');
		}
	}

	public function getReadings() {
		$readings = array();

		foreach (OphCiPrimaryactivation_ECG_Reading::model()->findAll(array('order'=>'display_order')) as $type) {
			if ($type->name != 'Normal') {
				for ($i=1;$i<=12;$i++) {
					if ($this->{'reading'.$i.'_id'} == $type->id) {
						$readings[$type->name][] = $this->getAttributeLabel('reading'.$i.'_id');
					}
				}
			}
		}

		return $readings;
	}
}
?>
