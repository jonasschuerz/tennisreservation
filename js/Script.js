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
$(function refresh() {
    $.ajax({
        url: 'refreshReservation.php',
        success: function(data) {
            if(data === "") return;
            var data = JSON.parse(data);
            var tableElements = document.querySelector("tbody[id=reservations]");

            for(var i=0; i < data.length; i++){

                var exists = false;
                for(var j=0; j< tableElements.rows.length; j++){
                    if(data[i].id == tableElements.rows[j].cells[0].children[0].id){
                        exists = true;

                        break;
                    }
                   /* if(data[i].date <= tableElements.rows[j].cells[0].children[1]){
                        console.log("increment index " + index);
                        index++;
                    }*/

                }
                if(!exists){
                    $('<tr><td><input class="is-checkradio is-danger" id="' + data[i].id + '" type="checkbox" onclick="isTriggerd(' + data[i].id + ')"><label for="' + data[i].id + '"></label></td><td>' + data[i].date + '</td><td>' + data[i].fromTime + '</td><td>' + data[i].toTime + '</td><td>' + data[i].place + '</td></tr>').appendTo(tableElements);


//                    if($('#reservations').find('input#'+index)){
//                        console.log('einfügen')
//                        $('<tr id="' + data[i].id + '"><td><input class="is-checkradio is-danger" id="check' + data[i].id + '" type="checkbox" onclick="isTriggerd(' + data[i].id + ')"><label for="check' + data[i].id + '"></label></td><td>' + data[i].date + '</td><td>' + data[i].fromTime + '</td><td>' + data[i].toTime + '</td><td>' + data[i].place + '</td></tr>').append($('#'+index));
//                    }
//                    else $('<tr id="' + data[i].id + '"><td><input class="is-checkradio is-danger" id="check' + data[i].id + '" type="checkbox" onclick="isTriggerd(' + data[i].id + ')"><label for="check' + data[i].id + '"></label></td><td>' + data[i].date + '</td><td>' + data[i].fromTime + '</td><td>' + data[i].toTime + '</td><td>' + data[i].place + '</td></tr>').appendChild(tableElements);
                }
            }
            for(var i=0; i < tableElements.rows.length; i++){
                var exists = false;
                for(var j=0; j < data.length; j++){
                    if(data[j].id === tableElements.rows[i].cells[0].children[0].id){
                        exists = true;
                    }
                }
                if(!exists){
                    tableElements.removeChild(tableElements.childNodes[i]);
                }
            }
        },
        complete: function() {
            setTimeout(refresh, 300);
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
   /* $('#deleteRegistration').on('click', function () {
        console.log(isTicked);
        $.ajax({
            type: "Post",
            url: "delReservation.php",
            data: ,
            success: function (value) {
                if(value.localeCompare("false") === 0){
                    $.growl.error({message: "Löschvorgang fehlgeschlagen", size: "large" });
                }
                else $.growl.notice({title: "Success", message: "Erfolgreich gelöscht", size: "large" });;
            }
        })
    })*/
    $('#logout').on('click', function () {
        $.ajax({
            type: "Post",
            url: "handlelogout.php",
            success: function (value) {
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
