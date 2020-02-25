<?php
	if(!isset($_SESSION['status'])){
		echo <<< NAV
			<div class="divsidenav">
				<nav role="navigation" class="sidenav">
					<ul>
						<li><a href="Index.php">Hem</a></li>
						<li><a href="LoggaIn.php">Logga in</a></li>
					</ul>
				</nav>
			</div>
NAV;
	}
	
	else if($_SESSION['status']==1)
	{
		echo<<<NAV
		<div class="divsidenav">
			<nav role="navigation" class="sidenav">
				<ul>
					<li><a href="Index.php">Hem</a></li>
					<li><a href="Produkter.php">Produkter</a></li>
					<li><a href="Kundvagn.php">Kundvagn</a></li>
					<li><a href="LoggaUt.php">Logga ut</a></li>
				</ul>
			</nav>
		</div>
NAV;
	}

	else if($_SESSION['status']==2)
	{
		echo<<<NAV
		<div class="divsidenav">
			<nav role="navigation" class="sidenav">
				<ul>
					<li><a href="Index.php">Hem</a></li>
					<li><a href="Produkter.php">Produkter</a></li>
					<li><a href="LoggaUt.php">Logga ut</a></li>
				</ul>
			</nav>
		</div>
NAV;
	}
?>