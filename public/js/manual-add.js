$(document).ready(function () {
    $('#booking_form').submit(function (e) {
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
            url: "./api/bookings",
            type: "POST",
            data: data,
            success: function (data) {
                $('#alertSuccess').css('display', 'block')
                setTimeout(function () {
                    window.location.href = "/";
                }, 1000);
            }

        })
    })
});
