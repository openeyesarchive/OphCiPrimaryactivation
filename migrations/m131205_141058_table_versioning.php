<?php

class m131205_141058_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophciprimaryactivation_details_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`onset_time` time DEFAULT NULL,
	`first_attender_time` time DEFAULT NULL,
	`reading1_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading2_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading3_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading4_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading5_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading6_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading7_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading8_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading9_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading10_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading11_id` int(10) unsigned NOT NULL DEFAULT '1',
	`reading12_id` int(10) unsigned NOT NULL DEFAULT '1',
	`lbbb` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`rbbb` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`hospital_arrival_time` time DEFAULT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophciprimaryactivation_det_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophciprimaryactivation_det_cui_fk` (`created_user_id`),
	KEY `acv_et_ophciprimaryactivation_det_ev_fk` (`event_id`),
	KEY `acv_et_ophciprimaryactivation_dr1_id_fk` (`reading1_id`),
	KEY `acv_et_ophciprimaryactivation_dr2_id_fk` (`reading2_id`),
	KEY `acv_et_ophciprimaryactivation_dr3_id_fk` (`reading3_id`),
	KEY `acv_et_ophciprimaryactivation_dr4_id_fk` (`reading4_id`),
	KEY `acv_et_ophciprimaryactivation_dr5_id_fk` (`reading5_id`),
	KEY `acv_et_ophciprimaryactivation_dr6_id_fk` (`reading6_id`),
	KEY `acv_et_ophciprimaryactivation_dr7_id_fk` (`reading7_id`),
	KEY `acv_et_ophciprimaryactivation_dr8_id_fk` (`reading8_id`),
	KEY `acv_et_ophciprimaryactivation_dr9_id_fk` (`reading9_id`),
	KEY `acv_et_ophciprimaryactivation_dr10_id_fk` (`reading10_id`),
	KEY `acv_et_ophciprimaryactivation_dr11_id_fk` (`reading11_id`),
	KEY `acv_et_ophciprimaryactivation_dr12_id_fk` (`reading12_id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_det_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_det_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_det_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr1_id_fk` FOREIGN KEY (`reading1_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr2_id_fk` FOREIGN KEY (`reading2_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr3_id_fk` FOREIGN KEY (`reading3_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr4_id_fk` FOREIGN KEY (`reading4_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr5_id_fk` FOREIGN KEY (`reading5_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr6_id_fk` FOREIGN KEY (`reading6_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr7_id_fk` FOREIGN KEY (`reading7_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr8_id_fk` FOREIGN KEY (`reading8_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr9_id_fk` FOREIGN KEY (`reading9_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr10_id_fk` FOREIGN KEY (`reading10_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr11_id_fk` FOREIGN KEY (`reading11_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_dr12_id_fk` FOREIGN KEY (`reading12_id`) REFERENCES `ophciprimaryactivation_ecg_reading` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('et_ophciprimaryactivation_details_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophciprimaryactivation_details_version');

		$this->createIndex('et_ophciprimaryactivation_details_aid_fk','et_ophciprimaryactivation_details_version','id');
		$this->addForeignKey('et_ophciprimaryactivation_details_aid_fk','et_ophciprimaryactivation_details_version','id','et_ophciprimaryactivation_details','id');

		$this->addColumn('et_ophciprimaryactivation_details_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophciprimaryactivation_details_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophciprimaryactivation_details_version','version_id');
		$this->alterColumn('et_ophciprimaryactivation_details_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophciprimaryactivation_ecg_reading_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(64) NOT NULL,
	`display_order` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophciprimaryactivation_details_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophciprimaryactivation_details_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophciprimaryactivation_details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
		");

		$this->alterColumn('ophciprimaryactivation_ecg_reading_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophciprimaryactivation_ecg_reading_version');

		$this->createIndex('ophciprimaryactivation_ecg_reading_aid_fk','ophciprimaryactivation_ecg_reading_version','id');
		$this->addForeignKey('ophciprimaryactivation_ecg_reading_aid_fk','ophciprimaryactivation_ecg_reading_version','id','ophciprimaryactivation_ecg_reading','id');

		$this->addColumn('ophciprimaryactivation_ecg_reading_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophciprimaryactivation_ecg_reading_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophciprimaryactivation_ecg_reading_version','version_id');
		$this->alterColumn('ophciprimaryactivation_ecg_reading_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophciprimaryactivation_details','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophciprimaryactivation_details_version','deleted','tinyint(1) unsigned not null');

		$this->addColumn('ophciprimaryactivation_ecg_reading','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophciprimaryactivation_ecg_reading_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophciprimaryactivation_ecg_reading','deleted');

		$this->dropColumn('et_ophciprimaryactivation_details','deleted');

		$this->dropTable('et_ophciprimaryactivation_details_version');
		$this->dropTable('ophciprimaryactivation_ecg_reading_version');
	}
}
