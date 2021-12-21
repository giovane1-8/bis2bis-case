<?php
/*
 * Classe view da pagina home
*/

namespace Views;

class HomeView extends View
{

    function errMsg()
    {
        echo "            
                    <script>
                    $('#err').modal('show');
                    setTimeout(() =>{
                        $('#err').modal('hide')
                    },5000);
                    </script>
                ";
    }
}
