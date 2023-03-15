$(document).ready(function () {
    $("#update").click(function () {
        var newtext = $("#newtext").val();
        $.ajax({
            type: "POST",
            url: "Question1.php",
            data: { newtext: newtext },
            success: function (result) {
                $("#para1").html(result);
            }
        });
    });
});