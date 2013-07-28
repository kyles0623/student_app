<?php defined('ACCESS') or die('You do not have the right to be here'); ?>

<?php


	$fields = array('first_name','last_name','city','state','zip','address','phone');
	$values = array();
	
		foreach($fields as $field)
		{
			if($_POST && $_POST['page'] == 1)
			{
				$values[$field] = $_POST[$field];
			}
			else
			{
				$values[$field] = isset($currentData[$field])?$currentData[$field]:"";
			}
		}
	



?>

<form method="post" action="index.php?page=1">
	<section class="field">
		<label for="first_name">First Name</label><br /><input type="text" name="first_name" id="first_name" value="<?php echo $values['first_name']; ?>">
	</section>

	<section class="field">
		<label for="last_name">Last Name</label><br /><input type="text" name="last_name" id="last_name" value="<?php echo $values['last_name']; ?>">
	</section>

	<section class="field">
		<label for="last_name">Best Phone Number</label><br /><input type="tel" name="phone" id="phone" value="<?php echo $values['phone']; ?>">
	</section>

	<section class="field">
		<label for="last_name">Address</label><br /><input type="text" name="address" id="address" value="<?php echo $values['address']; ?>">
	</section>

	<section class="field">
		<label for="last_name">City</label><br /><input type="text" name="city" id="city" value="<?php echo $values['city']; ?>">
	</section>

	<section class="field">
		<label for="last_name">State</label><br /><input type="text" name="state" id="state" value="<?php echo $values['state']; ?>">
	</section>

	<section class="field">
		<label for="last_name">Zip</label><br /><input type="text" name="zip" id="zip" value="<?php echo $values['zip']; ?>">
	</section>

	 <input type="hidden" name="page" value="1">
	<input type="submit" value="Next" id="submit">
	<div class="clear"></div>
</form>


