<?php
/*
 * Classe view da pagina administração
*/

namespace Views;

class AdmView extends View
{
    function AltUserSucc()
    {
        echo "
            
            <script>
                $('#sucessoModal').modal('show');
            
                setTimeout(() =>{
                    $('#sucessoModal').modal('hide')
                },5000);            
            </script>";
    }
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
    function msgDelUser()
    {
        echo "
            
            <script>
                $('#userDel').modal('show');
            
                setTimeout(() =>{
                    $('#userDel').modal('hide')
                },5000);            
            </script>";
    }
}
