$(document).ready(function(){
    $('#pais').on('change', () => {
    pais = $('#pais').val();
    $.ajax({
        URL: baseUrl + 'municipios/traer_munici()'+pais,
        type: 'POST',
        dataType: 'json',
        success: function(res){
            var data
            data = `<option selected>--Seleciona un departamento--</option>`
            for (let i=0; i<res.length; i++){
                data += `<option value='${res[i].id}'>${res[i].nombre}</option>`
                }
                    data += `</select>`
                    $('#nombre_dpto').html(data)
            }

        })

    })

});