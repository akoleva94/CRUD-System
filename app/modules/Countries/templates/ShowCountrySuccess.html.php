<h1>All states in <?php echo htmlspecialchars($t['country']['countryName']); ?></h1>
<div id="breadcrumbs">
	<a href="./">Home</a> &gt;  
	 <span class=""><?php echo $t['country']['countryName'] ?></span>
</div>
<div>
	<p>The short code for <b><?php echo $t['country']['countryName']?></b> is <b><?php echo $t['country']['code']?></b>.
	It is home to  <b><?php echo ($t['country']['population']>0? $t['country']['population']:"...") ?></b> people. 
	Its area is around  <b><?php echo ($t['country']['area']>0? $t['country']['area']:"...") ?> km<sup>2</sup></b>. It has 
	<b><?php echo $t['stateCounter'].($t['stateCounter']>1? " states":" state") ?></b>.</p>
</div>

<a href="<?php echo $t['addUrl'] ?>">Add new state</a>
<table border="1" id="q4">
	<tr>
		<th class="id">State ID</th>
		<th class="name">State Name</th>
		<th class="id">State Code</th>
		<th colspan="2">Action</th>
	</tr>
<?php
// var_dump($t);
// die();
if (count($t['states']) > 0)
{
	foreach ($t['states'] as $state)
	{
?>
	<tr>
		<td><?php echo $state['stateID'] ?></td>
		<td><a href="<?php echo $state['stateUrl']?>"><?php echo $state['stateName'] ?></a></td>
		<td><?php echo $state['code'] ?></td>
		<td class="id"><a href="<?php echo $state['editUrl'] ?>">Edit</a></td>
		<td class="delete"><a href="<?php echo$state['deleteUrl'] ?>">Delete</a></td>
	</tr>
<?php
	}
}
else
{
?>
	<tr>
		<td colspan=5>No states to show!</td>
	</tr>
<?php
}
?>
</table> 