<h2>All Cities in <?php echo $t['state']['stateName'] ?></h2>
<div id="breadcrumbs">
	<a href="./">Home</a> &gt;  
	 <a href="<?php echo $t['parrent']['parrentUrl']?>" ><?php echo $t['parrent']['parrentName'] ?></a> &gt;  
	 <span class=""><?php echo $t['state']['stateName'] ?></span>
</div>
<div>
	<p>The short code for <b><?php echo $t['state']['stateName']?></b> is <b><?php echo $t['state']['code']?></b>.
	It is home to  <b><?php echo ($t['state']['population']>0? $t['state']['population']:"...") ?></b> people. 
	Its area is around  <b><?php echo ($t['state']['area']>0? $t['state']['area']:"...") ?> km<sup>2</sup></b>. 
	<!-- And it has <b><?php echo ($t['cityCounter']>0?($t['cityCounter'].($t['cityCounter']>1? " cities":" city")):" no cities, yet") ?></b>. --></p>
</div>
<!-- <a href="<?php echo $t['addUrl'] ?>">Add new city</a>
<table border="1" id="q4">
	<tr>
		<th class="id">City ID</th>
		<th class="name">City Name</th>
		<th class="id" colspan="2">Action</th>
	</tr>
<?php
if (count($t['cities']) > 0)
{
	foreach ($t['cities'] as $city)
	{
?>
	<tr>
		<td><?php echo $city['cityID'] ?></td>
		<td><a href="<?php echo $city['cityUrl']?>"><?php echo $city['cityName'] ?></a></td>
		<td class="id"><a href="<?php echo$city['editUrl'] ?>">Edit</a></td>
		<td class="delete"><a href="<?php echo$city['deleteUrl'] ?>">Delete</a></td>
	</tr>
<?php
	}
}
else
{
?>
	<tr>
		<td colspan=4>No cities to show!</td>
	</tr>
<?php
}
?>
</table>  -->