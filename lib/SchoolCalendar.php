<?php
require_once("$BASE_PATH/lib/Database.php");
$db = new Database();

class SchoolCalendar
{
	var $schoolName;
	var $schoolID;
	var $month;
	var $year;
	var $events;
	var $truncateName;
	
	function SchoolCalendar($schoolName, $options, $month, $year)
	{
		$this->schoolName = $schoolName;
		$this->schoolID = $this->getSchoolID();
		$this->options = $options;
		$this->month = $month;
		$this->year = $year;
		$this->truncateName = 13;
		$this->events = $this->getEvents();
		$this->updateSchoolViews();
	}
	
	
	function getSchoolID()
	{
		global $db;
		
		$fields = array($this->schoolName);
		$db->query("SELECT school_id FROM schools WHERE name = $1", $fields);
		$row = $db->fetch();
		
		return $row['school_id'];
		
	}
	
	function getOptionsArray()
	{
//		if (count($this->options) == 0)
//		{
//			
//			return "AND users.type_id = 0";
//		}

		$allBlank = true;
		for ($i = 1; $i <= count($this->options); $i++)
		{
			if ($this->options[$i] == true)
			{
				$allBlank = false;
			}
		}
		if ($allBlank)
		{
			
			return "AND users.type_id = 0";
		}
		
		
		
		$ret = "AND (";
		
		foreach($this->options as $key => $value)
		{
			if ($value)
			{
				$ret.= "users.type_id = ". $key ." OR ";
			}
		}
		$ret = substr($ret, 0, -4) . ")";

		return $ret;
	}
	
	function getEvents()
	{
		global $db;
		
		$fields = array($this->schoolName, $this->month, $this->year);
		$query = "SELECT 
					events.event_id AS event_id,
					events.name AS name,
					to_char(startdate, 'mm') AS month,
					to_char(startdate, 'dd') AS day,
					to_char(startdate, 'yyyy') AS year,
					to_char(startdate, 'hh:mi am') AS time,
					events.description AS description,
					events.location AS location,
					users.name AS user_name,
					events.user_id AS user_id,
					schools.school_id AS school_id,
					events.event_img AS event_img
					FROM events, schools, users
					WHERE events.active = 'true' AND
					events.school_id = schools.school_id AND
					events.user_id = users.user_id AND
					schools.name = $1 AND 
					to_char(startdate, 'mm') = $2 AND 
					to_char(startdate, 'yyyy') = $3
					". $this->getOptionsArray();

		$db->query($query, $fields);
		
		$events = array();
		for ($i = 0; $row = $db->fetch(); $i++)
		{
//			$truncateDescription = $row['event_img'] == "" ? 750 : 300;
			$truncateDescription = 300;
			$events[$i]['day'] = $row['day'];
			$events[$i]['event_id'] = $row['event_id'];
			$events[$i]['user_id'] = $row['user_id'];
			$events[$i]['name'] = str_replace('"', '&nbsp;', $row['name']);
			$events[$i]['time'] = $row['time'];
			$events[$i]['location'] = str_replace('"', '&quot;', $row['location']);
			$events[$i]['user_name'] = $row['user_name'];
			$events[$i]['description'] = substr(str_replace('"', '&quot;', $row['description']), 0, $truncateDescription);
			if (strlen($row['description']) > $truncateDescription) $events[$i]['description'].= "...";
			$events[$i]['event_img'] = $row['event_img'];
		}
		
		return $events;
	}
	
	
	function findEvents($day)
	{
		$dayEvents = array();
		$j = 0;
		for ($i = 0; $i < count($this->events); $i++)
		{
			if ($this->events[$i]['day'] == $day)
			{
				$dayEvents[$j] = $this->events[$i];
				$j++;
			}
		}
		
		return $dayEvents;
	}
	
	
	function generateToolTips()
	{
		$returnString = "";
		for ($i = 0; $i < count($this->events); $i++)
		{
			$returnString.= "$('#event". $this->events[$i]['event_id'] ."').tooltip({
								track: false, 
							    delay: 750, 
							    showURL: false,
							    extraClass: \"pretty\", 
							    fixPNG: true, 
							    opacity: 0.95, 
							    left: -120 
							    
							});\n\n";
		}
		return $returnString;
	}
	
	
	function updateSchoolViews()
	{
		global $db;
		
		$fields = array($this->schoolName, getIPAddress(), $this->month, $this->year);
		$query = "INSERT INTO school_views (school_id, ip_address, month, year) VALUES ((SELECT school_id FROM schools WHERE schools.name = $1) , $2, $3, $4)";
		$db->query($query, $fields);
	}
	
	
	/* draws a calendar */
	function draw_calendar()
	{
		/* draw table */
		$calendar = '<table class="calendar">';
	
		/* table headings */
		$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
	
		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$this->month,1,$this->year));
		$days_in_month = date('t',mktime(0,0,0,$this->month,1,$this->year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();
	
		/* row for week one */
		$calendar.= '<tr class="calendar-row">';
	
		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
			$days_in_this_week++;
		endfor;
		
		$todayDay = date("j");
		$todayMonth = date("n");
		$todayYear = date("Y");
	
		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			if ($list_day == $todayDay && $this->month == $todayMonth && $this->year == $todayYear)
			{
				$calendar.= '<td class="calendar-day-today">';
			}
			else
			{
				$calendar.= '<td class="calendar-day">';
			}
				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!	IF MATCHES FOUND, PRINT THEM !! **/
				$dayEvents = $this->findEvents($list_day);
				
				/* add in the day number */
				if (count($dayEvents) > 0)
				{
					$urlDay = $list_day < 10 ? "0". $list_day : $list_day;
					$url = "day.php?school_id=". $this->schoolID ."&month=". $this->month ."&day=". $urlDay ."&year=". $this->year;
					$calendar.= '<div class="day-number"><a href="'. $url .'">'.$list_day.'</a></div><div class="day-text"><ul>';
				}
				else
				{
					$calendar.= '<div class="day-number">'.$list_day.'</div><div class="day-text"><ul>';
				}
				
				$eventLimit = 4;
				for ($i = 0; $i < count($dayEvents); $i++)
				{
					if ($i == $eventLimit)
					{
						$calendar.= "<a href=\"javascript:expandEvents($list_day)\" id=\"link$list_day\">More Events</a><div id=\"expand$list_day\" style=\"display: none;\">";
					}
					
					$title = "<div>";
					$imageSize = array();
					$imagePath = "";
					
					// Check image size and resize accordingly
					if ($dayEvents[$i]['event_img'] != "") // Has image
					{
						$imageSize = @getimagesize("../public/images/events/". $dayEvents[$i]['event_img']);
						$imagePath = "/images/events/";
						$image = $dayEvents[$i]['event_img'];
					}
					else // Show profile picture
					{
						$image = getProfilePic($dayEvents[$i]['user_id']);
						$imageSize = @getimagesize("../public/images/profile/". $image);
						$imagePath = "/images/profile/";
					}
					
					$width = $imageSize[0];
					$height = $imageSize[1];
					
					if ($height > 100)
					{
						$title.= "<img src='". $imagePath . $image ."' alt='Event Picture' height='100' /><br/>";
					}
					else if ($width > 425)
					{
						$title.= "<img src='". $imagePath . $image ."' alt='Event Picture' width='425' /><br/>";
					}
					else
					{
						$title.= "<img src='". $imagePath . $image ."' alt='Event Picture' /><br/>";
					}
					
					$eventName = strlen($dayEvents[$i]['name']) > $this->truncateName ? substr($dayEvents[$i]['name'], 0, $this->truncateName) . "&hellip;" : $dayEvents[$i]['name'];
					
					$title.= "<h3>". $dayEvents[$i]['name'] ."</h3><h3>". $dayEvents[$i]['time'] ." at ". $dayEvents[$i]['location'] ."</h3><h4>Hosted by: ". $dayEvents[$i]['user_name'] ."</h4><p>". $dayEvents[$i]['description'] ."</p></div>";
					$calendar.= "<li><a href=\"event.php?id=". $dayEvents[$i]['event_id'] ."&amp;ret=school\" class=\"event\" title=\"$title\">". $eventName ."</a></li>";
				}
				if (count($dayEvents) > $eventLimit)
				{
					$calendar.= "</div>";
				}
				
//				$calendar.= str_repeat('<p>&nbsp;</p>',2);
				
			$calendar.= '</ul></div></td>';
			if($running_day == 6):
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;
	
		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
			endfor;
		endif;
	
		/* final row */
		$calendar.= '</tr>';
	
		/* end the table */
		$calendar.= '</table>';
		
		/* all done, return result */
		return $calendar;
	}
	
	
}	
?>