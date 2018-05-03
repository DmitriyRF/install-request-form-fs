
(function( $ ) {

	"use strict";

	$(document).ready( function(){

/*
  _______           _                                     _   _                   
 |__   __|         | |                                   | | | |                  
    | |      __ _  | |__      ___    ___   _ __    ___   | | | |                  
    | |     / _` | | '_ \    / __|  / __| | '__|  / _ \  | | | |                  
    | |    | (_| | | |_) |   \__ \ | (__  | |    | (_) | | | | |                  
    |_|     \__,_| |_.__/    |___/  \___| |_|     \___/  |_| |_|                                                                           
                      _                                                           
                     | |                                                          
   __ _   _ __     __| |                                                          
  / _` | | '_ \   / _` |                                                          
 | (_| | | | | | | (_| |                                                          
  \__,_| |_| |_|  \__,_|                                                          
	                                                         _                    
                                                            | |                   
  _ __    _ __    ___     __ _   _ __    ___   ___   ___    | |__     __ _   _ __ 
 | '_ \  | '__|  / _ \   / _` | | '__|  / _ \ / __| / __|   | '_ \   / _` | | '__|
 | |_) | | |    | (_) | | (_| | | |    |  __/ \__ \ \__ \   | |_) | | (_| | | |   
 | .__/  |_|     \___/   \__, | |_|     \___| |___/ |___/   |_.__/   \__,_| |_|   
 | |                      __/ |                                                   
 |_|                     |___/                                                                                       

 */

 var tabs = $('.tab-pane').length;

 $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

 	// $('html, body').animate({
 	// 	scrollTop: $('.tab-pane.active').offset().top - 100
 	// }, 700);

 	let progress_part  = $('.tab-pane.active').attr('data-target');

 	$('.progress-bar-success').css('width', 100 * progress_part / tabs + '%');

 });

/*
  _____                       _   _   _     _                           _                            _                    _   
 / ____|                     | | (_) | |   (_)                         | |                          | |                  | |  
| |        ___    _ __     __| |  _  | |_   _    ___    _ __     __ _  | |     ___    ___    _ __   | |_    ___   _ __   | |_ 
| |       / _ \  | '_ \   / _` | | | | __| | |  / _ \  | '_ \   / _` | | |    / __|  / _ \  | '_ \  | __|  / _ \ | '_ \  | __|
| |____  | (_) | | | | | | (_| | | | | |_  | | | (_) | | | | | | (_| | | |   | (__  | (_) | | | | | | |_  |  __/ | | | | | |_ 
 \_____|  \___/  |_| |_|  \__,_| |_|  \__| |_|  \___/  |_| |_|  \__,_| |_|    \___|  \___/  |_| |_|  \__|  \___| |_| |_|  \__|
                                                                                                                              
 */

 show_Additional_Content_Radio( 'conditional-manufactured-formaspace' , 'yes' ); 

 show_Additional_Content_Radio( 'conditional-primaryContactSignOff' , 'no' ); 

 show_Additional_Content_Radio( 'conditional-require-paperwork' , 'yes' ); 

 show_Additional_Content_Radio( 'conditional-photo-required' , 'yes' ); 

 show_Additional_Content_Radio( 'conditional-loading-dock-standard-height' , 'no' ); 

 show_Additional_Content_Radio( 'conditional-non-business-hours-can-be' , 'yes' ); 

 show_Additional_Content_Radio( 'conditional-full-length-semi-exist' , 'no' ); 

 show_Additional_Content_Radio( 'conditional-is-door-way-access' , 'yes' ); 

 show_Additional_Content_Radio( 'conditional-elevator-reservations-obtain' , 'yes' ); 

 show_Additional_Content_Radio( 'conditional-rooms-to-install' , 'one' ); 
 show_Additional_Content_Radio( 'conditional-rooms-to-install' , 'multiple' ); 

 show_Additional_Content_Radio( 'conditional-next-each-other-rooms' , 'no' ); 

 show_Additional_Content_Radio( 'conditional-upstairs-installation' , 'yes' ); 

 show_Additional_Content_Radio( 'conditional-elevator-to-offload-area' , 'no' ); 


/*
  _                               _     _                 
 | |                             | |   (_)                
 | |        ___     ___    __ _  | |_   _    ___    _ __  
 | |       / _ \   / __|  / _` | | __| | |  / _ \  | '_ \ 
 | |____  | (_) | | (__  | (_| | | |_  | | | (_) | | | | |
 |______|  \___/   \___|  \__,_|  \__| |_|  \___/  |_| |_|
                                                                                                                   
 */

 		$('.showState').hide();

		// $('.' + $(this).find(':selected').attr('data-state')).show();

		$('.' + $('#inputCountry option:selected').attr('data-state')).show();

		$('#inputCountry').on('change', function(){

			let country_is = $(this).find(':selected').attr('data-state');

			var $s = $('.' + country_is);
			var $ss = $('.showState');

			$ss.hide();
			$s.show();

			if(country_is == 'other'){
				$('#country-get-other').fadeIn();
				$('#half-form-wd').addClass('col-sm-6');
			}else{
				$('#country-get-other').fadeOut();
				$('#half-form-wd').removeClass('col-sm-6');
			}

			$ss.find('[name]').removeAttr('name');
			$s.find('.form-control').attr('name','inputState');

		});
		$('.showState select').on('change', function(){
			$('.showState').find('[name]').removeAttr('name');
			$(this).attr('name','inputState');
			$(this).find('[selected]').removeAttr('selected');
			$(this).find(':selected').attr('selected','selected');
		});

/*
  _____            _                      _          _                  
 |  __ \          | |                    (_)        | |                 
 | |  | |   __ _  | |_    ___     _ __    _    ___  | | __   ___   _ __ 
 | |  | |  / _` | | __|  / _ \   | '_ \  | |  / __| | |/ /  / _ \ | '__|
 | |__| | | (_| | | |_  |  __/   | |_) | | | | (__  |   <  |  __/ | |   
 |_____/   \__,_|  \__|  \___|   | .__/  |_|  \___| |_|\_\  \___| |_|   
                                 | |                                    
                                 |_|                                    
                                 */

		// $('.setDateFormat').datepicker(); // wp_enqueue_script( 'jquery-ui-datepicker');
		var DateHelper = {
			addDays : function(aDate, numberOfDays)
			{
            aDate.setDate(aDate.getDate() + numberOfDays); // Add numberOfDays
            var day = aDate.getDay();
            switch (day) {
            	case 0: aDate.setDate(aDate.getDate() + 1 );
            	break;
            	case 6: aDate.setDate(aDate.getDate() + 2 );
            	break;
            }
            return aDate;                                  // Return the date
        },
        format : function format(date) 
        {
        	return 
        	[
                ("0" + (date.getMonth()+1)).slice(-2),  // Get day and pad it with zeroes
                ("0" + date.getDate()).slice(-2),      // Get month and pad it with zeroes
                date.getFullYear()                          // Get full year
            ].join('/');                                   // Glue the pieces together
        }
    }


    $('.setDateFormat').datetimepicker({
                format: 'MM/DD/YYYY',//'DD/MM/YYYY',
                minDate: DateHelper.format(DateHelper.addDays(new Date(), 7)),
                // daysOfWeekDisabled: [0, 6],
                widgetPositioning: {
                	horizontal: 'left',
                	vertical: 'auto'
                }
            });

/*
  _______   _                                _          _                  
 |__   __| (_)                              (_)        | |                 
    | |     _   _ __ ___     ___     _ __    _    ___  | | __   ___   _ __ 
    | |    | | | '_ ` _ \   / _ \   | '_ \  | |  / __| | |/ /  / _ \ | '__|
    | |    | | | | | | | | |  __/   | |_) | | | | (__  |   <  |  __/ | |   
    |_|    |_| |_| |_| |_|  \___|   | .__/  |_|  \___| |_|\_\  \___| |_|   
                                    | |                                    
                                    |_|*/

    $('.setTimeFormat').datetimepicker({format: 'LT'});
/*
  ______                                                _   _       _           _     _                 
 |  ____|                                              | | (_)     | |         | |   (_)                
 | |__      ___    _ __   _ __ ___     __   __   __ _  | |  _    __| |   __ _  | |_   _    ___    _ __  
 |  __|    / _ \  | '__| | '_ ` _ \    \ \ / /  / _` | | | | |  / _` |  / _` | | __| | |  / _ \  | '_ \ 
 | |      | (_) | | |    | | | | | |    \ V /  | (_| | | | | | | (_| | | (_| | | |_  | | | (_) | | | | |
 |_|       \___/  |_|    |_| |_| |_|     \_/    \__,_| |_| |_|  \__,_|  \__,_|  \__| |_|  \___/  |_| |_|
 */

 	var form = document.getElementById("quote_form");

	$('#quote-form-submit').on('click',function(e){
		e.preventDefault();
		var flag_valid = true;

		// flag_valid = Field_input_required_email_number_validation();



/*
           _    _                _                              _   
     /\   | |  | |              | |                            | |  
    /  \  | |_ | |_  __ _   ___ | |__   _ __ ___    ___  _ __  | |_ 
   / /\ \ | __|| __|/ _` | / __|| '_ \ | '_ ` _ \  / _ \| '_ \ | __|
  / ____ \| |_ | |_| (_| || (__ | | | || | | | | ||  __/| | | || |_ 
 /_/    \_\\__| \__|\__,_| \___||_| |_||_| |_| |_| \___||_| |_| \__|
                                                                    
 */

			 var totalFileSize = 0;
			 var maxSize = 10240000;
			 var maxSize_flag = true;
			 var allowedFiles = ['image/png','image/gif','image/jpeg','image/jpg','application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.ms-excel','application/vnd.ms-powerpoint','application/pdf'];
			 var nameSize = 4;
			 var nameSize_flag = true;
			 var error = '';

			 jQuery.each(jQuery('#attachFile')[0].files, function(i, file) {
			 	if(allowedFiles.indexOf(file.type) === -1) {
			 		error += "*" +  file.name + " is unsupported!";
			 		flag_valid = false;
			 	}

			 	totalFileSize += file.size;
			 	if(totalFileSize > maxSize && maxSize_flag) {
			 		error += "Max total file size is 10MB! ";
			 		maxSize_flag = false;
			 		flag_valid = false;
			 	}

			 	var fileName = file.name;
			 	fileName = (fileName.replace(fileName.substr(fileName.lastIndexOf('.')), "")).length;
			 	if(fileName < nameSize && nameSize_flag) {
			 		error += "File name must have at least 4 characters! ";
			 		nameSize_flag = false;
			 		flag_valid = false;
			 	}
			 });
			 if(error != '') {
			 	$('.attachFile_error').text(error);
			 	$('.attachFile_error').show();
			 	setTimeout( function(){ $('.attachFile_error').hide(); }, 10000);
			 }
            // Attachment code - CLOSE
/*

  _____           _                   _   _        __                            
 / ____|         | |                 (_) | |      / _|                           
| (___    _   _  | |__    _ __ ___    _  | |_    | |_    ___    _ __   _ __ ___  
 \___ \  | | | | | '_ \  | '_ ` _ \  | | | __|   |  _|  / _ \  | '__| | '_ ` _ \ 
 ____) | | |_| | | |_) | | | | | | | | | | |_    | |   | (_) | | |    | | | | | |
|_____/   \__,_| |_.__/  |_| |_| |_| |_|  \__|   |_|    \___/  |_|    |_| |_| |_|
                                                                                 
                                                                                 
*/
            if(flag_valid == true ){
            	$('#ajax-loading-process').fadeIn();
            	// form.submit();
            	form = document.getElementById('quote_form');

            	var formData = new FormData(form);

            	console.log(formData);

            	formData.append("action", "formaspace_form_to_email");

            	// formData.append("action", "formaspace_form_to_email");


            	$.each( $('#attachFile')[0].files, function(i, file) {
            		 formData.append('userpic[]', file);
            	});

            	// data_selections  = "action=formaspace_form_to_email&" + data_selections;

            	var ajaxPost = $.ajax({

            			url: ajax_object.ajax_url,
					    type: 'POST',
					    async: true,
				        data: formData,
				        cache: false,
				        contentType: false,
				        processData: false
					    //etc.
				});


				ajaxPost.done(function(data, textStatus){
                	console.log("Ajax Success!");
                	console.log(data);
                	$('#ajax-loading-process').fadeOut();
                	$('#ajax-respond-success').fadeIn();
                	// setTimeout(function(){window.location.replace("https://formaspace.com/thank-you"); }, 2000);
                	$('#ajax-respond-success').delay(200).fadeOut();
                });

                // What to do upon error
                ajaxPost.fail(function(jqXHR, textStatus){
                  console.log("Ajax Failure!");
                  $('#ajax-loading-process').fadeOut();
                  $('#ajax-respond-failure').fadeIn();
                  $('#ajax-respond-success').delay(200).fadeOut();
                 // setTimeout(function(){window.location.replace("https://formaspace.com/thank-you"); }, 2000);

                  // console.log(jqXHR);
              });
            }
        });

/*
 ______   _   _              _               _     _                         _           _              _ 
|  ____| (_) | |            | |             | |   | |                       | |         | |            | |
| |__     _  | |   ___      | |__    _   _  | |_  | |_    ___    _ __       | |   __ _  | |__     ___  | |
|  __|   | | | |  / _ \     | '_ \  | | | | | __| | __|  / _ \  | '_ \      | |  / _` | | '_ \   / _ \ | |
| |      | | | | |  __/     | |_) | | |_| | | |_  | |_  | (_) | | | | |     | | | (_| | | |_) | |  __/ | |
|_|      |_| |_|  \___|     |_.__/   \__,_|  \__|  \__|  \___/  |_| |_|     |_|  \__,_| |_.__/   \___| |_|
                                                                                                          
                                                                                                          
*/

	var $input	 = $('#attachFile'),
	    $label	 = $input.next( 'label' ),
	    			labelVal = $label.html();

	    		$input.on( 'change', function( e )
	    		{
	    			var fileName = '';

	    			if( this.files && this.files.length > 1 )
	    				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
	    			else if( e.target.value )
	    				fileName = e.target.value.split( '\\' ).pop();

	    			if( fileName ) {
	    				if(fileName.length > 40) {
	    					$label.find( 'span' ).html( fileName.substring(0, 35) + '...' );
	    				} else {
	    					$label.find( 'span' ).html( fileName );
	    				}
	    			} else {
	    				$label.html( labelVal );
	    			}
	    		});



}); 	

/*
 ______                                  _                                                   _                    _   
|  ____|                                | |                                                 | |                  | |  
| |__     _   _   _ __     ___     ___  | |__     ___   __      __     ___    ___    _ __   | |_    ___   _ __   | |_ 
|  __|   | | | | | '_ \   / __|   / __| | '_ \   / _ \  \ \ /\ / /    / __|  / _ \  | '_ \  | __|  / _ \ | '_ \  | __|
| |      | |_| | | | | | | (__    \__ \ | | | | | (_) |  \ V  V /    | (__  | (_) | | | | | | |_  |  __/ | | | | | |_ 
|_|       \__,_| |_| |_|  \___|   |___/ |_| |_|  \___/    \_/\_/      \___|  \___/  |_| |_|  \__|  \___| |_| |_|  \__|
                                                                                                                                                                                                                                      
*/
function show_Additional_Content_Radio( conditional_id_wrap , posit_resp){

	let conditional_input = '#' + conditional_id_wrap +  ' ' + 'input[type="radio"]',

	show_additional_content_class = '.' + conditional_id_wrap + '-' + posit_resp;

	$( show_additional_content_class ).fadeOut('slow');

		$( '#' + conditional_id_wrap ).css('color', '№0081c5');

		
		$(conditional_input).on('click', function(){

			if( $(this).val()  ===  posit_resp ){

				$( show_additional_content_class ).fadeIn('slow');
			}
			else{
				$( show_additional_content_class ).fadeOut('slow');
			}

		});

	}


/*
  ______   _          _       _                     _   _       _           _     _                 
 |  ____| (_)        | |     | |                   | | (_)     | |         | |   (_)                
 | |__     _    ___  | |   __| |   __   __   __ _  | |  _    __| |   __ _  | |_   _    ___    _ __  
 |  __|   | |  / _ \ | |  / _` |   \ \ / /  / _` | | | | |  / _` |  / _` | | __| | |  / _ \  | '_ \ 
 | |      | | |  __/ | | | (_| |    \ V /  | (_| | | | | | | (_| | | (_| | | |_  | | | (_) | | | | |
 |_|      |_|  \___| |_|  \__,_|     \_/    \__,_| |_| |_|  \__,_|  \__,_|  \__| |_|  \___/  |_| |_|
                                                                                                                                                                                                     
 */

 function Field_input_required_email_number_validation(){

 	let flag_valid = true;

 	$('.get-contacts input').each(function(){
 		if($(this).val() == '' && $(this).attr('required')) {
 			var label = $(this).parent().find('label').text();
 			console.log(label);
 			$(this).attr('placeholder', label +' cannot be empty');
 			$('.tab-pane.active.in').removeClass('active in');
 			$('.tab-pane').eq(0).addClass('active in');
 			$('a[href="#step-1"]').tab('show');
 			$(this).parent('.form-group').addClass('has-error');
 			$(this).delay(100).focus();
 			flag_valid = false;
 			return false;
 		}else{$(this).parent('.form-group').removeClass('has-error');}

 		if($(this).attr('type') == 'email') {
 			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 			if(! regex.test($(this).val())){
 				$(this).val('');
 				$(this).attr('placeholder','Enter Valid Email Address');
	 			$('.tab-pane.active.in').removeClass('active in');
	 			$('.tab-pane').eq(0).addClass('active in');
	 			$('a[href="#step-1"]').tab('show');
	 			$(this).parent('.form-group').addClass('has-error');
	 			$(this).delay(100).focus();
 				flag_valid = false;
 				return false;
 			}
 		}else{$(this).parent('.form-group').removeClass('has-error');}

 		if($(this).attr('type') == 'tel') {
 			var regex = /^[0-9-+]/;
 			if(! regex.test($(this).val())){
 				$(this).val('');
 				$(this).attr('placeholder','Enter Valid Phone Number');
 				$('.tab-pane.active.in').removeClass('active in');
 				$('.tab-pane').eq(0).addClass('active in');
 				$('a[href="#step-1"]').tab('show');
 				$(this).parent('.form-group').addClass('has-error');
 				$(this).delay(100).focus();
 				flag_valid = false;
 				return false;
 			}
 		}else{$(this).parent('.form-group').removeClass('has-error');}

 	});

 	if(flag_valid == true){
 		return true;
 	}else{
 		return false;
 	}

 	

 }


})(jQuery);