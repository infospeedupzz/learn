<html>
    <head>
        <style>
            .success-page{
  max-width:300px;
  display:block;
  margin: 0 auto;
  text-align: center;
      position: relative;
   
    transform: perspective(1px) translateY(50%)
}
.success-page img{
  max-width:62px;
  display: block;
  margin: 0 auto;
}

.btn-view-orders{
  display: block;
  border:1px solid #47c7c5;
  width:100px;
  margin: 0 auto;
  margin-top: 45px;
  padding: 10px;
  color:#fff;
  background-color:#47c7c5;
  text-decoration: none;
  margin-bottom: 20px;
}
h2{
  color:#3bb54a;
    margin-top: 25px;

}
a{
  text-decoration: none;
}
        </style>
    </head>
    <body>
        <?php
        if($_GET['payment_status']=='Credit'){
            ?>
            <div class="success-page">
   <img  src="tick.png" class="center" alt="" />
  <h2>Payment Successful !</h2>
  <p>We are delighted to inform you that we received your payments</p>
  <a href="#" class="btn-view-orders">Please Wait..</a>

</div>
            <?php
        }else{
            ?>
            <div class="success-page">
   <img  src="close.png" class="center" alt="" />
  <h2>Payment Failed !</h2>
  <p>We are delighted to inform you that we do not received your payments</p>
  <a href="#" class="btn-view-orders">Please Wait..</a>

</div>
            <?php
        }
        ?>
        

    </body>
</html>