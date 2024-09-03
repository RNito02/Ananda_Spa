<!--INICIO del cont principal-->
<?php require_once "vistas/parte_superior.php"?>

<div class="container">
    <center><h3>Ventas Exitosas:</h3></center>
    
    <?php
    $consulta = "SELECT ID, ID_transaccion, fecha, Status, Email, ID_cliente, Toal FROM compra WHERE status= 'COMPLETED' or status ='approved' ORDER BY ID";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

    ?>
 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tabla_colores_zapatos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <th>Id de la compra</th>
                            <th>Id de la transacción</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Email</th>
                            <th>Total</th>
                            <th>Descargar</th>
                        </thead>
                        <tbody>
                        <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr class="text-center"> 
                                <td><?php echo $dat['ID'] ?></td>
                                <td><?php echo $dat['ID_transaccion'] ?></td>
                                <td>COMPLETADO</td>
                                <td><?php echo $dat['Fecha'] ?></td>
                                <td><?php echo $dat['Email'] ?></td>
                                <td><?php echo $dat['Toal'] ?></td>  
                                <td><div class="text-center"><a href="pdf/generar.php?ID_compra=<?php echo $dat['ID'] ?>&id_tran=<?php echo $dat['ID_transaccion'] ?> &ID_cliente=<?php echo $dat['ID_cliente'] ?>" target="_blank" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a></div></td>
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

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formColores">    
            <div class="modal-body">

                <div class="form-group">
                <label for="nombre" class="col-form-label">Id:</label>
                <input readonly="readonly" type="text" class="form-control" id="id" onkeypress='return event.charCode >=48 && event.charCode <=57' maxlength="35">
                </div>

                <div class="form-group">
                <label for="nombre" class="col-form-label">Color:</label>
                <input type="text" class="form-control" id="color" onkeypress='return event.charCode >=65 && event.charCode <=90 || event.charCode >=96 && event.charCode <=122 || event.charCode >=96 || event.charCode ==32' required maxlength="35">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  


<?php require_once "vistas/parte_inferior.php"?>
<script>
    $(document).ready(function(){
        tabla_colores_zapatos= $("#tabla_colores_zapatos").DataTable({

    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formTalla").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Color");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    id_producto = parseInt(fila.find('td:eq(1)').text());

    color = fila.find('td:eq(6)').text();
    $("#id").val(id); 
    $("#id_producto").val(id_producto);
    $("#color").val(color)

    opcion = 2; //editar

    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Color");            
    $("#modalCRUD").modal("show");  
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud_color.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tabla_tallas_zapatos.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formColores").submit(function(e){
    e.preventDefault(); 
    var id = $("#id").val();
    var id_producto = $("#id_producto").val();
    var color = $("#color").val();

    var data = new FormData();
    data.append('id',id);
    data.append('id_producto',id_producto);
    data.append('color',color);
    data.append('opcion',opcion);

    $.ajax({
            type : 'POST',
            url :  "bd/crud_color.php",
            data : data,
            cache: false,
            contentType : false,
            processData : false,

            success: function(data){
                console.log(data);     
                location.reload();      
            }      
        });
    $("#modalCRUD").modal("hide");     
});      
});
</script>

</body>
</html>