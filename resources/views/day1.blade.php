<!DOCTYPE html>
<html>
 
<head>
  <title>Get the number of days between two dates using jQuery - Clue Mediator</title>
 
  <!-- CSS -->
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
 
  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
 
<body>
  <div class="container">
    <div class="col-md-8 mt-4 ">
      <h5>Get the number of days between two dates using jQuery - <a href="https://www.cluemediator.com" target="_blank" rel="noopener noreferrer">Clue Mediator</a></h5>
      <form class="form-inline">
        <div class="form-group mb-2">
          <input type="text" class="form-control datepicker mr-2" id="fromdate" />
          <input type="text" class="form-control datepicker" id="todate" />
        </div>
        <div class="form-group mb-2">
          <input type="button" class="btn btn-primary m-2" value="Calculate" id="calculate">
        </div>
      </form>
      <div id="result"></div>
    </div>
  </div>
 
  <script>
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
    });
 
    $(document).on('click', '#calculate', function () {
      var fromdate = $("#fromdate").val();
      var todate = $("#todate").val();
 
      if ((fromdate == "") || (todate == "")) {
        $("#result").html("Please enter two dates");
        return false
      }
 
      var dt1 = new Date(fromdate);
      var dt2 = new Date(todate);
 
      var time_difference = dt2.getTime() - dt1.getTime();
      var result = time_difference / (1000 * 60 * 60 * 24);
 
      var output = "Total number of days between dates - " + result;
      $("#result").html(output);
    });
  </script>
</body>
 
</html>
