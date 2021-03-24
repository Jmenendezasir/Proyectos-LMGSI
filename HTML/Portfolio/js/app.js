let doc = $(document);
doc.ready(iniciar);

function iniciar(){
    console.log ('iniciando');
    let menu = $("header nav#navBar a");
    $("header nav#navBar a#inicio").addClass("active");
    $(menu).on('click',cargar);
    $("head").append('<link rel="stylesheet" type="text/css" href="css/inicio.css">');
    $("main").load("html/inicio.html");
        $("header #navicon").on('click', mostrarmenu);

}

function mostrarmenu(){
    $("header #navBar").slideToggle();
}

function cargar() {
    let id = $(this).attr('id');
    let estilo = '<link rel="stylesheet" type="text/css" href="css/'+id+'.css">';
    $("head").children().last().remove();
    $("head").append(estilo);
    console.log(estilo);
    $(this).siblings().removeClass("active");
    $(this).addClass("active");
    console.log(this);
    let ruta = "html/"+id+".html";
    console.log(ruta);
    $("main").load(ruta);
}