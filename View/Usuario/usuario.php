<?php 
require "Public/Plantilla.html";
startblock('article');

?>
<div class="row mb-4">
    <div class="col-12 col-xl-12 mb-4 mb-xl-0">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="font-weight-bold text-primary">Usuario</h3>
                        <h6 class="font-weight-normal mb-0"></h6>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
                                <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
                                <li class="breadcrumb-item active">Listado</li>
                            </ol>
                        </nav> 
                    </div>
                </div>
            </div>    
        </div>        
    </div>                      
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total consulta: <?php echo count($lista)?></h4>
                <p class="card-description">Listado de usuarios en base de datos</p>
                <div class="table-responsive">
                    <?php if(count($lista)){?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nick</th>
                                <th>Clave</th>
                                <th>Estado</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $cont = 0;
                                foreach($lista as $fila){
                                    $estado = $fila['lEstado'] == 1 ? "Activo" : "Retirado";
                                    $id = $fila['nUsuario_id'];
                                    $cont++;
                            ?>
                                
                            <tr>
                                <td class="py-1"><?php echo $cont?></td>
                                <td><?php echo $fila['cNick']?></td>
                                <td><?php echo $fila['cClave']?></td>
                                <td><?php echo $estado?></td>
                                <td>
                                    <a 
                                        type="button" 
                                        class="btn btn-xs btn-info" 
                                        href="<?php echo BASE_URL?>usuario/editar?id=<?php echo $id?>">
                                            Editar
                                    </a>
                                    <button 
                                        type="button" 
                                        class="btn btn-xs btn-danger" 
                                        onclick="eliminar(
                                            <?php echo $id?>,'tusuario','nUsuario_id')">
                                            Eliminar
                                    </button>  
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php }else{ echo "<h2>Sin registros!!!</h2>";}?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  endblock();?>
<script>
      function eliminar(id_del,tabla,campo){
        let id = id_del;
        Swal.fire({
            title: '¿Eliminar Registro?',
            text: 'Esta acción eliminará permanentemente el registro y no podrá deshacerse.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:'<?php echo BASE_URL?>usuario/eliminar',
                    type: 'POST',
                    data: {'id':id, 'tabla':tabla,'campo': campo},
                    success: function(respuesta) { 
                        let rta = JSON.parse(respuesta);     
                                     
                        Swal.fire({
                            icon: rta['tipo'],
                            title: rta['titulo'],
                            text: rta['msg'],
                            confirmButtonText: 'OK'
                        }).then(() => {
                            if(rta['tipo']=="success"){
                                location.reload();
                            }
                        }); 
                                      
                    }
                });                
            }
        });


        

    }
</script>