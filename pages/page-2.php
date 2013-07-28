<?php defined('ACCESS') or die('You do not have the right to be here'); ?>

<?php

if(isset($currentData) && !empty($currentData))
{
	$sex = isset($currentData['sex'])?$currentData['sex']:"";
	$marital_status = isset($currentData['marital-status'])?$currentData['marital-status']:"";
	$parent_status = isset($currentData['parent-status'])?$currentData['parent-status']:"";
	$income = isset($currentData['income'])?$currentData['income']:"";
	$races = isset($currentData['race'])?$currentData['race']:array();
}

?>


<h5 class="note"><span class="note-title">Note: </span>This information is used for financial aid and scholarships</h5>
<form method="post" action="index.php?page=2">

	<section id="sex" class="information">
		<h3>Sex</h3>
			<label><input type="radio" <?php echo $sex=="male"?"checked='checked'":""; ?> name="sex" value="male"/>Male</label>
			<label><input type="radio" <?php echo $sex=="female"?"checked='checked'":""; ?> name="sex" value="female"/>Female</label>
	</section>
	
	<section id="marital-status" class="information">
		<h3>Marital Status</h3>
			<label><input type="radio" <?php echo $marital_status=="married"?"checked='checked'":""; ?>  name="marital-status" value="married"/>Married</label>
			<label><input type="radio" <?php echo $marital_status=="single"?"checked='checked'":""; ?> name="marital-status" value="single"/>Single</label>
	</section>
	<section id="parent-status" class="information">
		<h3>Parental Status</h3>
			<label><input type="radio" <?php echo $parent_status=="married"?"checked='checked'":""; ?> name="parent-status" value="married"/>Married</label>
			<label><input type="radio" <?php echo $parent_status=="divorced"?"checked='checked'":""; ?> name="parent-status" value="divorced"/>Divorced</label>
			<label><input type="radio" <?php echo $parent_status=="one-parent"?"checked='checked'":""; ?> name="parent-status" value="one-parent"/>Living with one Parent</label>
			<label><input type="radio" <?php echo $parent_status=="nonbiological"?"checked='checked'":""; ?> name="parent-status" value="nonbiological"/>Living with nonbiological Parent</label>
	</section>
	<section id="household-income" class="information">
		<h3>Household Income</h3>
		<select name="income" id="income">
			<option value=""></option>
			<option value="1" <?php echo $income=="1"?"selected='selected'":""; ?> >Less than $10,000</option>
			<option value="2" <?php echo $income=="2"?"selected='selected'":""; ?> >$10,000 to $19,999</option>
			<option value="3" <?php echo $income=="3"?"selected='selected'":""; ?> >$20,000 to $29,999</option>
			<option value="4" <?php echo $income=="4"?"selected='selected'":""; ?> >$30,000 to $39,999</option>
			<option value="5" <?php echo $income=="5"?"selected='selected'":""; ?> >$40,000 to $49,999</option>
			<option value="6" <?php echo $income=="6"?"selected='selected'":""; ?> >$50,000 to $59,999</option>
			<option value="7" <?php echo $income=="7"?"selected='selected'":""; ?> >$60,000 to $69,999</option>
			<option value="8" <?php echo $income=="8"?"selected='selected'":""; ?> >$70,000 to $79,999</option>
			<option value="9" <?php echo $income=="9"?"selected='selected'":""; ?> >$80,000 to $89,999</option>
			<option value="10" <?php echo $income=="10"?"selected='selected'":""; ?> >$90,000 to $99,999</option>
			<option value="11" <?php echo $income=="11"?"selected='selected'":""; ?> >$100,000 to $149,999</option>
			<option value="12" <?php echo $income=="12"?"selected='selected'":""; ?> >$150,000 or more</option>
		</select>
	</section>

	<section id="race" class="information">
		<h3>Race</h3>
			
		<label><input type="checkbox" name="race[]" <?php echo in_array("american-indian",$races)?"checked='checked'":"" ?> value="american-indian" >American Indian or Alaska Native</label><br />
		<label><input type="checkbox" name="race[]" <?php echo in_array("asian",$races)?"checked='checked'":"" ?> value="asian" >Asian</label><br />
		<label><input type="checkbox" name="race[]" <?php echo in_array("black",$races)?"checked='checked'":"" ?> value="black" >Black or African American</label><br />
		<label><input type="checkbox" name="race[]" <?php echo in_array("islander",$races)?"checked='checked'":"" ?> value="islander" >Native Hawaiian or Other Pacific Islander</label><br />
		<label><input type="checkbox" name="race[]" <?php echo in_array("white",$races)?"checked='checked'":"" ?> value="white" >White</label><Br />
		<label><input type="checkbox" name="race[]" <?php echo in_array("other",$races)?"checked='checked'":"" ?> value="other" >Other</label>

	</section>


	<input type="hidden" name="page" value="2">
	<input type="submit" value="Next" id="submit">
	<div class="clear"></div>
</form>