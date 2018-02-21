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
                console.log(value);
                if(value.localeCompare("false") === 0){
                    $.growl.error({ message: "Email oder Passwort ist ungültig!", size: "large" });
                }
                else window.location = "index.php";
            }
        })
    })
});
