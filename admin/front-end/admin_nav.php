<nav class="navbar navbar-expand-sm sticky-top" id = "nav">
	<div class="container-fluid">
		<ul class="navbar-nav align-items-center justify-content-between w-100">
			<li class="nav-item">
				<h1 >PsyChoQuizz</h1>
			</li>
			<li class="nav-item">
				<?php
					if(isset($_SESSION["id"])){
						?>
							<a href="../admin/back-end/logout.php" class="nav-link">Deconnexion</a>
						<?php
					}else if(isset($_SESSION["TotalPoints"])){
						?>
							<a href="back-end/logout.php" class="nav-link">Recommencer le quiz</a>
						<?php
					}
				?>
			</li>
		</ul>
	</div>
</nav>



