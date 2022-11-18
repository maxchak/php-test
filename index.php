<?php 
	require_once('functions.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Результаты</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style/reset.css">
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<header class="header">
		<div class="container">
			<h1 class="header__title">Результаты заездов</h1>
		</div>
	</header>
	<main class="main">
		<div class="container">
			<table class="table" id="table">
				<thead>
					<th class="table__header">Место</th>
					<th class="table__header">Участник</th>
					<th 
						class="table__header" 
						title="Отсортировать по результату первой попытки" 
						data-column="2"
					>
						Попытка 1
					</th>
					<th
						class="table__header" 
						title="Отсортировать по результату второй попытки" 
						data-column="3"
					>
						Попытка 2
					</th>
					<th 
						class="table__header" 
						title="Отсортировать по результату третьей попытки" 
						data-column="4"
					>
						Попытка 3
					</th>
					<th 
						class="table__header" 
						title="Отсортировать по результату четвертой попытки" 
						data-column="5"
					>
						Попытка 4
					</th>
					<th 
						class="table__header active"
						title="Отсортировать по итоговому результату"
						data-column="6"
					>
						Итоговый результат
					</th>
				</thead>
				<tbody class="table__body" id="tbody">
					<?php
							$counter = 1;

							foreach (getSortedResults() as $participant) {
								echo "
									<tr>
										<td>" . $counter++ . "</td>
										<td>
											<ul class='participant'>
												<li>
													{$participant->name}
												</li>
												<li>
													{$participant->city}
												</li>
												<li>
													{$participant->car}
												</li>
											</ul>
										</td>
										<td>{$participant->attempts[0]}</td>
										<td>{$participant->attempts[1]}</td>
										<td>{$participant->attempts[2]}</td>
										<td>{$participant->attempts[3]}</td>
										<td>{$participant->getFinalResult()}</td>
									</tr>
								";
							}
					?>
				</tbody>
			</table>
		</div>
	</main>
  <script src="js/index.js"></script>
</body> 
</html>