<?php

class m131210_144526_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('ophciprimaryactivation_ecg_reading','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophciprimaryactivation_ecg_reading_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophciprimaryactivation_ecg_reading','deleted');
		$this->dropColumn('ophciprimaryactivation_ecg_reading_version','deleted');
	}
}
