<?php
date_default_timezone_set(‘Kenya/Nairobi’);
echo date('g:i:s a'); ?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="calendar.css"/>
    <title>Calendar</title>
</head>
<body>

<?php
function get_hour_string($timestamp)
{
return date(“g.00a”, $timestamp);
}
$timestamp = (isset($_GET[‘time_stamp’]))?$_GET[‘time_stamp’]:time();
$hours_to_show = 12;
    echo “<div class='container'>”;
    echo"<h1>G Family Schedule ”.date(“D, F j, Y, g:i a”, $timestamp).” </h1>";
    echo"<table id='event_table'>";
    echo" <tr>
          <th class='hr_td'>&nbsp; </th>
          <th class='table_header'>G</td>
          <th class='table_header'>Maureen</th>
          <th class='table_header'>Lil G</th>
        </tr>";
    for($i = 0; $i <= $hours_to_show; $i++)
   {
    if ($i % 2 == 0)
   {
    echo"<tr class='even_row'>";
   }
    else
   {
    echo"<tr class='odd_row'>”;
   }
$td_time = $timestamp + $i*60*60;
$row_time = get_hour_string($td_time);
$finding_time = $td_time – ($td_time % 3600);
echo “<td class=’hr_td’>$row_time</td><td>” . get_events(‘G’, 
$finding_time).“</td><td>”.get_events(‘Maureen’, $finding_time).“</td>
<td>”.get_events(‘Lil G’,$finding_time).“</td></tr>”;
}
echo“</table>”;
$increment = 12*60*60;
$future = $timestamp + $increment;
$before = $timestamp – $increment;
echo”<div>";
?>
</body>
</html>