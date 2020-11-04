<?php
$juguete = new Juguete();
$cantidad = 5;
if(isset($_GET["cantidad"])){
    $cantidad = $_GET["cantidad"];
}
$pagina = 1;
if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
}
$juguetes = $juguete -> consultarPorPagina($cantidad, $pagina);
$totalRegistros = $juguete -> consultarTotalRegistros();
$totalPaginas = intval(($totalRegistros/$cantidad));
if($totalRegistros%$cantidad != 0){
    $totalPaginas++;
}
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<h3>Consultar Juguete</h3>
				</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Material</th>
								<th>Cantidad</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$i = (($pagina - 1) * $cantidad) + 1;
						foreach ($juguetes as $jugueteActual){
						    echo "<tr>";
						    echo "<td>" . $i++ . "</td><td>" . $jugueteActual -> getNombre() . "</td><td>" . $jugueteActual -> getMaterial() . "</td><td>" . $jugueteActual -> getCantidad() . "</td>";
						    echo "</tr>";						    
						}						
						?>						
						</tbody>
					</table>
					<div class="row">
						<div class="col-10">
							<nav>
								<ul class="pagination">
									<?php
									if($pagina == 1){
                                        echo "<li class='page-item disabled'><span class='page-link'>Anterior</span></li>";    
									}else{
									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("Presentacion/juguete/consultarJuguete.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . "'>Anterior</a></li>";
									}
									for($i=1; $i<=$totalPaginas; $i++){
									    if($pagina == $i){
									        echo "<li class='page-item active'><span class='page-link'>" . $i . "</span></li>";
									    }else{
									        echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("Presentacion/juguete/consultarJuguete.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . "'>" . $i . "</a></li>";
									    }
									}									
									if($pagina == $totalPaginas){
									    echo "<li class='page-item disabled'><span class='page-link'>Siguiente</span></li>";
									}else{
									    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("Presentacion/juguete/consultarJuguete.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . "'>Siguiente</a></li>";
									}
									?>
								</ul>
							</nav>
						</div>
						<div class="col-2 text-right">
							<select name="cantidad" id="cantidad">
								<option value="5" <?php echo ($cantidad==5)?"selected":"" ?>>5</option>
								<option value="10" <?php echo ($cantidad==10)?"selected":"" ?>>10</option>
								<option value="20" <?php echo ($cantidad==20)?"selected":"" ?>>20</option>
							</select>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$("#cantidad").on("change", function() {
	location.replace("index.php?pid=<?php echo base64_encode("Presentacion/juguete/consultarJuguete.php") ?>&cantidad=" + $(this).val());
});
</script>