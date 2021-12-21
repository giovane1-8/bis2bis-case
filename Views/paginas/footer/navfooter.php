<div class="container fixed-bottom" id="footbar">
    <div class="container" id='footerconfig'>

        <div class="float-right d-flex">
            <div>
                <div class="onoffswitch" style="bottom: -4px">
                    <input type="checkbox" onclick="darkmode.toggle();" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
                    <label class="onoffswitch-label dark-toggle" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                </div>
            </div>
            <div class="ml-2">
                <label style="cursor: pointer; color: white;" for="myonoffswitch">
                        Dark Mode
                    </label>
            </div>

        </div>
    </div>
</div>
<?php include_once("footer.php"); ?>