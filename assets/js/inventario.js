$(document).on("ready",inicio);

function inicio () {

	listarDatos("");
	$("#buscar").keyup(function(){
		param = $("#buscar").val();
		listarDatos(param);
	});
	$("#btnbuscar").click(function(){
		alert(listarDatos(""));
	});

		//
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
		$("body").on("click","#eliminar a",function(event){
			event.preventDefault();
			id = $(this).attr("href");
			eliminar(id);
		});
}

function listarDatos(texto){
	$.ajax({
		url:"http://localhost/inventario/producto/listarProductos",
		type:"POST",
		data:{buscar:texto},
		success:function(devolver){
			var registros = eval(devolver);
			html = '<table class="table table-hover"><thead><th>#</th><th>Código</th><th>Producto</th><th>Descripción</th><th></th></thead><tbody>';
            for (var i = 0; i < registros.length; i++) {
            	j = 1+i;
            	html += '<tr><td>'+j+'</td>';
            	html +='<td>'+registros[i]['cod_producto']+'</td>';
            	html +='<td>'+registros[i]['nom_producto']+'</td>';
            	html +='<td>'+registros[i]['des_producto']+'</td>';
            	html +='<td><button data-toggle="modal" data-target="#actualizar" class="btn btn-success" value="'+registros[i]['id_producto']+'">Actualizar</button></td>';
            	html +='<td id="eliminar"><a class="btn btn-danger" href="'+registros[i]['id_producto']+'">Eliminar</a></td></tr>'

            };
            html +='</tbody></table>';
            $('#listaProductos').html(html);
			
		}
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

function eliminar(ideliminar){
	$.ajax({
		url:"http://localhost/inventario/producto/deleteProducto",
		type:"POST",
		data:{id:ideliminar},
		success:function(respuesta){
			alert(respuesta);
			listarDatos("");
		}
	});
}