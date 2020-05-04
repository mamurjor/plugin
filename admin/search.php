<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



add_action('admin_menu', 'mamurjor_contact_form_admin');
function mamurjor_contact_form_admin() {
add_menu_page('contact', 'mamurjor contact list', 'manage_options', 'contact','mamurjor_contact_form_admin_page', 'dashicons-email');




}


function mamurjor_contact_form_admin_page() {
	
	global $wpdb;		
		$table_name=$wpdb->prefix.'mamurjor_contact';
	 if (isset($_GET['contactdel'])) {
	   $del_id = sanitize_text_field($_GET['contactdel']);
    
    $wpdb->query("DELETE FROM $table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=contact');</script>";
  }
        $search = $wpdb->get_results("SELECT * FROM $table_name ");
        
		?>
		<section class="wrapper">
        <h2> <?php esc_html_e( 'Just copy and paste this shortcode [mamurjor_contact_admin_without_mail] [mamurjor_contact_admin_mail]', 'mamurjor_simple_contact_form' ); ?> </h2>
        
	
		<div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th> <?php esc_html_e( 'Serial No.', 'mamurjor_simple_contact_form' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_simple_contact_form' ); ?></th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Subject', 'mamurjor_simple_contact_form' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Contact mail', 'mamurjor_simple_contact_form' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Message', 'mamurjor_simple_contact_form' ); ?></th>
                  <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_simple_contact_form' ); ?></th>
                 
                  </tr>
                </thead>
                <tbody>
		
				<?php foreach($search as $print) 
				{
					?>
                  
                  <tr class="gradeC">
                    <td><?php esc_html_e( $serial+=1, 'mamurjor_simple_contact_form' ); ?> </td>
                   
                   
                    <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_simple_contact_form' ); ?></td>
                   
                    <td class="center hidden-phone"><?php esc_html_e( $print->subject, 'mamurjor_simple_contact_form' ); ?></td>
                    <td class="center hidden-phone"><?php esc_html_e( $print->contact_mail, 'mamurjor_simple_contact_form' ); ?></td>
                    <td class="center hidden-phone"><?php esc_html_e( $print->message, 'mamurjor_simple_contact_form' ); ?></td>
                   <td > <a href='admin.php?page=contact&contactdel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_simple_contact_form' ); ?></button></a></td>
                  
                  </tr>
           	<?php 
         }
      
    ?>   
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
		
	
  </div>
  <?php
}
		
