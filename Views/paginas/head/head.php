<!DOCTYPE html>
<html lang='pt-br'>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title><?php echo $this->titlePage; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel='stylesheet' type='text/css' media='screen' href='<?php echo VENDOR_PATH ?>recursos/css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='<?php echo VENDOR_PATH ?>recursos/css/index.css'>
  <style>

  </style>
</head>

<body>
  
<div class='modal fade' id='SucessoPadrao' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'><?php echo @$this-> msnTXT ?> <font color='green'>SUCESSO</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
  <div class="container pb-5" >

  
  
<div class='modal fade' id='errorPadrao' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'><font color='red'>ERRO </font><?php echo @$this-> msnTXT ?> 
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
  <div class="container pb-5" >
