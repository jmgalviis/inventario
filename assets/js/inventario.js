$(document).on("ready",inicio);

function inicio () {

	listarDatos("");
	listaProducto("");
	listarProveedor("");
	pro = $("#bt").attr("value");
	listaProducto("",pro);
	listartmp("");

	$("#buscar").keyup(function(){
		param = $("#buscar").val();
		listarDatos(param);
	});

	$("#buscarprov").keyup(function(){
		parame = $("#buscarprov").val();
		listarProveedor(parame);
	});


	$("#btnbuscar").click(function(){
		listarDatos("");
	});

	$("#btnbuscarprov").click(function(){
		listarProveedor("");
	});


		$("body").on("click","#listaProductos button",function(event){
		event.preventDefault();
		id = $(this).attr("value");
		codigo = $(this).parent().parent().children("td:eq(1)").text();
		nombre = $(this).parent().parent().children("td:eq(2)").text();
		descripcion = $(this).parent().parent().children("td:eq(3)").text();
		url = "http://localhost/inventario/producto/updateProducto";
		dat = "'#formproducto'";
		deci = 1;
		$("#idproducto").val(id);
		$("#codigo").val(codigo);
		$("#producto").val(nombre);
		$("#descripcion").val(descripcion);
		$("#btnactualizar").click(actualizar(url,dat,deci));		
	});

		$("body").on("click","#listar button",function(event){
		event.preventDefault();
		id = $(this).attr("value");
		codigo = $(this).parent().parent().children("td:eq(1)").text();
		nombre = $(this).parent().parent().children("td:eq(2)").text();
		cantidad = $('#cant_'+id).val();
		proved = $('#idprov').val();
		$("#idproducto").val(id);
		$("#codigo").val(codigo);
		$("#producto").val(nombre);
		$("#btnAdd").click(guardarTmp(id,codigo,nombre,cantidad,proved));		
	});

		$("body").on("click","#listaProveedor button",function(event){
		event.preventDefault();
		idp = $(this).attr("value");
		nit = $(this).parent().parent().children("td:eq(1)").text();
		nombre = $(this).parent().parent().children("td:eq(2)").text();
		direccion = $(this).parent().parent().children("td:eq(3)").text();
		telefono = $(this).parent().parent().children("td:eq(4)").text();
		email = $(this).parent().parent().children("td:eq(5)").text();
		contacto = $(this).parent().parent().children("td:eq(6)").text();
		telcontacto = $(this).parent().parent().children("td:eq(7)").text();
		url = "http://localhost/inventario/proveedor/updateProveedor";
		dat = "'#formproveedor'";
		deci = 2;
		$("#idproveedor").val(idp);
		$("#nit").val(nit);
		$("#nombre").val(nombre);
		$("#direccion").val(direccion);
		$("#telefono").val(telefono);
		$("#email").val(email);
		$("#nombrecontacto").val(contacto);
		$("#telefonocontacto").val(telcontacto);
		$("#btnactualizaprov").click(actualizar(url,dat,deci));		
	});


		$("body").on("click","#eliminar a",function(event){
			event.preventDefault();
			id = $(this).attr("href");
			urls = "http://localhost/inventario/producto/deleteProducto"
			deci = 1;
			eliminar(id,urls,deci);
		});

		$("body").on("click","#eliminarprov a",function(event){
			event.preventDefault();
			id = $(this).attr("href");
			urls = "http://localhost/inventario/proveedor/deleteProveedor";
			deci = 2;
			eliminar(id,urls,deci);
		});

		$("body").on("click","#listatmp a",function(event){
			event.preventDefault();
			id = $(this).attr("href");
			urls = "http://localhost/inventario/orden/tmpelimina";
			eliminartmp(id,urls);
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

function listaProducto(texto,provee){
	$.ajax({
		url:"http://localhost/inventario/producto/listarProductos",
		type:"POST",
		data:{buscar:texto},
		success:function(devolver){
			var registros = eval(devolver);
			var id = provee;
			html = '<table class="table table-hover"><thead><th>#</th><th>Código</th><th>Producto</th><th>Cantidad</th><th></th></thead><tbody>';
            for (var i = 0; i < registros.length; i++) {
            	j = 1+i;
            	html += '<tr><td>'+j+'<input value="'+id+'" name="idprov" id="idprov" type="hidden"></td>';
            	html +='<td>'+registros[i]['cod_producto']+'</td>';
            	html +='<td>'+registros[i]['nom_producto']+'</td>';
            	html +='<td class="col-lg-1"><input value="1" type="text" name="cant_'+registros[i]['id_producto']+'" id="cant_'+registros[i]['id_producto']+'" class="form-control"></td>';
            	html +='<td id="tmp"><button id="btnAdd" class="btn btn-success" value="'+registros[i]['id_producto']+'">+</button></td>';
            	html +='</tr>'

            };
            html +='</tbody></table>';
            $('#listar').html(html);
			
		}
	});
}

function actualizar(url,dat, deci){
	$.ajax({
		url:url,
		type:"POST",
		data:$(dat).serialize(),
		success:function(respuesta){
			alert(respuesta);
			switch (deci) {
				case 1:
				listarDatos("");
				break;
				case 2:
				listarProveedor("");
				break;
				default:
				alert("No tengo a dónde ir");
			};			
		}
	});
}
function eliminar(ideliminar,urls,deci){
	$.ajax({
		url:urls,
		type:"POST",
		data:{id:ideliminar},
		success:function(respuesta){
			alert(respuesta);
			switch (deci) {
				case 1:
				listarDatos("");
				break;
				case 2:
				listarProveedor("");
				break;
				default:
				alert("No tengo a dónde ir");
			};			
		}
	});
}

function listarProveedor(textos){
	$.ajax({
		url:"http://localhost/inventario/proveedor/listarProveedor",
		type:"POST",
		data:{buscar:textos},
		success:function(devolvers){
			var registro = eval(devolvers);
			htmls = '<table class="table table-hover"><thead><th>#</th><th>Nit</th><th>Empresa</th><th>Dirección</th><th>Teléfono</th><th>Email</th><th>Contacto</th><th>Teléfono Contacto</th><th></th></thead><tbody>';
            for (var i = 0; i < registro.length; i++) {
            	j = 1+i;
            	htmls += '<tr><td>'+j+'</td>';
            	htmls +='<td>'+registro[i]['nit_proveedor']+'</td>';
            	htmls +='<td>'+registro[i]['nom_proveedor']+'</td>';
            	htmls +='<td>'+registro[i]['dir_proveedor']+'</td>';
            	htmls +='<td>'+registro[i]['tel_proveedor']+'</td>';
            	htmls +='<td>'+registro[i]['email_proveedor']+'</td>';
            	htmls +='<td>'+registro[i]['nom_contacto']+'</td>';
            	htmls +='<td>'+registro[i]['tel_contacto']+'</td>';
            	htmls +='<td><button data-toggle="modal" data-target="#actualizarprov" class="btn btn-success" value="'+registro[i]['id_proveedor']+'">Actualizar</button></td>';
            	htmls +='<td id="eliminarprov"><a class="btn btn-danger" href="'+registro[i]['id_proveedor']+'">Eliminar</a></td></tr>'

            };
            htmls +='</tbody></table>';
            $('#listaProveedor').html(htmls);
			
		}
	});
}

function guardarTmp(idp,codigop,nombrep,cantidadp,proveed){
	$.ajax({
		url:"http://localhost/inventario/orden/savetmp",
		type:"POST",
		data:{id:idp,codigo:codigop,nombre:nombrep,cantidad:cantidadp,idprov:proveed},
		success:function(devuelve){
			listartmp("");
		}
	});

}

function listartmp(texto,prove){
	$.ajax({
		url:"http://localhost/inventario/orden/temporal",
		type:"POST",
		data:{buscar:texto},
		success:function(devuelve){
			var registro = eval(devuelve);
			htmls = '<table class="table table-hover"><thead><th>#</th><th>Código</th><th>Producto</th><th>Cantidad</th><th></th></thead><tbody>';
			for (var i = 0; i < registro.length; i++) {
            	j = 1+i;
            	htmls += '<tr><td>'+j+'</td>';
            	htmls +='<td>'+registro[i]['cod_producto']+'</td>';
            	htmls +='<td>'+registro[i]['nom_producto']+'</td>';
            	htmls +='<td >'+registro[i]['cantidad']+'</td>';
            	htmls +='<td id="eliminartmp"><a class="btn btn-danger" href="'+registro[i]['id_producto']+'"><i class="glyphicon glyphicon-trash"></i></a></td></tr>';
            };
            htmls +='</tbody></table>';
            $('#listatmp').html(htmls);
		}
	});
}

function eliminartmp(ideliminar,urls){
	$.ajax({
		url:urls,
		type:"POST",
		data:{id:ideliminar},
		success:function(respuesta){
			alert(respuesta);
			listartmp("");			
		}
	});
}