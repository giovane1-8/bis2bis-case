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
    function msgEmail()
    {
        echo "
            
            <script>
                $('#ExemploModalCentralizado').modal('show');
            
                setTimeout(() =>{
                    $('#ExemploModalCentralizado').modal('hide')
                },5000);            
            </script>";
    }
    
    function msgSenha()
    {
        echo "
            
            <script>
                $('#senhaerr').modal('show');
            
                setTimeout(() =>{
                    $('#senhaerr').modal('hide')
                },5000);            
            </script>";
    }
}
