<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "commentsemail@comments.com";
    $email_subject = $_POST['subject'];

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $name = $_POST['name']; // required
    $subject = $_POST['subject']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->


<!DOCTYPE html>
<!-- project description:
**** This project is for a 50's hamburger place.
**** The website is styled to fit the style of the restaurant.
**** The website is also built as a single scrolling site with one main page.-->
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- KEYWORDS USED FOR SEARCH ENGINES -->
<meta name="keywords" content="Burgers, Fries, Soup, Fifties, Restaurant, Nostalgic">

<!-- stylesheets used for various elements in the main page.
        each stylesheet name corresponds to specific elements in the page-->
  <link rel="stylesheet" type="text/css" href="navbar.css?version=4">
  <link rel="stylesheet" type="text/css" href="slideshow.css?version=4">
  <link rel="stylesheet" type="text/css" href="aboutusdesign.css?version=4">
  <link rel="stylesheet" type="text/css" href="historyandhours.css?version=4">
  <link rel="stylesheet" type="text/css" href="modaldesign.css?version=4">
  <link rel="stylesheet" type="text/css" href="menustyle.css?version=4">
  <link rel="stylesheet" type="text/css" href="menuitems.css?version=4">
  <link rel="stylesheet" type="text/css" href="form.css?version=4">

<!-- connected javascript files-->
  <script src="windowcheck.js" type="text/javaScript"></script>
  <script src="modalOpen.js" type="text/javaScript"></script>

<!-- links to the various google fonts used in the website -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel='stylesheet' type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Cherry+Cream+Soda" rel='stylesheet' type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel='stylesheet' type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel='stylesheet' type="text/css">

<!-- jquery and ajax initializers -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="jQueryLoad.js"></script>

  <title>50's Diner | Homepage</title>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- scrolls smoothly to different parts of the website on link click-->
  <script type="text/javascript" src="https://github.com/kswedberg/jquery-smooth-scroll/blob/master/jquery.smooth-scroll.min.js"></script>
  <script type="text/javascript">
  $(function() {
    $('body').click(function( oEvent ) {
        var $link = $( oEvent.target ),$target, sUrl;
        if ( $link[0].hash || ($link = $link.closest('a'))[0].hash ) {
            $target = $( $link[0].hash );
            if ( $target.length ) {
                oEvent.preventDefault();
                sUrl = window.location + $link[0].hash
                $('html,body').animate(
                    { scrollTop: $target.offset().top },
                    'slow',
                    function() { window.location = sUrl; } // set new location
                );
            }
        }
    });
});
  </script>
</head>
<body style="margin: 0;">


    <!--<div class = "logo-container">
      <a href="index.html" id="logohome"><img class = "logo" src="images/SchoopsLogo.png" width="250" alt="Schoop's Logo"></a>
  </div>-->

<!-- creates navigation links.
    linked "navbar.css" and "windowcheck.js" files creates a responsive collapsible navigation menu-->
<div class ="collapse" id="nav-container">
  <ul class="topnav" id="myTopnav">
  <li><a onclick="myFunction()" href="#hours">Visit Us</a></li>
  <li><a onclick="myFunction()" href="#menu1" id="Menu" >Menu</a></li>
  <li><a href="https://goo.gl/maps/8jscysFVwJH2" target="_blank" id="Map" >Map</a></li>
  <li><a onclick="myFunction()" href="#ContactUs" id="Contact" >Contact Us</a></li>
  <li><a onclick="myFunction()" href="#aboutus1" id="About" >About Us</a></li>
  <li class="icon">
    <!-- myfunction() comes from the .js file that adds of removes a variable connected to the css fieldset
            see windowcheck.js-->
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
    </ul>
</div>

<div id="main-container">

  <div id="sumandslide-container">

      <div class="bgcontainer1">
          <div class="whitebg">

<!--slideshow trial #2-->
<!-- creates a container for the slideshow -->
<div class="slideshow-container">

   <img class="mySlides" src="images2/colin-avery-5e-ljvIaiBM-unsplash.jpg" alt="Outside Diner" >
   <img class="mySlides" src="images2/r-mac-wheeler-CJZi367anGU-unsplash.jpg" alt="Red Chair" >
</div>

<!-- a section of javascript code to create a functioning slideshow in the website -->
<script type="text/javaScript">
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>

</div> <!--end of whitebg-->
  <!---dots
  <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
      <span class="dot" onclick="currentSlide(6)"></span>
      <span class="dot" onclick="currentSlide(7)"></span>
  </div>-->
  </div><!--end of bgconatiner1-->

    <div class="summary-container" id="myslideFrame">
      <p class="summary" id="hours">
        <br />
         This is a section for the history and description of the restaurant.
 <a class="link"></a>
      </p>

    </div>

  </div>

<!-- created container for the restaurant's informtation -->
  <div class="allinfo-container">
    <div class="info-container">

    <div class="location-container">
      <p class="hours">
          <b class= "header"> Location: </b>
          <br />
          <br />
          Restaurant Address Here
          <br />
          <br />
          PHONE: Restaurant's Phone Number Here
          <br />
          <br />
          Dine In &#8226; Carry Out &#8226; Call In
        </p>
    </div>
    <div class="hours-container">
      <p class="hours">
        <b class="header">Business Hours:</b>
        <br />
        <br />
        <table class="tablehours" summary="Hours of Operation">
          <tr><th>Monday</th><td>10:30AM-9:00PM</td></tr>
          <tr><th>Tuesday</th><td>10:30AM-9:00PM</td></tr>
          <tr><th>Wednesday</th><td>10:30AM-9:00PM</td></tr>
          <tr><th>Thursday</th><td>10:30AM-9:00PM</td></tr>
          <tr><th>Friday</th><td>10:30AM-9:00PM</td></tr>
          <tr><th>Saturday</th><td>10:30AM-9:30PM</td></tr>
          <tr><th>Sunday</th><td>11:30AM-9:00PM</td></tr>
        </table>
      </p>
    </div>

    </div> <!-- end of info-container div -->



  </div> <!-- end of allinfo-container div -->

<a id="menu1" class="link"></a>
</div> <!-- end of main-container div -->

<!--start of menu-->
<!--start of this category of menu-->
<div class="food-wrap" id="foodWrap">

    <h1 class="menu-name">Menu</h1>
      <div class="callnow-wrap">
          <h2 class= "callnow-text"><a href="">Call Now at <span class="telnum">(000) 000-0000</span> To Order for Pick-Up </a></h2>
          <h3 class= "address">Restaurant Address Here</h3>

      </div>

      <div class="main-wrap">
        <h1 class="Category">Menu Category</h1>
      <div class="specials-wrap">
        <h2 class="specials">Special Menu Item</h2>
        <p class="specials-des">
          Special Menu Item Description
           <span class="specials-price">&#8226; Price</span>
        </p>
      </div>

      <div class="add-wrap">
        <p class ="add-des">*Add Bacon <span class="price">&#8226; Price</span>
          *Add Chili <span class="price">&#8226; Price</span>
          *Add American or Swiss <span class="price">&#8226; Price</span>
        </p>
        <p class="add-des">
          <span class="uline">Toppings:</span>
          <br />
          Mustard, Ketchup, Relish, and Onions
          <br/>
          <span class="uline">Additional Toppings:</span>
          <br />
          Pickles, Lettuce, Tomato, and Mayo
          <br/>
          <br/>
          Add <span class="uline">Grilled Onions</span> to any burger or sandwich! <span class="price">&#8226; Price</span>
      </br/>
      </br/>
        </p>
      </div>

<!-- right and left columns were created for use in a previous version of the website to lessen the need to scroll-->
      <div class="left-col">
        <h3 class="names">Menu Item <span class="price">&#8226; Price</span></h3>


        <h3 class="names">Menu Item</h3>
        <p class="description">
          Menu Item Description Here <span class="price">&#8226; Price</span>
        </p>


        <h3 class="names">Menu Item</h3>
        <p class="description">
          Menu Item Description Here <span class="price">&#8226; Price</span>
        </p>

        <h3 class="names">Menu Item</h3>
        <p class="description">
          Menu Item Description Here <span class="price">&#8226; Price</span>
        </p>

      </div> <!--End of left-col-->


      <div class="right-col">

        <h3 class="names">Menu Item</h3>
        <p class="description">
          Menu Item Description Here
          <span class="price">&#8226; Price</span>
        </p>


        <h3 class="names">Menu Item</h3>
        <p class="description">
          Menu Item Description Here <span class="price">&#8226; Price</span>
        </p>

        <h3 class="names">Menu Item <span class="price">&#8226; Price</span></h3>


        <h3 class="names">Menu Item <span class="price">&#8226; Price</span></h3>

    </div> <!--End of right-col-->

  </div>
<!--end of this category of menu-->
<!--start of this category of menu-->

      <div class="main-wrap">
          <h1 class="Category">Menu Category</h1>
          <div class="specials-wrap">
            <h2 class="specials">Special Menu Item</h2>
            <p class="specials-des">
                Special Menu Item Description Here
               <span class="specials-price">&#8226; Price</span>
            </p>
            <h2 class="specials">Special Menu Item</h2>
            <p class="specials-des">
                Special Menu Item Description Here
               <span class="specials-price">&#8226; Price</span>
            </p>
          </div>
     <h3 class="names">Menu Item</h3>
     <p class="description">
        Menu Item Description Here <span class="price">&#8226; Price</span>
     </p>

     <h3 class="names">Menu Item</h3>
     <p class="description">
       Menu Item Description Here <span class="price">&#8226; Price</span>
     </p>

     <h3 class="names">Menu Item
         <br />
          Size 1<span class="price">&#8226; Price</span>
          Size 2<span class="price">&#8226; Price</span>
     </h3>

     <h3 class = "names"> Menu Item </h3>
     <p class="description">
       Menu Item Description Here <span class="price">&#8226; Price</span>
     </p>

     <h3 class="names">Menu Item<span class="price">&#8226; Price</span></h3>

     <h3 class="names">Menu Item<span class="price">&#8226; Price</span></h3>

     <h3 class="names">Menu Item
         <br />
          Size 1<span class="price">&#8226; Price</span>
          Size 2<span class="price">&#8226; Price</span>
     </h3>

       <p class ="add-des">*Extra Description <span class="price">&#8226; Price</span>*</p>
     </div>

<!--end of this category of menu-->


 <div class="des-wrap" id = "ContactUs">
     <p class="add-des">
         *End of menu. Additional categories can be made by copying and pasting the container above
     </p>
 </div>
</div>

<!-- PREVIOUS TRIAL TO CREATE A COMMENTS FORM -->
 <!--form #1 start
 <script>
 $(function(){
     $("input").prop('required',true);
     $("textarea").prop('required',true);
 });
 </script>

 <p class="smaller">
     For your convenience please use this form for feedback!
 </p>

     <div class="form-wrap">
     <form method="post" action="form.php">

         <label class="form_label">Name</label>
         <input class="form_input" name="name" placeholder="Type Here">

         <label class="form_label">Email</label>
         <input class="form_input" name="email" type="email" placeholder="Type Here">

         <label class="form_label">Subject</label>
         <input class="form_input" name="subject" placeholder="Type Here">

         <label class="form_label">Message</label>
         <textarea class="form_message" name="message" placeholder="Type Here"></textarea>

         <input class="form_input" id="submit" name="submit" type="submit" value="Submit">

     </form>
    </div>



    <p class="smaller">
        You may also email us at:
    </br>
        <a href="mailto:comments@schoopstinleypark.com?subject=Feedback">comments@schoopstinleypark.com</a>!
    </p>
form #1 end-->

<!--form #2 start taken from="https://www.freecontactform.com/email_form.php"-->

<!-- a javascript section that creates a comments submission form -->
<script>
$(function(){
    $("input").prop('required',true);
    $("textarea").prop('required',true);
});
</script>

<div class="form_wrap">

    <p class="smaller">
      Thank you very much! Your comment has been sent.
    </p>

<!-- alternative way to email the restaurant -->
<!-- link to go to the user's email application, utofilling the email address of the restaurant and the subject -->
<p class="smaller">
    You may also email us at:
</br>
    <a href="">commentsemail@comments.com</a>!
</p>
</div>
<!--form #2 end-->


 <a id="aboutus1" class="link"></a>


<div id="main-container2">

    <p class="about-des">
      Descriptions and Other information about the restaurant goes here
      <span class="underline">Extra information that is needed to emphasize</span>
    </p>

  <div class="pictures-wrap">
      <div class="bg1">
        <img class="picture1" src="images2/colin-avery-5e-ljvIaiBM-unsplash.jpg" style="width:100%" alt="Outside Diner">
      </div>
      <div class="bg2">
        <img class="picture2" src="images2/r-mac-wheeler-CJZi367anGU-unsplash.jpg" style="width:100%" alt="Red Chairs">
      </div>
      <div class="bg3">
        <img class="picture3" src="images2/colin-avery-5e-ljvIaiBM-unsplash.jpg" style="width:100%" alt="Outside Diner">
      </div>
  </div>
</div>


<div class="footer">
  <div class="foot-left">
    <h4 class="footer-head">Footer heading</h4>
    <h4 class="footer-head">PHONE: Restaurant Phone Number</h4>
    <a class="footer-text" href="https://www.vecteezy.com/">Illustration credit: Vecteezy!</a>
    <h4 class="footer-head">Powered By: neconian</h4>
  </div>
  <div class="foot-right">
    <h4 class="footer-right">Footer Right Side
      <br />
      Extra Footer</h4>
  </div>
</div>


</body>
</html>

<?php

}
?>
