<?php 
class m130126_152452_event_type_OphCiPrimaryactivation extends CDbMigration
{
	public function up() {
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiPrimaryactivation'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiPrimaryactivation', 'name' => 'Primary activation','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiPrimaryactivation'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Details',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Details','class_name' => 'Element_OphCiPrimaryactivation_Details', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Details'))->queryRow();

		$this->createTable('ophciprimaryactivation_ecg_reading', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(64) NOT NULL',
				'display_order' => 'tinyint(1) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophciprimaryactivation_details_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophciprimaryactivation_details_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophciprimaryactivation_details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->insert('ophciprimaryactivation_ecg_reading',array('name'=>'Normal','display_order'=>1));
		$this->insert('ophciprimaryactivation_ecg_reading',array('name'=>'ST elevation','display_order'=>2));
		$this->insert('ophciprimaryactivation_ecg_reading',array('name'=>'ST depression','display_order'=>3));
		$this->insert('ophciprimaryactivation_ecg_reading',array('name'=>'T-wave inversion','display_order'=>4));
		$this->insert('ophciprimaryactivation_ecg_reading',array('name'=>'Q-waves','display_order'=>5));

		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophciprimaryactivation_details', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'onset_time' => 'time DEFAULT NULL', // Pain onset time
				'first_attender_time' => 'time DEFAULT NULL', // First attender time
				'reading1_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading1
				'reading2_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading2
				'reading3_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading3
				'reading4_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading4
				'reading5_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading5
				'reading6_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading6
				'reading7_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading7
				'reading8_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading8
				'reading9_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading9
				'reading10_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading10
				'reading11_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading11
				'reading12_id' => 'int(10) unsigned NOT NULL DEFAULT 1', // reading12
				'lbbb' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // LBBB
				'rbbb' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // RBBB
				'hospital_arrival_time' => 'time DEFAULT NULL', // Hospital arrival time
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophciprimaryactivation_det_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophciprimaryactivation_det_cui_fk` (`created_user_id`)',
				'KEY `et_ophciprimaryactivation_det_ev_fk` (`event_id`)',
				'KEY `et_ophciprimaryactivation_dr1_id_fk` (`reading1_id`)',
				'KEY `et_ophciprimaryactivation_dr2_id_fk` (`reading2_id`)',
				'KEY `et_ophciprimaryactivation_dr3_id_fk` (`reading3_id`)',
				'KEY `et_ophciprimaryactivation_dr4_id_fk` (`reading4_id`)',
				'KEY `et_ophciprimaryactivation_dr5_id_fk` (`reading5_id`)',
				'KEY `et_ophciprimaryactivation_dr6_id_fk` (`reading6_id`)',
				'KEY `et_ophciprimaryactivation_dr7_id_fk` (`reading7_id`)',
				'KEY `et_ophciprimaryactivation_dr8_id_fk` (`reading8_id`)',
				'KEY `et_ophciprimaryactivation_dr9_id_fk` (`reading9_id`)',
				'KEY `et_ophciprimaryactivation_dr10_id_fk` (`reading10_id`)',
				'KEY `et_ophciprimaryactivation_dr11_id_fk` (`reading11_id`)',
				'KEY `et_ophciprimaryactivation_dr12_id_fk` (`reading12_id`)',
				'CONSTRAINT `et_ophciprimaryactivation_det_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_det_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_det_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr1_id_fk` FOREIGN KEY (`reading1_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr2_id_fk` FOREIGN KEY (`reading2_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr3_id_fk` FOREIGN KEY (`reading3_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr4_id_fk` FOREIGN KEY (`reading4_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr5_id_fk` FOREIGN KEY (`reading5_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr6_id_fk` FOREIGN KEY (`reading6_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr7_id_fk` FOREIGN KEY (`reading7_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr8_id_fk` FOREIGN KEY (`reading8_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr9_id_fk` FOREIGN KEY (`reading9_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr10_id_fk` FOREIGN KEY (`reading10_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr11_id_fk` FOREIGN KEY (`reading11_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
				'CONSTRAINT `et_ophciprimaryactivation_dr12_id_fk` FOREIGN KEY (`reading12_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

	}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophciprimaryactivation_details');
		$this->dropTable('ophciprimaryactivation_ecg_reading');



		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiPrimaryactivation'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphCiPrimaryactivation does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}
?>
