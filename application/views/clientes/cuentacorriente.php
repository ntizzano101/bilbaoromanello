
<div class="container">
	<!--    -->
	
	<script>
	function muestra(a,b){
		$("#prov").html(b);
		$("#idprov").html(a);
		}
	function cancelar(){
		
		
	}
	function validar(){
		document.getElementById('errormonto').style.display = 'none';
		$.post("/lopez/clientes/validarpago",
		{monto:$("#monto").val(),
		 deuda:$("#deuda").val(),
		 fecha:$("#fecha").val()}, 
		function(data){			
			//alert(data);
				var rta = JSON.parse(data);					
				if(rta.ok=="0"){
					document.getElementById('myform').submit();
					return true;
				}
				else{
					$("#errormonto").html(rta.mensaje);
					document.getElementById('errormonto').style.display = 'block';
					return false;
				}
		});	
		
	}		
	function borra(){
		var id=$("#idprov").html();
		var nombre=$("#prov").html();
		var v='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		$("#errorok").html('');
		$("#error").html('');
		document.getElementById('error').style.display = 'none';
		document.getElementById('errorok').style.display = 'none';
		$("#error").html('');
		$.post("/lopez/clientes/eliminarpago",
		{id:id}, 
		function(data){
				var rta = JSON.parse(data);					
				if(rta.ok=="1"){
					$("#errorok").html(v+'<strong>'+ rta.pedido +'</strong> Se Eliminó');	
					document.getElementById('errorok').style.display = 'block';
					$("#error").html('');
					$("#tr"+id).remove();
				}
				else{
					$("#error").html(v+'<strong>'+ rta.pedido +'</strong>' + rta.mensaje);
					document.getElementById('error').style.display = 'block';
				}
		});	
	 }	
</script>
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Borra Pago Registrado</h4>
        </div>
        <div class="modal-body">
          <p id="idprov">1</p>
          <p id="prov">Borrando Planilla</p>
        </div>
        <div class="modal-footer">
		 <button type="button" class="btn btn-success" data-dismiss="modal" onClick="borra()">Seguir</button>	
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>  
<div class="alert alert-danger  alert-dismissible fade in" id="error" style="display:none">
</div>
<div class="alert alert-success alert-dismissible fade in" id="errorok" style="display:none">
</div> 
	
	
	
	
	<!--    -->
	<div class="row">
			<div class="alert alert-success">Visualizando Cuenta Corriente de <strong><?=$nombre?></strong></div>		
				<table class="table">
				  <thead>
					<tr>						
					  <th>Fecha</th>
					  <th>Descripcion</th>
					  <th align="right">Debe</th>
					  <th align="right">Haber</th>
					  <th align="right">Saldo</th>				
					</tr>
				  </thead>
				  <tbody>
					<?php 
					$aux="";
					$total="0";
					foreach($cc as $c){ 															
						  ?>
						  <tr>
							<td><? echo substr($c->fecha,8,2) ."/". substr($c->fecha,5,2) ."/". substr($c->fecha,0,4)  ; ?></td>
							<td>
							<? echo $c->documento ." ". $c->obs;  ?>
							</td>
							<td  align="right"><?php  echo $fx->moneda($c->debe);  ?></td>
							<td align="right"><?php  echo  $fx->moneda($c->haber) ?></td>				
							
							
							<td align="right"><?php $total=$total - $c->debe + $c->haber;   echo  $fx->moneda($total) ?></td>
					</tr>
					
							
						<?php	
						
						}
									
							
											
				
					?>
				  </tbody>
				</table>
			</div>
		</div>			
			  </div>
			</div>
		</div>
	</div>
	</div>
</div>
