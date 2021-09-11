<html>
   <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <style>
         @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
         @import url(https://fonts.googleapis.com/css?family=Calibri:400,300,700);
         body {
         background-color: #D32F2F;
         font-family: 'Calibri', sans-serif !important
         }
         fieldset,
         label {
         margin: 0;
         padding: 0
         }
         body {
         margin: 20px
         }
         h1 {
         font-size: 1.5em;
         margin: 10px
         }
         .rating {
         border: none;
         margin-right: 17%
         }
         .myratings {
         font-size: 85px;
         color: green
         }
         .rating>[id^="star"] {
         display: none
         }
         .rating>label:before {
         margin: 5px;
         font-size: 2.25em;
         font-family: FontAwesome;
         display: inline-block;
         content: "\f005"
         }
         .rating>.half:before {
         content: "\f089";
         position: absolute
         }
         .rating>label {
         color: #ddd;
         float: right;
         font-size: 3.25em;
         }
         .rating>[id^="star"]:checked~label,
         .rating:not(:checked)>label:hover,
         .rating:not(:checked)>label:hover~label {
         color: #FFD700
         }
         .rating>[id^="star"]:checked+label:hover,
         .rating>[id^="star"]:checked~label:hover,
         .rating>label:hover~[id^="star"]:checked~label,
         .rating>[id^="star"]:checked~label:hover~label {
         color: #FFED85
         }
         .reset-option {
         display: none
         }
         .reset-button {
         margin: 6px 12px;
         background-color: rgb(255, 255, 255);
         text-transform: uppercase
         }
         .mt-100 {
         margin-top: 100px
         }
         .card {
         position: absolute;
         display: flex;
         width: 100%;
         flex-direction: column;
         min-width: 0;
         left:0;
         padding:5px;
         word-wrap: break-word;
         background-color: #fff;
         background-clip: border-box;
         border: 1px solid #d2d2dc;
         border-radius: 11px;
         -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
         -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
         box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
         }
         .card .card-body {
         padding: 1rem 1rem
         }
         .card-body {
         flex: 1 1 auto;
         padding: 1.25rem
         }
         p {
         font-size: 14px
         }
         h4 {
         margin-top: 18px
         }
         .btn:focus {
         outline: none
         }
         .btn {
         border-radius: 22px;
         text-transform: capitalize;
         font-size: 13px;
         padding: 8px 19px;
         cursor: pointer;
         color: #fff;
         background-color: #D50000
         }
         .btn:hover {
         background-color: #D32F2F !important
         }
         .back-div{
         position: absolute;
         width: 100%;
         background: white;
         height: 100%;
         left: 0px;
         top: 40%;
         }
      </style>
   </head>
   <body>
      <div class="container justify-content-center mt-100" style='padding-right:0px;padding-left:0px;width:100%;max-width:100%'>
         <form id='addrating'>
            <div class='back-div'>
            </div>
            <div class="row" style='margin:0px; padding:0px;'>
               <div class="col-md-12 col-sm-12 col-12 " style='margin:0px; padding:0px;'>
                  <h2 class='text-center' style='color:white;margin-bottom:90px;font-size:5rem;margin-top:10px;'>Share your feedback</h2>
                  <div class="card">
                     <div class="card-body text-center">
                        <h2 style='font-size:4rem' class="mt-1">Please let us know how to make jotform App Better for you!</h2>
                        <br>
                        <fieldset class="rating"> <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label> <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label> <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label> <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label> <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label> <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> <input type="radio" class="reset-option" name="rating" value="reset" /> </fieldset>
                        <br>
                        <br>
                        <textarea name='review' class='form-control' rows="10" style='font-size:2rem' Placeholder="Write Here"></textarea>
                     </div>
                  </div>
               </div>
            </div>
            <button id='btnRate' type='submit' style='position: relative; top:1100px;
               z-index:222;
               width: 90%;font-size:4rem;padding:30px;left:5%' class="btn btn-defualt">Submit</button>
         </form>
      </div>
      <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script>

             //Add rating
         $("form#addrating").submit(function(e) {
   
         e.preventDefault();    
         
         var formData = new FormData(this);
         
         $("#btnRate").attr("disabled", true);
         $("#btnRate").html("Submit...");
         $.ajax({
         url:'review/userreview',
         type: 'POST',
         data: formData,
         dataType: "json",
         success: function (data) {
         alert(data.message);
           /*  if(data.type=="error"){
                 $("#msgErrorR").html(data.message);
                 $("#msgErrorR").show();
                 $("#msgErrorR").fadeOut(5000);
                  
             }else{
                  $("#msgSuccessR").html(data.message);
                  $("#msgSuccessR").show();
                  $("#msgSuccessR").fadeOut(5000);
                  getreviewData();
                  
             }*/
               $("#btnRate").attr("disabled", false);
                 $("#btnRate").html("Submit");
         
         },
         cache: false,
         contentType: false,
         processData: false
         });
         }); 
         
      </script>
   </body>
</html>