function getItem(id) {
    $(document).ready(function () {
        $.get('/api/bookings/' + id + '/edit', function (data) {
            let booking = data.booking
            $('#booking_holder').val(booking.booking_holder)
            $('#holder_email').val(booking.holder_email)
            $('#holder_phone').val(booking.holder_phone)
            $('#check_in').val(booking.check_in)
            $('#check_out').val(booking.check_out)
            $('#kids').val(booking.kids)
            $('#adults').val(booking.adults)
            $('#status').val(booking.status)
            $('#option' + booking.status).attr('selected', true)
            $('#booking_code').text('Reserva ' + booking.booking_code)
        });
    });
}

$(document).ready(function () {
    $('#booking_form').submit(function (e) {
        // alert('chegou')
        let form = $('#booking_form').serializeArray()
        let data = {
            booking_holder: $('#booking_holder').val(),
            holder_phone: $('#holder_phone').val(),
            holder_email: $('#holder_email').val(),
            adults: $('#adults').val(),
            kids: $('#kids').val(),
            check_in: $('#check_in').val(),
            check_out: $('#check_out').val(),
            status: $('#status').val()
        }
        $.ajax({
            url: "/api/bookings/" + $('#booking_id').val(),
            type: "PUT",
            data: data,
            success: function (data) {
                $('#alertSuccess').css('display', 'block')
                setTimeout(function () {
                    location.reload()
                }, 1000);
            }

        })
    })
});
