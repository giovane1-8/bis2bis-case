<link href="<?php echo VENDOR_PATH ?>recursos/css/simditor.css" rel="stylesheet" type="text/css" />

<center>
    <h1>Posts recentes</h1>
</center>
<?php foreach ($this->dados as $key => $value) : ?>
    <div class='border bg-white border-dark  darkmode-ignore'>


        <a href="<?php echo VENDOR_PATH . "post/view/" . $value["id_post"] ?>">
            <h2 class="text-center "> <?php echo ($value["nm_titulo"]) ?></h2>
        </a>
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
<?php endforeach ?>


<script>
    window.addEventListener("load", () => {


    });
</script>