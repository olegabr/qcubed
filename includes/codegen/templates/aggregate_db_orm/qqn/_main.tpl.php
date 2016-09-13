<?php
	/** @var QSqlTable[] $objTableArray */
	/** @var QDatabaseCodeGen $objCodeGen */
	global $_TEMPLATE_SETTINGS;
	$_TEMPLATE_SETTINGS = array(
		'OverwriteFlag' => true,
		'DocrootFlag' => false,
		'DirectorySuffix' => '',
		'TargetDirectory' => __MODEL_GEN__,
		'TargetFileName' => 'QQN.class.php'
	);
?>
<?php print("<?php\n"); ?>
	class QQN {
<?php foreach ($objTableArray as $objTable) { ?>
		/**
		 * @return QQNode<?= $objTable->ClassName ?>

		 */
		static public function <?= $objTable->ClassName ?>() {
			return new QQNode<?= $objTable->ClassName ?>('<?= $objTable->Name ?>', null, null);
		}
<?php } ?>
	}