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
    function sucessMsg()
    {
        echo "
            
            <script>
                $('#sucessoModal').modal('show');
            
                setTimeout(() =>{
                    $('#sucessoModal').modal('hide')
                },5000);            
            </script>";
    }
    function msnErro()
    {
        echo "<center><h1>Post não encontrado</h1></center>";
    }
    function msnDelSucc()
    {
        echo "
            <script>
                $('#sucessoModal').modal('show');
            
                setTimeout(() =>{
                    $('#sucessoModal').modal('hide')
                },5000);            
            </script>";
    }
    function msnAltSucc()
    {
        echo "
        <div class='modal fade' id='sucessoModal' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Post alterado com
                    <font color='green'>SUCESSO</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
        <script>
            $('#sucessoModal').modal('show');
        
            setTimeout(() =>{
                $('#sucessoModal').modal('hide')
            },5000);            
        </script>";
    }
}
