<?php 
	include('config/db_connect.php');

	//Write Query for all pizzas
	$sql = ' SELECT `title`,`ingredients`,`id` FROM `pizzas` ORDER BY created_at';

	//Make Query and get results
	$result = mysqli_query($conn, $sql);

	//fetch the result as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	//Close Connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
	<h4 class="center grey-text">Pizzas!</h4>
	<div class="container">
		<div class="row">
			<?php foreach($pizzas as $pizza):?>
				<div class="col s6 md3">
					<div class="card z-depth-0">
					<img src="https://raw.githubusercontent.com/iamshaunjp/php-mysql-tutorial/fedac146dac085dfe3cb34a075abdcb1d16e13e5/img/pizza.svg" class="pizza center">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<ul><?php foreach(explode(',',$pizza['ingredients']) as $ingredient) : ?>
									<li><?php echo htmlspecialchars($ingredient);?></li>
								<?php endforeach; ?>
							</ul>	
						</div>
					<div class="card-action right-align">
						<a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">more info</a>
					</div>
				</div>
			</div>
				<?php endforeach;?>
		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>