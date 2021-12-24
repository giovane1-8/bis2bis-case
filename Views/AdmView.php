<?php
/*
 * Classe view da pagina administração
*/

namespace Views;

class AdmView extends View
{
    function msgEmail()
    {
        echo "
            
            <script>
                $('#emailErr').modal('show');
            
                setTimeout(() =>{
                    $('#emailErr').modal('hide')
                },5000);            
            </script>";
    }
}
