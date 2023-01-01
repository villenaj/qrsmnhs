<?php

use App\Models\event;

function getEventCalendar() {
  // retrieve the events and their dates from the database
  $events = event::select('start')->get();

  // get the number of days in the current month and the name of the current month
  $days_in_month = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));  // number of days in the current month
  $calendar_info = cal_info(0);  // calendar information
  $month_name = $calendar_info['months'][date('m')];  // name of the current month

  // start generating the calendar HTML
  $calendar_html = "<table class='table table-bordered'>";
  $calendar_html .= "<tr>";
  $calendar_html .= "<th colspan='7'>$month_name</th>";
  $calendar_html .= "</tr>";
  $calendar_html .= "<tr>";
  $calendar_html .= "<th>S</th>";
  $calendar_html .= "<th>M</th>";
  $calendar_html .= "<th>T</th>";
  $calendar_html .= "<th>W</th>";
  $calendar_html .= "<th>T</th>";
  $calendar_html .= "<th>F</th>";
  $calendar_html .= "<th>S</th>";
  $calendar_html .= "</tr>";

  // get the day of the week for the first day of the month
  $first_day_of_month = date('w', strtotime(date('Y-m-01')));
  // insert blank cells at the beginning of the first row
  $calendar_html .= "<tr>";
  for ($i = 0; $i < $first_day_of_month; $i++) {
    $calendar_html .= "<td></td>";
  }

  // generate the cells for the calendar
  $day_of_month = 1;
  while ($day_of_month <= $days_in_month) {
    // get the day of the week for the current cell
    $day_of_week = date('w', strtotime(date('Y-m-' . $day_of_month)));
    
    // check if the current cell is an event date
    $events_array = $events->toArray();

    if (date('d') == $day_of_month) {
      // highlight the cell if it is the current day of the year
      $calendar_html .= "<td style='background-color: #66b255;'>" . $day_of_month . "</td>";
    } else if (in_array(date('Y-m-' . $day_of_month), $events_array)) {
      // highlight the cell if it is an event date
      $calendar_html .= "<td style='background-color: #ffc107;'>" . $day_of_month . "</td>";
    } else {
      // otherwise, just display the cell
      $calendar_html .= "<td>" . $day_of_month . "</td>";
    }
    
    // check if the current cell is the last cell in the row
    if ($day_of_week == 6) {
      // close the row if it is
      $calendar_html .= "</tr>";
    }
    
    // increment the day of the month
    $day_of_month++;
  }

  // insert blank cells at the end of the last row if necessary
  if ($day_of_week != 6) {
    while ($day_of_week <= 6) {
      $calendar_html .= "<td></td>";
      $day_of_week++;
    }
    $calendar_html .= "</tr>";
  }

  $calendar_html .= "</table>";

  // return the calendar HTML
  return $calendar_html;
}
?>