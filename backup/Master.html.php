<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<base href="<?php echo $ro->getBaseHref(); ?>" />
		<title><?php if(isset($t['_title'])) echo htmlspecialchars($t['_title']) . ' - '; echo AgaviConfig::get('core.app_name'); ?></title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
	<?php //if(isset($t['_title'])) echo '<h1>' . htmlspecialchars($t['_title']) . '</h1>'; ?>

		<div class="main_content centered">
<?php
if (isset($t['message']) && ($t['message'] != ''))
{
?>
			<p class="message"><?php echo htmlspecialchars($t['message']) ?></p>
<?php
}
?>
			<?php echo $inner; ?>
		</div>
	</body>
</html>
