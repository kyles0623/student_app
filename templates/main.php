<?php defined('ACCESS') or die('You do not have the right to be here'); ?>
<html>
	<head>
		<title><?php echo $title ?></title>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<link rel='stylesheet' type='text/css' href='<?php echo BASE_URL; ?>/css/style.css' />
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/js/page-<?php echo $page; ?>.js" ></script>

	</head>
	<body>
		<section id="container">
			<section id="topbar">
				<ul>
					<?php 
					$i = 0;
					foreach($page_titles as $page_title)
					{ 
						$class = '';
						if($i==3)
							$class = ' last';
						if($page_title == $title)
							$class .= ' current';
						?>

						<li class="<?php echo $class; ?>"><h3 class="page_title"><?php echo $page_title; ?></h3></li>
					<?php
					$i++;
					}
					?>
				</ul>
			</section>
			<?php
				if($page > 1)
				{
					?>
					<div id="back">
						<a href="index.php?page=<?php echo ($page-1); ?>"><< Back</a>
					</div>
					<?php
				}
			?>
			<h1><?php echo $title; ?></h1>
			


			<?php if(!empty($errors)): ?>
			<section id="errors">
				
				<ul>
					<?php
					foreach($errors as $error)
					{
						echo "<li>".$error."</li>";
					}
					?> 
				</ul>
			</section>
		<?php endif; ?>
			<?php include_once($currentPage); ?>

		</section>
	</body>

</head> 