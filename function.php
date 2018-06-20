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

	$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
					<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
					<head>
						<meta charset="UTF-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<title>Title</title>
					</head>
					<body>';


/*
 __  ___       __  ___    ___       __        ___          __        __   __   ___  __  
/__`  |   /\  |__)  |      |   /\  |__) |    |__     |  | |__)  /\  |__) |__) |__  |__) 
.__/  |  /~~\ |  \  |      |  /~~\ |__) |___ |___    |/\| |  \ /~~\ |    |    |___ |  \ 
*/


$message .= '<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%; background:#A19C9A; margin:0; padding:0;">
				<tr> <!-- 1 -->
					<td height="100%">
						<div align="center">
							<table border="0" cellspacing="0" cellpadding="0" width="600" style="max-width: 600px; width: 100%; background:white; margin:0 auto; padding:0;">';


/*
 __  ___       __  ___          ___       __   ___  __  
/__`  |   /\  |__)  |     |__| |__   /\  |  \ |__  |__) 
.__/  |  /~~\ |  \  |     |  | |___ /~~\ |__/ |___ |  \ 
*/
$message .='<tr><!-- 2 -->
				<td style="padding:7px 10px 7px 10px">
					<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100% margin:0; padding:0;">
							<tr><!-- 3 -->

								<td width="400" style="width:100%; max-width:400px;padding:0; margin:0;">
									<a href="https://formaspace.com/" target="_blank" rel="noopener noreferrer" style="display: block;">

											<img border="0" width="292" height="42" style=" display:block;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=Py0CnHnCTn9z_dhTav1zkQ&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9sb2dvLTAxLnBuZw~~&amp;is_https=1" alt="FORMASPACE">
										</span>
									</a>
								</td>
								<td width="200" style="width:100%; max-width:200px; padding:0; margin:0;">
									<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100% margin:0; padding:0;">
										<tr><!-- 4 -->
											<td>
												<span style="color:#615E5C; font: 15px Arial, sans-serif; line-height: 30px; -webkit-text-size-adjust:none; display:block;"><b>Call for consultation:</b></span>
											</td>
										</tr><!-- 4 -->
										<tr><!-- 4 -->
											<td >
												<table border="0" cellspacing="0" cellpadding="0">
													<tr><!-- 5 -->
														<td>
															<img border="0" width="29" height="29" style=" display:block; margin:0 10px 0 0;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=85cO9yBFr-lLHowWpgCiRg&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9pY28tdGVsLTAxLnBuZw~~&amp;is_https=1">
														</td>
														<td>
															<span style="font-size:13.5pt;font-family:"Arial",sans-serif;color:#0081C3">
																<a target="_blank" rel=" noopener noreferrer">
																	<span style="color:#0081C3">
																		<span class="js-phone-number"><b>800.251.1505</b></span>
																	</span>
																</a>
															</span>
														</td>
													</tr><!-- 5 -->
												</table>
											</td>
										</tr><!-- 4 -->
									</table>
								</td>
							</tr><!-- 3 -->
					</table>
				</td>
			</tr><!-- 2 -->';
/*
 ___       __              ___       __   ___  __       
|__  |\ | |  \       |__| |__   /\  |  \ |__  |__)      
|___ | \| |__/       |  | |___ /~~\ |__/ |___ |  \   
*/


/*
 __  ___       __  ___          __  
/__`  |   /\  |__)  |     |__| |__) 
.__/  |  /~~\ |  \  |     |  | |  \ 
*/
$message .='<tr><!-- 2 -->
				<td style="background:#CCCCCC;padding:0;height:1px width: 100%;">
						<span style="font-size:1.0; display:block;height:1px; width:100;"></span>
				</td>
			</tr>';
/*                                    
 ___       __           __          
|__  |\ | |  \    |__| |__)         
|___ | \| |__/    |  | |  \         
                              
*/
$message .='<tr><!-- 2 -->
				<td>';

/*
 __  ___       __  ___     __   __   __      
/__`  |   /\  |__)  |     |__) /  \ |  \ \ / 
.__/  |  /~~\ |  \  |     |__) \__/ |__/  |  
*/


	if (  isset( $_POST['inputCompany'] )  &&  !empty( $_POST['inputCompany'] )  ) {

		$message .= '<h2>';
		$message .= 'Company';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputCompany'];
		$message .='</p>';
		// $message .='<br>';

	}
	if (  isset( $_POST['inputFirstName'] )  &&  !empty( $_POST['inputFirstName'] )  ) {

		$message .= '<h2>';
		$message .= 'First Name';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputFirstName'];
		$customerFirstName = $_POST['inputFirstName'];
		$message .='</p>';

	}
	if (  isset( $_POST['inputLastName'] )  &&  !empty( $_POST['inputLastName'] )  ) {

		$message .= '<h2>';
		$message .= 'Last Name';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputLastName'];
		$customerLastName = $_POST['inputLastName'];
		$message .='</p>';

	}
	if (  isset( $_POST['inputPhone'] )  &&  !empty( $_POST['inputPhone'] )  ) {

		$message .= '<h2>';
		$message .= 'Phone number';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputPhone'];
		$message .='</p>';

	}
	if (  isset( $_POST['inputEmail'] )  &&  !empty( $_POST['inputEmail'] )  ) {

		$message .= '<h2>';
		$message .= 'Email';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputEmail'];
		$customerEmail = $_POST['inputEmail'];
		$message .='</p>';

	}

	if (  isset( $_POST['isFSmanufactured'] )  &&  !empty( $_POST['isFSmanufactured'] )  ) {

		$message .= '<h2>';
		$message .= 'Is this installation request related to a project Formaspace manufactured?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['isFSmanufactured'];
		$message .='</p>';

	}

	if (  isset( $_POST['inputQuoteNumber'] )  &&  !empty( $_POST['inputQuoteNumber'] )  ) {

		$message .= '<h2>';
		$message .= 'Quote Number';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputQuoteNumber'];
		$message .='</p>';

	}

	if (  isset( $_POST['inputVersionNumber'] )  &&  !empty( $_POST['inputVersionNumber'] )  ) {

		$message .= '<h2>';
		$message .= 'Version Number';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputVersionNumber'];
		$message .='</p>';

	}

	if (  isset( $_POST['selectDesignConsultant'] )  &&  !empty( $_POST['selectDesignConsultant'] )  ) {

		$message .= '<h2>';
		$message .= 'Design Consultant';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['selectDesignConsultant'];
		$message .='</p>';

	}

	if (  isset( $_POST['numberOfBenches'] )  &&  !empty( $_POST['numberOfBenches'] )  ) {

		$message .= '<h2>';
		$message .= 'Number of Benches';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['numberOfBenches'];
		$message .='</p>';

	}

	if (  isset( $_POST['deliverydateNotBefore'] )  &&  !empty( $_POST['deliverydateNotBefore'] )  ) {

		$message .= '<h2>Delivery Date</h2>';
		$message .= '<h2>';
		$message .= 'Install cannot occur before';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['deliverydateNotBefore'];
		$message .='</p>';

	}

	if (  isset( $_POST['deliverydateMustBy'] )  &&  !empty( $_POST['deliverydateMustBy'] )  ) {

		$message .= '<h2>Delivery Date</h2>';
		$message .= '<h2>';
		$message .= 'Install must occur by:';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['deliverydateMustBy'];
		$message .='</p>';

	}

	if (  isset( $_POST['deliverydatetentative'] )  &&  !empty( $_POST['deliverydatetentative'] )  ) {

		$message .= '<h2>Delivery Date</h2>';
		$message .= '<h2>';
		$message .= 'Tentative date:';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['deliverydatetentative'];
		$message .='</p>';

	}

	if (  isset( $_POST['deliveryPreference'] )  &&  !empty( $_POST['deliveryPreference'] )  ) {

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

	if (  isset( $_POST['nonBusinessHours'] )  &&  !empty( $_POST['nonBusinessHours'] )  ) {

		$message .= '<h2>';
		$message .= 'Can we be on site during non-business hours?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['nonBusinessHours'];
		$message .='</p>';

	}

	if (  isset( $_POST['earliestArrival'] )  &&  !empty( $_POST['earliestArrival'] )  ) {

		$message .= '<h2>';
		$message .= 'Earliest Arrival: ';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['earliestArrival'];
		$message .='</p>';

	}

	if (  isset( $_POST['latestDeparture'] )  &&  !empty( $_POST['latestDeparture'] )  ) {

		$message .= '<h2>';
		$message .= 'Latest Departure: ';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['latestDeparture'];
		$message .='</p>';

	}

	if (  isset( $_POST['primaryName'] )  &&  !empty( $_POST['primaryName'] )  ) {

		$message .= '<h2>Primary Point of Contact</h2>';
		$message .= '<h2>';
		$message .= 'Name';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['primaryName'];
		$message .='</p>';

	}

	if (  isset( $_POST['primaryNumberPOC'] )  &&  !empty( $_POST['primaryNumberPOC'] )  ) {

		$message .= '<h2>';
		$message .= 'POC Mobile Number';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['primaryNumberPOC'];
		$message .='</p>';

	}

	if (  isset( $_POST['alternateNumberPOC'] )  &&  !empty( $_POST['alternateNumberPOC'] )  ) {

		$message .= '<h2>';
		$message .= 'Alternate Number';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['alternateNumberPOC'];
		$message .='</p>';

	}

	if (  isset( $_POST['primaryContactSignOff'] )  &&  !empty( $_POST['primaryContactSignOff'] )  ) {

		$message .= '<h2>';
		$message .= 'Can the Primary Point of Contact sign off on the installation?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['primaryContactSignOff'];
		$message .='</p>';

	}

	if (  isset( $_POST['alternateContactForInstallationWho'] )  &&  !empty( $_POST['alternateContactForInstallationWho'] )  ) {

		$message .= '<h2>';
		$message .= 'Who can be contacted?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['alternateContactForInstallationWho'];
		$message .='</p>';

	}

	if (  isset( $_POST['alternateContactForInstallationHow'] )  &&  !empty( $_POST['alternateContactForInstallationHow'] )  ) {

		$message .= '<h2>';
		$message .= 'How can they be contacted?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['alternateContactForInstallationHow'];
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





























	if (  isset( $_POST['inputCountry'] )  &&  !empty( $_POST['inputCountry'] )  ) {

		if( $_POST['inputCountry'] != 'other'){

			$message .= '<h2>';
			$message .= 'Country';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['inputCountry'];
			$message .='</p>';
		}
		if (  isset( $_POST['inputCountryText'] )  &&  !empty( $_POST['inputCountryText'] )  ) {

			$message .= '<h2>';
			$message .= 'Country';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['inputCountryText'];
			$message .='</p>';

		}

	}

	if (  isset( $_POST['inputAddress'] )  &&  !empty( $_POST['inputAddress'] )  ) {

		$message .= '<h2>';
		$message .= 'Address';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputAddress'];
		$message .='</p>';

	}

	if (  isset( $_POST['inputCity'] )  &&  !empty( $_POST['inputCity'] )  ) {

		$message .= '<h2>';
		$message .= 'City';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputCity'];
		$message .='</p>';

	}

	if (  isset( $_POST['inputState'] )  &&  !empty( $_POST['inputState'] )  ) {

		$message .= '<h2>';
		$message .= 'State';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputState'];
		$message .='</p>';

	}

	if (  isset( $_POST['inputZipCode'] )  &&  !empty( $_POST['inputZipCode'] )  ) {

		$message .= '<h2>';
		$message .= 'Zip Code';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputZipCode'];
		$message .='</p>';

	}

	if (  isset( $_POST['StartHoursAccessibility'] )  &&  !empty( $_POST['StartHoursAccessibility'] )  ) {

		$message .= '<h2>Hours of Accessibility</h2>';
		$message .= '<h2>';
		$message .= 'Start hours';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['StartHoursAccessibility'];
		$message .='</p>';

	}

	if (  isset( $_POST['EndHoursAccessibility'] )  &&  !empty( $_POST['EndHoursAccessibility'] )  ) {

		$message .= '<h2>';
		$message .= 'End hours';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['EndHoursAccessibility'];
		$message .='</p>';

	}

	if (  isset( $_POST['access_to_your_facility'] )  &&  !empty( $_POST['access_to_your_facility'] )  ) {

		$message .= '<h2>';
		$message .= 'Do the installers require any permits or paperwork to access your facility?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['access_to_your_facility'];
		$message .='</p>';

	}

	if (  isset( $_POST['paperworkDescription'] )  &&  !empty( $_POST['paperworkDescription'] )  ) {

		$message .= '<h2>';
		$message .= 'Please, describe the paperwork';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['paperworkDescription'];
		$message .='</p>';

	}

	if (  isset( $_POST['access_your_facility_photo'] )  &&  !empty( $_POST['access_your_facility_photo'] )  ) {

		$message .= '<h2>';
		$message .= 'Will there be photo ID requirements';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['access_your_facility_photo'];
		$message .='</p>';

	}

	if (  isset( $_POST['kind_of_photo_access_facility'] )  &&  !empty( $_POST['kind_of_photo_access_facility'] )  ) {

		$message .= '<h2>';
		$message .= 'What kind of photo ID needed?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['kind_of_photo_access_facility'];
		$message .='</p>';

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
	if (  isset( $_POST['forkliftAvailable'] )  &&  !empty( $_POST['forkliftAvailable'] )  ) {

		$message .= '<h2>';
		$message .= 'Will there be a forklift or pallet jack available at the install site?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['forkliftAvailable'];
		$message .='</p>';

	}
	if (  isset( $_POST['stagingArea'] )  &&  !empty( $_POST['stagingArea'] )  ) {

		$message .= '<h2>';
		$message .= 'Is there an area for staging?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['stagingArea'];
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
	if (  isset( $_POST['loadingDockAccess'] )  &&  !empty( $_POST['loadingDockAccess'] )  ) {

		$message .= '<h2>';
		$message .= 'Is there loading dock access?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['loadingDockAccess'];
		$message .='</p>';

	}
	if (  isset( $_POST['dockStandardIs48'] )  &&  !empty( $_POST['dockStandardIs48'] )  ) {

		$message .= '<h2>';
		$message .= 'Is loading dock standard height (48.5”)?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['dockStandardIs48'];
		$message .='</p>';

	}
	if (  isset( $_POST['dockStandardIsNumber'] )  &&  !empty( $_POST['dockStandardIsNumber'] )  ) {

		$message .= '<h2>';
		$message .= 'Please specify height of loading dock:';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['dockStandardIsNumber'];
		$message .='</p>';

	}
	if (  isset( $_POST['isSemiClearance'] )  &&  !empty( $_POST['isSemiClearance'] )  ) {

		$message .= '<h2>';
		$message .= 'Is there is clearance to receive a full length (54’) semi';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['isSemiClearance'];
		$message .='</p>';

	}
	if (  isset( $_POST['placeTounload'] )  &&  !empty( $_POST['placeTounload'] )  ) {

		$message .= '<h2>';
		$message .= 'Is there a place we can park to unload (~2 hour window)?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['placeTounload'];
		$message .='</p>';

	}
	if (  isset( $_POST['buildingAccesDoorway'] )  &&  !empty( $_POST['buildingAccesDoorway'] )  ) {

		$message .= '<h2>';
		$message .= 'Is building access through a doorway?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['buildingAccesDoorway'];
		$message .='</p>';

	}
	if (  isset( $_POST['doorWaynarrowestPoint'] )  &&  !empty( $_POST['doorWaynarrowestPoint'] )  ) {

		$message .= '<h2>';
		$message .= 'Width at narrowest point';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['doorWaynarrowestPoint'];
		$message .='</p>';

	}
	if (  isset( $_POST['elevatorReservations'] )  &&  !empty( $_POST['elevatorReservations'] )  ) {

		$message .= '<h2>';
		$message .= 'Are reservations for elevator needed?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['elevatorReservations'];
		$message .='</p>';

	}
	if (  isset( $_POST['howReserveElevator'] )  &&  !empty( $_POST['howReserveElevator'] )  ) {

		$message .= '<h2>';
		$message .= 'Please specify, how to obtain elevator reservations?';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['howReserveElevator'];
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
	if( isset( $_POST['howMuchRooms'] )  &&  $_POST['howMuchRooms']  == 'one'){


		if (  isset( $_POST['floorNemberOneRoom'] )  &&  !empty( $_POST['floorNemberOneRoom'] )  ) {

			$message .= '<h2>';
			$message .= 'What is the floor number';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['floorNemberOneRoom'];
			$message .='</p>';

		}
	}

	if( isset( $_POST['howMuchRooms'] )  &&  $_POST['howMuchRooms']  == 'multiple'){


		if (  isset( $_POST['numberOfRooms'] )  &&  !empty( $_POST['numberOfRooms'] )  ) {

			$message .= '<h2>';
			$message .= 'Number of rooms';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['numberOfRooms'];
			$message .='</p>';

		}
		if (  isset( $_POST['nextEachotherRooms'] )  &&  !empty( $_POST['nextEachotherRooms'] )  ) {

			$message .= '<h2>';
			$message .= 'Are the rooms next to each other?';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['nextEachotherRooms'];
			$message .='</p>';

		}
		if (  isset( $_POST['howFarApart'] )  &&  !empty( $_POST['howFarApart'] )  ) {

			$message .= '<h2>';
			$message .= 'How far apart';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['howFarApart'];
			$message .='</p>';

		}

		if (  isset( $_POST['distanceFromElevator'] )  &&  !empty( $_POST['distanceFromElevator'] )  ) {

			$message .= '<h2>';
			$message .= 'If on different floors, distance from the elevator on each floor(distance not null)';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['distanceFromElevator'];
			$message .='</p>';

		}
		if (  isset( $_POST['DistanceUpliadingFarhestPoint'] )  &&  !empty( $_POST['DistanceUpliadingFarhestPoint'] )  ) {

			$message .= '<h2>';
			$message .= 'Distance from unloading point to farthest room';
			$message .='</h2>';
			$message .='<p>';
			$message .= $_POST['DistanceUpliadingFarhestPoint'];
			$message .='</p>';

		}
	}
	if (  isset( $_POST['distanceUpliadingtoInstallPoint'] )  &&  !empty( $_POST['distanceUpliadingtoInstallPoint'] )  ) {

		$message .= '<h2>';
		$message .= 'Distance from unloading point to install point';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['distanceUpliadingtoInstallPoint'];
		$message .='</p>';

	}
	if (  isset( $_POST['minWidthDoorway'] )  &&  !empty( $_POST['minWidthDoorway'] )  ) {

		$message .= '<h2>';
		$message .= 'Width of narrowest hallway and/or doorway:';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['minWidthDoorway'];
		$message .='</p>';

	}



























	if (  isset( $_POST['upstairsInstallation'] )  &&  !empty( $_POST['upstairsInstallation'] )  ) {

		$message .= '<h2>';
		$message .= 'Upstairs Installation';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['upstairsInstallation'];
		$message .='</p>';

		if($_POST['upstairsInstallation'] == 'yes'){

			if (  isset( $_POST['elevatorDistanceUpliadingtoElevator'] )  &&  !empty( $_POST['elevatorDistanceUpliadingtoElevator'] )  ) {

				$message .= '<h2>';
				$message .= 'Distance from unloading point to elevator';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorDistanceUpliadingtoElevator'];
				$message .='</p>';

			}
			if (  isset( $_POST['elevatorAccessOffloadArea'] )  &&  !empty( $_POST['elevatorAccessOffloadArea'] )  ) {

				$message .= '<h2>';
				$message .= 'Is there elevator access from offload area?';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorAccessOffloadArea'];
				$message .='</p>';

			}
			if (  isset( $_POST['elevatorAccessSpecification'] )  &&  !empty( $_POST['elevatorAccessSpecification'] )  ) {

				$message .= '<h2>';
				$message .= 'Please specify';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorAccessSpecification'];
				$message .='</p>';

			}
			$message .='<h2>Interior size of elevator</h2>';

			if (  isset( $_POST['elevatorInteriorLenght'] )  &&  !empty( $_POST['elevatorInteriorLenght'] )  ) {

				$message .= '<h2>';
				$message .= 'Length';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorInteriorLenght'];
				$message .='</p>';

			}
			if (  isset( $_POST['elevatorInteriorWidth'] )  &&  !empty( $_POST['elevatorInteriorWidth'] )  ) {

				$message .= '<h2>';
				$message .= 'Width';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorInteriorWidth'];
				$message .='</p>';

			}
			if (  isset( $_POST['elevatorInteriorHeight'] )  &&  !empty( $_POST['elevatorInteriorHeight'] )  ) {

				$message .= '<h2>';
				$message .= 'Height';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorInteriorHeight'];
				$message .='</p>';

			}
			if (  isset( $_POST['elevatorInteriorDoorOpening'] )  &&  !empty( $_POST['elevatorInteriorDoorOpening'] )  ) {

				$message .= '<h2>';
				$message .= 'Door Opening';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorInteriorDoorOpening'];
				$message .='</p>';

			}
			if (  isset( $_POST['elevatorInteriorDistanceUpstairs'] )  &&  !empty( $_POST['elevatorInteriorDistanceUpstairs'] )  ) {

				$message .= '<h2>';
				$message .= 'Distance upstairs from elevator to install point';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['elevatorInteriorDistanceUpstairs'];
				$message .='</p>';

			}

			$message .='<h2>Stair Specifications:</h2>';


			if (  isset( $_POST['stairDistanceUploadingToStairs'] )  &&  !empty( $_POST['stairDistanceUploadingToStairs'] )  ) {

				$message .= '<h2>';
				$message .= 'Distance from unloading point to stairs';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['stairDistanceUploadingToStairs'];
				$message .='</p>';

			}
			if (  isset( $_POST['stairWidth'] )  &&  !empty( $_POST['stairWidth'] )  ) {

				$message .= '<h2>';
				$message .= 'Width of the stairs';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['stairWidth'];
				$message .='</p>';

			}
			if (  isset( $_POST['stairsNumberflights'] )  &&  !empty( $_POST['stairsNumberflights'] )  ) {

				$message .= '<h2>';
				$message .= 'Number of flights';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['stairsNumberflights'];
				$message .='</p>';

			}
			if (  isset( $_POST['stairsDimensions'] )  &&  !empty( $_POST['stairsDimensions'] )  ) {

				$message .= '<h2>';
				$message .= 'Dimensions of landings';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['stairsDimensions'];
				$message .='</p>';

			}
			if (  isset( $_POST['stairDistanceTopInstallPoint'] )  &&  !empty( $_POST['stairDistanceTopInstallPoint'] )  ) {

				$message .= '<h2>';
				$message .= 'Distance from top of the landing to install point';
				$message .='</h2>';
				$message .='<p>';
				$message .= $_POST['stairDistanceTopInstallPoint'];
				$message .='</p>';

			}
		}
	}
	if (  isset( $_POST['commentMessage'] )  &&  !empty( $_POST['commentMessage'] )  ) {

		$message .= '<h2>';
		$message .= 'Additional Comment';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['commentMessage'];
		$message .='</p>';

	}

/*
 ___       __      __   __   __              
|__  |\ | |  \    |__) /  \ |  \ \ /         
|___ | \| |__/    |__) \__/ |__/  |          
                                         
*/

$message .='	</td>
			</tr>';
/*
 __  ___       __  ___     ___  __   __  ___  ___  __  
/__`  |   /\  |__)  |     |__  /  \ /  \  |  |__  |__) 
.__/  |  /~~\ |  \  |     |    \__/ \__/  |  |___ |  \ 
*/
$message .= '<tr>
				<td style="background:#FAFAFA;padding:7px 10px 7px 10px">
					<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%; padding:0; margin:0;">
						
							<tr>
								<td style="padding:0in 0in 5.25pt 0in">
									<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100% padding:0; margin:0;">
										
											<tr>
												<td width="83" style="width:62.25pt;padding:0">
													<table border="0" cellspacing="0" cellpadding="0"  style="padding:0; margin:0; width:100%;">
														
															<tr>
																<td style="padding:0 0 0 2px">
																	<a href="https://www.linkedin.com/company/447373?utm_source=pardot&amp;utm_medium=email&amp;utm_campaign=reminder-universities-041216" target="_blank" rel=" noopener noreferrer" style="display: block;">
																		<img border="0" width="19" height="19" style="display: block;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=lmhBJNsF9bzP6d9r6EK1uQ&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9pY28tbGlua2VkaW4ucG5n&amp;is_https=1" alt="in">
																	</a>
																</td>

																<td style="padding:0 0 0 2px">
																	<a href="https://www.facebook.com/Formaspace-23103602282/?utm_source=pardot&amp;utm_medium=email&amp;utm_campaign=reminder-universities-041216" target="_blank" rel=" noopener noreferrer" style="display: block;">
																		<img border="0" width="19" height="19" style="display: block;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=lysZlRc8YpYR_Z1h_lm4zw&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9pY28tZmFjZWJvb2sucG5n&amp;is_https=1" alt="fb">
																	</a>
																</td>

																<td style="padding:0 0 0 2px">
																	<a href="https://www.pinterest.com/formaspace/?utm_source=pardot&amp;utm_medium=email&amp;utm_campaign=reminder-universities-041216" target="_blank" rel=" noopener noreferrer" style="display: block;">
																		<img border="0" width="20" height="19" style="display: block;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=A8v3A6RNGbs6NM-oT6LBSw&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9pY28tcGludGVyZXN0LnBuZw~~&amp;is_https=1" alt="pi">
																	</a>
																</td>
															</tr>
														
													</table>
												</td>

												<td width="4" style="padding: 0 5px 0 5px;">
													<table class="MsoNormalTable_mailru_css_attribute_postfix" border="0" cellspacing="0" cellpadding="0">
															<tr style="height:17.25pt">
																<td width="1" style="width:.75pt;background:#A29C9B;padding:0in 0in 0in 0in;height:17.25pt">
																	<p>&nbsp;</p>
																</td>
															</tr>
													</table>
												</td>    

												<td width="85" style="width:63.75pt;padding:0">
													<table border="0" cellspacing="0" cellpadding="0">
														
															<tr>
																<td style="padding:0in 0in 0in 0in">
																	<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%  padding:0; margin:0;">
																			<tr>
																				<td width="22" style="width:16.5pt; padding:0 5px 0 0">
																					<img border="0" width="19" height="19" style="display: block;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=bWuYqbTj8Ta60d4vPu9LWA&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9pY28tdGVsLTAyLnBuZw~~&amp;is_https=1">
																				</td>
																				<td style="padding:0">
																					<a target="_blank" rel=" noopener noreferrer" style="font: 11px "Arial",sans-serif; color:#615E5C; display: block;">
																						<b>800.251.1505</b>
																					</a>
																				</td>
																			</tr>
																	</table>
																</td>
															</tr>
														
													</table>
												</td>

												<td width="4" style="padding: 0 5px 0 5px;">
													<table class="MsoNormalTable_mailru_css_attribute_postfix" border="0" cellspacing="0" cellpadding="0">
															<tr style="height:17.25pt">
																<td width="1" style="width:.75pt;background:#A29C9B;padding:0in 0in 0in 0in;height:17.25pt">
																	<p>&nbsp;</p>
																</td>
															</tr>
													</table>
												</td>

												<td width="203" style="width:152.25pt;padding:0in 0in 0in 0in">
													<table border="0" cellspacing="0" cellpadding="0">
														
															<tr>
																<td style="padding:0in 0in 0in 0in">
																	<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%  padding:0; margin:0;">
																		
																			<tr>
																				<td width="22" style="width:16.5pt;padding:0 5px 0 0">
																					<img border="0" width="19" height="19" style="display: block;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=tx9CcXKl1gxGKLSjbc1qLw&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9pY28tbWFpbC5wbmc~&amp;is_https=1">
																				</td>
																				<td style="padding:0">
																					<a href="//e.mail.ru/compose/?mailto=mailto%3adesign.consultant@formaspace.com" target="_blank" rel=" noopener noreferrer" style="font:9px "Arial",sans-serif; line-height:12px; color:#615E5C; display: block;">
																						<b>design.consultant@formaspace.com</b>
																					</a>
																				</td>
																			</tr>
																		
																	</table>
																</td>
															</tr>
					
													</table>
												</td>

												<td width="4" style="padding: 0 5px 0 5px;">
													<table class="MsoNormalTable_mailru_css_attribute_postfix" border="0" cellspacing="0" cellpadding="0">
															<tr style="height:17.25pt">
																<td width="1" style="width:.75pt;background:#A29C9B;padding:0in 0in 0in 0in;height:17.25pt">
																	<p>&nbsp;</p>
																</td>
															</tr>
													</table>
												</td>

												<td width="164" style="width:123.0pt;padding:0in 0in 0in 0in">
													<table border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0;">
														
															<tr>
																<td style="padding:0in 0in 0in 0in">
																	<table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%  padding:0; margin:0;">
																		
																			<tr>
																				<td width="20" style="width:15.0pt;padding:0in 0in 0in 0in">
																					<img border="0" width="14" height="24" style="display: block;" src="https://proxy.imgsmail.ru?email=dmitriy_r_f%40mail.ru&amp;e=1528604770&amp;h=x3YpfI02IlCMTTceVB4hrQ&amp;url171=Zm9ybWFzcGFjZS5jb20vd3AtY29udGVudC91cGxvYWRzL21hcmt1cC9pY28tcG9pbnQucG5n&amp;is_https=1">
																				</td>
																				<td style="padding:0in 0in 0in 0in">
																					<span style="line-height:9.75pt;"><b><span style="font-size:7.5pt;font-family:"Arial",sans-serif;color:#615E5C">Made in the USA</span></b><span style="font-size:7.5pt;font-family:"Arial",sans-serif;color:#615E5C">1100 E Howard Lane # 400 Austin, TX 78753</span></spanp>
																				</td>
																			</tr>
																		
																	</table>
																</td>
															</tr>
														
													</table>
												</td>
											</tr>
										
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding:0in 0in 9.0pt 0in">
									<div align="center">
										<table border="0" cellspacing="0" cellpadding="0" width="450" style="width:337.5pt  padding:0; margin:0;">
											
												<tr>
													<td style="padding:0in 0in 0in 0in">
														<span style="line-height:9.75pt;"><b><span style="font-size:7.5pt;font-family:"Arial",sans-serif;color:#615E5C">This message was sent by
															<a href="https://formaspace.com/upgrade-your-lab-and-classroom/?utm_source=pardot&amp;utm_medium=email&amp;utm_campaign=reminder-universities-041216&amp;utm_term=footer" target="_blank" rel=" noopener noreferrer">
															Formaspace, LP</a>. Parts of this message may contain promotional information about Formaspace and its products.
															<i>Copyright </i></span></b><b><i><span style="font-size:7.5pt;font-family:"Open Sans";color:#615E5C">Ã‚Â©</span></i></b><b><i><span style="font-size:7.5pt;font-family:"Arial",sans-serif;color:#615E5C"> 2016, All rights reserved.</span></i></b><b><span style="font-size:7.5pt;font-family:"Arial",sans-serif;color:#615E5C"></span></b></p>
														</td>
													</tr>
												
											</table>
										</div>
									</td>
								</tr>
								<tr>
									<td style="padding:0in 0in 0in 0in">
										<div align="center">
											<table border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0;">
												
													<tr>
														<td style="padding:0in 0in 0in 0in">
															<span style="line-height:9.75pt;"><b><span style="font-size:7.5pt;font-family:"Arial",sans-serif;color:#72D0EB"><a target="_blank" rel=" noopener noreferrer">Unsubscribe
															</a></span></b></span>
														</td>
														<td style="padding:0in 8.25pt 0in 8.25pt">
															<table border="0" cellspacing="0" cellpadding="0" style="padding:0; margin:0;">
																
																	<tr style="height:12.75pt">
																		<td width="1" style="width:.75pt;background:#A29C9B;padding:0in 0in 0in 0in;height:12.75pt">
																			<span style="line-height:0%"><span style="font-size:1.0pt;color:#A29C9B">.</span></span>
																		</td>
																	</tr>
																
															</table>
														</td>
														<td style="padding:0in 0in 0in 0in">
															<span style="line-height:9.75pt;"><b><span style="font-size:7.5pt;font-family:"Arial",sans-serif;color:#72D0EB"><a target="_blank" rel=" noopener noreferrer">View in browser
															</a></span></b></span>
														</td>
													</tr>
												
											</table>
										</div>
									</td>
								</tr>
							
						</table>
					</td>
				</tr>';
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

$message .= '				</table>
						</div> 
					</td>
				</tr>
			</table>';



/*
 ___       __      __               __          __            ___  __   __        __   ___ 
|__  |\ | |  \    |__) |  | | |    |  \ | |\ | / _`     |\/| |__  /__` /__`  /\  / _` |__  
|___ | \| |__/    |__) \__/ | |___ |__/ | | \| \__>     |  | |___ .__/ .__/ /~~\ \__> |___ 
                                                                                           
*/


$message .= '	</body>
			</html>';



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