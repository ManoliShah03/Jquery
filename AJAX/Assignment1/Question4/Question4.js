$(document).ready(function () {
    $("#upload").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "Question4.php",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                $("#image").attr("src", response);
            },

        });
    });
});