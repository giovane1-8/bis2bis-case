<div style='color: black' class='modal fade' id='err' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'><font color='red'>Erro</font> ao criar post
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                Tente novamente;
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='sucessoModal' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Post criado com
                    <font color='green'>SUCESSO</font>
                </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<link href="<?php echo VENDOR_PATH ?>recursos/css/simditor.css" rel="stylesheet" type="text/css" />
<div class="d-flex">
    <form class="col" method="post" action="#">
        <div class="form-group">
            <label for="nome">Titulo do post</label>
            <input type="text" class="form-control" maxlength="45" name="titulo" placeholder="Como usar PDO com PHP" required>
        </div>
        <div class="form-group">

            <label for="nickname">Corpo</label>
            <textarea maxlength="65535" id="textarea" required>
            </textarea>
        </div>


        <button type="submit" class="btn btn-primary">Postar</button>

    </form>
</div>

<script>
    window.addEventListener("load", () => {

        var editor = new Simditor({
            upload: false,
            params: {
                "corpoPost": ""
            },
            textarea: $('#textarea')
            //optional options
        });
        editor.on("valuechanged", () => {
            $("input[name='corpoPost']").val(editor.getValue())
            console.log($("input[name='corpoPost']").val())
        });

    })
</script>