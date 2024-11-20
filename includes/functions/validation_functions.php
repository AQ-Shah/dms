<?php

$errors = array();

function fieldname_as_text($fieldname) {
  $fieldname = str_replace("_", " ", $fieldname);
  $fieldname = ucfirst($fieldname);
  return $fieldname;
}

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty
function has_presence($value) {
	return isset($value) && $value !== "";
}
function validate_presences_get($required_fields) {
  global $errors;
  foreach($required_fields as $field) {
    $value = trim($_GET[$field]);
  	if (!has_presence($value)) {
  		$errors[$field] = fieldname_as_text($field) . " can not be blank";
  	}
  }
}

function validate_presences($required_fields) {
  global $errors;
  foreach($required_fields as $field) {
    $value = trim($_POST[$field]);
  	if (!has_presence($value)) {
  		$errors[$field] = fieldname_as_text($field) . " can not be blank";
  	}
  }
}

// * string length
// max length
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}

function validate_max_lengths($fields_with_max_lengths) {
	global $errors;
	// Expects an assoc. array
	foreach($fields_with_max_lengths as $field => $max) {
		$value = trim($_POST[$field]);
	  if (!has_max_length($value, $max)) {
	    $errors[$field] = fieldname_as_text($field) . " is too long";
	  }
	}
}

// * inclusion in a set
function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}


// formating the date for MC
function format_time_difference($date) {
    $mc_validity = new DateTime($date);
    $current_date = new DateTime();

    $interval = $current_date->diff($mc_validity);
    $days_passed = $interval->days;

    if ($days_passed >= 365) {
        $years = floor($days_passed / 365);
        $remaining_days = $days_passed % 365;
        $months = floor($remaining_days / 30);
        $days = $remaining_days % 30;

        $result = "{$years} year(s)";
        if ($months > 0) $result .= " {$months} month(s)";
        if ($days > 0) $result .= " {$days} day(s)";
    } elseif ($days_passed > 30) {
        $months = floor($days_passed / 30);
        $days = $days_passed % 30;

        $result = "{$months} month(s)";
        if ($days > 0) $result .= " {$days} day(s)";
    } else {
        $result = "{$days_passed} day(s)";
    }

    return $result . " ago";
}

?>