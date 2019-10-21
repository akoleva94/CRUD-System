<h1>Add new country</h1>

<div id="breadcrumbs">
	<a href="./">Home</a> &gt;  
</div>

<form id="add" action="<?php echo $t['addUrl'] ?>" method="post">
	<label>Name* </label>
	<input type="text" name="countryName" value="" placeholder="Enter country Name" />
	<br/>
	<label>Code* </label>
	<input type="text" name="code" value="" placeholder="Enter country 2 digit code" maxlength="2" />
	<br/>
	<label>Population </label>
	<input type="text" name="population" value="" placeholder="Enter cuontry populataion"/>
	<br/>
	<label>Area </label>
	<input type="text" name="area" value="" placeholder="Enter country area in square kilometres"  />
	<br/>
	<button id="insert" type="submit">Add</button>
</form>