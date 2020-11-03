function go(url) {
    setTimeout(function () {
        location.href = `${url}`;
    },500);
}

$(".full-screen-btn").click(function () {
    let current = $(this).closest(".card");
    current.toggleClass("full-screen-card");
    if(current.hasClass("full-screen-card")){
        $(this).html(`<i class="feather-minimize-2"></i>`);
    }else{
        $(this).html(`<i class="feather-maximize-2"></i>`);
    }
});