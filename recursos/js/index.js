const DEFAULT_PATH = "/bis2bis-case/";
var limiteoffset = 0;
var darkmode;

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

const options = {
    bottom: '64px', // default: '32px'
    right: '1px', // default: '32px'
    left: '32px', // default: 'unset'
    time: '0.5s', // default: '0.3s'
    mixColor: '#fff', // default: '#fff'
    backgroundColor: '#fff', // default: '#fff'
    buttonColorDark: '#000', // default: '#100f2c'
    buttonColorLight: '#fff', // default: '#fff'
    saveInCookies: true, // default: true,
    label: '', // default: ''
    autoMatchOsTheme: false // default: true
}
darkmode = new Darkmode(options);

if (darkmode.isActivated()) {
    _("myonoffswitch").checked = true;
}



$("#pesquisarPostAjax").keyup(function () {
    dropdownMenu = document.querySelector("#dropPesquisa");
    $.ajax({
        dataType: "json",
        url: DEFAULT_PATH + "post/procurarPost",
        data: { "post": _("pesquisarPostAjax").value.trim() },
        method: "POST",
        success: function (dados, string, obg) {
            dropdownMenu.innerHTML = ""
            dados.forEach(post => {
                dropdownMenu.innerHTML += "<a style='color: black;' href='"+ DEFAULT_PATH +"post/view/" + post['id_post'] + "' cursor: pointer;' class='dropdown-item'>" + post['nm_titulo'] + "</a>";
            });
        },
        error: function (obg, erro, op) {
            console.log(erro)
        },
        complete: function (obg, msn) {

        }
    })
})

$(document).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        //requisição ajax para selecionar postagens
        
        carregarPostAjax()

       
    } // fim do if
}); // fim scroll
function carregarPostAjax(){
    $.ajax({
        dataType: "json",
        url: DEFAULT_PATH+'post/infiteScrool', //Página PHP que seleciona postagens
        method: 'POST', // método post, GET ...
        data: {offset: limiteoffset}, //seus paramêtros
        success: function (dados) { // sucesso de retorno executar função

            data = dados["dt_post"].split("-");

            $("#conteudo").append("<div class='simditor bg-white mb-5'><div class='simditor-body'><font class='float-right mr-3' style='font-weight: 100;'>Postado em: <i>"+data[2]+"/"+data[1]+"/"+data[0]+" </i></font><center><h1><a href='"+DEFAULT_PATH+"post/view/"+dados['id_post']+"'>"+dados['nm_titulo']+"</a></h1></center>"+dados['nm_corpo']+"</div></div>"); // adiciona o resultado na div #conteudo
        } // fim success
    }); // fim ajax
    limiteoffset++
}
carregarPostAjax()
carregarPostAjax()
