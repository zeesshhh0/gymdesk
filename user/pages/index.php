<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gym Desk System</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../../css/fullcalendar.css" />
  <link rel="stylesheet" href="../../css/matrix-style.css" />
  <link rel="stylesheet" href="../../css/matrix-media.css" />
  <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/jquery.gritter.css" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <!--Header-part-->
  <div id="header">
    <h1><a href="index.php">Perfect Gym Desk System</a></h1>
  </div>
  <!--close-Header-part-->


  <!--top-Header-menu-->
  <?php include '../includes/topheader.php' ?>
  <!--close-top-Header-menu-->

  <!--start-top-serch-->
  <!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
  <!--close-top-serch-->
  <!--sidebar-menu-->
  <?php $page = "dashboard";
  include '../includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <!--main-container-part-->
  <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i>
          Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

      <!--End-Action boxes-->

      <div class="row-fluid">



        <div class="span6">
          <div class="widget-box">
            <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i
                  class="icon-chevron-down"></i></span>
              <h5>Gym Announcement</h5>
            </div>
            <div class="widget-content nopadding collapse in" id="collapseG2">
              <ul class="recent-posts">
                <li>

                  <?php

                  include "../../dbcon.php";
                  $qry = "select * from announcements order by date desc";
                  $result = mysqli_query($con, $qry);

                  while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>";
                    echo "<div class='article-post'>";
                    echo "<span class='user-info'> By: System Administrator / Date: " . $row['date'] . " </span>";
                    echo "<p><a href='#'>" . $row['message'] . "</a> </p>";

                  }

                  echo "</div>";
                  echo "</li>";
                  ?>
                  <a href="announcement.php"><button class="btn btn-warning btn-mini">View All</button></a>
                </li>
              </ul>
            </div>
          </div>
        </div> <!-- end of announcement -->

      </div><!-- End of row-fluid -->
    </div><!-- End of container-fluid -->
  </div><!-- End of content-ID -->

  <!--end-main-container-part-->

  <!--Footer-part-->

  <div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Developed By Zeeshan</a> </div>
  </div>



  <style>
    #footer {
      color: white;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 460px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }

    .title {
      color: grey;
      font-size: 18px;
    }
  </style>



  <!--end-Footer-part-->

  <script src="../../jsexcanvas.min.js"></script>
  <script src="../../jsjquery.min.js"></script>
  <script src="../../jsjquery.ui.custom.js"></script>
  <script src="../../jsbootstrap.min.js"></script>
  <script src="../../jsjquery.flot.min.js"></script>
  <script src="../../jsjquery.flot.resize.min.js"></script>
  <script src="../../jsjquery.peity.min.js"></script>
  <script src="../../jsfullcalendar.min.js"></script>
  <script src="../../jsmatrix.js"></script>
  <script src="../../jsmatrix.dashboard.js"></script>
  <script src="../../jsjquery.gritter.min.js"></script>
  <script src="../../jsmatrix.interface.js"></script>
  <script src="../../jsmatrix.chat.js"></script>
  <script src="../../jsjquery.validate.js"></script>
  <script src="../../jsmatrix.form_validation.js"></script>
  <script src="../../jsjquery.wizard.js"></script>
  <script src="../../jsjquery.uniform.js"></script>
  <script src="../../jsselect2.min.js"></script>
  <script src="../../jsmatrix.popover.js"></script>
  <script src="../../jsjquery.dataTables.min.js"></script>
  <script src="../../jsmatrix.tables.js"></script>

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