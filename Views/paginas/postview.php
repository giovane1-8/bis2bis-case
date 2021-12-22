<link href="<?php echo VENDOR_PATH ?>recursos/css/simditor.css" rel="stylesheet" type="text/css" />


<?php $value = $this->dados ?>
<?php if ($_SESSION["nm_privilegio"] != "gm" || $_SESSION["id_usuario"] != $value["id_usuario"]) : ?>
    <div class='border bg-white border-dark  darkmode-ignore mt-3'>



        <h2 class="text-center "> <?php echo ($value["nm_titulo"]) ?></h2>

        <font class="float-right mr-3" style="font-weight: 100;">Postado em: <i><?php
                                                                                $data = explode("-", $value["dt_post"]);
                                                                                echo ($data[2] . "/" . $data[1] . "/" . $data[0]);
                                                                                ?></i></font>
        <div class="simditor">
            <div class="simditor-body">
                <?php echo ($value["nm_corpo"]) ?>
            </div>
        </div>
    </div>
    <hr size="50">
<?php else : ?>
    <form class="col mt-3" method="post" action="#">

        <div class="form-group">
            <input type="text" class="form-control" maxlength="100" name="titulo" placeholder="Como usar PDO com PHP" value="<?php echo ($value["nm_titulo"]) ?>" required>
        </div>
        
        <div class="form-group">
            <textarea maxlength="65535" id="textarea" required>
            </textarea>
        </div>
        
        <div class="input-group">
            <input type="submit" class="form-control btn btn-primary mx-4" style="border-radius: 5px;" value="Alterar post">
            <input type="button" class="form-control btn btn-danger mx-4" style="border-radius: 5px;" value="Deletar post">

        </div>
        
    </form>
    
<script>
    window.addEventListener("load", () => {

        var editor = new Simditor({
            upload: false,
            params: {
                "corpoPost": ""
            },
            textarea: $('#textarea')
        });
        editor.setValue(`<?php echo ($value["nm_corpo"]) ?>`)
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
<?php endif ?>