<?php

/**
 * Returns true if an input is a valid integer, false if not
 * 
 * @param mixed $input The value to test
 * @param int|null $min Optional input to set a minimum value
 * @param int|null $max Optional input to set a maximum value
 * @return bool
 */
function validateInt(mixed $input, int $min = null, int $max = null): bool
{
  $temparray = [];
  if ($min) $temparray["min_range"] = $min;
  if ($max) $temparray["max_range"] = $max;
  $options = null;
  if (count($temparray) > 0) {
    $options["options"] = $temparray;
  }
  if ($options) {
    return filter_var($input, FILTER_VALIDATE_INT, $options) ? true : false;
  } else {
    return filter_var($input, FILTER_VALIDATE_INT) ? true : false;
  }
}

/**
 * Accepts mixed input, and optional minimum and maximum 
 * values. Returns input if valid integer within range, or
 * null if invalid.
 * 
 * @param mixed $input Value to be checked and transformed
 * @param int|null $min Optional input to set a minimum value
 * @param int|null $max Optional input to set a maximum value
 * @return int|null
 */
function sanitiseInt(mixed $input, int $min = null, int $max = null): ?int
{
  $tempInt = (int) $input;
  if (validateInt($tempInt, $min, $max)) {
    return $tempInt;
  } else {
    return null;
  }
}
/**
 * Validates an input to assure the input meets specification for type
 * and range.
 * @param mixed $input The value to test
 * @param float|null $min Optional input to set a minimum value
 * @param float|null $max Optional input to set a maximum value
 * @return bool
 **/
function validateFloat(mixed $input, float $min = null, float $max = null): bool
{
  $temparray = [];
  if ($min) $temparray["min_range"] = $min;
  if ($max) $temparray["max_range"] = $max;
  $options = null;
  if (count($temparray) > 0) {
    $options["options"] = $temparray;
  }
  if ($options) {
    return filter_var($input, FILTER_VALIDATE_FLOAT, $options);
  } else {
    return filter_var($input, FILTER_VALIDATE_FLOAT);
  }
}

/**
 * Sanitises an input to ensure it is of the correct format, within an
 * optionally specified range.
 * @param mixed $input The value to test
 * @param float|null $min Optional input to set a minimum value
 * @param float|null $max Optional input to set a maximum value
 * @return null|bool
 **/

function sanitiseFloat(mixed $input, float $min = null, float $max = null): ?float
{
  $tempVal = filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  if (validateFloat($tempVal, $min, $max)) {
    return $tempVal;
  } else {
    return null;
  }
}

/**
 * Sanitises an input to ensure it is of the correct format, within an
 * optionally specified range.
 * @param mixed $input The value to test
 * @param null|bool allowHTML Defaults to false, setting this to true will allow unsanitised HTML if combined with setting encodeHTML to false
 * @param null|bool encodeHTML Defaults to true, and will encode HTML and special characters unless set to false, this is dangerous when combined with allowHTML
 * @param null|bool trimSpace Defaults to true, will remove leading and trailing spaces
 * @return null|string
 **/
function sanitiseStr(mixed $input, bool $allowHTML = false, bool $encodeHTML = true, bool $trimSpace = true): ?string
{
  $tempVal = (string) $input;
  if ($allowHTML && $encodeHTML) {
    $tempVal = htmlentities($tempVal, ENT_QUOTES, ENT_HTML5);
  }
  if (!$allowHTML) {
    $tempVal = htmlspecialchars(strip_tags($tempVal), ENT_QUOTES);
  }
  if ($trimSpace) {
    $tempVal = trim($tempVal);
  }
  return $tempVal;
}

/**
 * validates an email against RFC822
 * @param mixed input String to validate against the standard
 * @return bool
 */
function validateEmail(mixed $input): bool
{
  return filter_var($input, FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE) ? true : false;
}

/**
 * Accepts an input and sanitises the input against RFC822, does not necessarily return an email
 * @param mixed input
 * @return null|string
 */
function sanitiseEmail(mixed $input): ?string
{
  $tempVal = filter_var((string) $input, FILTER_SANITIZE_EMAIL);
  if (validateEmail($tempVal)) {
    return $tempVal;
  } else {
    return null;
  }
}
