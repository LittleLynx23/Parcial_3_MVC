<?php 
require_once "Public/Plantilla.html";
startblock('article');
?>
<div class="row mb-4">
    <div class="col-12 col-xl-12 mb-4 mb-xl-0">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="font-weight-bold text-primary">Nuevo Autor</h3>
                        <h6 class="font-weight-normal mb-0"></h6>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
                                <li class="breadcrumb-item"><a href="#">Autor</a></li>
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
        <form id="form_autor">
            <input name="tabla" value="tautor" type="hidden">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre" name="datos[cNombre]">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" placeholder="Ingrese apellido" name="datos[cApellido]">
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nacion">Nacionalidad:</label>
                        <input type="text" class="form-control" id="nacion" placeholder="Ingrese nacionalidad" name="datos[cNacionalizada]">
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
        
        var formData = new FormData(document.getElementById("form_autor"));
        formData.append("dato","valor");

            $.ajax({
                url:'<?php echo BASE_URL?>autor/agregar',
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
                let rta = JSON.parse(respuesta);                    
                Swal.fire({
                    icon: rta['tipo'],
                    title: rta['titulo'],
                    text: rta['msg'],
                    confirmButtonText: 'OK'
                }).then(() => {
                    if(rta['tipo']!="danger"){
                        window.location.href = '<?php echo BASE_URL?>autor/lista';
                    }
                });                               
            });
    }
</script>