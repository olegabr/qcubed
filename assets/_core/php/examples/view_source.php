<?php
	require('../../../../includes/configuration/prepend.inc.php');
	require('includes/examples.inc.php');

	$intCategoryId = QApplication::PathInfo(0);
	$intExampleId = QApplication::PathInfo(1);
	$strScript = QApplication::PathInfo(2);

	$strReference = Examples::GetExampleScriptPath($intCategoryId, $intExampleId);
	$strName = Examples::GetExampleName($intCategoryId, $intExampleId);
	if (!$strScript)
		QApplication::Redirect(QApplication::$RequestUri . substr($strReference, strrpos($strReference, '/')));
?>
<html>
	<head>
		<title>QCubed Development Framework - View Source</title>
		<link rel="stylesheet" type="text/css" href="<?php _p(__VIRTUAL_DIRECTORY__ . __EXAMPLES__ . '/includes/examples.css'); ?>"></link>
	</head>
	<body> 

	<table border="0" cellspacing="0" width="100%">
		<tr>
			<td nowrap="nowrap" class="headingLeft">
				<?php _p(Examples::PageName($strReference)); ?> - View Source<br/>
			<span class="headingLeftSmall">
				<?php _p(Examples::CodeLinks($strReference, $strScript), false); ?>
			</span>
			</td>
			<td nowrap="nowrap" class="headingRight"><br/>
				<b><a href="javascript:window.close()" class="headingLink">Close Window</a></b>
			</td>
		</tr>
	</table>

	<div class="page">
<?php
	// Filename Cleanup
	if (($strScript == 'header.inc.php') || ($strScript == 'footer.inc.php') || ($strScript == 'examples.css'))
		$strFilename = 'includes/' . $strScript;
	else if (($strScript == 'mysql_innodb.sql') || ($strScript == 'sql_server.sql')) {
		$strFilename = $strScript;
	} else if (substr($strScript, 0, 16) == '__CORE_CONTROL__') {
		$strFilename = __QCUBED__ . '/controls/' . str_replace('__CORE_CONTROL__', '', str_replace('/', '', $strScript));
	} else if (substr($strScript, 0, 18) == '__CORE_FRAMEWORK__') {
		$strFilename = __QCUBED_CORE__ . '/framework/' . str_replace('__CORE_FRAMEWORK__', '', str_replace('/', '', $strScript));
	} else {		
		$strFilename = substr($strReference, 1);
		$strFilename = __DOCROOT__ . '/' . substr($strFilename, 0, strrpos($strReference, '/')) . '/' . $strScript;
	}

	if (!file_exists($strFilename)) {
		throw new Exception("Example file does not exist: " . $strFilename);
	}
?>
	<h3>Source Listing for: <?php _p(preg_replace('/__.*__/', '', $strScript)); ?></h3>
	
	<div class="code" style="padding: 10px;" nowrap="nowrap">
		<?php highlight_file($strFilename); ?>
	</div>

	</body>
</html>