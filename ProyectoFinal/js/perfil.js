$('#actual').hide();

$(document).ready(function () {
    //console.log('Escuchando para pasar usuario');

    $('#perfil').click(function (e) {
        let valor = $('#perfil').val();
        //console.log(valor);
        $.ajax({
            url: 'operaciones_php/perfiles.php',
            type: 'POST',
            data: { valor: valor },
            success: function (response) {
                //console.log(response);
                $("#cargaexterna").html(response);
                //let data=JSON.parse(response);

            }
        })
    })
});

$(document).ready(function () {
    //console.log('Escuchando para buscar');
    $('#buscar').keyup(function (e) {
        let busqueda = $('#buscar').val();
        //console.log(busqueda);
        $.ajax({
            url: 'operaciones_php/busqueda.php',
            type: 'POST',
            data: { busqueda: busqueda },
            success: function (response) {
                //console.log(response);
                $("#cargaexterna").html(response);
                //let data=JSON.parse(response);
            }

        })
    })
});

$('#dato').submit(function (e) {
    //console.log("Enviando");
    const postData = {
        nombre: $('#nombre').val(),
        idioma: $('#idioma').val(),
        clasificacion: $('#clasificacion').val()
    };
    console.log(postData);
    $.post('operaciones_php/crearPerfil.php', postData, function (response) {
        //console.log(response);
        $('#cargaexterna').hide();
        setTimeout("document.location=document.location", 1);
    })
    e.preventDefault();
});

$('#editar').click(function (e) {
    let valor = $('#perfil').val();
    //console.log("Recivido"+valor);
    $.ajax({
        url: 'operaciones_php/editar_perfil.php',
        type: 'POST',
        data: { valor: valor },
        success: function (response) {
            //console.log(response);
            $("#cargaexterna").html(response);
            //let data=JSON.parse(response);
        }
    })
});


$('#actualizar').click(function (e) {
    console.log("Enviando");
    const postData = {
        perfil:$('#actual').val(),
        nombre: $('#name').val(),
        idioma: $('#lenguaje').val(),
        clasificacion: $('#tipo').val()
    };
    console.log(postData);
    $.post('operaciones_php/actualizarPerfil.php', postData, function (response) {
        console.log(response);
        $('#cargaexterna').hide();
        setTimeout("document.location=document.location", 1);
    })
    e.preventDefault();
});


