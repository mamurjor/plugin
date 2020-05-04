<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$table_name=$wpdb->prefix.'mamurjor_contact';
$sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  name Text DEFAULT '' NOT NULL,
  subject Text DEFAULT '' NOT NULL,
  contact_mail Text DEFAULT '' NOT NULL,
  message Text DEFAULT '' NOT NULL,
  PRIMARY KEY  (id)
) $charset_collate;";

if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
  
  

  if (isset($_POST['mamursubmitcontact'])) {
	  
    $name = sanitize_text_field($_POST['name']); 
    $subject = sanitize_text_field($_POST['subject']); 
    $contact_mail = sanitize_text_field($_POST['contact_mail']); 
    $message = sanitize_text_field($_POST['message']); 
    
    $sql=$wpdb->query("INSERT INTO $table_name(name,subject,contact_mail,message) VALUES('$name','$subject','$contact_mail','$message')");
    echo "<script>location.replace('');</script>";
	$admin_email = get_option( 'admin_email' );
    wp_mail( $admin_email, $subject, $message." Contact Mail :".$mail, $headers );


 
 
 }

	  
	  
add_shortcode('mamurjor_contact_admin_mail','mamurjor_contact_form' );
function mamurjor_contact_form( ) {
    
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
                <input id="newsubmit" class="form-control" name="mamursubmitcontact" type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
	  
            
        </form>
		
		<?php
		
		
		return ob_get_clean();
		}
		
