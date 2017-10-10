<?php
virtual ("/beta/assets/global/includes/start.html?Subscribe to a Mailing List");
virtual ("/beta/assets/global/includes/styles.html?EmailLists");
virtual ("/beta/assets/global/includes/nav.html?EmailLists");
?>

<div class="main">
      <div class="container">
       <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Subscribe to a Mailing List</h1>
            <div class="content-page">
              <div class="row margin-bottom-30">
                <!-- BEGIN INFO BLOCK -->               
                <div class="col-md-7">

<?php
	$join_email = $_POST['join_email'];
	$which_list = $_POST['which_list'];
	// message lines should not exceed 70 characters (PHP rule), so wrap it
	$join_email = wordwrap($join_email, 70);

	if (preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $_POST['join_email']) === 0) {
		echo    "<p class=\"text-danger\" style=\"font-weight: bold;\">Valid email address required.</p>\n\n".
                	"<p>Please use your browser's \"back\" button and try again.</p>\n";
        	}       

	else {
        	// send mail
        	$subjecttxt = "subscribe info request"; 
		$bodytxt = "subscribe " . $which_list . " " . $join_email;

        	mail("majordomo@nationaldataservice.org",$subjecttxt,$bodytxt,"From: $join_email\r\nContent-type: text/plain\r\n\r\n");

		echo	"<p>Thank you for your submission.</p>\n";
        	}
?>

                <!-- END INFO BLOCK -->   
                <!-- BEGIN SIDE BAR -->            
                <div class="col-md-5">
                </div>
		<!-- END SIDE BAR -->
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

<?php
virtual ("/beta/assets/global/includes/footer.html"); 
virtual ("/beta/assets/global/includes/js-loads.html?EmailLists");
?>
