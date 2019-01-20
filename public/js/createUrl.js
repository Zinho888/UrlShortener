function testUrl(){
  //Sets the data to be sent by ajax
  var info = {
    "long": $('#long').val(),
    "short": $('#short').val(),
    "description": $('#description').val(),
    "private": $('#private')[0].checked
  };
  //check if the long URL isn´t empty
  if($("#long").val() == ""){
    //If it is empty, this warns the user
    toggleWarnings("Long Url Field can´t be empty", "#2979bc","block")
  }else{
    //if it isn´t, blocks the submit button and send the ajax
    toggleSubmit("Loading..",true,"no-drop");
    //set ajax headers
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    //send Ajax
    $.ajax({
      url: "/Urls",
      method: 'POST',
      data: info,
      success: function(result){
        console.log(result);
        if(result.includes("ok:")){
          //if the result is "Ok", it displays the modal to the user, showing his shortened URL
            $("#modal_background").css("display","flex");//Displays the modal
            $("#modal-body-url").text($("#modal-body-url").text()+result.substring(3));//Set value on modal
        }else if(result == "used"){
          //if the result is "used", it warns the user to change the shortened URL
          toggleWarnings("Shortened URL is already been used, try another one", "#2979bc","block");
          toggleSubmit("Shorten",false,"pointer");
        }else if(result == "invalid"){
          //if the result is "invalid", it warns the user that the Long URL is not an URL
          toggleWarnings("Long URL is invalid, please insert a valid URL", "#2979bc","block");
          toggleSubmit("Shorten",false,"pointer");
        }
      }});
    }
}

//This function changes the content and appearance of the span that shows error messages to the user
var toggleWarnings = (message,textColor, display) => {
  $("#formWarns").html(message);
  $("#formWarns").css("color",textColor);
  $("#formWarns").css("display",display);
}

//If the modal button is pressed, reload the page
$("#modal-body-btn").on("click", () => {
  location.reload();
});

//This function changes the appearance of the submit button and also can disable it
var toggleSubmit = (value,active,cursor) => {
  $("#submitBtn").attr("value",value);
  $("#submitBtn").prop("disabled",active);
  $("#submitBtn").css("cursor",cursor);
}
