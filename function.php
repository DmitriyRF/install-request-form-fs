<?php
//Set in function php

//require ( get_stylesheet_directory() . '/PageTempale_InstallationRequestForm/function.php' );


	define('MAILGUN_URL', 'https://api.mailgun.net/v3/');
	define('MAILGUN_KEY', '');
	define('MAILGUN_EMAIL', 'design.consultant@formaspace.com');
	define('MAILGUN_NAME', 'Formaspace customer');



	define('GOOGLE_RECAPCHA_2_URL', 'https://www.google.com/recaptcha/api/siteverify');
	define('GOOGLE_SECRET_KEY', '');

	


add_action( 'wp_enqueue_scripts', 'fs_form_template_files', 13 );
function fs_form_template_files() {


	if ( is_page_template( 'PageTempale_InstallationRequestForm/form-page-template.php' ) ) {


		global $wp_scripts;
		global $wp_styles;

		$styles_to_keep = array("wp-admin", "admin-bar", "dashicons", "open-sans", "avia-popup-css");

			// loop over all of the registered scripts
		foreach ($wp_styles->registered as $handle_st => $data)
		{

			if ( in_array($handle_st, $styles_to_keep) ) continue;

				// remove it
			// wp_deregister_style($handle_st);
			// wp_dequeue_style($handle_st);
		}


		foreach ($wp_scripts->registered as $handle_sc => $data)
		{
				// remove it
				// wp_deregister_script($handle_sc);
			wp_dequeue_script($handle_sc);
		}
		//  ___  __   __                                         ___          __  ___       __   __        ___    
		// |__  /  \ |__)    |  | | |    |       |__|  /\  \  / |__     |\ | /  \  |     | /__` /__` |  | |__     
		// |    \__/ |  \    |/\| | |___ |___    |  | /~~\  \/  |___    | \| \__/  |     | .__/ .__/ \__/ |___    
		                                                                                                       
		// ___  __      __   ___  ___         ___          __   ___  __           __   __       ___    __         
		//  |  /  \    |  \ |__  |__  | |\ | |__     |  | /__` |__  |__)    |    /  \ /  `  /\   |  | /  \ |\ |   
		//  |  \__/    |__/ |___ |    | | \| |___    \__/ .__/ |___ |  \    |___ \__/ \__, /~~\  |  | \__/ | \| 

		$is_mobile_flag = false;
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
		    $is_mobile_flag = true; 
		}


		wp_enqueue_style( 'fs-bootstrap', get_stylesheet_directory_uri().'/PageTempale_InstallationRequestForm/assets/bootstrap-3.3.7/css/bootstrap.css', array(), null, 'all'  );

		wp_enqueue_style( 'fs-own-datetimepicker', get_stylesheet_directory_uri().'/PageTempale_InstallationRequestForm/assets/bootstrap-datetimepicker-master/bootstrap-datetimepicker.css', array('fs-bootstrap'), null, 'all'  );


		wp_enqueue_style( 'fs-fontawesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css', array(), null, 'all'  );

		wp_enqueue_style( 'fs-styles', get_stylesheet_directory_uri().'/PageTempale_InstallationRequestForm/fs-stylesheet.css', array('fs-bootstrap'), null, 'all'  );


		wp_enqueue_script( 'jquery');

		wp_enqueue_script( 'plupload');

		wp_enqueue_script( 'fs-bootstrap', get_stylesheet_directory_uri() . '/PageTempale_InstallationRequestForm/assets/bootstrap-3.3.7/js/bootstrap.js', array('jquery'), false, false );

		wp_enqueue_script( 'fs-bootstrap-datetimepicker-moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js', array('jquery', 'fs-bootstrap'), false, false );

		wp_enqueue_script( 'fs-bootstrap-datetimepicker', get_stylesheet_directory_uri() . '/PageTempale_InstallationRequestForm/assets/bootstrap-datetimepicker-master/bootstrap-datetimepicker.min.js', array('jquery', 'fs-bootstrap', 'fs-bootstrap-datetimepicker-moment'), false, false );


		wp_enqueue_script( 'fs-script', get_stylesheet_directory_uri() . '/PageTempale_InstallationRequestForm/fs-script.js', array('jquery', 'fs-bootstrap'), false, false );

		wp_localize_script( 'fs-script', "ajax_object", array( 
			'ajax_url' => admin_url( 'admin-ajax.php'),
			'is_mobile_flag' => $is_mobile_flag

		));

	} 
}

/*
add_filter( 'wp_mail_content_type', 'filter_function_name_4869' );
function filter_function_name_4869( $content_type ){
	return 'text/html';
}
*/
add_action( 'wp_ajax_formaspace_form_to_email', 'formaspace_form_to_email' );
add_action( 'wp_ajax_nopriv_formaspace_form_to_email', 'formaspace_form_to_email' );

function formaspace_form_to_email(){


	$response_return = array();

/*
 __   __   __   __        ___     __   ___  __        __  ___  __            
/ _` /  \ /  \ / _` |    |__     |__) |__  /  `  /\  |__)  |  /  ` |__|  /\  
\__> \__/ \__/ \__> |___ |___    |  \ |___ \__, /~~\ |     |  \__, |  | /~~\ 
                                                                             
*/

	if (  isset( $_POST['g-recaptcha-response'] )  &&  !empty( $_POST['g-recaptcha-response'] )  ) {
			
		$gResponseValidation = gRecaptchaValidation( $_POST["g-recaptcha-response"] );

		if($gResponseValidation == 0){

				$response_return = array(
				    'message'  => 'You are bot!',
				    'ID'       => 1
				);

				wp_send_json($response_return);

		}
	}



	$to		=	'Dima <dmitriy_r_f@mail.ru>';

	$addresses = 'Mehmet Atesoglu <mehmet.atesoglu@formaspace.com>';

	// $to		.= ',' . $addresses;

/*
 __  ___       __  ___     __               __          __            ___  __   __        __   ___ 
/__`  |   /\  |__)  |     |__) |  | | |    |  \ | |\ | / _`     |\/| |__  /__` /__`  /\  / _` |__  
.__/  |  /~~\ |  \  |     |__) \__/ | |___ |__/ | | \| \__>     |  | |___ .__/ .__/ /~~\ \__> |___ 
                                                                                                   
*/

	$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" style="background: #a19c9a;">
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width">
  <title>My Email Templates</title>
  <style>@media only screen {
  html {
    min-height: 100%;
    background: #a19c9a;
  }
}

@media only screen and (max-width: 590px) {
  .small-float-center {
    margin: 0 auto !important;
    float: none !important;
    text-align: center !important;
  }

  .small-text-center {
    text-align: center !important;
  }
}

@media only screen and (max-width: 590px) {
  table.body table.container .show-for-large {
    display: none !important;
    width: 0;
    mso-hide: all;
    overflow: hidden;
  }
}

@media only screen and (max-width: 590px) {
  table.body img {
    width: auto;
    height: auto;
  }

  table.body center {
    min-width: 0 !important;
  }

  table.body .container {
    width: 95% !important;
  }

  table.body .columns {
    height: auto !important;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding-left: 10px !important;
    padding-right: 10px !important;
  }

  th.small-6 {
    display: inline-block !important;
    width: 50% !important;
  }

  td.small-12,
  th.small-12 {
    display: inline-block !important;
    width: 100% !important;
  }

  .columns td.small-12 {
    display: block !important;
    width: 100% !important;
  }
}</style>
  </head>';


/*
 __  ___       __  ___    ___       __        ___          __        __   __   ___  __  
/__`  |   /\  |__)  |      |   /\  |__) |    |__     |  | |__)  /\  |__) |__) |__  |__) 
.__/  |  /~~\ |  \  |      |  /~~\ |__) |___ |___    |/\| |  \ /~~\ |    |    |___ |  \ 
*/


$message .= '<body style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; background: #a19c9a; box-sizing: border-box; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important;">
    <span class="preheader" style="color: #a19c9a; display: none !important; font-size: 1px; line-height: 1px; margin: 0; max-height: 0px; max-width: 0px; mso-hide: all !important; opacity: 0; overflow: hidden; padding: 0; visibility: hidden;"></span>
    <table class="body" style="Margin: 0; background: #a19c9a; border-collapse: collapse; border-spacing: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
      <tr style="padding: 0; text-align: left; vertical-align: top;">
        <td class="center all-bg" align="center" valign="top" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background: #a19c9a; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
          <center class="all-bg" data-parsed="" style="background: #a19c9a; min-width: 580px; width: 100%;">';


/*
 __  ___       __  ___          ___       __   ___  __  
/__`  |   /\  |__)  |     |__| |__   /\  |  \ |__  |__) 
.__/  |  /~~\ |  \  |     |  | |___ /~~\ |__/ |___ |  \ 
*/
$message .='<table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table>
            <table align="center" class="container header float-center" style="Margin: 0 auto; background: #fefefe; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
              <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="10px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="small-12 large-8 columns first" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 5px; text-align: left; width: 376.66667px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <a href="https://formaspace.com" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">
                    <img class="small-float-center" src="https://formaspace.com/wp-content/uploads/images/logo.png" width="292" height="42" alt="Formaspace logo" style="-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;">
                  </a>
                </th></tr></table></th>
                <th class="small-12 large-4 columns last" valign="middle" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 5px; padding-right: 10px; text-align: left; width: 183.33333px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <p class="text-left small-text-center" style="Margin: 0; Margin-bottom: 0px; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; margin-bottom: 0px; padding: 0; text-align: left;"><b>Call for consultation:</b></p>
                      </td>
                    </tr>
                  </table>
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td class="small-12 first" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <img class="small-float-center" src="https://formaspace.com/wp-content/uploads/images/big-phone-icon.png" width="30" height="30" alt="phone-icon" style="-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;">
                      </td>
                      <td class="small-12 last small-text-center" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <span class="primary-color phone-number" style="color: #0081c3; font-size: 18px; line-height: 30px; margin: 0; padding: 0;"><b>800.251.1505</b></span>
                      </td>
                    </tr>
                  </table>
                </th></tr></table></th>
              </tr></tbody></table>
            </td></tr></tbody></table>';
/*
 ___       __              ___       __   ___  __       
|__  |\ | |  \       |__| |__   /\  |  \ |__  |__)      
|___ | \| |__/       |  | |___ /~~\ |__/ |___ |  \   
*/


/*
 __  ___       __  ___     __   __   __      
/__`  |   /\  |__)  |     |__) /  \ |  \ \ / 
.__/  |  /~~\ |  \  |     |__) \__/ |__/  |  
*/



/*	if (  isset( $_POST['deliveryPreference'] )  &&  !empty( $_POST['deliveryPreference'] )  ) {

		$message .= '<h2>';
		$message .= 'Delivery Preference';
		$message .='</h2>';
		$message .='<p>';
		switch ( $_POST['deliveryPreference'] ) {

			case 'duringWeekdays':
			$message .= 'Install during weekdays only' ;
			break;
			case 'duringWeekend':
			$message .= 'Install during weekend only' ;
			break;
			case 'noPreference':
			$message .= 'No preference' ;
			break;
			default:
			$message .= 'not checked' ;
		}
		$message .='</p>';

	}
	if (  isset( $_POST['roomEnvironmentType'] )  &&  !empty( $_POST['roomEnvironmentType'] )  ) {

		$message .= '<h2>';
		$message .= 'What type of environment are the rooms?';
		$message .='</h2>';

		foreach ($_POST['roomEnvironmentType'] as $type) {

			$message .='<p>';

			switch ( $type) {

				case 'cleanRoom':
				$message .= 'Clean room' ;
				break;
				case 'lab':
				$message .= 'Lab' ;
				break;
				case 'officeSpace':
				$message .= 'Office space' ;
				break;
				case 'activeconstruction':
				$message .= 'Active construction' ;
				break;
				default:
				$message .= 'not checked' ;
			}

			$message .='</p>';

		}
	}
	if (  isset( $_POST['isDumpsterAvailable'] )  &&  !empty( $_POST['isDumpsterAvailable'] )  ) {

		$message .= '<h2>';
		$message .= 'Is there a dumpster at the install location we can dump our debris, or do we need to haul it off?';
		$message .='</h2>';
		$message .='<p>';
		switch ( $_POST['isDumpsterAvailable'] ) {

			case 'DumpsterAvailable':
			$message .= 'Dumpster Available' ;
			break;
			case 'NoHaulOff':
			$message .= 'No' ;
			break;
			default:
			$message .= 'not checked' ;
		}
		$message .='</p>';

	}
	if (  isset( $_POST['buildingSpecifications'] )  &&  !empty( $_POST['buildingSpecifications'] )  ) {

		$message .= '<h2>';
		$message .= 'Building Specifications';
		$message .='</h2>';
		$message .='<p>';
		switch ( $_POST['buildingSpecifications'] ) {

			case 'NewConstruction':
			$message .= '<span>New Construction</span>' ;
			break;
			case 'ExistingBuilding':
			$message .= '<span>Existing Building</span>' ;
			break;
			case 'RemodelingPhase':
			$message .= '<span>Remodeling Phase</span>' ;
			break;
			default:
			$message .= 'not checked' ;
		}
		$message .='</p>';

	}
	if (  isset( $_POST['howMuchRooms'] )  &&  !empty( $_POST['howMuchRooms'] )  ) {

		$message .= '<h2>';
		$message .= 'Is the install in';
		$message .='</h2>';
		$message .='<p>';
		switch ( $_POST['howMuchRooms'] ) {

			case 'one':
			$message .= 'One room' ;
			break;
			case 'multiple':
			$message .= 'Multiple rooms' ;
			break;
			default:
			$message .= 'not checked' ;
		}
		$message .='</p>';

	}
	if( isset( $_POST['howMuchRooms'] )  &&  $_POST['howMuchRooms']  == 'multiple'){}*/

	$message .= '<table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="1px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 1px; font-weight: normal; hyphens: auto; line-height: 1px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
            <table align="center" class="container float-center" style="Margin: 0 auto; background: #fefefe; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
              <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="10px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="small-12 large-12 columns first last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; text-align: left; width: 570px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <h6 class="primary-color text-center" style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: normal; line-height: 1.3; margin: 0; margin-bottom: 5px; padding: 0; text-align: center; word-wrap: normal;">
                    <b>
                      $_POST["selectDesignConsultant"], YOUR DEDICATED DESIGN CONSULTANT, WILL CALL YOU MOMENTARILY WITH PRICING INFORMATION
                    </b>
                  </h6>
                </th>
<th class="expander" style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
              </tr></tbody></table>
            </td></tr></tbody></table>
            
            <table align="center" class="container float-center" style="Margin: 0 auto; background: #fefefe; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="small-12 large-12 columns first last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; text-align: left; width: 570px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <h5 class="text-center" style="Margin: 0; Margin-bottom: 5px; color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; line-height: 1.3; margin: 0; margin-bottom: 5px; padding: 0; text-align: center; word-wrap: normal;">Installation Request</h5>
                </th>
<th class="expander" style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
              </tr></tbody></table>
            </td></tr></tbody></table>
            
            <!-- start body -->
            <table align="center" class="container html-email-body float-center" style="Margin: 0 auto; background: #fefefe; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="small-12 large-6 columns first" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 5px; text-align: left; width: 280px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Contact Information</b></h6>
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;"> 
                        <b>Company: </b> $_POST["inputCompany"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>First Name: </b> $_POST["inputFirstName"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Last Name: </b> $_POST["inputLastName"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Phone number: </b>$_POST["inputPhone"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Email: </b> $_POST["inputEmail"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Formaspace project</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is this installation request related to a project Formaspace manufactured? </b> $_POST["isFSmanufactured"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Quote Number: </b> $_POST["inputQuoteNumber"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Version Number: </b> $_POST["inputVersionNumber"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Design Consultant: </b> $_POST["selectDesignConsultant"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Number of Benches: </b> $_POST["numberOfBenches"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Installation place</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Is there a dumpster at the install location we can dump our debris, or do we need to haul it off?</b>$_POST["isFSmanufactured"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Will there be a forklift or pallet jack available at the install site?</b>$_POST["forkliftAvailable"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is there an area for staging?</b>$_POST["stagingArea"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Building Specifications</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>What type of environment are the rooms?</b>$_POST["roomEnvironmentType"] 
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Building Specifications</b>$_POST["buildingSpecifications"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is there loading dock access?</b>$_POST["loadingDockAccess"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is loading dock standard height (48.5”)?</b>$_POST["dockStandardIs48"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Please specify height of loading dock:</b>$_POST["dockStandardIsNumber"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is there is clearance to receive a full length (54’) semi</b>$_POST["isSemiClearance"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is there a place we can park to unload (~2 hour window)?</b>$_POST["placeTounload"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is building access through a doorway?</b>$_POST["buildingAccesDoorway"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Width at narrowest point</b>$_POST["doorWaynarrowestPoint"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Are reservations for elevator needed?</b>$_POST["elevatorReservations"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Please specify, how to obtain elevator reservations?</b>$_POST["howReserveElevator"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Number of rooms</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Is the install in</b>$_POST["howMuchRooms"]
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>What is the floor number</b>(howMuchRooms=one) $_POST["floorNemberOneRoom"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Number of rooms</b>$_POST["numberOfRooms"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Are the rooms next to each other?</b>$_POST["nextEachotherRooms"]
            
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>How far apart</b>$_POST["howFarApart"]
            
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>If on different floors, distance from the elevator on each floor(distance not null)</b>$_POST["distanceFromElevator"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Ground Floor Installation</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Distance from unloading point to farthest room</b>$_POST["DistanceUpliadingFarhestPoint"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Distance from unloading point to install point</b>$_POST["distanceUpliadingtoInstallPoint"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Width of narrowest hallway and/or doorway:</b>$_POST["minWidthDoorway"]
                      </td>
                    </tr>
                  </table>
            
            
                </th></tr></table></th>
            
            
                <th class="html-email-body small-12 large-6 columns last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 5px; padding-right: 10px; text-align: left; width: 280px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Delivery Date</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Install cannot occur before </b>$_POST["deliverydateNotBefore"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Install must occur by: </b>$_POST["deliverydateMustBy"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Tentative date: </b>$_POST["deliverydatetentative"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Delivery Preference </b>$_POST["deliveryPreference"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Can we be on site during non-business hours? </b>$_POST["nonBusinessHours"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Earliest Arrival: </b>$_POST["earliestArrival"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Latest Departure: </b>$_POST["latestDeparture"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Primary Point of Contact</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Name </b>$_POST["primaryName"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>POC Mobile Number </b>+$_POST["primaryNumberPOC"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Alternate Number </b>$_POST["alternateNumberPOC"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Can the Primary Point of Contact sign off on the installation? </b>$_POST["primaryContactSignOff"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Who can be contacted? </b>$_POST["alternateContactForInstallationWho"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>How can they be contacted? </b>$_POST["alternateContactForInstallationHow"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Location</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Country </b>$_POST["inputCountry"] $_POST["inputCountryText"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Address </b>$_POST["inputAddress"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>City </b>$_POST["inputCity"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>State </b>$_POST["inputState"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Zip Code </b>$_POST["inputZipCode"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Hours of Accessibility</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Start hours</b>$_POST["StartHoursAccessibility"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>End hours</b>$_POST["EndHoursAccessibility"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Access your facility</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Do the installers require any permits or paperwork to access your facility?</b>$_POST["access_to_your_facility"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Please, describe the paperwork</b>$_POST["paperworkDescription"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Will there be photo ID requirements</b>$_POST["access_your_facility_photo"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>What kind of photo ID needed?</b>$_POST["kind_of_photo_access_facility"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        Upstairs Installation — $_POST["upstairsInstallation"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Elevator Specifications:</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Distance from unloading point to elevator</b>$_POST["elevatorDistanceUpliadingtoElevator"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Is there elevator access from offload area?</b>$_POST["elevatorAccessOffloadArea"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Please specify</b>$_POST["elevatorAccessSpecification"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Interior size of elevator</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Length</b>$_POST["elevatorInteriorLenght"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Width</b>$_POST["elevatorInteriorWidth"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Height</b>$_POST["elevatorInteriorHeight"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Door Opening</b>$_POST["elevatorInteriorDoorOpening"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Distance upstairs from elevator to install point</b>$_POST["elevatorInteriorDistanceUpstairs"]
                      </td>
                    </tr>
                  </table>
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Stair Specifications:</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Distance from unloading point to stairs</b>$_POST["stairDistanceUploadingToStairs"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Width of the stairs</b>$_POST["stairWidth"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Number of flights</b>$_POST["stairsNumberflights"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Dimensions of landings</b>$_POST["stairsDimensions"]
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <b>Distance from top of the landing to install point</b>$_POST["stairDistanceTopInstallPoint"]
                      </td>
                    </tr>
                  </table>
            
            
                </th></tr></table></th>
              </tr></tbody></table>
            
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
            
                <th class="html-email-body small-12 large-12 columns first last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; text-align: left; width: 570px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                        <h6 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left; word-wrap: normal;"><b>Additional Comment:</b></h6>
                      </td>
                    </tr>        
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       $_POST["commentMessage"]
                      </td>
                    </tr>
                  </table>
            
            
                </th>
<th class="expander" style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
              </tr></tbody></table>
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="html-email-body small-12 large-12 columns first last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; text-align: left; width: 570px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">      
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                       <b>Attachments: </b> $_FILES["attachFile"]
                      </td>
                    </tr>
                  </table>
            
            
                </th>
<th class="expander" style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
              </tr></tbody></table>
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="html-email-body tr-1-small small-12 large-12 columns first last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; text-align: left; width: 570px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
            
            
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;">
                        <h5 style="Margin: 0; Margin-bottom: 5px; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 16px; margin: 0; margin-bottom: 5px; padding: 0 0 0 0; text-align: left; word-wrap: normal;"><b>Can"t Wait?</b></h5>
                      </td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;">
                        <b>Contact your Design Consultant, First Last now!</b>
                      </td>
                    </tr>
                  </table> 
            
                  
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;"><b>Name: </b></td>
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;">Matt Rundblad $_POST["selectDesignConsultant"]</td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;"><b>Phone number: </b></td>
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;">512-919-0597 $_POST["selectDesignConsultant"]</td>
                    </tr>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;"><b>Email: </b></td>
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 110px; word-wrap: break-word;">matt.rundblad@formaspace.com $_POST["selectDesignConsultant"]</td>
                    </tr>
                  </table>
                </th>
<th class="expander" style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
              </tr></tbody></table>
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="html-email-body small-12 large-12 columns first last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; text-align: left; width: 570px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #333333; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; padding: 20px 0 0 0; text-align: left; vertical-align: top; word-wrap: break-word;"><b>Design Consultant"s Business Hours are Monday to Friday from 8am - 5pm CST.</b></td>
                    </tr>
                  </table>
                </th>
<th class="expander" style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
              </tr></tbody></table>
            </td></tr></tbody></table>';

/*
 ___       __      __   __   __              
|__  |\ | |  \    |__) /  \ |  \ \ /         
|___ | \| |__/    |__) \__/ |__/  |          
                                         
*/
/*
 __  ___       __  ___     ___  __   __  ___  ___  __  
/__`  |   /\  |__)  |     |__  /  \ /  \  |  |__  |__) 
.__/  |  /~~\ |  \  |     |    \__/ \__/  |  |___ |  \ 
*/
$message .= ' 
            <table align="center" class="container footer float-center" style="Margin: 0 auto; background: #FAFAFA; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; word-wrap: break-word;">
              <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="10px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: middle; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="small-12 large-2 columns first" valign="middle" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 5px; text-align: left; width: 86.66667px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; word-wrap: break-word;">
                        <a href="https://www.linkedin.com/company/formaspace-technical-furniture/" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">
                          <img class="float-right" src="https://formaspace.com/wp-content/uploads/images/linckedin-logo.png" width="19" height="19" alt="linkedin" style="-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; float: right; max-width: 100%; outline: none; text-align: right; text-decoration: none; width: auto;">
                        </a>
                      </td>
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; word-wrap: break-word;">
                        <a href="https://www.facebook.com/Formaspacecom/" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">
                          <img class="float-center" src="https://formaspace.com/wp-content/uploads/images/facebook-logo.png" width="19" height="19" alt="facebook" style="-ms-interpolation-mode: bicubic; Margin: 0 auto; border: none; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;">
                        </a>
                      </td>
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; word-wrap: break-word;">
                        <a href="https://www.pinterest.com/formaspace/" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">
                          <img class="float-left" src="https://formaspace.com/wp-content/uploads/images/pinterest-logo.png" width="20" height="19" alt="pinterest" style="-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; float: left; max-width: 100%; outline: none; text-align: left; text-decoration: none; width: auto;">
                        </a>
                      </td>
                      <td class="vertical-line show-for-large" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background: #a19c9a; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; width: 1px; word-wrap: break-word;"></td>
                    </tr>
                  </table>
                </th></tr></table></th>
            
                <th class="small-12 large-2 columns" valign="middle" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 5px; padding-right: 5px; text-align: left; width: 86.66667px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <table class="icon-and-contact" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; width: 20px; word-wrap: break-word;">
                        <img class="small-float-left float-center" src="https://formaspace.com/wp-content/uploads/images/small-phone-icon.png" width="19" height="19" alt="phone" style="-ms-interpolation-mode: bicubic; Margin: 0 auto; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;">
                      </td>
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0 0 0 5px; text-align: left; vertical-align: middle; word-wrap: break-word;">
                        <a class="" href="tel:18002511505" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; margin: 0; padding: 0; text-align: left; text-decoration: none;">800.251.1505</a>
                      </td>
                      <td class="vertical-line show-for-large" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background: #a19c9a; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; width: 1px; word-wrap: break-word;"></td>
                    </tr>
                  </table>
                </th></tr></table></th>
            
                <th class="small-12 large-4 columns" valign="middle" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 5px; padding-right: 5px; text-align: left; width: 183.33333px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <table class="icon-and-contact" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; width: 20px; word-wrap: break-word;">
                        <img class="small-float-left float-center" src="https://formaspace.com/wp-content/uploads/images/email-icon.png" width="19" height="19" alt="email" style="-ms-interpolation-mode: bicubic; Margin: 0 auto; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;">
                      </td>
                      <td valign="middle" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0 0 0 5px; text-align: left; vertical-align: middle; word-wrap: break-word;">
                        <a class="" href="mailto:design.consultant@formaspace.com" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; margin: 0; padding: 0; text-align: left; text-decoration: none;">design.consultant@formaspace.com</a>
                      </td>
                      <td class="vertical-line show-for-large" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; background: #a19c9a; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; width: 1px; word-wrap: break-word;"></td>
                    </tr>
                  </table>
                </th></tr></table></th>
            
                <th class="small-12 large-3 columns last" valign="middle" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 5px; padding-right: 10px; text-align: left; width: 135px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <table class="icon-and-contact" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: middle; width: 20px; word-wrap: break-word;">
                        <img class="small-float-left float-center" src="https://formaspace.com/wp-content/uploads/images/geo-point-icon.png" width="19" height="19" alt="geo-location" style="-ms-interpolation-mode: bicubic; Margin: 0 auto; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto;">
                      </td>
                      <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0 0 0 5px; text-align: left; vertical-align: middle; word-wrap: break-word;">
                        <span style="margin: 0; padding: 0;">Made in the USA</span>
                        <span style="margin: 0; padding: 0;">1100 E Howard Lane # 400<br>Austin, TX 78753</span>
                      </td>
                    </tr>
                  </table>
                </th></tr></table></th>
            
              </tr></tbody></table>
            
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="small-12 large-12 columns first last" style="Margin: 0 auto; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; text-align: left; width: 570px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <p class="footer-messsage text-center no-block" style="Margin: 0; Margin-bottom: 0px; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 12px; font-weight: normal; line-height: 13px; margin: 0; margin-bottom: 0px; padding: 0; text-align: center;">This message was sent by
                  <a class="no-block" href="https://formaspace.com/upgrade-your-lab-and-classroom/?utm_source=pardot&amp;utm_medium=email&amp;utm_campaign=reminder-universities-041216&amp;utm_term=footer" target="_blank" rel=" noopener noreferrer" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">Formaspace, LP</a>
                  Parts of this message may contain promotional information about Formaspace and its products.</p>
                </th>
<th class="expander" style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 !important; text-align: left; visibility: hidden; width: 0;"></th></tr></table></th>
              </tr></tbody></table>
            
              <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;">
                <th class="vertical-border-right equal-padding small-6 large-6 columns first" valign="middle" style="Margin: 0 auto; border-right: 1px solid #a19c9a; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 5px 10px 5px 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 5px; text-align: left; width: 280px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: right;">
                  <a class="primary-color email-standart-link" href="#" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 5px 0 5px; text-align: left; text-decoration: none;"> <span class="text-right" style="margin: 0; padding: 0; text-align: right;">Unsubscribe</span></a>
                </th></tr></table></th>
                <th class="vertical-border-left equal-padding small-6 large-6 columns last" valign="middle" style="Margin: 0 auto; border-left: 1px solid #a19c9a; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 5px 10px 5px 10px; padding-bottom: 10px; padding-left: 5px; padding-right: 10px; text-align: left; width: 280px;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left;">
                  <a class="primary-color email-standart-link" href="#" style="Margin: 0; color: #0081c3; font-family: Helvetica, Arial, sans-serif; font-size: 9px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0 5px 0 5px; text-align: left; text-decoration: none;"> <span class="text-left" style="margin: 0; padding: 0; text-align: left;">View in browser</span></a>
                </th></tr></table></th>
              </tr></tbody></table>
              <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="10px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 10px; font-weight: normal; hyphens: auto; line-height: 10px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: middle; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
            </td></tr></tbody></table>
            
            <table class="spacer float-center" style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #a19c9a; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table> 
';
/*
 ___       __      ___  __   __  ___  ___  __          
|__  |\ | |  \    |__  /  \ /  \  |  |__  |__)         
|___ | \| |__/    |    \__/ \__/  |  |___ |  \         
                                                       
*/
/*
 ___       __     ___       __        ___          __        __   __   ___  __  
|__  |\ | |  \     |   /\  |__) |    |__     |  | |__)  /\  |__) |__) |__  |__) 
|___ | \| |__/     |  /~~\ |__) |___ |___    |/\| |  \ /~~\ |    |    |___ |  \ 
*/

$message .= '          </center>
        </td>
      </tr>
    </table>
    </body>';



/*
 ___       __      __               __          __            ___  __   __        __   ___ 
|__  |\ | |  \    |__) |  | | |    |  \ | |\ | / _`     |\/| |__  /__` /__`  /\  / _` |__  
|___ | \| |__/    |__) \__/ | |___ |__/ | | \| \__>     |  | |___ .__/ .__/ /~~\ \__> |___ 
                                                                                           
*/


$message .= '</html>';



	if ( ! function_exists( 'wp_handle_upload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}


	if (  isset( $_FILES['attachFile'] )  &&  !empty( $_FILES['attachFile'] )  ) {

		$error = array();
		$attachments = array();

		$_FILES_FORMAT = reArrayFiles( $_FILES['attachFile'] ) ;

		foreach( $_FILES_FORMAT as  $key => $file )
		{

			$upload_overrides = array( 'test_form' => false ); // DEFAULT

			$uploadedfile = $file;

			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides,  (string)date("Y/m") );

			

			if ( $movefile && ! isset( $movefile['error'] ) ) {
					$attachments[] = $movefile['file'];
			} else {
				$error[] =  $movefile['error'];

			}

		}

		$response_return = array(
		    'message'  => $error,
		    'ID'       => 1
		);

	}


	$subject = 'Installation Request Form ___(server time:) ' . (string)date("Y-m-d h:i:sa");

	$headers = array('Content-Type: text/html; charset=UTF-8','mehmet.atesoglu@formaspace.com');

	$tag	=	'InstallationRequest';

	$response_return['mailgun_team'] =  sendmailbymailgun($to,$subject,$message,$tag,$attachments);

	$response_return['attachments'] =  $attachments;

	$toCustomer = $customerFirstName .' '. $customerLastName .' <'. $customerEmail .'>';

	// $response_return['mailgun_customer'] =  sendmailbymailgun($toCustomer,$subject,$message,$tag,$attachments);

	// print_r( $attachments );

	// foreach($attachments as $deletion_file ){

	// 	unlink($deletion_file); //delete file
	// }

	wp_send_json($response_return);
	
	
	die('');
}




function sendmailbymailgun($to,$subject,$html,$tag,$attachments){

    $array_data = array(
		'from'=> MAILGUN_NAME .'<'.MAILGUN_EMAIL.'>',
		'to'=>$to,
		'subject'=>$subject,
		'html'=>$html,
		'o:tracking'=>'yes',
		'o:tracking-clicks'=>'yes',
		'o:tracking-opens'=>'yes',
		'o:tag'=>$tag,
    );

    $session = curl_init(MAILGUN_URL.'/messages');
    curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  	curl_setopt($session, CURLOPT_USERPWD, 'api:'.MAILGUN_KEY);
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);

    // curl_setopt($session, CURLOPT_POSTFIELDS, $attachments);

    $response = curl_exec($session);
    curl_close($session);

    $results = json_decode($response, true);

    return $results;
}


function gRecaptchaValidation($gResponse){

	$data = array(

		'secret' => GOOGLE_SECRET_KEY,
		'response' => $gResponse
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);

	$verify = file_get_contents( GOOGLE_RECAPCHA_2_URL , false, $context);

	$captcha_success=json_decode($verify);

	if ($captcha_success->success==false) {
		return 0;
	} else if ($captcha_success->success==true) {
		return 1;
	}

}




function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}