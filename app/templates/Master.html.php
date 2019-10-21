<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<base href="<?php echo $ro->getBaseHref(); ?>" />
	<title><?php if(isset($t['_title'])) echo htmlspecialchars($t['_title']) . ' - '; echo AgaviConfig::get('core.app_name'); ?></title>
	<link rel="stylesheet" href="styles.css" />
</head>
<body>
	<?php //if(isset($t['_title'])) echo '<h1>' . htmlspecialchars($t['_title']) . '</h1>'; ?>

		<div class="main_content centered">
<?php
if (isset($t['session_message']) && ($t['session_message'] != ''))
{
?>
			<p class="session_message"><?php echo htmlspecialchars($t['session_message']) ?></p>
<?php
}
?>
			<?php echo $inner; ?>
		</div>
</body>
</html>
