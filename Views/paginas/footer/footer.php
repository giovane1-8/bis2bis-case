</div>
<script src="<?php echo VENDOR_PATH ?>recursos/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo VENDOR_PATH ?>recursos/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo VENDOR_PATH ?>recursos/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?php echo VENDOR_PATH ?>recursos/js/darkmode-js.min.js"></script>

<?php if (explode('/', @$_GET['url'][0] == "post")) : ?>
    <script type="text/javascript" src="<?php echo VENDOR_PATH ?>recursos/js/module.js"></script>
    <script type="text/javascript" src="<?php echo VENDOR_PATH ?>recursos/js/hotkeys.js"></script>
    <script type="text/javascript" src="<?php echo VENDOR_PATH ?>recursos/js/uploader.js"></script>
    <script type="text/javascript" src="<?php echo VENDOR_PATH ?>recursos/js/simditor.js"></script>
<?php endif ?>
<script src="<?php echo VENDOR_PATH ?>recursos/js/index.js"></script>

</body>

</html>