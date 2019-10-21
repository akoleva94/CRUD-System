<div id="breadcrumbs">
	<a href="./">Home</a> &gt;  
	 <span class=""><?php echo $t['country']['countryName'] ?></span>
</div>
<?php
if (isset($t['errors']))
{
?>
<ul class="errors">
<?php
	foreach ($t['errors'] as $error)
	{
?>
	<li><?php echo $error ?></li>
<?php
	}
?>
</ul>
<a id="cancel" href="./">Cancel</a>
<?php
}
else
{
	var_dump($t);
?>
<h2>Are you sure you want to DELETE <u> <?php echo $t['country']['countryName'] ?></u> country ?????</h2>

<form id="delete" action="<?php echo $t['country']['deleteUrl'] ?>" method="post">
	<button id="delete" type="submit"/>Delete</button>
	<a id="cancel" href="./">Cancel</a>
</form>
<?php
}
?>