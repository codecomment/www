<?php

require __DIR__ . '/../vendor/autoload.php';

define('MANDRILL_API_KEY', 'WQG8XtiylPlaYZbcZNvFKA');
$mandrill = new Mandrill(MANDRILL_API_KEY);

function sendEmail( $data = NULL, $to = NULL, $subject = NULL ){
  global $mandrill;

  $text = '';
  foreach($data as $key=>$val ) {
    $text .= "$key: $val \n";
  }
  $to = explode("|", $to);
  try {
    $message = array(
      'subject' => $subject,
      'text' => $text, // or just use 'html' to support HTMl markup
      'from_email' => "donotreply@ubiweb.ca",
      'from_name' => $data['name'], //optional
      'to' => array(
              array( // add more sub-arrays for additional recipients
              'email' => $to[1],
              'name' => $to[0], // optional
              'type' => 'to' //optional. Default is 'to'. Other options: cc & bcc
              )
      ),

      /* Other API parameters (e.g., 'preserve_recipients => FALSE', 'track_opens => TRUE',
        'track_clicks' => TRUE) go here */
    );

    $result = $mandrill->messages->send($message);
    return $result;

  } catch(Mandrill_Error $e) {
    return 'An email error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
  }

}

//echo sendEmail(array("name"=>"Julz","email"=>"fernandez.julz@gmail.com","phone"=>"555-444-3456","message"=>"testing this out manually"),"Julian Fernandez|julian@codecomment.io","Contact Form Submission from codeComment.io");
