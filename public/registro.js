$(document).ready(function () {
  console.log("jquery funcionando correctamente");

  const url = "http://localhost/crud_prueba/app/controllers/login.php";

  $("#user__form").submit(function (e) {
    e.preventDefault();
    console.log("enviando");

    const user = {
      username: $("#username").val(),
      password: $("#password").val(),
    };
    console.log(user);

    $.ajax({
      url: url,
      method: "POST",
      data: JSON.stringify(user),
      contentType: "application/json",
      success: function (response) {
        console.log(response);
        alert(response);
        $("#user__form").trigger("reset");
      },
    });
  }); //submit
});
