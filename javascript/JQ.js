function down(){
    var y = $(window).scrollTop(); // current page position
    $('html, body').animate({ scrollTop: y + 750 }) 
}
