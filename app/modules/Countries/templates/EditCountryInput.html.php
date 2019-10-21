<h1>Edit <?php echo htmlspecialchars(@$t['country']['countryName']); ?></h1>

<div id="breadcrumbs">
	<a href="./">Home</a> &gt;  
	 <span class=""><?php echo $t['country']['countryName'] ?></span>
</div>

<form id="edit" action="<?php echo $t['country']['editUrl'] ?>" method="post">
	<label>Name </label>
	<input type="text" name="countryName" value="<?php echo htmlspecialchars($t['country']['countryName']) ?>" />
	<br/>
	<label>Code </label>
	<input type="text" name="code" value="<?php echo htmlspecialchars($t['country']['code']) ?>" maxlength="2" />
	<br/>
	<label>Population </label>
	<input type="text" name="population" value="<?php echo htmlspecialchars($t['country']['population']) ?>"/>
	<br/>
	<label>Area </label>
	<input type="text" name="area" value="<?php echo htmlspecialchars($t['country']['area']) ?>"  />
	<br/>
	<button id="update" type="submit">Update</button>
</form>
