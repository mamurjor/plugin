<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
		global $wpdb;
	
		$table_name=$wpdb->prefix.'mamurjor_contact';
  

  if (isset($_POST['mamursubmitcontactwithoutmail'])) {
	  
    $name = sanitize_text_field($_POST['name']); 
    $subject = sanitize_text_field($_POST['subject']); 
    $contact_mail = sanitize_text_field($_POST['contact_mail']); 
    $message = sanitize_text_field($_POST['message']); 
    
    $sql=$wpdb->query("INSERT INTO $table_name(name,subject,contact_mail,message) VALUES('$name','$subject','$contact_mail','$message')");
    echo "<script>location.replace('');</script>";
	


 
 
 }

	  
	  
add_shortcode('mamurjor_contact_admin_without_mail','mamurjor_contact_admin_without' );
function mamurjor_contact_admin_without( ) {
    
		  ob_start();
	  
	  
	  ?>
	    <form action="" method="post">
	  <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name">
              </div>
              
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject">
              </div>
			  <div class="form-group">
                <input type="text" name="contact_mail" class="form-control" placeholder="Mail">
              </div>
              <div class="form-group">
                <textarea  id="" name="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
			  
                <input id="newsubmit" class="form-control" name="mamursubmitcontactwithoutmail" type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
	  
            
        </form>
		
		<?php
		
		
		return ob_get_clean();
		}
		
