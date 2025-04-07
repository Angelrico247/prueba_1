$(document).ready(function () {
  console.log("jquery funcionando correctamente");

  const url = "http://localhost/crud_prueba/app/controllers/cliente.php";

  getAll();
  function getAll() {
    $.ajax({
      url: url,
      method: "GET",
      success: function (response) {
        console.log(response);
        let clientes = JSON.parse(response);
        console.log(clientes);
        let template = "";
        clientes.forEach((cliente) => {
          template += `
                  <tr>
                  <th data-id="${cliente.id}">${cliente.id}</th>
                  <td>${cliente.nombre}</td>
                  <td>${cliente.apellido}</td>
                  <td>${cliente.domicilio}</td>
                  <td>${cliente.email}</td>
                  <td>
                  <button class="btn btn-success editar" data-id="${cliente.id}" data-nombre="${cliente.nombre}" data-apellido="${cliente.apellido}" data-domicilio="${cliente.domicilio}" data-email="${cliente.email}">Editar</button>
                  <button class="btn btn-danger eliminar" data-id="${cliente.id}">Eliminar</button>
                  </td>
                  </tr>
                  `;
        });
        $("#clientes__table").html(template);
      },
    });
  } //getAll

  $("#clientes__form").submit(function (e) {
    e.preventDefault();
    console.log("enviando");

    let id = $("#id").val();

    const cliente = {
      id: $("#id").val(),
      nombre: $("#nombre").val(),
      apellido: $("#apellido").val(),
      domicilio: $("#domicilio").val(),
      email: $("#email").val(),
    };
    console.log(cliente);



    let method = id ? "PUT" : "POST";
    console.log(method);

    $.ajax({
      url: url,
      method: method,
      data: JSON.stringify(cliente),
      contentType: "application/json",
      success: function (response) {
        console.log(response);
        alert(response);
        getAll();
        $("#clientes__form").trigger("reset");
        $("#id").val('');
      },
    });
  });//submit

  $(document).on("click", ".eliminar", function () {
    console.log("eliminar");
    let id = $(this).data("id");
    console.log(id);

    if (confirm("Seguro que quieres eliminar el registro?")) {
        $.ajax({
            url:url,
            method: "DELETE",
            data: JSON.stringify({id}),
            contentType: "application/json",
            success: function (response) {
                alert(response);
                getAll();
                $("#id").val('');
            }

        })
    }
  })//eliminar

  $(document).on("click", ".editar", function () {
    console.log("eliminar");
   const cliente = {id, nombre, apellido, domicilio, email} = $(this).data()
   console.log(cliente);
   $("#id").val(cliente.id);
   $("#nombre").val(cliente.nombre);
   $("#apellido").val(cliente.apellido);
   $("#domicilio").val(cliente.domicilio);
   $("#email").val(cliente.email);


  })//editar
  
});
