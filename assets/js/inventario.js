$(document).on("ready",inicio);

function inicio () {


		$("body").on("click","#listaProductos button",function(event){
		event.preventDefault();
		id = $(this).attr("value");
		codigo = $(this).parent().parent().children("td:eq(1)").text();
		nombre = $(this).parent().parent().children("td:eq(2)").text();
		descripcion = $(this).parent().parent().children("td:eq(3)").text();
		
		$("#idproducto").val(id);
		$("#codigo").val(codigo);
		$("#producto").val(nombre);
		$("#descripcion").val(descripcion);
		$("#btnactualizar").click(actualizar);
		
	});
}

function actualizar(){
	$.ajax({
		url:"http://localhost/inventario/producto/updateProducto",
		type:"POST",
		data:$("#formproducto").serialize(),
		success:function(respuesta){
			alert(respuesta);
		}
	});
}