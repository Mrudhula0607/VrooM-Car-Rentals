<?php
include('config.php');
?>


<?php 
if(isset($_POST['submit']))
{
  $Name = $_POST['name'];
  $Email = $_POST['email'];
  $Phone = $_POST['phone'];
  $comments =$_POST['text'];
  $sql = "call add_contactus('$Name','$Email','$Phone','$comments')";
  $result = mysqli_query($dbh,$sql);
  if($result)
  {
    echo "<script type='text/javascript'>alert('Thank you! We will get in touch with you soon')</script>";
  }
  else
  {
    echo "<script type='text/javascript'>alert('Error Occured')</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact VrooM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/contactform.css">
    <link rel="stylesheet" href="assets/css/header.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
     
  <body>    
  <?php include('header.php');?>
    <section id="contact-section">
      <div class="container">
        <h1>CONTACT US</h1>
        <p>Email us and keep upto date with our latest news</p>
          
          <div class="contact-form">
            <i class="fa fa-map-marker"></i><span class="form-info">  12 Adyar Chennai-600020</span><br>
		        <i class="fa fa-phone" > </i><span class="form-info">  +91 9383456089</span><br>
            <i class="fa fa-envelope"></i><span class="form-info">  vroomcars@gmail.com</span>
          </div>
          <br><br><br>     
          <h2>WRITE to US</h2>
          <div class="details">        
            <form method="post" id="contactus">
              <input type=text" name = "name" id="data" placeholder = "Enter your name">
		          <input type="text" name = "email" id="data" placeholder = "Enter your e-mail id">
           	  <input type="text" name = "phone" id="data" placeholder = "Enter your phone number">
		          <textarea rows = "5"  name = "text" id = "data" placeholder = "Enter your message..."></textarea>
	    	      <input type = "submit" name = "submit" value = "Submit" class = "submit" id="submit"> 
  		      </form>	  
          </div>
      </div>
    </section>
  </body>
</html>




