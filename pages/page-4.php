<?php defined('ACCESS') or die('You do not have the right to be here'); ?>

<?php

$basic = $_SESSION['page-1'];
$personal = $_SESSION['page-2'];
$classes = $_SESSION['page-3']['classes'];

$parentStatus = '';
$income = '';
switch($personal['parent-status'])
{
	case 'married':
		$parentStatus = 'Married';
		break;
	case 'divorced':
		$parentStatus = 'Divorced';
		break;
	case 'one-parent':
		$parentStatus = 'Living with 1 Parent';
		break;
	case 'nonbiological':
		$parentStatus = 'Living with Non-Biological Legal Guardian';
		break;
}

switch($personal['income'])
{
			case "1": $income = "Less than $10,000"; break;
			case "2": $income = "$10,000 to $19,999"; break;
			case "3": $income = "$20,000 to $29,999"; break;
			case "4": $income = "$30,000 to $39,999"; break;
			case "5": $income = "$40,000 to $49,999"; break;
			case "6": $income = "$50,000 to $59,999"; break;
			case "7": $income = "$60,000 to $69,999"; break;
			case "8": $income = "$70,000 to $79,999"; break;
			case "9": $income = "$80,000 to $89,999"; break;
			case "10": $income = "$90,000 to $99,999"; break;
			case "11": $income = "$100,000 to $149,999"; break;
			case "12": $income = "$150,000 or more"; break;
}


?>

<section id="basic-info" class="box">
	<h2>Basic Information</h2>
	<section class="piece">Name: <?php echo $basic['first_name']." ".$basic['last_name']; ?></section>
	<section class="piece">Phone: <?php echo $basic['phone']; ?></section>
	<section class="piece">Address: <?php echo $basic['address']; ?></section>
	<section class="piece">City: <?php echo $basic['city']; ?></section>
	<section class="piece">State: <?php echo strtoupper($basic['state']); ?></section>
	<section class="piece">Zip Code: <?php echo $basic['zip']; ?></section>
</section>

<section id="personal-info" class="box">
	<h2>Personal Information</h2>
	<section class="piece">Sex: <?php echo $personal['sex']; ?></section>
	<section class="piece">Marital Status: <?php echo ucfirst($personal['marital-status']); ?></section>
	<section class="piece">Parent's Status: <?php echo $parentStatus; ?></section>
	<section class="piece">Income: <?php echo $income; ?></section>
	<section class="piece">Race(s): <?php echo implode(", ",$personal['race']); ?></section>
</section>


<h2>Your Classes for Next Semester</h2>
<?php

$i = 1;

foreach($classes as $class)
{
	?>
	<section class="box class">
		<h4>Class #<?php echo $i ?></h4>
		<section class="piece"><strong>Phone:</strong> <?php echo $class['title']; ?></section>
		<section class="piece"><strong>Subject:</strong> <?php echo $class['subj']; ?></section>
		<section class="piece"><strong>Section:</strong> <?php echo $class['section']; ?></section>
		<section class="piece"><strong>Registration Number:</strong> <?php echo $class['reg_num']; ?></section>
		<section class="piece"><strong>Instructor:</strong> <?php echo $class['instructor']; ?></section>
		<section class="piece"><strong>Days:</strong> <?php echo $class['days']; ?></section>
		<section class="piece"><strong>Times:</strong> <?php echo $class['time']; ?></section>
	</section>


	<?php
	$i++;
}	