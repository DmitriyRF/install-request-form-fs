<?php 

//Set in function php

//require ( get_stylesheet_directory() . '/formaspace/function.php' );


add_action( 'wp_enqueue_scripts', 'fs_form_template_files', 13 );
function fs_form_template_files() {


	if ( is_page_template( 'formaspace/form-page-template.php' ) ) {


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



		wp_enqueue_style( 'fs-bootstrap', get_stylesheet_directory_uri().'/formaspace/assets/bootstrap-3.3.7/css/bootstrap.css', array(), null, 'all'  );

		wp_enqueue_style( 'fs-own-datetimepicker', get_stylesheet_directory_uri().'/formaspace/assets/bootstrap-datetimepicker-master/bootstrap-datetimepicker.css', array('fs-bootstrap'), null, 'all'  );


		wp_enqueue_style( 'fs-fontawesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css', array(), null, 'all'  );

		wp_enqueue_style( 'fs-styles', get_stylesheet_directory_uri().'/formaspace/fs-stylesheet.css', array('fs-bootstrap'), null, 'all'  );


		wp_enqueue_script( 'jquery');

		wp_enqueue_script( 'plupload');

		wp_enqueue_script( 'fs-bootstrap', get_stylesheet_directory_uri() . '/formaspace/assets/bootstrap-3.3.7/js/bootstrap.js', array('jquery'), false, false );

		wp_enqueue_script( 'fs-bootstrap-datetimepicker-moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js', array('jquery', 'fs-bootstrap'), false, false );

		wp_enqueue_script( 'fs-bootstrap-datetimepicker', get_stylesheet_directory_uri() . '/formaspace/assets/bootstrap-datetimepicker-master/bootstrap-datetimepicker.min.js', array('jquery', 'fs-bootstrap', 'fs-bootstrap-datetimepicker-moment'), false, false );


		wp_enqueue_script( 'fs-script', get_stylesheet_directory_uri() . '/formaspace/fs-script.js', array('jquery', 'fs-bootstrap'), false, false );

		wp_localize_script( 'fs-script', "ajax_object", array( 
			'ajax_url' => admin_url( 'admin-ajax.php') 
		));

	} 
}


add_filter( 'wp_mail_content_type', 'filter_function_name_4869' );
function filter_function_name_4869( $content_type ){
	return 'text/html';
}

add_action( 'wp_ajax_formaspace_form_to_email', 'formaspace_form_to_email' );
add_action( 'wp_ajax_nopriv_formaspace_form_to_email', 'formaspace_form_to_email' );

function formaspace_form_to_email(){


	$address_to = array(
		// 'mktg@formaspace.com',
		// 'matt.rundblad@formaspace.com'
		// 'mehmet.atesoglu@formaspace.com'
		'Dmitriy_r_f@mail.ru'
	);

	$subject = 'Installation Request Form ___(server time:) ' . (string)date("Y-m-d h:i:sa");

	$message = '<h1> Installation Request Form </h1>';

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
		$message .='</p>';

	}
	if (  isset( $_POST['inputLastName'] )  &&  !empty( $_POST['inputLastName'] )  ) {

		$message .= '<h2>';
		$message .= 'Last Name';
		$message .='</h2>';
		$message .='<p>';
		$message .= $_POST['inputLastName'];
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

	$headers = array('Content-Type: text/html; charset=UTF-8','mehmet.atesoglu@formaspace.com');

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

	}

	wp_mail( $address_to, $subject, $message, $headers, $attachments);

	foreach($attachments as $path ){
		unlink($path);
	}

	print_r($_FILES['attachFile']);
	die('');

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