$(document).ready(function () {
    $('tbody').empty();
    $('#form').submit(function (event) {
        $('tbody').empty();

        var adddata = {
            title: $("#title").val(),
            rating: $("#rating").val(),
        };

        $.ajax({
            type: "POST",
            url: "insert.php",
            data: adddata,
            dataType: "json",
            encode: true,
            success: function (response) {
                $("#table tbody").empty();

                var len = response.length;
                for (var i = 0; i < len; i++) {
                    var id = response[i].id;
                    var title = response[i].title;
                    var rating = response[i].rating;
                    var tr_str = "<tr>" +
                        "<td>" + id + "</td>" +
                        "<td>" + title + "</td>" +
                        "<td>" + rating + "</td>" +
                        "<td><button class='deleteBtn' data-id='" + id + "'>Delete</button></td>" +
                        "</tr>";
                    $("#table tbody").append(tr_str);
                    $('#title').val('');
                    $('#rating').val('');
                }
                $(".deleteBtn").on("click", function () {
                    var id = $(this).data("id");
                    var row = $(this).closest("tr");
                    $.ajax({
                        type: "POST",
                        url: "delete.php",
                        data: { id: id },
                        success: function () {

                            row.remove();
                        }
                    });
                });
            }
        });

        event.preventDefault();
    });
});








