<?php
//the isset function to check username is already loged in and stored on the session
require 'includes/global.php';
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
    <h1><a href="">Perfect Gym Admin</a></h1>
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
  <?php $page = 'payment';
  include 'includes/sidebar.php' ?>
  <!--sidebar-menu-->

  <?php

  $id = $_GET['id'];
  $qry = "SELECT m.fullname, s.*, p.*, sv.service_name
                    FROM members m 
                    LEFT JOIN subscriptions s ON m.user_id = s.user_id 
                    LEFT JOIN plans p ON s.plan_id = p.plan_id
                    LEFT JOIN services sv ON p.service_id = sv.service_id where m.user_id='$id'";
  $result = mysqli_query($con, $qry);

  while ($row = mysqli_fetch_array($result)) {
    $isActive = $row['start_date'] <= date('Y-m-d') && $row['end_date'] >= date('Y-m-d');
    ?>

    <div id="content">
      <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
            Home</a> <a href="payment.php">Payments</a> <a href="#" class="current">Invoice</a> </div>
        <h1>Payment Form</h1>
      </div>


      <div class="container-fluid" style="margin-top:-38px;">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="fas fa-money"></i> </span>
                <h5>Payments</h5>
              </div>
              <div class="widget-content">
                <div class="row-fluid">
                  <div class="span5">
                    <table class="">
                      <tbody>
                        <tr>
                          <td><img src="../img/gym-logo.png" alt="Gym Logo" width="175"></td>
                        </tr>
                        <tr>
                          <td>
                            <h4>Perfect GYM Club</h4>
                          </td>
                        </tr>
                        <tr>
                          <td>5021 Wetzel Lane, Williamsburg</td>
                        </tr>

                        <tr>
                          <td>Tel: 231-267-6011</td>
                        </tr>
                        <tr>
                          <td>Email: support@perfectgym.com</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>


                  <div class="span7">
                    <table class="table table-bordered table-invoice">

                      <tbody>
                        <form action="userpay.php" method="POST">
                          <tr>
                          <tr>
                            <td class="width30">Member's Fullname:</td>
                            <td class="width70"><strong><?php echo $row['fullname']; ?></strong></td>
                          </tr>
                          <tr>
                            <td>Service:</td>
                            <td>
                              <select id="service_id" name="service_id" required="required">
                                <?php
                                $qry = "SELECT service_name,service_id FROM services";
                                $res = mysqli_query($con, $qry);
                                while ($serv = mysqli_fetch_array($res)) {
                                  $selected = ($serv['service_id'] == $row['service_id']) ? "selected" : "";
                                  echo "<option value='" . $serv['service_id'] . "' " . $selected . ">" . $serv['service_name'] . "</option>";
                                }
                                ?>
                              </select>
                            </td>
                          </tr>

                          <td class="width30">Plan:</td>
                          <td class="width70">
                            <div class="controls">
                              <select name="plan_duration_months" required="required" id="plan">
                                <?php
                                $plans = array(1, 3, 6, 12);
                                foreach ($plans as $plan) {
                                  $selected = ($plan == $row['duration_months']) ? 'selected' : '';
                                  echo "<option value='$plan' $selected>$plan Month</option>";
                                }
                                ?>
                              </select>
                            </div>
                          </td>
                          <input type="hidden" name="plan_id" id="plan_id" value="<?php echo $row['plan_id']; ?>">
                          <tr>
                            <td>Total Amount:</td>
                            <td><strong><span id="amount"><?php
                            echo $row['amount'];
                            ?> </span></strong>
                            </td>
                          </tr>


                          <tr>

                          </tr>
                          </tr>
                      </tbody>

                    </table>
                  </div>


                </div> <!-- row-fluid ends here -->


                <div class="row-fluid">
                  <div class="span12">


                    <hr>
                    <div class="text-center">
                      <!-- user's ID is hidden here -->

                      <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">

                      <button class="btn btn-success btn-large" type="SUBMIT" href="">Make Payment</button>
                    </div>

                    </form>
                  </div><!-- span12 ends here -->
                </div><!-- row-fluid ends here -->

                <?php
  }
  ?>
            </div><!-- widget-content ends here -->


          </div><!-- widget-box ends here -->
        </div><!-- span12 ends here -->
      </div> <!-- row-fluid ends here -->
    </div> <!-- container-fluid ends here -->
  </div> <!-- div id content ends here -->



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
    function updateAmount() {
      var service_id = document.getElementById("service_id").value;
      var month = document.getElementById("plan").value;

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var amount = JSON.parse(xhr.responseText).amount;
          var plan_id = JSON.parse(xhr.responseText).plan_id;
          document.getElementById("amount").textContent = amount;
          document.getElementById("plan_id").value = plan_id;
        }
      }
      xhr.open("GET", "actions/get_amount.php?service_id=" + service_id + "&month=" + month, true);
      xhr.send();
    }
  </script>

  <!-- update the amount when service or month changes -->
<script>
    document.getElementById("service_id").addEventListener("change", updateAmount);
    document.getElementById("plan").addEventListener("change", updateAmount);
  </script>
  </script>
</body>

</html>