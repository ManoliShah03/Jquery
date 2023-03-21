$(document).ready(function () {
  $('#login').submit(function (event) {

    var formloginData = {
      email: $('#username').val(),
      password: $('#password').val()
    };

    $.ajax({
      type: 'POST',
      url: 'login.php',
      data: formloginData,
      dataType: 'json',
      encode: true,
      success: function (response) {
        if (response) {
          window.location.href = "view.html";
        }
      },
      error: function (xhr, status, error) {
        console.log("Error:", error);
      }
    });
    event.preventDefault();
  });
});
