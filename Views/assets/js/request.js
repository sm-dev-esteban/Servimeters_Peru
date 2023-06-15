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