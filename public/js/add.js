$(document).ready(function () {


$('#booking_form').submit(function (e) {
    let fileInput = $('#file')[0];
    let file = fileInput.files[0];

    // console.log(file)

    let formData = new FormData();
    formData.append('xml', file);
    $.ajax({
        url: '/api/bookings/xml/upload',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            let alert = document.getElementById('alert')
            alert.innerHTML = "Reserva adicionada com sucesso!"
            alert.classList.add('alert-success')
            alert.style.display = 'block'
            setTimeout(function () {
                window.location.href = "/"
            }, 1000);
        },
        error: function (error) {
            if (error.responseJSON && error.responseJSON.message && error.responseJSON.message.includes('SQLSTATE[23000]')) {
                let alert = document.getElementById('alert')
                alert.innerHTML = "Reserva já existente no banco de dados!"
                alert.classList.add('alert-danger')
                alert.style.display = 'block'
            } else {
                let alert = document.getElementById('alert')
                alert.innerHTML = "Erro ao adicionar resevra: " + error.responseJSON.message
                alert.classList.add('alert-danger')
                alert.style.display = 'block'
            }
        }
    });
})
});
