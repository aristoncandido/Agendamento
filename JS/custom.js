document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialDate: "2024-04-26", //data inicial
    editable: true,
    locale: "pt-br", //localização BR
    selectable: true,
    businessHours: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: "Fiscalização",
        start: "2024-04-25T08:45:00",
      },
    ],
  });








  calendar.render(); //renderiza o calendar

  $.ajax({  /* jQuery */
  url: "./dados.php",
  dataType: "json",
  success: function(agendamento) {
    console.log(agendamento.id);
  },
  error: function () {
    console.log("deu ruim");
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
