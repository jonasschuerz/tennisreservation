//navbar
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
                // Get the target from the "data-target" attribute
                var target = $el.dataset.target;
                var $target = document.getElementById(target);
                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');
            });
        });
    }
});
//refresh my reseration
$(document).ready(function() {
    $("#reservations").load("refreshReservation.php");
    var refresh = setInterval(function() {
        $("#reservations").load("refreshReservation.php");
    }, 100);
});
//Communication with the backend
$(function () {
    var $email = $('#email');
    var $password = $('#password');
    $('#login').on('click', function () {
        var user = {
            email: $email.val(),
            password: $password.val(),
        }

        $.ajax({
            type: "Post",
            url: "handlelogin.php",
            data: user,
            success: function (value) {
                if(value.localeCompare("false") === 0){
                    $.growl.error({ message: "Email oder Passwort ist ungültig!", size: "large" });
                }
                else window.location = "index.php";
            }
        })
    })
    $('#addReservation').on('click', function () {
        var registration = {
            date: $('#Date').val(),
            fromTime: $('#fromTime').val(),
            toTime: $('#toTime').val(),
            place: $('#place'),
        }
        $.ajax({
            type: "Post",
            url: "addReservation.php",
            data: registration,
            success: function (value) {
                console.log(value);
                if(value.localeCompare("false") === 0){
                    $.growl.error({message: "Reservierung fehlgeschlagen", size: "large" });
                }
                else $.growl.notice({title: "Success", message: "Erfolgreich reserviert", size: "large" });;
            }
        })
    })
    $('#deleteRegistration').on('click', function () {
        var registrations = {}
        $.ajax({
            type: "Post",
            url: "delReservation.php",
            data: registrations,
            success: function (value) {
                console.log(value);
                if(value.localeCompare("false") === 0){
                    $.growl.error({message: "Löschvorgang fehlgeschlagen", size: "large" });
                }
                else $.growl.notice({title: "Success", message: "Erfolgreich gelöscht", size: "large" });;
            }
        })
    })
    $('#logout').on('click', function () {
        $.ajax({
            type: "Post",
            url: "handlelogout.php",
            success: function (value) {
                console.log(value);
                if(value.localeCompare("false") === 0){
                    $.growl.error({message: "Logout fehlgeschlagen", size: "large" });
                }
                else {
                    window.location = "login.php";
                }
            }
        })
    })
});
