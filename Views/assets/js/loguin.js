'use strict';
$(document).ready(function () {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    function showToast(msg = 'Servimeters', icon = 'info') {
        Toast.fire({
            icon: icon,
            title: msg
        });
    }

    $('#loguin').on('click', async function (e) {
        e.preventDefault();
        const form = document.getElementById('formLoguin');
        const formData = new FormData(form);
        var result = await requestController('session', 'loguin', formData);
        if (result.Error) {
            showToast(`${result.Error}.`, 'error');
        } else if (result.Success) {
            showToast(`${result.Success}.`, 'success');
            localStorage.setItem('user', result.User);
            // window.location.href = SERVERSIDE;
            window.location.href = `${SERVERSIDE}Cliente/form`;
        }
        return false;
    })

    $('#logout').on('click', async function (e) {
        e.preventDefault();
        localStorage.clear();
        var result = await requestController('session', 'sessionOff');
        showToast(`${result.Success}.` | 'Gracias por su visita.', 'success');
        window.location.href = SERVERSIDE;
        return false;
    })
}); 