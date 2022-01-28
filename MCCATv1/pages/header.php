<!--    Header  -->
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/mccicon.png">
<link rel="icon" type="image/png" href="../assets/img/mccicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>UIP - Attendance Tracker</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<!-- CSS Files -->
<link href="../assets/css/bootstrap.min.css?2.0" rel="stylesheet" />
<link href="../assets/css/light-bootstrap-dashboard.css?4.6" rel="stylesheet" />
<!-- additional CSS Files -->
<link href="../assets/css/addstyle.css?3.2" rel="stylesheet" />
<link href="../assets/css/calendarv1.css?2" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../assets/css/demo.css?1.1" rel="stylesheet" />
<!--    Header end  -->

<script src=
        "https://code.jquery.com/jquery-3.6.0.min.js"
        integrity=
"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous">
    </script>

<script>
                                            
$(document).ready(function () {
$("#TimeIn").click(function () {
confirm("Time In at <?= $curtime; ?>   ");
});
});

                                                
$(document).ready(function () {
$("#LunchStart").click(function () {
confirm("Lunch Start  at <?= $curtime; ?> ");
});
});

                                                
$(document).ready(function () {
$("#LunchEnd").click(function () {
confirm("Lunch End at <?= $curtime; ?> ");
});
});

                                                
$(document).ready(function () {
$("#TimeOut").click(function () {
confirm("Time Out at <?= $curtime; ?> ");
});
});


$(document).ready(function () {
$("#regbutton").click(function () {
alert("Registered successfully");
});
});



</script>