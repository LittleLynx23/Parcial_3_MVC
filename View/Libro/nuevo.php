<?php 
require_once "Public/Plantilla.html";
startblock('article');
//$lista_autores = $consultar->listar('tautor');
//$lista_programa = $consultar->listar('tprograma');
?>
<div class="row mb-4">
    <div class="col-12 col-xl-12 mb-4 mb-xl-0">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="font-weight-bold text-primary">Nuevo Libro</h3>
                        <h6 class="font-weight-normal mb-0"></h6>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
                                <li class="breadcrumb-item"><a href="#">Libro</a></li>
                                <li class="breadcrumb-item active">Nuevo</li>
                            </ol>
                        </nav> 
                    </div>
                </div>
            </div>    
        </div>        
    </div>                      
</div> 
<div class="card">
    <div class="card-body card border-left-success">
        <form id="form_libro">
            <input name="tabla" value="tLibro" type="hidden">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre" name="datos[cNombre]">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="codigo">codigo:</label>
                        <input type="text" class="form-control" id="codigo" placeholder="Ingrese codigo" name="datos[codigo]">
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nacion">Autor:</label>
                        <select name="datos[nAutor_fk]" class="form-control">
                            <option value="">Seleccione</option>
                            <?php foreach($lista_autores as $autor){ ?>
                                <option value="<?php echo $autor['nAutor_id']?>"><?php echo $autor['cNombre'].' '.$autor['cApellido']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nacion">Programa:</label>
                        <select name="datos[nPrograma_fk]" class="form-control">
                            <option value="">Seleccione</option>
                            <?php foreach($lista_programa as $programa){ ?>
                                <option value="<?php echo $programa['nPrograma_id']?>">
                                    <?php echo $programa['cNombre']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>     
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select name="datos[lEstado]" class="form-control">
                            <option value="">seleccionar estado</option>
                            <option value="retirado">retirado</option>
                            <option value="prestado">prestado</option>
                            <option value="disponible">disponible</option>
                        </select>
                    </div>
                </div> 



            </div>  

            <hr>
            <button 
                type="button" 
                class="btn btn-primary btn-user btn-block" 
                onclick="save()" 
                style="width: auto;"> 
                GUARDAR
            </button>                
        </form>
    </div>
</div>

<?php  endblock();?>
<script>
    function save(){
        
        var formData = new FormData(document.getElementById("form_libro"));
        formData.append("dato","valor");

            $.ajax({
                url:'<?php echo BASE_URL?>libro/agregar',
                type: "post",
                dataType: "html",
                data: formData,
                beforeSend: function(){
                //spinner
                },
                cache: false,
                contentType: false,
                processData: false

            }).done(function(respuesta){ 
                alert(respuesta);
                let rta = JSON.parse(respuesta);                    
                Swal.fire({
                    icon: rta['tipo'],
                    title: rta['titulo'],
                    text: rta['msg'],
                    confirmButtonText: 'OK'
                }).then(() => {
                    if(rta['tipo']!="danger"){
                        window.location.href = '<?php echo BASE_URL?>libro/lista';
                    }
                });                               
            });
    }
</script>