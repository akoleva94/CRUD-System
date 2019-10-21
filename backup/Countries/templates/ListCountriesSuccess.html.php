<h2><?php echo $t['_title'] ?> ordered alphabetica</h2>
<a href="<?php echo $t['addUrl'] ?>">Add new country</a>
<table border="1">
	<tr>
		<th class="id">Country ID</th>
		<th>Country Name </th>
		<th class="id" colspan="2">Action</th>
	</tr>
<?php

$i=0;
foreach ($t['countries'] as $country)
{
?>
	<tr>
		<td class="id"><?php echo $country['countryID'] ?></td>
		<td class="name"><a href="<?php echo $country['countryUrl']?>"><?php echo $country['countryName'] ?></a></td>
		<td class="id"><a href="<?php echo $country['editUrl'] ?>">Edit</a></td>
		<td class="delete"><a href="<?php echo$country['deleteUrl'] ?>">Delete</a></td>
	</tr>
<?php
}
?>
</table> 
