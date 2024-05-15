document.addEventListener("DOMContentLoaded", function () {
  var data_cal = new Date(); //cria o objeto data

  var calendarEl = document.getElementById("calendar");

  let evento = {
    nome: "teste",
    onde: "seila",
  };

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialDate: data_cal, //data inicial
    editable: true,
    locale: "pt-br", //localização BR
    selectable: true,
    businessHours: true,
    dayMaxEvents: true, // allow "more" link when t oo many events
    events: [
      {
        title: "Fiscalizção",
        start: "2024-04-25T08:45:00",
      },
      {
        title: evento.onde,
        start: "2024-04-21T09:45:00",
      },
    ],
  });

  calendar.render(); //renderiza o calendar



  $.ajax({
    url: "./dados.php",
    type: "POST",
    success: (agenda) => {
      evento = JSON.parse(agenda);

      console.log(evento.sala);
    },
    error: function () {
      console.error("deu ruim");
    },
  });
});



/* $(document).ready(function(){ //jQuery
    $.ajax({
        url: './dados.php',
        dataType: 'json',
        success: function(data) {

            // Manipule os dados aqui
            console.log(data.nome); // Exemplo de como acessar um campo do JSON
            console.log(data.idade);
            console.log(data.cidade);
        },
        error: function(){

          console.log("Deu errado");

        }
    });
});
 */

//Importando DADOS do PHP exemplo:
//
