<center>
    <h1>Posts recentes</h1>
</center>
<?php foreach ($this->dados as $key => $value) : ?>
    <div class="border border-black bg-white darkmode-ignore">
        <a href="<?php echo VENDOR_PATH . "post/view/" . $value["id_post"] ?>">
            <h2 class="text-center "> <?php echo ($value["nm_titulo"]) ?></h2>
        </a>
        <div class="simiditor">
        <?php echo ($value["nm_corpo"]) ?>

        </div>
    </div>
    <hr size="50">
<?php endforeach ?>


<script>
    window.addEventListener("load", () => {
    

    });
</script>