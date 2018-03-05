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
var isTicked = new Array();
function isTriggerd(id){
    console.log("ticked");
    if(document.getElementById(id).checked){
        if(!isTicked.includes(id)){
            isTicked.push(id);
        }
    }
    else{
        if(!isTicked.includes(id)){
            for(var i = 0; i < isTicked.length; i++){
                if(element == id) isTicked.splice(i, 1);
            }
        }
    }
    console.log(isTicked);
}
$(function refresh() {
    var reservations = $('#reservations');
    if (window.location.pathname !== '/reservation.php')
    {
        return;
    }
    $.ajax({
        url: 'refreshReservation.php',
        success: function(data) {
            var data = JSON.parse(data);
            $.each(data, function (i, reservation) {
                var elements = document.querySelector("tbody[id=reservations]");
                var exists = false;
                for(var i = 0; i < elements.rows.length; i++) {
                    if(elements.rows[i].cells[0].children[0].id == reservation.id){
                        exists = true;
                        break;
                    }
                }
                if(!exists) {
                    reservations.append('<tr><td><input class="is-checkradio is-danger" id="' + reservation.id + '" type="checkbox"><label for="' + reservation.id + '"></label></td><td>' + reservation.date + '</td><td>' + reservation.fromTime + '</td><td>' + reservation.toTime + '</td><td>' + reservation.place + '</td></tr>')
                }
            })
        },
        complete: function() {
            setTimeout(refresh, 5000);
        }
    });
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
            date: $('#date').val(),
            fromTime: $('#fromTime').val(),
            toTime: $('#toTime').val(),
            place: $('#place').val(),
        }
        $.ajax({
            type: "Post",
            url: "addReservation.php",
            data: registration,
            success: function (value) {
                console.log(value);
                if(value.localeCompare("false date") === 0){
                    $.growl.error({message: "Zeit Angabe falsch", size: "large", duration: 4500});
                }
                else if(value.localeCompare("false existent") === 0){
                    $.growl.error({message: "Platz zu dieser Zeit schon reserviert", size: "large", duration: 4500 });
                }
                else {
                    $.growl.notice({message: "Erfolgreich reserviert", size: "large",duration: 4500 });
                }
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
