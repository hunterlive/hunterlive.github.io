<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
  
$first_name = $_POST['firstname'];
$middle_name = $_POST['middlename'];
$last_name = $_POST['lastname'];
$visitor_email = $_POST['streetaddress'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zipcode'];
$home_phone = $_POST['homephone'];
$work_phone = $_POST['workphone'];
$visitor_email = $_POST['email'];
$placeofemployment = $_POST['placeofemployment'];
$program_interests = $_POST['q'];
$availability = $_POST['q1'];
$gender = $_POST['q2'];
$age_group = $_POST['q3'];
$ethnicity = $_POST['q4'];
$edu_level = $_POST['q5'];
$work_status = $_POST['q6'];
$marital_status = $_POST['q7'];
$yearly_income = $_POST['q8'];
$number_household = $_POST['numberofpersonsinhousehold'];
           
//Validate first
if(empty($first_name)||empty($last_name)||empty($visitor_email)) 
{
    echo "firstname lastname and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'doshiaharris@af-am.com';//<== update the email address
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $first_name.\n ,$middle_name.\n, $last_name.\n, $visitor_email.\n, $city.\n, $state.\n, $zip_code.\n, $home_phone.\n, $work_phone.\n, $visitor_email.\n, $placeofemployment.\n , $program_interests.\n, $availability.\n, $gender.\n, $age_group.\n, $ethnicity.\n, $edu_level.\n, $work_status.\n, $marital_status.\n, $yearly_income.\n, $number_household.\n ".
   
    
$to = "doshiaharris@af-am.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 