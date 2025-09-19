<?php
require 'includes/global.php';
//the isset function to check username is already loged in and stored on the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gymdesk Admin</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../css/fullcalendar.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../font-awesome/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/jquery.gritter.css" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <!--Header-part-->
  <div id="header">
    <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
  </div>
  <!--close-Header-part-->


  <!--top-Header-menu-->
  <?php include 'includes/topheader.php' ?>
  <!--close-top-Header-menu-->
  <!--start-top-serch-->
  <!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
  <!--close-top-serch-->

  <!--sidebar-menu-->
  <?php $page = 'members-entry';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="members.php" class="tip-bottom">Members</a> <a href="member-entry.php" class="current">Add Members</a> </div>
      <h1>Member Entry Form</h1>
    </div>
    <?php

    if (isset($_POST['fullname'])) {
      $fullname = $_POST["fullname"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $dor = $_POST["dor"];
      $gender = $_POST["gender"];
      $address = $_POST["address"];
      $contact = $_POST["contact"];

      $password = md5($password);

      //code after connection is successfull
      $qry = "INSERT INTO members(fullname,username,password,date_of_registration,gender,address,contact) values ('$fullname','$username','$password','$dor','$gender','$address','$contact')";
      $result=mysqli_query($con,$qry);
    
      if (!$result) {
        echo "<div class='container-fluid'>";
        echo "<div class='row-fluid'>";
        echo "<div class='span12'>";
        echo "<div class='widget-box'>";
        echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
        echo "<h5>Error Message</h5>";
        echo "</div>";
        echo "<div class='widget-content'>";
        echo "<div class='error_ex'>";
        echo "<h1 style='color:maroon;'>Error 404</h1>";
        echo "<h3>Error occured while entering your details</h3>";
        echo "<p>Please Try Again</p>";
        echo "<a class='btn btn-warning btn-big'  href='edit-member.php'>Go Back</a> </div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      } else {

        echo "<div class='container-fluid'>";
        echo "<div class='row-fluid'>";
        echo "<div class='span12'>";
        echo "<div class='widget-box'>";
        echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
        echo "<h5>Message</h5>";
        echo "</div>";
        echo "<div class='widget-content'>";
        echo "<div class='error_ex'>";
        echo "<h1>Success</h1>";
        echo "<h3>Member details has been added!</h3>";
        echo "<p>The requested details are added. Please click the button to go back.</p>";
        echo "<a class='btn btn-inverse btn-big'  href='members.php'>Go Back</a> </div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

      }

    } else {

      ?>
      <div class="container-fluid">
        <hr>
        <div class="row-fluid">
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
                <h5>Personal-info</h5>
              </div>
              <div class="widget-content nopadding">
                <form action="" method="POST" class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Full Name :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="fullname" placeholder="Fullname" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Username :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="username" placeholder="Username" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Password :</label>
                    <div class="controls">
                      <input type="password" class="span11" name="password" placeholder="**********" />
                      <span class="help-block">Note: The given information will create an account for this particular
                        member</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Gender :</label>
                    <div class="controls">
                      <select name="gender" required="required" id="select">
                        <option value="Male" selected="selected">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">D.O.R :</label>
                    <div class="controls">
                      <input type="date" name="dor" class="span11" />
                      <span class="help-block">Date of registration</span>
                    </div>
                  </div>
              </div>
              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
                <h5>Contact Details</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="form-horizontal">
                  <div class="control-group">
                    <label for="normal" class="control-label">Contact Number</label>
                    <div class="controls">
                      <input type="number" id="mask-phone" name="contact" placeholder="9876543210"
                        class="span8 mask text">
                      <span class="help-block blue span8">(999) 999-9999</span>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Address :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="address" placeholder="Address" />
                    </div>
                  </div>
                </div>
                <div class="form-actions text-center">
                  <button type="submit" class="btn btn-success">Submit Member Details</button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  </div>
  </div>


  </div>
  </div>


  <!--end-main-container-part-->

  <!--Footer-part-->

  <div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Developed By Zeeshan</a> </div>
  </div>

  <style>
    #footer {
      color: white;
    }
  </style>

  <!--end-Footer-part-->

  <script src="../js/excanvas.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.ui.custom.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.flot.min.js"></script>
  <script src="../js/jquery.flot.resize.min.js"></script>
  <script src="../js/jquery.peity.min.js"></script>
  <script src="../js/fullcalendar.min.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/matrix.dashboard.js"></script>
  <script src="../js/jquery.gritter.min.js"></script>
  <script src="../js/matrix.interface.js"></script>
  <script src="../js/matrix.chat.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/matrix.form_validation.js"></script>
  <script src="../js/jquery.wizard.js"></script>
  <script src="../js/jquery.uniform.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/matrix.popover.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.tables.js"></script>

  <script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

        // if url is "-", it is this page -- reset the menu:
        if (newURL == "-") {
          resetMenu();
        }
        // else, send page to designated URL            
        else {
          document.location.href = newURL;
        }
      }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
      document.gomenu.selector.selectedIndex = 2;
    }
  </script>
</body>

</html>