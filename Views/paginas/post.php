<link href="<?php echo VENDOR_PATH ?>recursos/css/simditor.css" rel="stylesheet" type="text/css" />
<div class="d-flex">
    <form class="col" method="post" action="#">
        <div class="form-group">
            <label for="nome">Titulo do post</label>
            <input type="text" class="form-control" maxlength="45" name="titulo" placeholder="Como usar PDO com PHP" required>
        </div>
        <div class="form-group">

            <label for="nickname">Corpo</label>
            <textarea maxlength="65535" id="textarea" class="form-control" name="corpo" placeholder="Ex: Starkiller889" required>
            </textarea>
        </div>


        <button type="submit" class="btn btn-primary">Postar</button>

    </form>
</div>

<script>
    window.addEventListener("load", () => {
        var editor = new Simditor({
            textarea: $('#textarea')
            //optional options
        });
    })
</script>