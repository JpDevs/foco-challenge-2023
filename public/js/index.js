$(document).ready(function() {
    $.get('/api/bookings', function(data) {
        $.each(data, function(index, value) {
            // console.log(value);
            var row = $('<tr>');

            let checkin = new Date(value.check_in).toLocaleDateString('pt-BR', {timeZone: 'UTC'})
            let checkout = new Date(value.check_out).toLocaleDateString('pt-BR', {timeZone: 'UTC'})


            row.append($('<td>').text(value.id));
            row.append($('<td>').text(value.booking_code));
            row.append($('<td>').text(value.booking_holder));
            row.append($('<td>').text(value.status));
            row.append($('<td>').text(value.kids));
            row.append($('<td>').text(value.adults));
            row.append($('<td>').text(checkin));
            row.append($('<td>').text(checkout));


            var botoesTd = $('<td>');
            botoesTd.append('<a href="booking/' + value.id +'/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>');
            botoesTd.append('<a href="booking/' + value.id+'" class="btn btn-warning"><i class="fas fa-eye"></i></a>');

            botoesTd.append('<button id="delete" data-booking-id="'+value.id+'" onclick="deleteBooking(this)" type="submit" class="btn btn-danger deletebtn" ><i class="fas fa-trash-alt"></i></button>')


            $('#table tbody').append(row.append(botoesTd));
        });
    });
});

function deleteBooking(data) {
    let id = data.getAttribute('data-booking-id')
    $.ajax({
        url: "/api/bookings/" + id,
        type: "DELETE",
        success: function (data) {
            let div = document.getElementById('deleted');
            div.style.display = 'block'
            setTimeout(function () {
                location.reload()
            }, 2000);
        }

    })
}
