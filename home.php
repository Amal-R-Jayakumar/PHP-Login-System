<?php require_once 'controllers/authcontroller.php'; 
if (isset($_GET['token'])) {
  $token=$_GET['token'];
  verifyUser($token);
}

if (isset($_GET['password_token'])) {
  $password_token=$_GET['password_token'];
  resetPassword($password_token);
}

if (!isset($_SESSION['id'])) {
  header('location: index.php');  
  exit();}
?>
<!doctype html>
<html lang="en">
  <head>
  <style>
    body, html {
  height: 100%;
}
.bg {
  /* The image used */
  background-image: url("4.png");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}    
        .details li {
        list-style: none;
      }
      li {
          margin-bottom:10px;
          
      }
      .blogShort{ border-bottom:1px solid #ddd;}
.add{background: #333; padding: 10%; height: 300px;}
.btn-blog {
    color: #ffffff;
    background-color: #37d980;
    border-color: #37d980;
    border-radius:0;
    margin-bottom:10px
}
.btn-blog:hover,
.btn-blog:focus,
.btn-blog:active,
.btn-blog.active,
.open .dropdown-toggle.btn-blog {
    color: white;
    background-color:#34ca78;
    border-color: #34ca78;
}
 h2{color:#34ca78;}
 .margin10{margin-bottom:10px; margin-right:10px;}
 
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login/vendor/bootstrap/css/bootstrap.min.css">

    <title>FIND</title>
  </head>
  <body>
 <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
  FIND</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Hello, <?php echo $_SESSION['name']; ?></a>
      </li>
      <a class="nav-link" href="live_stream.html">Live Stream Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.html" tabindex="-1" aria-disabled="true">Gallery</a>
          </li>
        </ul>
    </ul>
  </div>
    <form class="form-inline">
    <ul class="navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="SmartUSRS/home.php?logout=1">Log out</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a></li>
  </ul></form>
</nav>
<!--Navbar End-->
<div class="container"><div class="row"><div class="col-md-4 offset-md-4 form-div login">
<?php if(isset($_SESSION['message'])): ?>
<div class="alert" <?php echo $_SESSION['alert-class']; ?>>
<?php 
  echo $_SESSION['message']; 
  unset($_SESSION['message']);
  unset($_SESSION['alert-class']);
?>
</div>

<?php endif; ?>
<?php if(!$_SESSION['verified']): ?>
<div calss="alert alert-warning">VERIFY EMAIL. Verification Email sent to 
<strong><?php echo $_SESSION['email']; ?></strong></div>
<?php elseif($_SESSION['verified']===1): ?>
<div calss="alert alert-success"></div>
<?php endif; ?>


<div class="container">
<div id="blog" class="row">           
<div class="col-sm-2 paddingTop20"></div>
<div class="col-md-10 blogShort">
<br><br>
<h1>Project</h1>             
<em>The problem.</em>
<article><p><ul>
<li>Disasters strike the world every day. The most recent ones were the heavy flood that affected the south India. Many have suffered from it. Many are still suffering. Even today there are many missing.</li>
<li>Here we have developed a method to find the people who are stranded during these kinds of natural disasters. </li>
<li>The technology utilizes the UAV/drone technology combined with Heat Signature Imaging which is obtained from the high power Thermal Imaging Sensors to Identify stranded lives. After identifying the heat signature, the vehicle will be able to hover above the area where the signature is obtained, so that the search and rescue personals will be able to get to the correct point without any mistakes. This technology will give new hopes to search and rescue missions in the case a natural calamity.</li>
</ul> </p></article>
</div> 
<figure>
<div class="fixed-wrap">
<div id="fixed"></div>
</div>
</figure>
<div class="col-sm-2 paddingTop20"></div>
<div class="col-md-10 blogShort">
<h1>Project Goals</h1>
<img src="3.jpg" alt="" width="75" class="pull-left img-responsive thumb margin10 img-thumbnail">
<em>Objectives in front of us.</em>
<article><p><ul>
<li>To build an areal system that can view a person or an object through thermal imaging.</li>
<li>New ways for rescue missions where rapid action will be required.</li>
<li>It used for surveillance in low light areas as well as to identify rouge animals that are potential threat to crops and life, roaming around in fields.</li>
</ul></p></article>
</div>                   
<div class="col-md-12 gap10"></div>

</div>
  </div><br><br>
  <!--description end-->  
  <!--Contact-->
<div class="container">    
<div class="jumbotron">
<div class="row">
<div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
<br><br>
<img src="2.png" alt="stack photo" class="img" width="100%">
</div>
<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
<div class="container" style="border-bottom:1px solid black">
<h2>Smart UAV Search System</h2>
</div>
<hr>
<ul class="container details">
<li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"><b>Phone Number:</b> +91 90000 00000</span></p></li>
<li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"><b>Email ID:</b> smartuavsearchsystem.pec@gmail.com</span></p></li>
<li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"><b>Address:</b> <div> College of Engineering, <br>Pathanapuram,</div></span></p></li>
<li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"><b>Co-ordinator: </b>Asst. Prof. Anas S R</span></p></li>
<li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"><h5>Group Members:</h5>
<ul> 
<li>Anand A</li>
<li>Amal R Jayakumar</li>
<li>Sandeep Krishna S</li>
<li>Manjima R</li>
<li>Radhika Anilkumar</li>
</ul></span></p>
</ul></ul> 
</div>
</div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>