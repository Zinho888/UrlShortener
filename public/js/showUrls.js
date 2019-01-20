//When the button ra_btn is clicked, it displays the most recently accessed URLs and change the buttons colors
$("#ra_btn").on("click", () => {
    $("#accessed").css("display","none");
    $("#recent").css("display","inline-block");
    $("#ma_btn")[0].className = "btn unusedButton";
    $("#ra_btn")[0].className = "btn";
});

//When the button ma_btn is clicked, it displays the most accessed URLs and change the buttons colors
$("#ma_btn").on("click", () => {
    $("#recent").css("display","none")
    $("#accessed").css("display","inline-block");
    $("#ra_btn")[0].className = "btn unusedButton";
    $("#ma_btn")[0].className = "btn";
});
