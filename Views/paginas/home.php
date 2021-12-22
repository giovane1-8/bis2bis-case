<center>
    <h1>Posts recentes</h1>
</center>
<?php foreach ($this->dados as $key => $value) : ?>
    <div class='border bg-white border-dark darkmode-ignore'>
        <a href="<?php echo VENDOR_PATH."post/view/".$value["id_post"] ?>"><h2 class="text-center "> <?php echo ($value["nm_titulo"]) ?></h2></a>
        <?php echo ($value["nm_corpo"]) ?>
    </div>
    <hr size="50">
<?php endforeach ?>