$(document).ready(function(){
    $('.userName').focus(function(){
        $(this).css("background-color","lightgray")
    });
    $('.userName').blur(function(){
        $(this).css("background-color","white")
        });

    $('.password').focus(function(){
            $(this).css("background-color","lightgray")
        });
    $('.password').blur(function(){
            $(this).css("background-color","white")
        });

    $(".login").mouseover(function(){
        $(this).css("background-color", "white");
        $('#login').css("color","black")
        });
    $(".login").mouseout(function(){
        $(this).css("background-color", "#BD5D14");
        $('#login').css("color","black")
        });

    $('.forget').click(function(){
            $(this).css("color","red")
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'we have send to you email with a passcode',
                showConfirmButton: false,
                timer: 2000
              })
        });
 });

