<?php

// get the feedback (they are arrays, to make multiple positive/negative messages possible)
$feedback_positive = Session::get('feedback_positive');
$feedback_negative = Session::get('feedback_negative');

// echo out positive messages
if (isset($feedback_positive)) {
    foreach ($feedback_positive as $feedback) {
      echo "
                <script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function(event) {
                  notifyUser('Successful','$feedback','success');
                });
                </script>";
    }
}

// echo out negative messages
if (isset($feedback_negative)) {
    foreach ($feedback_negative as $feedback) {
      echo "
                <script type='text/javascript'>
                document.addEventListener('DOMContentLoaded', function(event) {
                        notifyUser('Error','$feedback','error');
                });
                </script>";    }
}
