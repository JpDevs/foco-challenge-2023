function update(id) {
    let fileInput = $('#file')[0];
    let file = fileInput.files[0];

    // console.log(file)

    let formData = new FormData();
    formData.append('xml', file);
    $.ajax({
        url: '/api/bookings/' + id + '/xml',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            let alert = document.getElementById('alert')
            alert.innerHTML = "Reserva editada com sucesso!"
            alert.classList.add('alert-success')
            alert.style.display = 'block'
            setTimeout(function () {
                window.location.href = "../edit"
            }, 1000);
        },
        error: function (error) {
            let alert = document.getElementById('alert')
            alert.innerHTML = "Erro ao adicionar resevra: " + error.responseJSON.message
            alert.classList.add('alert-danger')
            alert.style.display = 'block'
        }
    });
}
