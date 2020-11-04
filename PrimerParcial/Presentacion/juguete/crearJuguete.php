<?php
$creado = false;
if(isset($_POST["crear"])){
    $juguete = new Juguete("", $_POST["nombre"], $_POST["material"],$_POST["cantidad"]);
    $juguete -> crear();
    $creado = true;
}
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h3>Crear Juguete</h3>
				</div>
				<div class="card-body">
					<?php if ($creado) { ?>						
						<div class="alert alert-success alert-dismissible fade show"
							role="alert">
							<strong>Datos ingresados</strong>
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
					<form
						action=<?php echo "index.php?pid=" . base64_encode("Presentacion/juguete/crearJuguete.php") ?>
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="material" class="form-control"
								placeholder="Material" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="cantidad" class="form-control"
								placeholder="Cantidad" required="required">
						</div>
						<div class="form-group">
							<button type="submit" name="crear" class="btn btn-primary">Crear</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>