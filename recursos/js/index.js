const DEFAULT_PATH = "/bis2bis-case/"

function _(element) {
    if (document.getElementById(element))
        return document.getElementById(element);
    else
        return false;
}
var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
if (!isIOS) {
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            _("navbar").style.top = "0";
            _("footbar").style.bottom = "0";
        } else {
            _("navbar").style.top = "-300px";
            _("footbar").style.bottom = "-68px";
        }
        prevScrollpos = currentScrollPos;
    }
}