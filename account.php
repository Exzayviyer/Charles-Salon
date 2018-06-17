<?php
include'DBController.php';
session_start();
if(!isset($_SESSION["index"])){
                  echo "Intruder!!!";
              }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        <title>LeCook</title>


   

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
    include 'DBcontroller.php';
  
    
            function navigating(){
                if(!isset($_SESSION["index"])){
                    return "register.php";
                }else{
                    return "account.php";
                }
            }
    function getNavigator($con){
        if(!isset($_SESSION["index"])){
                    return "Register";
                }else{
                    $result = mysqli_query($con,"SELECT fname FROM userinfo WHERE user_id = ".$_SESSION["index"]);
                  while($row = mysqli_fetch_array($result)){
                      $data = $row["fname"];
                      return  "Hi! ".$data;
                                }
                    }
                    }
    
    function getData($column,$con,$index){
                  $result = mysqli_query($con,"SELECT $column FROM food WHERE food_id = ".$index);
                  while($row = mysqli_fetch_array($result)){
                      $data = $row["$column"];
                      return $data;
                  }
              }
    
    function getCount($con,$index){
        if($result = mysqli_query($con,"SELECT COUNT(comment_id) as id FROM comment WHERE food_id = ".$index))
        {
            if(mysqli_num_rows($result) > 0)
            {
            while($row = mysqli_fetch_array($result)){
                          $data = $row["id"];
                          return $data;
                      }
            }
        }
    }
    
    function logNavigate(){
        if(!isset($_SESSION["index"])){
            return "Log in";
        }else{
            return "Log out";
        }
    }
    
    function getAvgRate($con,$index){
        if($result = mysqli_query($con,"SELECT AVG(rate_Value) as avrg FROM rate WHERE food_id = ".$index))
        {
            if(mysqli_num_rows($result) > 0)
            {
            while($row = mysqli_fetch_array($result)){
                          $data = $row["avrg"];
                          return $data;
                      }
            }
        }
    }
    
              ?>
    <!-- Navigation -->
    <div class = "container">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">LeCook</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                        <li><a href="Recipe.php?page=<?php echo "'RECIPE'"; ?>">Recipes</a></li>
                   
                  
                     <!--form style="padding-right:33px;" class="navbar-form navbar-right" role="search">
                         
            <div class="form-group">
              <input type="text" class="form-control" placeholder="TypeHere">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
          </form--->
                 <?php
              
              function getName($column,$con){
                  $result = mysqli_query($con,"SELECT $column FROM userinfo WHERE user_id = ".$_SESSION["index"]);
                  while($row = mysqli_fetch_array($result)){
                      $data = $row["$column"];
                      return $data;
                  }
              }
              ?>
              
            <li><a href="<?php echo navigating(); ?>"><?php echo getNavigator($con); ?></a></li>
            <li><a href="login.php"><?php echo logNavigate(); ?></a></li>
                    
                </ul>
            </div>
          
        </div>
        
        <!-- /.container -->
   
        
        </nav>
        <hr>
        <hr>
       <div class="col-md-8 col-centered" style="background-color: white;">
                <div class="col-md-7 col-centered" >
                   
                </div>
                
                <div class="col-md-7 col-centered">
                    
                    <?php
                        if(getName("image_Filename",$con) == null){
                            ?>
                    <img src="Image/elsword367.jpg" class="img-thumbnail">
                    <?php
                        }else{
                    ?>
                    <img src="uploads/<?php echo getName("image_Filename",$con); ?>" width="100%">
                    <?php
                        }
                    ?>
                    
                    <center><h3><b><?php echo getName("codename",$con); ?></b></h3></center>
                    
                   
                </div>
 
                <div class="col-md-8 col-centered">
                    <ul class="list-unstyled list-inline" >
                        <li><p><a href="SendMail.php" class="btn btn-primary btn-md" style="margin-left:18.5px;">Send Message</a></p></li>
                        <li><p><a href="EditUserInfo.php" class="btn btn-primary btn-md">Edit Account</a></p></li>
                        <li><p><a href="inbox.php" class="btn btn-primary btn-md">View Mailbox</a></p></li>
                   
                    <center style="text-align:left">
                        <h3><p>Name: <span><?php echo getName("fname",$con)." ".getName("lname",$con); ?></span></p></h3>
                        <h3><p>Address: <span><?php echo getName("address",$con); ?></span></p></h3>
                        <h3><p>Gender: <span><?php echo getName("gender",$con); ?></span></p></h3>
                    </center>
                    </ul>
                </div>
        </div>
 
      
    



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 
</body>

</html>
<?php } ?>