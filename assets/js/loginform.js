$("form#user-login").submit(function(e) {
        
    e.preventDefault();    
    var formData = new FormData(this);
$("#loginBtn").attr("disabled", true);
$("#loginBtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> Checking..");
   $.ajax({
        url:'users/userlogin',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {
               
                if(data.type=="error"){
                      $("#msg-l").html(data.message);
                     $("#msg-l").css("color","red");
                  $("#msg-l").fadeIn();
                  $('#loginBtn').attr("disabled", false);
                        $('#loginBtn').val("Login");
                     
                }else{
                    
                       $("#msg-l").html(data.message);
                        $("#msg-l").css("color","green");
                          $("#msg-l").fadeIn();
                          window.location.href=""; 
                }
                  $("#loginBtn").attr("disabled", false);
                  $("#loginBtn").html('Login');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 


     
     $("form#user-reg").submit(function(e) {
        
    e.preventDefault();    
    var formData = new FormData(this);
$("#regBtn").attr("disabled", true);
$("#regBtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> Checking..");
   $.ajax({
        url:'users/createuser',
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function (data) {
             
                if(data.type=="error"){
                      $("#msg-lr").html(data.message);
                     $("#msg-lr").css("color","red");
                  $("#msg-lr").fadeIn();
                  $('#regBtn').attr("disabled", false);
                        $('#regBtn').val("REGISTER NOW");
                     
                }else{
                    
                       $("#msg-lr").html(data.message);
                        $("#msg-lr").css("color","green");
                          $("#msg-lr").fadeIn();
                         window.location.href=""; 
                }
                  $("#regBtn").attr("disabled", false);
                  $("#regBtn").html('REGISTER NOW');
          
        },
        cache: false,
        contentType: false,
        processData: false
    });
}); 
function registerModalhide(){
    $(".signupclose").trigger("click");
    $(".signin").trigger("click");
    $('#loginModal').css('overflow-y', 'auto');
}
function loginModalhide(){
   
    $(".signup").trigger("click");
    $(".singinclose").trigger("click");
     $('#regModal').css('overflow-y', 'auto');
}

$(".side-menu-open").click(function(){
    $(".user-nav-container").addClass("active");
});
$(".side-menu-close").click(function(){
    $(".user-nav-container").removeClass("active");
});
$(".clickMenu").click(function(){

    $(this).next().slideToggle();
})
$(".loginsignin").click(function(){
     $(".user-nav-container").removeClass("active");
});