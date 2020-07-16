<?php 
/**
* 
*/
class Datelib
{
	
	public function get_year_from_date($date){
		return date('Y', strtotime($date));
	}

	public function get_day_from_date($date){
		return date('d', strtotime($date));
	}

	public function get_hour_between_times($start_time, $end_time){
		$time1 = strtotime($start_time);
		$time2 = strtotime($end_time);
		$difference = round(abs($time2 - $time1) / 3600,2);
		return $difference;
	}
	

	public function get_first_day_of_year_from_date($date){
		$year 		=	date('Y', strtotime($date));
		$first_day 	=	$year.'-01-01';	
		return $first_day;
	}
	public function get_last_day_of_year_from_date($date){
		$year 		=	date('Y', strtotime($date));
		$first_day 	=	$year.'-12-31';	
		return $first_day;
	}
	public function get_month_from_date($date){
		return date('m', strtotime($date));
	}
	public function count_week_days_in_month($year, $month, $ignore) {
	    $count = 0;
	    $counter = mktime(0, 0, 0, $month, 1, $year);
	    while (date("n", $counter) == $month) {
	        if (in_array(date("w", $counter), $ignore) == true) {
	            $count++;
	        }
	        $counter = strtotime("+1 day", $counter);
	    }
	    return $count;
	}
	public function count_week_days_in_range($startDate, $endDate, $ignore){
		$weekendDays = array($ignore);
		$endDate  = $this->add_day_to_date($endDate);
	    $period = new DatePeriod(
	        new DateTime($startDate),
	        new DateInterval('P1D'),
	        new DateTime($endDate)
	    );

	    $weekendDaysCount = 0;
	    foreach ($period as $day) {
	        if (in_array($day->format('N'), $weekendDays)) {
	            $weekendDaysCount++;
	        }
	    }

	    return $weekendDaysCount;
	}
	public function get_days_between_range($start_date,$end_date){
		$date1=date_create($start_date);
		$date2=date_create($end_date);
		$diff=date_diff($date1,$date2);
		return $diff->format("%a")+1;
	}
	public function subtract_minutes_to_time($time, $minutes){
		$endTime = strtotime("-".$minutes." minutes", strtotime($time));
		return date('H:i:s', $endTime);
	}
	public function add_day_to_date($date){
		$result =  date('Y-m-d', strtotime($date. ' + 1 days'));
		return $result;
	}

	public function add_days_to_date($date, $days){
		$result =  date('Y-m-d', strtotime($date. ' + '.$days.' days'));
		return $result;
	}

	public function add_minutes_to_time($time, $minutes){
		$endTime = strtotime("+".$minutes." minutes", strtotime($time));
		return date('H:i:s', $endTime);
	}
	public function first_day_of_the_month($date){
		$d = new DateTime( $date );
		$d->modify( 'first day of this month' );
		$first_day =  $d->format( 'Y/m/d' );
		return $first_day;
	}
	public function last_day_of_the_month($date){
		$d = new DateTime( $date );
		$d->modify( 'last day of this month' );
		$last_day =  $d->format( 'Y/m/d' );
		return $last_day;
	}
	public function get_week_day($date,$weekday){
		$dayofweek = date('w', strtotime($date));
		$result    = date('Y-m-d', strtotime(($weekday - $dayofweek).' day', strtotime($date)));
		echo $result;
	}
}

?>