<?php
$location = "abt_contact";
virtual("/assets/global/includes/start.html"); 
virtual("/assets/global/includes/styles.html"); 
virtual("/assets/global/includes/nav.html"); 
virtual("/assets/global/includes/breadcrumbs.html");
?>

                <div class="col-md-9 col-sm-9">

<?php
	$recaptcha_response = $_POST['g-recaptcha-response'];
	$contactsname = $_POST['contactsname'];
	$contactsemail = $_POST['contactsemail'];
	$contactsmessage = $_POST['contactsmessage'];
	// message lines should not exceed 70 characters (PHP rule), so wrap it
	$contactsmessage = wordwrap($contactsmessage, 70);
	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeRGAETAAAAAGXw_6L3fedckOWNXZg623Dd1FjI&response=".$recaptcha_response."&remoteip=".$_SERVER['REMOTE_ADDR']);

	if ($response.success==false) {
		echo    "<p class=\"text-danger\" style=\"font-weight: bold;\">You did not pass the reCAPTCHA test.</p>\n\n".
                        "<p>Please use your browser's \"back\" button and try again.</p>\n";
                }

	elseif ( (empty($contactsname)) || (empty($contactsmessage)) ) { 
		echo 	"<p class=\"text-danger\" style=\"font-weight: bold;\">All form fields must be filled in.</p>\n\n".
			"<p>Please use your browser's \"back\" button and fill in all the fields.</p>\n";
		}

	elseif (preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $_POST['contactsemail']) === 0) {
        	echo    "<p class=\"text-danger\" style=\"font-weight: bold;\">Valid email address required.</p>\n\n".
                	"<p>Please use your browser's \"back\" button and try again.</p>\n";
        	}       

	else {  
        	// send mail
        	$subjecttxt = "NDS Contact Us form submission"; 

        	mail("info@nationaldataservice.org",$subjecttxt,$contactsmessage,"From: $contactsemail\r\nContent-type: text/plain\r\n\r\n");

		echo	"<p>Thank you for your submission. We will respond to you as quickly as possible.</p>\n";
        	}
?>

                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
      </div>
    </div>

<?php
virtual ("/assets/global/includes/footer.html"); 
virtual ("/assets/global/includes/js-loads.html");
?>
