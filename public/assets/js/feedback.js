$(document).ready(function(){
    $('#one').click(function(){
        $(this).css("color","rgba(189, 93, 20, 0.8)")

        $('#two').click(function(){
            $(this).css("color","rgba(189, 93, 20, 0.8)")

            $('#three').click(function(){
                $(this).css("color","rgba(189, 93, 20, 0.8)")

                $('#four').click(function(){
                    $(this).css("color","rgba(189, 93, 20, 0.8)")

                    $('#five').click(function(){
                        $(this).css("color","rgba(189, 93, 20, 0.8)")
                    });

                });

            });

        });

    });

    $(".send").mouseover(function(){
        $(this).css("background-color", "white");
        $('#send').css("color","black")
        });
    $(".send").mouseout(function(){
        $(this).css("background-color", "#BD5D14");
        $('#send').css("color","black")
        });

    $('.send').click(function(){

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'لقد تم تسجيل رايك بنجاج',
            showConfirmButton: false,
            timer: 2000
          })
    });

 });
