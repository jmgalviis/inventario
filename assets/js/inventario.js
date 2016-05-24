$(document).on("ready",inicio);

function inicio () {

	listarDatos("");
	listaProducto("");
	listarProveedor("");

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

		//
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

		$("body").on("click","#listar a",function(event){
		event.preventDefault();
		id = $(this).attr("href");
		codigo = $(this).parent().parent().children("td:eq(1)").text();
		nombre = $(this).parent().parent().children("td:eq(2)").text();
		url = "http://localhost/inventario/orden/tmpsave";
		dat = "'#formulario'";
		deci = 1;
		$("#idproducto").val(id);
		$("#codigo").val(codigo);
		$("#producto").val(nombre);
		$("#btnAdd").click(alert(id+" "+ codigo +" "+nombre));		
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

function listaProducto(texto){
	$.ajax({
		url:"http://localhost/inventario/producto/listarProductos",
		type:"POST",
		data:{buscar:texto},
		success:function(devolver){
			var registros = eval(devolver);
			html = '<table class="table table-hover"><thead><th>#</th><th>Código</th><th>Producto</th><th></th></thead><tbody>';
            for (var i = 0; i < registros.length; i++) {
            	j = 1+i;
            	html += '<tr><td>'+j+'</td>';
            	html +='<td>'+registros[i]['cod_producto']+'</td>';
            	html +='<td>'+registros[i]['nom_producto']+'</td>';
            	html +='<td id="tmp"><a id="btnAdd" class="btn btn-success" href="'+registros[i]['id_producto']+'">+</a></td>';
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