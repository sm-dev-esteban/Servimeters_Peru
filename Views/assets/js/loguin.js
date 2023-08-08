'use strict';
$(document).ready(function() {
    
    $('#loguin').on('click', async function(e) {
        e.preventDefault();
        const form = document.getElementById('formLoguin');
        const formData = new FormData(form);
        var result = await requestController('session', 'loguin', formData);
        if (result.Error) {
            showToast(`${result.Error}.`, 'error');
        }else if(result.Success){
            showToast(`${result.Success}.`, 'success');
           // window.location.href = SERVERSIDE + `${result.Cli ? 'Cliente/list_procesos' : ''}`;
            window.location.href = SERVERSIDE;
        }
        return false;
    })

    $('#logout').on('click', async function(e) {
        e.preventDefault();
        localStorage.clear();
        var result = await requestController('session', 'sessionOff');
        showToast(`${result.Success}.` | 'Gracias por su visita.', 'success');
        window.location.href = SERVERSIDE ;
        return false;
    })
}); 