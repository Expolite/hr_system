
<!-- navbar -->
<nav class="navbar">
<!-- logo -->
<a class="navbar-brand" href="#" style="margin-left: 20px; display: block;">
  <img src="img/main/logo.jpeg" alt="" width="30" height="30" style="border-radius: 50px;" class="d-inline-block align-text-top">
  <span class="log_title" style="color: white;">Employee Evaluation Management System For Dilg Calamba</span>
</a>
<a href="#" class="toggle-button">
  <span class="bar"></span>
  <span class="bar"></span>
  <span class="bar"></span>
</a>
<div class="navbar-links">
  <ul>
    <!--show if the role is admin-->
    <?php if($usrRole == "admin") { ?>
    <li><a href="admin_home.php" title="Home page">Home</a></li>
    <?php } ?>
    <!--show if the role is user-->
    <?php if($usrRole == "user") { ?>
    <li><a href="#" title="Home page">Home</a></li>
    <?php } ?>

    <li class="user_pic"><img src="img/profile/user.png" height="30px"></li>
    <li><a href="user_profile.php" title="Edit your profile"><?php 
    								if(empty($fname)){
    									echo $usr_IDNmbr;
    								}else{
    									echo $fname;
    								}
    							?></a></li>
    <li><a href="logout.php" title="Logout">Logout</a></li>
  </ul>
</div>
</nav>