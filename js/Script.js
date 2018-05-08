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
function addOptionsPlace() {
    $.ajax({
        type: 'Post',
        url: './Back-End/getPlaces.php',
        success: function (value) {
            value = JSON.parse(value);
            $.each(value, function (i, item) {
                console.log(i);
                $('.place').append($('<option>', {
                    text: item['name'],
                    class: 'dropdown-item'
                }));
            });


        }
    })
}


//Login Logout
$(function () {
    var $email = $('#email');
    var $password = $('#password');
    $('#login').on('click', function () {
        var user = {
            email: $email.val(),
            password: $password.val(),
        }
        $('#login').addClass("is-loading");
        $.ajax({
            type: "Post",
            url: "./Back-End/handlelogin.php",
            data: user,
            success: function (value) {
                value = JSON.parse(value);
                if(value['error'] === true){
                    $.growl.error({message: value['description'], size: "large", duration: 4500});
                }
                else if(value['error'] === false) {
                    $.growl.notice({message: value['description'], size: "large",duration: 4500 });
                    window.location = "index.php";
                }
            }
        })
    })
    $('#logout').on('click', function () {
        $.ajax({
            type: "Post",
            url: "Back-End/handlelogout.php",
            success: function (value) {
                value = JSON.parse(value);
                if(value['error'] === true){
                    $.growl.error({message: value['description'], size: "large", duration: 4500});
                }
                else if(value['error'] === false) {
                    window.location = "login.php";
                }
            }
        })
    })
});
