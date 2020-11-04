<?php 
?>
<div class="container">
	<?php include "Presentacion/encabezado.php";?>	
	<div class="row mt-3">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h3>Proyecto Jugueteria</h3>	
					<form action="Presentacion/juguete/crearJuguete.php">		
						<input type="submit" value="Crear"/>						
					</form>
					<form action="Presentacion/juguete/consultarJuguete.php">	
						<input type="submit" value="Consultar"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
