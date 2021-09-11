<footer id="rs-footer" class="rs-footer home9-style home12-style">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                            <div class="footer-logo mb-30">
                                <a href="/"><img src="<?php echo $ROOT_URL; ?>/assets/images/logo.png" alt=""></a>
                            </div>
                              <div class="textwidget pr-60 md-pr-15"><p>Learnizy is an online learning platform for all types of government job exam preparation.</p>
                              </div>
                              
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                            <h3 class="widget-title">Contact Us</h3>
                            <ul class="address-widget">
                               
                                <li>
                                    <i class="flaticon-email"></i>
                                    <div class="desc">
                                        <a href="mailto:support@learnizy.in">support@learnizy.in</a>
                                    </div>
                                </li>
                            </ul><br>
                            <ul class="footer_social">  
                                  <li> 
                                      <a href="https://www.facebook.com/learnizy1" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
                                  </li>
                                  <li> 
                                      <a href="https://twitter.com/ " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
                                  </li>
                                  <li> 
                                      <a href="https://www.youtube.com/channel/UCiqSNxg2TPyYNmNsYuL7G0A " target="_blank"><span><i class="fa fa-youtube"></i></span></a> 
                                  </li>
                                  <li> 
                                      <a href="https://www.instagram.com/learnizy_/ " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
                                  </li>
                                                                           
                              </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                            <h3 class="widget-title">Quick Links</h3>
                            <ul class="site-map">
                               
                                <li><a href="online-test-series/afo-prelims">Test Series</a></li>
                                <li><a href="previous-year-paper">Previous Year Paper</a></li>
                               
               
                                <li><a href="faq">FAQs</a></li>
                      
                                 <li><a href="about-us-learnizy">About Us</a></li>
                                           <li><a href="contact-us">Contact Us</a></li>
                                           <li><a href="become-an-educator">Become an Educator</a></li>
                            
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                            <h3 class="widget-title">Blog </h3>
                            <?php   
                          $resultE=$functionClass->getRows("editorial order by id DESC limit 2");
                          foreach ($resultE as $rowE ) {
                           ?>
                            <div class="recent-post mb-20">
                                <div class="post-img">
                                    <img src="https://aliveztechnosoft.com/Learnish/<?php echo $rowE['img']; ?>" alt="<?php echo $rowE['title']; ?>">
                                </div>
                                <div class="post-item">
                                    <div class="post-desc">
                                        <a href="#"><?php echo $rowE['title']; ?></a>
                                    </div>
                                    <span class="post-date">
                                        <i class="fa fa-calendar"></i>
                                        <?php echo date("M,d,Y",strtotime($rowE['date'])); ?>
                                    </span>
                                </div>
                            </div>
                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">                    
                    <div class="row y-middle">
                        <div class="col-lg-6 md-mb-20">
                            <div class="copyright">
                                <p>&copy; <?php echo date("Y"); ?> Learnizy. All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right md-text-left">
                            <ul class="copy-right-menu">
                                <li><a href="#" data-toggle="modal" data-target="#exampleModalLongTerms">Terms</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#exampleModalLongPrivacy">Privacy</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#exampleModalLongRefundPolicy">Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


<?php if(empty($userInfo)){?>

    <!---user login modal-->
       <!-- Modal Register -->
  <div class="modal fade" id="regModal" role="dialog">
    <div class="modal-dialog" style="margin-top:70px;">
      <div class="modal-content" style="border-top-left-radius: 70px;
    border-bottom-right-radius: 70px;">
        <div class="modal-header" style="border-bottom: none">
   
                 <button type="button" class="close signupclose" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body login" >
          <div class="row">
               <div class="col-lg-12">
                <form id="user-reg" method="post" action="#">
                  <h4 style="margin: 0px">Welcome to Learnish</h4>
                  <span style="font-size: 12px;">&nbsp; Create free account by fill below details.</span>
                  <br>
                  <br>
                   <span style="color: red;" id="msg-lr"> </span>
                  <input  class="from-control" type="text" id="fullname" name="fullname" placeholder="Full Name" required="">

                  <input   class="from-control" type="number" id="mobile" name="mobile" placeholder="Mobile" required="">
                  <input   class="from-control" type="email" id="email" name="email" placeholder="Email" required="">
                  <input   class="from-control" type="password" id="password" name="password" placeholder="Password" required="">
                  <input   class="from-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required="">
                  
                <button class="readon green-btn" id='regBtn' type="submit">REGISTER NOW</button>
                <p style="margin: 25px 0 25px;">
                  Already have an account?
                    <a style="color:#0eb582" onclick='registerModalhide()' href="#" >Sign in Now</a>
                </p>
                 </form>
               </div>
               
            </div>
        </div>
      </div>
    </div>
  </div>  
      <!-- Modal -->
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog" style="margin-top:70px;">
      <div class="modal-content" style="border-top-left-radius: 70px;
    border-bottom-right-radius: 70px;">
        <div class="modal-header" style="border-bottom: none">
   
                 <button type="button" class="close singinclose" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body login" >
          <div class="row">
               <div class="col-lg-12">
                <form id="user-login" method="post" action="#">
                 <h4 style="margin: 0px">Welcome Back</h4>
                  <span style="font-size: 12px;">&nbsp; Login back into your account.</span>
                  <br>
                  <br>
                   <span style="color: red;" id="msg-l"> </span>
                 
                        <input class="from-control" type="text" id="username" name="username" placeholder="Mobile or email" required="">

                  <input class="from-control" type="password" id="loginpass" name="loginpass" placeholder="Password" required="">
                  <p style="text-align: right; margin-top:-10px;margin-bottom:10px">
                  
                          <a style="color:#0eb582" href="#">Forgot password?</a>               
                        
                </p>
                <center><button style='
    width: 50%;' class="readon green-btn" id="loginBtn" type="submit">Login</button></center>
    <p style="margin: 25px 0 0px;">
                  If you don't have an account?
                    <a style="color:#0eb582" onclick="loginModalhide()"  href="#" >Sign Up</a>
                </p>
                <div class="row">
                           <div class=" border-bottom" style="width: 40%;display: inline-block;"   ></div>
                           <div style=" width: 20%; display: inline-block; text-align: center;position: relative; top: 11px;color: #c7c7c7;
    font-size: 12px;">OR</div>
                
                <div class="border-bottom" style="width: 40%;display: inline-block;"></div>
                </div>
                <div class="row">
                    <div class='col-md-6'>
                        <a href='<?php echo $fbloginURL; ?>' class='btn btn-primary fb-btn'><i class='fa fa-facebook-square' style='padding: 2px 6px;float:left;    font-size: 18px;'></i><span style='    margin-left: -10px;'>Facebook</span></a>
                    </div>
                      <div class='col-md-6'>
                                <?php echo $glogin_button; ?>
                    </div>
                </div>
       
                 </form>
               </div>
               
            </div>
        </div>
      </div>
    </div>
  </div>   
  
  <?php } ?>



  <!-- Modal Terms-->
   <div class="modal fade" id="exampleModalLongTerms" role="dialog">
    <div class="modal-dialog" style="margin-top:70px;max-width: 94%;">
      <div class="modal-content" >
        <div class="modal-header" style="border-bottom: none">
            <h5 class="modal-title" id="exampleModalLongTitle">Terms of Service</h5>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
        <p> Learnizy.in/ Learnizy App(hereinafter referred as Learnizy) offers this Website / Android App along with the services contained herein to the users (the term users include registered as well as unregistered users), subject to users' acceptance of all the terms, conditions and policies. By visiting and/ or purchasing any product or availing services from this website, users agree to be bound by the terms and conditions (“Terms”) mentioned herein as well as elsewhere in this website, as applicable. </p>
	<p> Any new feature(s) or product(s) added to this Website / Android App in future shall also be subject to these Terms. Learnizy , in its sole discretion, reserves the right to change these Terms, including any part thereof, by updating this website. Users are advised to check this page periodically for the changes. </p>
	<h2><strong>Consent</strong></h2>
	<p><strong>How do you get my consent?</strong></p>
	<p> We do not share, sell, trade, or transfer your personal information to third parties. However, some of your performance may be visible to other registered users of the app but it will not include personal information. We may release your information only when we believe this is appropriate as per the law. </p>
	<p><strong>How do I withdraw my consent?</strong></p>
	<p> If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at info.learnizy@gmail.com or mailing us DISCLOSURE We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service. </p>
	<p><strong>General Terms & Conditions</strong></p>
	<p> • Learnizy is not responsible if the information made available on this website is not accurate, complete or current. The content on this Website / Android App is provided for general information only and should not be relied upon, or used as the sole basis for making decisions. Any reliance on the content on this website is at user’s own risk. </p>
	<p> • The Tests available on the Website / Android App will be provided till the date on which exam is held after that it will expire or will become unavailable. </p>
	<p> • This Website / Android App may contain certain historical information, which, necessarily, is not current and is provided only for the reference of users </p>
	<p> • We don't guarantee for syllabus of any exam. </p>
	<p>• We don't guarantee any questions which would come in exams.</p>
	<p> • For any legal proceedings these term and condtion shall be considered Learnizy line. anything said out of context on any other medium shall not be followed as per word and user should have to read all term and condition carefully. </p>
	<p> • Learnizy reserves the right to send newsletter/or any other material to the user using email address. At any time, the user will be able to unsubscribe from the subscriber's list using the link provided within the email received. </p>
	<p>• If user is not satisify with Learnizy services he/she may have to contact only on info.learnizy@gmail.com before the 30 days of the respective exam and after the examination Learnizy will not be responsible.</p>
	<p>• Privacy of the users’ information will be governed by Learnizy’s privacy policy.</p>
	<p>• In reponse to the request(s) received from the applicant(s) regarding registration, through any of the communication mode, Learnizy, through one of its service provider(s), may send the appropriate response(s) via sms.</p>
	<p>• Mocks validity will be valid till exam of the current year for which you have purchased the course.</p>
	<p>• We can use your login details on our website for marketing purpose on our all platforms including social media.</p>
	<p><strong>Store related</strong></p>
	<p>• Service sold by Learnizy is for the personal use only. Any unauthorized distribution of this product(s) including sharing on social media is strictly prohibited</p>
	<p>• Learnizy reserves the right to add, modify or discontinue the product(s) and/or other service(s) (fully or partially) at any time without any notice.</p>
	<p>• Prices for the product(s) or other service(s) are subject to change at any time without any notice.</p>
	<p>• Learnizy shall not be liable to the users or to any third-party for any modification, price change, suspension or discontinuance of the products and/or services, fully or partially.</p>
	<p>• Learnizy has no obligation to provide notification(s) of the changes related to product(s) and/or service(s) including prices and descriptions thereof to the users. Users are responsible to monitor the required changes.</p>
	<p> • Certain products may be available exclusively online through the website. These products may be available in limited quantities and are not subject to a returns policy. If user(s) experience any issues while receiving the ordered products, user(s) may contact Learnizy in solving the issue. </p>
	<p> • Learnizy has made every effort to display as accurately as possible the colors and images of the products that appear at the store. However, Learnizy does not guarantee display of colour in the devices used by the users will be accurate. Further, please note that during physical delivery or online download, colour/image, cover page and/or other attributes of the product may vary from the one displayed in the store. Editions of physical books may be different than their pdf or e-book versions. </p>
	<p><strong>Contact Us</strong></p>
	<p> If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us at info.Learnizy@gmail.com. </p>
            </div>
        </div>
      </div>
    </div>
   <!-- Modal Privacy-->
   <div class="modal fade" id="exampleModalLongPrivacy" role="dialog">
    <div class="modal-dialog" style="margin-top:70px;max-width: 94%;">
      <div class="modal-content" >
        <div class="modal-header" style="border-bottom: none">
            <h5 class="modal-title" id="exampleModalLongTitle">Privacy Policy</h5>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >

	<p> Learnizy is an online learning platform for all kind banking exam preparations. </p>
	<p> We are committed to maintain confidentiality, and security of all personal identifiable information of our customers. This document describes our system to protect customers’ information. By accessing our app, you agree to the terms of this Privacy Policy. We reserve the right to change the Privacy Policy and suggest you to continue referring to this policy on our app. If you do not agree with our policy you are not authorised to access our app and use our services. </p>
	<p><strong>Information Sharing</strong></p>
	<p> We do not share, sell, trade, or transfer your personal information to third parties. However, some of your performance may be visible to other registered users of the app but it will not include personal information. We may release your information only when we believe this is appropriate as per the law. </p>
	<div>
		<p> The app does use third party services that may collect information used to identify you. </p>
		<p> Link to privacy policy of third party service providers used by the app </p>
		<ul>
			<li><a href="https://www.google.com/policies/privacy/" target="_blank" rel="noopener noreferrer">Google Play Services</a></li>
			<!---->
			<li><a href="https://firebase.google.com/policies/analytics" target="_blank" rel="noopener noreferrer">Google Analytics for Firebase</a></li>
		</ul>
	</div>
	<p><strong>Use of Personal Information by Learnizy</strong></p>
	<p> When you visit our app we get following types of information from you: Information you submit while registering on the app like your name, phone no. email id and other personal information. Technical and navigational information regarding your visit on the app Internet protocol address along with other data that app send when you land on our app Details collected if you are paying online like card details and other payment related information. We collect your information for any of following information purpose: To provide you personalised career guidance and recommendation in your best interest. To improve your learning experience at Learnizy To send you appropriate and relevant alerts and updates through emails or Text messages (SMS) </p>
	<p><strong>Information Security</strong></p>
	<p> We use a combination of firewall barriers, encryption techniques and authentication procedures, among others, to maintain the security of your information. We implement a variety of security measures to maintain the safety of your personal information when you place an order or enter, log in now, or access your personal information. This online privacy policy applies only to information collected through our App and not to information collected offline. By registering on Learnizy, you consent to our above mentioned privacy policy. For any queries, please contact us at info.Learnizy@gmail.com with "Privacy Policy" in the subject line. </p>
	<p>This policy is effective as of 2020-12-07</p>

	<p><strong>Cookies</strong></p>
	<p> We use cookies to maintain session of your user. It is not used to personally identify you on other websites. AGE OF CONSENT By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site. </p>
	
	<p><strong>Changes To This Privacy Policy</strong></p>
	<p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it. If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.</p>
	
	<p><strong>Contact Us</strong></p>
	<p> If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us at info.Learnizy@gmail.com. </p>
            </div>
        </div>
      </div>
    </div>
    <!-- Modal exampleModalLongRefundPolicy-->
   <div class="modal fade" id="exampleModalLongRefundPolicy" role="dialog">
    <div class="modal-dialog" style="margin-top:70px;max-width: 94%;">
      <div class="modal-content" >
        <div class="modal-header" style="border-bottom: none">
            <h5 class="modal-title" id="exampleModalLongTitle">Refund Policy</h5>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body " >
<p>
            As once you have purchased you cannot reverse or cancel your purchased item. Once you purchase and make the required payment, it shall be final and there cannot be any changes or modifications to the same and neither will
            there be any refund.
        </p>
        <p>
            So please check all the free content available before purchasing any of the item on our Website / Android App.
        </p>
            </div>
        </div>
      </div>
    </div>
  
  
  

  <!-- Modal Terms-->
  



