$(document).ready(function()
{
	$("button").click(function(){
        var user_name =$(this).val();
        $.get("contenido.php", {contenido: user_name}, function(htmlexterno){
            $("#cargaexterna").html(htmlexterno);
    	});
	});
});