'use strict';
// prueba no se si lo deje
/**
 * @param {String} Method nombre del metodo al que quiera acceder
 * @param {String[]} [params=[]] parametros del metodo
*/
function AutomaticForm(Method, params = []) {
    $request = $.ajax(`${SERVERSIDE}Controllers/request.controller.php?action=${Method}`, {
        data: { param: params },
        dataType: "JSON",
        type: "POST",
        async: false
    });

    return $request.responseJSON;
}

 /**
  * @param null controller
  * @param null method
  * @param  formData
  * @param string params
  * 
  * @return [type]
  */
async function requestController(controller = null, method = null, formData = {}, params = ''){
    return new Promise(function(resolve, reject){
        $.ajax({
            url: `${SERVERSIDE}Controllers/${controller}.controller.php?method=${method}&path=${FOLDERSIDE}&${params}`,
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
            beforeSend: function() {
                console.log('Antes de enviar');
                
            },
            error:function(xhr, status, error) {
                reject({error});
            }
            }).done(function(result){
                resolve(result);
            }).fail(function(error) {
                reject(error);
            })
    })
}