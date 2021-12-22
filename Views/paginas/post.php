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
            placeholder: 
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu fringilla tellus. Suspendisse nec mauris quis massa efficitur fringilla. Cras in odio sed ligula semper aliquet sed et libero. Sed neque velit, congue ac auctor id, laoreet sed magna. Nunc congue eros odio. Nunc lobortis aliquet convallis. Pellentesque fermentum in purus ut varius. Praesent sed nisi sed metus egestas suscipit at nec erat. Nulla eros nibh, consectetur lobortis cursus eu, tempus nec neque. Curabitur vestibulum enim luctus lorem iaculis convallis. Praesent tempor pretium nibh, sit amet pulvinar elit consequat at. Vivamus ac nulla euismod, dapibus eros vehicula, lacinia libero. Praesent gravida in dolor nec commodo.Suspendisse et nisi dignissim, tincidunt ex a, consequat urna. Proin laoreet maximus ligula ac dignissim. Etiam pharetra porttitor tempus. Ut pretium porttitor leo. Sed in nunc urna. Fusce vel dapibus massa, ac pretium turpis. Fusce laoreet facilisis nisl sit amet rutrum. Fusce porta, arcu vitae efficitur vehicula, est libero hendrerit risus, et lacinia nibh dui at urna. Pellentesque nec tortor tincidunt, gravida nibh at, ullamcorper lectus. Phasellus lacus odio, tincidunt vitae lobortis nec, efficitur ut quam. Donec nec vehicula enim. Curabitur convallis ultricies suscipit.Suspendisse viverra enim est, quis vulputate justo bibendum eget. Sed nulla libero, dictum laoreet venenatis eleifend, tristique et erat. Maecenas consectetur blandit lorem sit amet iaculis. Quisque non enim ut nisi auctor vestibulum. Mauris sagittis ligula eget neque tempor aliquet.",
            params: {
                "corpoPost": ""
            },
            textarea: $('#textarea')
            //optional options
        });
        editor.on("valuechanged", () => {
            textCorpo = editor.getValue()
            $("input[name='corpoPost']").val(textCorpo)
            if(textCorpo.length >= 65535){
                alert("exedeu o limite");
            }
            console.log($("input[name='corpoPost']").val())
        });

    })
</script>