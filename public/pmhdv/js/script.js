$(document).ready(function () {
    $("#tra-loi1").click(function () {
        $("#rep1").toggle();
    });
    $("#tra-loi2").click(function () {
        $("#rep2").toggle();
    });

    $(".continue-js").click(function () {
        $("#create-cv").addClass("d-none");
        $(".form-themcv").addClass("d-block");
    });

    $(".back-js").click(function () {
        $(".form-themcv").removeClass("d-block");
        $("#create-cv").removeClass("d-none");
    });

    $('input[name="username"],input[name="pass"]').focus(function () {
        $(this).prev().animate({
            'opacity': '1'
        }, 200);
    });
    $('input[name="username"],input[name="pass"]').blur(function () {
        $(this).prev().animate({
            'opacity': '.5'
        }, 200);
    });
    $('input[name="username"],input[name="pass"]').keyup(function () {
        if (!$(this).val() == '') {
            $(this).next().animate({
                'opacity': '1',
                'right': '30'
            }, 200);
        } else {
            $(this).next().animate({
                'opacity': '0',
                'right': '20'
            }, 200);
        }
    });

    $('.login-signup a').click(function () {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "slow")
    });

    $('.btn-toggle').click(function () {
        $('.master').toggleClass('is-collapsed');
    });



    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);

            hideUploadText();
        }
    }
    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });

    function hideUploadText() {
        $('.choose-avatar').addClass('d-none');
    }

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
});
