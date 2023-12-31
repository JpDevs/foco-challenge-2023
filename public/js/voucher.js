function getItem(id) {
    $(document).ready(function () {
        $.get('/api/bookings/' + id + '/edit', function (data) {
            let booking = data.booking
            let status = {
                1: "Pendente",
                2: "Confirmada",
                3: "Recuperada",
                0: "Cancelada"
            }

            let currentStatus = booking.status

            $('#booking_holder').val(booking.booking_holder)
            $('#holder_email').val(booking.holder_email)
            $('#holder_phone').val(booking.holder_phone)
            $('#check_in').val(booking.check_in)
            $('#check_out').val(booking.check_out)
            $('#kids').val(booking.kids)
            $('#adults').val(booking.adults)
            $('#status').val(status[currentStatus])
            $('#option' + booking.status).attr('selected', true)
            $('#booking_code').text('Reserva ' + booking.booking_code)
        });
    });
}
