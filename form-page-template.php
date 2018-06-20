<?php
/**
 * Template Name: Installation Request Form
 * @package Formaspace
 * @subpackage Formaspace
 * @since Formaspace 1.0
 */
?>


<?php get_header(); ?>

<div id="form-no-conflict-css-88jgfgkjfgj8jtj4kjg89fgj" class="add-no-conflict-dfhg84jhf8gj5itfg">
	
	<div id="ajax-loading-process">
		<div class="loader"></div>
	</div>
	<div id="ajax-respond-success">
		<div class="center-respond">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="text-center">Thank you!</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="ajax-respond-failure">
		<div class="center-respond">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="text-center">Sorry, something went <span>wrong</span>!</h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="formaspace-form">
		<div class='container'>
			<div class="row">
				<div class="col-xs-12">
					<h1 class="h-form-main-header text-center">Installation Request Form</h1>
					<hr class="hr-header-line">
					<p class="p-form-description">
						Please complete the following questions with as much detail as possible; insufficient responsesdata will lead to quoting delays. Should any modifications and/or restrictions not identified prior to purchase require additional labor or equipment, the cost will be added to the invoice.
					</p>
				</div>
			</div>
			<div class="af" data-spy="affix" data-offset-top="385">
				<div class="row">
					<div class="col-xs-12">
						<div class="progress">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 0%;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row form-border">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
					<form id="quote_form"  enctype="multipart/form-data" method="post" >




						<div class="tab-content">
							<div class="tab-pane fade in active" role="tabpanel"  id="step-1" data-target="0">
								<div class="get-contacts">
									<div class="row">
										<h2 class="">Enter Contact Information</h2>
										<div class="col-xs-12">
											<div class="form-group">
												<label class="sr-only" for="inputCompany">Company</label>
												<input type="text" class="form-control" name="inputCompany" id="inputCompany" placeholder="Company*" value="" required>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="inputFirstName">First Name</label>
												<input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="First Name*" value="" required>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="inputLastName">Last Name</label>
												<input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Last Name*" value="" required>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="form-group">
												<label class="sr-only" for="inputPhone">Phone</label>
												<input type="tel"  class="form-control" name="inputPhone" id="inputPhone" placeholder="Phone (numbers only)*" value="" required>
											</div>
										</div>

										<div class="col-xs-12">
											<div class="form-group">
												<label class="sr-only" for="inputEmail">Email</label>
												<input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email*" value="" required>
											</div>
										</div>
									</div>
								</div>
								<div id="conditional-manufactured-formaspace" class="manufactured-formaspace">
									<div class="row">
										<h2>Is this installation request related to a project Formaspace manufactured?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="isFSmanufactured" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="isFSmanufactured" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="additional-formaspace-data conditional-manufactured-formaspace-yes"">
									<div class="row">
										<div class="col-xs-12  col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="inputQuoteNumber">Quote Number</label>
												<input type="text" class="form-control" name="inputQuoteNumber" id="inputQuoteNumber" placeholder="Quote Number" value="">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="inputVersionNumber">Version Number</label>
												<input type="text"  class="form-control" name="inputVersionNumber" id="inputVersionNumber" placeholder="Version Number" value="">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="selectDesignConsultant">Design Consultant</label>
												<select class="form-control" name="selectDesignConsultant" id="selectDesignConsultant">
													<option value="non-selected" 		data-state="not-selected"		>Design Consultant</option>
													<option value="Debbie-Zack" 		data-state="Debbie-Zack"		>Debbie Zack</option>
													<option value="Mike-Triche" 		data-state="Mike-Triche"		>Mike Triche</option>
													<option value="Robert-Furrer" 		data-state="Robert-Furrer"		>Robert Furrer</option>
													<option value="Valencia-Dessault" 	data-state="Valencia-Dessault"	>Valencia Dessault</option>
													<option value="Joe-Sorrels" 		data-state="Joe-Sorrels"		>Joe Sorrels</option>
													<option value="Noveaka-Holmes" 		data-state="Noveaka-Holmes"		>Noveaka Holmes</option>
													<option value="Jillian-Ball" 		data-state="Jillian-Ball"		>Jillian Ball</option>
													<option value="Chris-Heil" 			data-state="Chris-Heil"			>Chris Heil</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group"> 
												<label class="sr-only" for="numberOfBenches">Number of Benches</label>
												<input type="text"  class="form-control" name="numberOfBenches" id="numberOfBenches" placeholder="Number of Benches" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="delivery-date">
									<div class="row">
										<h2>Delivery Date</h2>
										<div class="calenderPicker">
											<div class="col-xs-12 col-sm-6">
												<label for="deliverydateNotBefore">Install cannot occur before:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input class="setDateFormat" type="text" value="" name="deliverydateNotBefore" id="deliverydateNotBefore">
											</div>
										</div>

										<div class="calenderPicker">
											<div class="col-xs-12 col-sm-6">
												<label for="deliverydateMustBy">Install must occur by:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input class="setDateFormat" type="text" value="" name="deliverydateMustBy" id="deliverydateMustBy">
											</div>
										</div>

										<div class="calenderPicker">
											<div class="col-xs-12 col-sm-6">
												<label for="deliverydatetentative">Tentative date:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input class="setDateFormat" type="text" value="" name="deliverydatetentative" id="deliverydatetentative">
											</div>
										</div>
									</div>
								</div>
								<div class="delivery-rreference">
									<div class="row">
										<h2>Delivery Preference</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="deliveryPreference" value="duringWeekdays" >
													<span>Install during weekdays only</span>
												</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="deliveryPreference" value="duringWeekend" >
													<span>Install during weekend only</span>
												</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6 col-sm-offset-3">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="deliveryPreference" value="noPreference" >
													<span>No preference</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div id="conditional-non-business-hours-can-be" class="non-business-hours">
									<div class="row">
										<h2>Can we be on site during non-business hours?</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="nonBusinessHours" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="nonBusinessHours" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="non-business-hours-clarifying conditional-non-business-hours-can-be-yes">
									<div class="row">
										<div class="calenderPicker">
											<div class="col-xs-12 col-sm-6">
												<label for="earliestArrival">Earliest Arrival:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input class="setTimeFormat" type="text" value="8:00 AM" name="earliestArrival" id="earliestArrival">
											</div>
										</div>
										<div class="calenderPicker">
											<div class="col-xs-12 col-sm-6">
												<label for="latestDeparture">Latest Departure:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input class="setTimeFormat" type="text" value="5:00 PM" name="latestDeparture" id="latestDeparture">
											</div>
										</div>
									</div>
								</div>
								<div class="primary-point-of-contact">
									<div class="row">
										<h2>Primary Point of Contact</h2>
										<div class="textPicker-line">
											<div class="col-xs-12 col-sm-6">
												<label for="primaryName">Name</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input type="text" value="" name="primaryName" id="primaryName">
											</div>
										</div>

										<div class="textPicker-line">
											<div class="col-xs-12 col-sm-6">
												<label for="primaryNumberPOC">POC Mobile Number</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input type="phone" value="" name="primaryNumberPOC" id="primaryNumberPOC">
											</div>
										</div>

										<div class="textPicker-line">
											<div class="col-xs-12 col-sm-6">
												<label for="alternateNumberPOC">Alternate Number</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input type="phone" value="" name="alternateNumberPOC" id="alternateNumberPOC">
											</div>
										</div>

									</div>
								</div>
								<div id="conditional-primaryContactSignOff" class="contact-sign-off-to-instalation">
									<div class="row">
										<h2>Can the Primary Point of Contact sign off on the installation?</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="primaryContactSignOff" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="primaryContactSignOff" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="additional-area conditional-primaryContactSignOff-no">

									<div class="row">
										<!-- <h2>If not, Who can and how can they be contacted?</h2> -->

										<div class="col-xs-12 col-sm-6">
											<label for="alternateContactForInstallationWho">Who can be contacted?</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text" class="form-control" name="alternateContactForInstallationWho" id="alternateContactForInstallationWho" placeholder="Who to be contacted" value="">
										</div>

										<div class="col-xs-12 col-sm-6">
											<label for="alternateContactForInstallationHow">How can they be contacted?</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text" class="form-control" name="alternateContactForInstallationHow" id="alternateContactForInstallationHow" placeholder="How to be contacted" value="">
										</div>

									</div>
								</div>
								<div class="environment-type">
									<div class="row">
										<h2>What type of environment are the rooms?<br>(choose all that apply)</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<input type="checkbox" class="form-control" id="roomEnvironmentType-clean-room" name="roomEnvironmentType[]" value="cleanRoom">
												<label for="roomEnvironmentType-clean-room">Clean room</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<input type="checkbox" class="form-control" id="roomEnvironmentType-lab" name="roomEnvironmentType[]" value="lab">
												<label for="roomEnvironmentType-lab">Lab</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<input type="checkbox" class="form-control" id="roomEnvironmentType-office-space" name="roomEnvironmentType[]" value="officeSpace" >
												<label for="roomEnvironmentType-office-space">Office space</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<input type="checkbox" class="form-control" id="roomEnvironmentType-active-construction" name="roomEnvironmentType[]" value="activeconstruction" >
												<label for="roomEnvironmentType-active-construction">Active construction</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<label class="sr-only" for="roomEnvironmentType-other">Other</label>
												<input type="text" class="form-control" name="roomEnvironmentTypeOther" id="roomEnvironmentType-other" placeholder="Other" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 text-center">
									<a href="#step-2"  class="next btn btn-default btn-lg no-transition no-scroll text-center" aria-controls="step-2" role="tab" data-toggle="tab">Next</a>
								</div>
							</div>



							<div class="tab-pane fade" role="tabpanel"  id="step-2" data-target="1">
								<div class="location-first">
									<div class="row">
										<h2>Location</h2>
										<div class="col-xs-12">
											<div class="form-group">
												<label class="sr-only" for="inputCountry">Country</label>

												<select class="form-control" name="inputCountry" id="inputCountry" val="">
													<option value="US" selected  data-state="us">United States</option>
													<option value="CA" data-state="ca">Canada</option>
													<option value="other" data-state="other">Other</option>
												</select>
											</div>
										</div>
										<div id="country-get-other" class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="inputCountryText">Country</label>
												<input  type="text" class="form-control" name="inputCountryText" id="inputCountryText" placeholder="Your country" val="">
											</div>
										</div>
										<div id="half-form-wd" class="col-xs-12">
											<div class="form-group">
												<label class="sr-only" for="inputAddress">Address</label>
												<input  type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="Address" val="">
											</div>
										</div>
										<div class="col-xs-12 col-sm-4">
											<div class="form-group">
												<label class="sr-only" for="inputCity">City</label>
												<input type="text" class="form-control" name="inputCity" id="inputCity" placeholder="City" value="">
											</div>
										</div>

										<div class="col-xs-12 col-sm-4 showState us">
											<div class="form-group">
												<select class="form-control">
													<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="American Samoa">American Samoa</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Puerto Rico">Puerto Rico</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="Washington, D.C.">Washington, D.C.</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option>
												</select>
											</div>
										</div>

										<div class="col-xs-12 col-sm-4 showState ca">
											<div class="form-group">
												<select class="form-control">
													<option value="Alberta">Alberta</option><option value="Baffin Island">Baffin Island</option><option value="British Columbia">British Columbia</option><option value="Manitoba">Manitoba</option><option value="Newfoundland">Newfoundland</option><option value="Northwest Territory">Northwest Territory</option><option value="Nova Scotia">Nova Scotia</option><option value="Nunavut">Nunavut</option><option value="Ontario">Ontario</option><option value="Quebec">Quebec</option><option value="Saskatchewan">Saskatchewan</option><option value="Yukon">Yukon</option>
												</select>
											</div>
										</div>

										<div class="col-xs-12 col-sm-4 showState other">
											<div class="form-group">
												<label class="sr-only" for="inputState">State</label>
												<input type="text" class="form-control" id="inputState" placeholder="State" value="" name="inputState">
											</div>
										</div>

										<div class="col-xs-12 col-sm-4">
											<div class="form-group">
												<label class="sr-only" for="inputZipCode">Zip Code</label>
												<input type="text" class="form-control" name="inputZipCode" id="inputZipCode" placeholder="Zip Code" value="" >
											</div>
										</div>
										<input type="hidden" name="source" id="source" value="">
									</div>
								</div>
								<div class="hours">
									<div class="row">
										<h2>Hours of Accessibility</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="StartHoursAccessibility">Start hours</label>
												<input class="setTimeFormat" type="text" value="8:00 AM" name="StartHoursAccessibility" id="StartHoursAccessibility" placeholder="Start hours">
											</div>
										</div>										
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="EndHoursAccessibility">End hours</label>
												<input class="setTimeFormat"  type="text" value="5:00 PM" name="EndHoursAccessibility" id="EndHoursAccessibility" placeholder="End hours">
											</div>
										</div>
									</div>
								</div>
								<div id="conditional-require-paperwork" class="access-your-facility">
									<div class="row">
										<h2>Do the installers require any permits or paperwork to access your facility?</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="access_to_your_facility" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="access_to_your_facility" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="paperwork-description additional-formaspace-data conditional-require-paperwork-yes">
									<div class="row">
										<!-- <h2>If yes,  what kind?</h2> -->
										<div class="col-xs-12 col-sm-6">
											<label for="paperworkDescription">Please, describe the paperwork:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text" name="paperworkDescription" id="paperworkDescription" placeholder="What kind of paperwork?" value="" >
										</div>
									</div>
								</div>	


								<div id="conditional-photo-required" class="additional-formaspace-data access-your-facility-photo">
									<div class="row">
										<h2>Will there be photo ID requirements</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="access_your_facility_photo" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="access_your_facility_photo" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="access-your-facilitykind-of-photo additional-formaspace-data conditional-photo-required-yes">
									<div class="row">
										<!-- <h2>If yes,  what kind?</h2> -->
										<div class="col-xs-12 col-sm-6">
											<label for="kind_of_photo_access_facility">What kind of photo ID needed?</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text" name="kind_of_photo_access_facility" id="kind_of_photo_access_facility" placeholder="What kind?" value="" >
										</div>
									</div>
								</div>	

								<div class="access-your-facility">
									<div class="row">
										<h2>Is there a dumpster at the install location we can dump our debris, or do we need to haul it off?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="isDumpsterAvailable" value="DumpsterAvailable" >
													<span>Dumpster Available</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="isDumpsterAvailable" value="NoHaulOff" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="access-your-facility">
									<div class="row">
										<h2>Will there be a forklift or pallet jack available at the install site?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="forkliftAvailable" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="forkliftAvailable" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="access-your-facility">
									<div class="row">
										<h2>Is there an area for staging?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="stagingArea" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="stagingArea" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-12 text-center">
									<a href="#step-1"  class="prev btn btn-default btn-lg no-transition no-scroll text-center" aria-controls="step-1" role="tab" data-toggle="tab">Prev</a>
									<a href="#step-3"  class="next btn btn-default btn-lg no-transition no-scroll text-center" aria-controls="step-3" role="tab" data-toggle="tab">Next</a>
								</div>
							</div>



							<div class="tab-pane fade" role="tabpanel"  id="step-3" data-target="2">
								<div class="building-specifications">
									<div class="row">
										<h2>Building Specifications</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="buildingSpecifications" value="NewConstruction" >
													<span>New Construction</span>
												</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="buildingSpecifications" value="ExistingBuilding" >
													<span>Existing Building</span>
												</label>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6 col-sm-offset-3">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="buildingSpecifications" value="RemodelingPhase" >
													<span>Remodeling Phase</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="access-loading-dock">
									<div class="row">
										<h2>Is there loading dock access? </h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="loadingDockAccess" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="loadingDockAccess" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div id="conditional-loading-dock-standard-height" class="loading-dock-height">
									<div class="row">
										<h2>Is loading dock standard height (48.5”)?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="dockStandardIs48" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="dockStandardIs48" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="additional-formaspace-data loading-dock-height-outsize conditional-loading-dock-standard-height-no">
									<div class="row">
										<div class="col-xs-12 col-sm-6">
											<label for="dockStandardIsNumber">Please specify height of loading dock:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text" class="form-control" name="dockStandardIsNumber" id="dockStandardIsNumber" placeholder="Height" value="">
										</div>
									</div>
								</div>

								<div class="additional-formaspace-data">
								</div>

								<div id="conditional-full-length-semi-exist" class="full-length-semi-exist">
									<div class="row">
										<h2>Is there is clearance to receive a full length (54’) semi?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="isSemiClearance" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="isSemiClearance" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="place-for-park-to-upload additional-formaspace-data conditional-full-length-semi-exist-no">
									<div class="row">
										<h2>Is there a place we can park to unload (~2 hour window)?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="placeTounload" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="placeTounload" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div id="conditional-is-door-way-access" class="door-way-access">
									<div class="row">
										<h2>Is building access through a doorway?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="buildingAccesDoorway" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="buildingAccesDoorway" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="if-one-room-floor-number additional-formaspace-data conditional-is-door-way-access-yes">
									<div class="row">
										<div class="col-xs-12 col-sm-6">
											<label for="doorWaynarrowestPoint">Width at narrowest point</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="doorWaynarrowestPoint" id="doorWaynarrowestPoint" placeholder="Width" value="">
										</div>
									</div>
								</div>

								<div id="conditional-elevator-reservations-obtain" class="is-elevator-needed">
									<div class="row">
										<h2>Are reservations for elevator needed?</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="elevatorReservations" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="elevatorReservations" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="if-one-room-floor-number additional-formaspace-data conditional-elevator-reservations-obtain-yes">
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<label for="howReserveElevator">Please specify, how to obtain elevator reservations?</label>
										</div>
										<div class="col-xs-12 col-sm-12">
											<input type="text"  class="form-control" name="howReserveElevator" id="howReserveElevator" placeholder="Elevator reservation" value="">
										</div>
									</div>
								</div>

								<div id="conditional-rooms-to-install" class="how-many-rooms-to-install-in">
									<div class="row">
										<h2>Is the install in</h2>								
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="howMuchRooms" value="one" >
													<span>One room</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="howMuchRooms" value="multiple" >
													<span>Multiple rooms</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="if-one-room-floor-number additional-formaspace-data conditional-rooms-to-install-one">
									<div class="row">
										<h2>One room</h2>
										<div class="col-xs-12 col-sm-6">
											<label for="floorNemberOneRoom">What is the floor number:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="floorNemberOneRoom" id="floorNemberOneRoom" placeholder="Floor number" value="">
										</div>
									</div>
								</div>

								<div class="if-multiple-room additional-formaspace-data conditional-rooms-to-install-multiple">
									<div class="row">
										<h2>Multiple rooms</h2>
										<div class="col-xs-12 col-sm-6">
											<label for="numberOfRooms">Number of rooms:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="number" class="form-control" name="numberOfRooms" id="numberOfRooms" placeholder="Room number" value="">
										</div>
										<div id="conditional-next-each-other-rooms">
											<h2 class="mt-0" >Are the rooms next to each other?</h2>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<label>
														<input type="radio" class="form-control" name="nextEachotherRooms" value="yes" >
														<span>Yes</span>
													</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<label>
														<input type="radio" class="form-control" name="nextEachotherRooms" value="no" >
														<span>No</span>
													</label>
												</div>
											</div>
										</div>
										<div class="additional-formaspace-data conditional-next-each-other-rooms-no">
											<div class="col-xs-12 col-sm-6">
												<label for="howFarApart">How far apart:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input type="text"  class="form-control" name="howFarApart" id="howFarApart" placeholder="Feet" value="" >
											</div>
										</div>

										<h2  class="mt-0"> If on different floors, distance from the elevator on each floor(distance not null)</h2>
										<div class="col-xs-12">
											<div class="form-group">
												<label class="sr-only" for="distanceFromElevator">If on different floors, distance from the elevator on each floor:</label>
												<input type="text" class="form-control" name="distanceFromElevator" id="distanceFromElevator" placeholder="Distance" value="" >
											</div>
										</div>
									</div>
								</div>

								<div class="ground-floor-installation">
									<div class="row">								
										<h2  class="">Ground Floor Installation</h2>
										<div class="col-xs-12 col-sm-6">
											<label for="distanceUpliadingtoInstallPoint">Distance from unloading point to install point:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text" class="form-control" name="distanceUpliadingtoInstallPoint" id="distanceUpliadingtoInstallPoint" placeholder="Distance:" value="">
										</div>
										<div class="if-mult additional-formaspace-data conditional-rooms-to-install-multiple">
											<div class="col-xs-12 col-sm-6">
												<label for="DistanceUpliadingFarhestPoint">Distance from unloading point to farthest room:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input type="text"  class="form-control" name="DistanceUpliadingFarhestPoint" id="DistanceUpliadingFarhestPoint" placeholder="Floor number:" value="">
											</div>
										</div>

										<div class="col-xs-12 col-sm-6">
											<label for="minWidthDoorway">Width of narrowest hallway and/or doorway: </label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="minWidthDoorway" id="minWidthDoorway" placeholder="Width:" value="">
										</div>
									</div>
								</div>

								<div class="col-sm-12 text-center">
									<a href="#step-2"  class="prev btn btn-default btn-lg no-transition no-scroll text-center" aria-controls="step-2" role="tab" data-toggle="tab">Prev</a>
									<a href="#step-4"  class="next btn btn-default btn-lg no-transition no-scroll text-center" aria-controls="step-4" role="tab" data-toggle="tab">Next</a>
								</div>
							</div>



							<div class="tab-pane fade" role="tabpanel"  id="step-4" data-target="3">
								<div id="conditional-upstairs-installation" class="upstairs-installation">
									<div class="row">
										<h2>Upstairs Installation</h2>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="upstairsInstallation" value="yes" >
													<span>Yes</span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label>
													<input type="radio" class="form-control" name="upstairsInstallation" value="no" >
													<span>No</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="if-apstairs-instalation conditional-upstairs-installation-yes">
									<div class="row">
										<h4 class="mt-0 pt-0">Please fill out both sections if available.</h4>
										<h2>Elevator Specifications:</h2>
										<div class="col-xs-12 col-sm-6">
											<label for="elevatorDistanceUpliadingtoElevator">Distance from unloading point to elevator:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="elevatorDistanceUpliadingtoElevator" id="elevatorDistanceUpliadingtoElevator" placeholder="Distance" value="">
										</div>
										<div id="conditional-elevator-to-offload-area">
											<h2>Is there elevator access from offload area?</h2>								
											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<label>
														<input type="radio" class="form-control" name="elevatorAccessOffloadArea" value="yes" >
														<span>Yes</span>
													</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<label>
														<input type="radio" class="form-control" name="elevatorAccessOffloadArea" value="no" >
														<span>No</span>
													</label>
												</div>
											</div>
										</div>
										<div class="additional-formaspace-data conditional-elevator-to-offload-area-no">

											<div class="col-xs-12 col-sm-6">
												<label for="elevatorAccessSpecification">Please specify:</label>
											</div>
											<div class="col-xs-12 col-sm-6">
												<input type="text" name="elevatorAccessSpecification" id="elevatorAccessSpecification" placeholder="Specification" value="" >
											</div>
										</div>
										<h2>Interior size of elevator</h2>

										<div class="col-xs-12 col-sm-6">
											<label for="elevatorInteriorLenght">Length:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="elevatorInteriorLenght" id="elevatorInteriorLenght" placeholder="Length" value="">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="elevatorInteriorWidth">Width:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="elevatorInteriorWidth" id="elevatorInteriorWidth" placeholder="Width" value="">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="elevatorInteriorHeight">Height</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="elevatorInteriorHeight" id="elevatorInteriorHeight" placeholder="Height" value="">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="elevatorInteriorDoorOpening">Door Opening</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="elevatorInteriorDoorOpening" id="elevatorInteriorDoorOpening" placeholder="Door Opening" value="">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="elevatorInteriorDistanceUpstairs">Distance upstairs from elevator to install point</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="elevatorInteriorDistanceUpstairs" id="elevatorInteriorDistanceUpstairs" placeholder="Distance" value="" >
										</div>

										<h2>Stair Specifications:</h2>

										<div class="col-xs-12 col-sm-6">
											<label for="stairDistanceUploadingToStairs">Distance from unloading point to stairs:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="stairDistanceUploadingToStairs" id="stairDistanceUploadingToStairs" placeholder="Distance" value="">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="stairWidth">Width of the stairs:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="stairWidth" id="stairWidth" placeholder="Width" value="">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="stairsNumberflights">Number of flights:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="stairsNumberflights" id="stairsNumberflights" placeholder="Number" value="">
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="stairsDimensions">Dimensions of landings:</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="stairsDimensions" id="stairsDimensions" placeholder="Dimensions" value="" >
										</div>
										<div class="col-xs-12 col-sm-6">
											<label for="stairDistanceTopInstallPoint">Distance from top of the landing to install point</label>
										</div>
										<div class="col-xs-12 col-sm-6">
											<input type="text"  class="form-control" name="stairDistanceTopInstallPoint" id="stairDistanceTopInstallPoint" placeholder="Distance" value="" >
										</div>
									</div>
								</div>

								<div class="attach-documentation-list">
									<div class="row">
										<h2>Please attach following documentation along with your install request form:</h2>
										<div class="col-xs-12">
											<ul>
												<li>Furniture Layout or Architecture Drawings</li>
												<li>Schematic of the floor where the installation is to occur</li>
												<li>Certificate of Insurance Requirements </li>
											</ul>
										</div>
									</div>
								</div> 
								<div class="attachFile_align">
									<div class="row">
										<div class="col-xs-12 ">
											<h3>Attach files</h3>
											<div class="form-group">
												<input class="form-control attachFile" type="file" name="attachFile[]" id="attachFile" data-multiple-caption="{count} files selected" multiple />
												<label for="attachFile">
													<i class="fa fa-upload" aria-hidden="true"></i>
													<span id="attachFileText">BROWSE</span>
												</label>
												<span class="attachFile_error"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="comment">
									<div class="row">
										<h2>Additional Comment</h2>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<!-- <label for="message-text" class="control-label">Message:</label> -->
											<textarea class="form-control" name="commentMessage" id="message-text" rows="12"></textarea>
										</div>
									</div>
								</div>
								
								<div class="capcha">
									<div class="row">
										<div class="col-xs-12 form-group text-center">
											<div class="g-recaptcha" data-sitekey="6LeySDEUAAAAAGbZDEW47IR-U8hJ8dOwn3XLTLdB"></div>
											<div class="text-danger" id="recaptchaError"></div>
										</div>
									</div>
									<script src="https://www.google.com/recaptcha/api.js"></script>
								</div>
								<div class="col-sm-12 text-center">
									<a href="#step-3"  class="prev btn btn-default btn-lg  no-transition no-scroll text-center" aria-controls="step-3" role="tab" data-toggle="tab">Prev</a>
									<button class="btn btn-default btn-lg next no-transition no-scroll text-center" type="button" id="quote-form-submit" name="btn_submit">SEND FOR PRICING</button>
								</div>
							</div>

						</div> 
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>