<?php
/*
 * Classe view da pagina post
*/

namespace Views;

class PostView extends View
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
    function sucessMsg(){
        echo "
            
            <script>
                $('#sucessoModal').modal('show');
            
                setTimeout(() =>{
                    $('#sucessoModal').modal('hide')
                },5000);            
            </script>";
    }
    function msnErro(){
        echo "<center><h1>Post não encontrado</h1></center>";
    }
}
