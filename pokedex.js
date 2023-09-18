$(document).ready(function() {
    callquery();
    //main acima

 

    // função onclick nos botoes com classe "exibir_informacoes"
    
  $(document).on("click", ".exibir_informacoes", function() {
    var pokemonID = $(this).attr("id");

    $.ajax({

      url: 'pokedex.api.php',
      type: 'POST',
      data: {id: pokemonID, buscar_pokemon:'S'},
      dataType: 'html',

      success: function(data) {
        $("#detalhes-pokemon").empty().html(data);
      
      },


        error: function() {
          alert('Erro ao buscar informações do Pokémon');
        }

      });

    });
    

  
  

    function callquery(){
        $.ajax({
            type: 'POST',
            url: 'pokedex.api.php',
            data: {
              querycall: 'S'
            },
            dataType: 'html',
            success: function(data) {
              $("#ListaPok").empty().html(data);
    
            },
            error: function(e) {
              console.log('Erro na requisição AJAX:', e);
            }
          });
     
          


    }


});