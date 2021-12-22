<link href="<?php echo VENDOR_PATH ?>recursos/css/simditor.css" rel="stylesheet" type="text/css" />


<?php $value = $this->dados ?>
<?php if (!empty($value)) : ?>
    <?php if ($_SESSION["nm_privilegio"] == "gm" || $_SESSION["id_usuario"] == $value["id_usuario"]) : ?>
        <form class="col pb-4 mt-3 bg-white" method="post" action="#">
        
        <font class="">Criado por: <b><?php echo ($value["nm_usuario"]) ?></b></font> 


        <font class="float-right  mr-3" style="font-weight: 100;">Postado em: <b><i><?php
                                                                                    $data = explode("-", $value["dt_post"]);
                                                                                    echo ($data[2] . "/" . $data[1] . "/" . $data[0]);
                                                                                    ?></i></b></font>
            <div class="form-group">
                <input type="text" class="form-control" maxlength="100" name="titulo" placeholder="Como usar PDO com PHP" value="<?php echo ($value["nm_titulo"]) ?>" required>
            </div>
            <div class="form-group">
                <textarea maxlength="65535" id="textarea" required>
            </textarea>
            </div>

            <div class="input-group">
                <input type="submit" class="form-control btn btn-primary mx-4" style="border-radius: 5px;" value="Alterar post">
                <a type="button" class="form-control btn btn-danger mx-4" style="border-radius: 5px;" href="<?php echo VENDOR_PATH . "post/view/" . $value["id_post"] ?>/delete">Deletar post</a>
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
                $("input[name='corpoPost']").val(`<?php echo ($value["nm_corpo"]) ?>`)

                editor.on("valuechanged", () => {
                    textCorpo = editor.getValue()
                    $("input[name='corpoPost']").val(textCorpo)
                    if (textCorpo.length >= 65535) {
                        alert("exedeu o limite");
                    }
                    console.log($("input[name='corpoPost']").val())
                });

            })
        </script>

    <?php else : ?>
        <div class='border bg-white border-dark pb-4 darkmode-ignore mt-3'>



            <h2 class="text-center "> <?php echo ($value["nm_titulo"]) ?></h2>
            <font>Criado por: <b><?php echo ($value["nm_usuario"]) ?></b></font> 


            <font class="float-right mr-3" style="font-weight: 100;">Postado em: <b><i><?php
                                                                                    $data = explode("-", $value["dt_post"]);
                                                                                    echo ($data[2] . "/" . $data[1] . "/" . $data[0]);
                                                                                    ?></i></b></font>
            <div class="simditor">
                <div class="simditor-body">
                    <?php echo ($value["nm_corpo"]) ?>
                </div>
            </div>
        </div>
        <hr size="50">
    <?php endif ?>
<?php endif ?>