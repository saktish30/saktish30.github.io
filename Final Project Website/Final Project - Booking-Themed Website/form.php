<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

    if(isset($_POST['submit']))
  {

$bid=$_GET['bookid'];

 $guest=$_POST['guest'];
 $title=$_POST['title'];
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'];
 $pnum=$_POST['pnum'];
 $plan=$_POST['plan'];

$sql="insert into tblbooking(ID,GuestRange,Title,FirstName,LastName,Email,PhoneNumber,Plan)values(:bid,:guest,:title,:fname,:lname,:email,:pnum,:plan)";
$query=$dbh->prepare($sql);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->bindParam(':guest',$guest,PDO::PARAM_STR);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':pnum',$pnum,PDO::PARAM_STR);
$query->bindParam(':plan',$plan,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your Wedding plan is sucessfully booked.")</script>';
echo "<script>window.location.href ='form.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="https://anandchowdhary.github.io/ionicons-3-cdn/icons.css" integrity="sha384-+iqgM+tGle5wS+uPwXzIjZS5v6VkqCUV7YQ/e/clzRHAxYbzpUJ+nldylmtBWCP0" crossorigin="anonymous">


<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Voltaire" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'><link rel="stylesheet" href="form/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form class="quick-reservation" method="post">
   
<div class="container">
   <header class="quick-reservation__header">
      <button type = "button"  onclick="window.location.href='index.html' ">Home</button>
      <h2 class="title">
         New Quick Reservation
      </h2>
   </header>
   
   <div class="quick-reservation__form">
      <section class="form__content">
         <div class="row-wrapper">
            <div class="ele adults">
               <label>Guest Range</label>
               <select name="guest">
                  <option value="hide">Guest</option>
                  <option value="10 - 100">10 - 100</option>
                  <option value="200 - 400">200 - 400</option>
                  <option value="500 - 700">500 - 700</option>
                  <option value="800 - 1000">800 - 1000</option>
                  <option value="1000 - More">1000 - More</option>
               </select>
            </div>         
         </div>
         <div class="row-wrapper">
            <div class="ele adults">
               <label>Title</label>
               <select name="title">
                  <option value="hide">Title</option>
                  <option value="Mr.">Mr.</option>
                  <option value="Mrs.">Mrs.</option>
               </select>
            </div>
            <div class="ele first-name">
               <label>First Name</label>
               <input type="text" placeholder="First Name" name="fname" >
            </div>
            <div class="ele last-name">
               <label>Last Name</label>
               <input type="text" placeholder="Last Name" name="lname">
            </div>    
         </div>
         <div class="row-wrapper">
            <div class="ele email-address">
               <label>Email Address</label>
               <input type="email" placeholder="Enter Email" name="email">
            </div>
            <div class="ele phone-number">
               <label>Phone Number</label>
               <input type="text"  placeholder="Enter Phone Number" name="pnum">
            </div> 

            
         </div>
         
         <div class="row-wrapper more-options">

            <div class="ele adults">
               <label>Select Plan</label>
               <select name="plan">
                  <option value="hide">Select Plan</option>
                  <option value="Complete Wedding Planning">Complete Wedding Planning</option>
                  <option value="Wedding Day Management (Wedding Day Coordination Services)">Wedding Day Management (Wedding Day Coordination Services)</option>
                  <option value="Personalized Services">Personalized Services</option>
               </select>
            </div>
            
         </div>
         
      </section>
   </div>
   <footer class="form__footer">
      <div class="footer-wrapper">
         <input type="submit" name="submit" value="Submit">
      </div>
   </footer>
</div>
   
</form>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script  src="form/script.js"></script>
  <script src="form/book.js"></script>

</body>
</html>
