$(function() {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var name = $("input#name").val();
            var email = $("input#email").val();
            var phone = $("input#phone").val();
            var message = $("textarea#message").val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: base_url+"/contact",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
function checkImages(){
	if(TotalImages == 0){return false;}
	if(ImgToFetch > 0){
		var per = ((TotalImages-ImgToFetch)/TotalImages)*100;
		$('#fetchImages').show();
		$('#imgProgess').css('width',per+'%');
		$.get(base_url+'user/get_image_data',function(res){
			var res = $.parseJSON(res);
			TotalImages = res.total;
			ImgToFetch = res.remaining;
			
			var per = ((TotalImages-ImgToFetch)/TotalImages)*100;
			$('#fetchImages').show();
			$('#imgProgess').css('width',per+'%');
			if(per < 100){
				checkImages();
			}else{
				setTimeout("$('#fetchImages').hide();",5000);
			}
			if(res.duplicate.length > 0){
				$('#duplicateFound').find('h1').remove();
				for(var i in res.duplicate){
					if($('#FB_'+res.duplicate[i].fb_id).length == 0){
						var P_Html = '<div class="col-sm-1 portfolio-item"><a href="#FB_'+res.duplicate[i].fb_id+'" class="portfolio-link" data-toggle="modal"><div class="caption"><div class="caption-content"><i class="fa fa-search-plus fa-1x"></i></div></div><img src="'+res.duplicate[i].url+'" class="img-responsive" alt=""></a></div>';
						$('#duplicateFound').append(P_Html);
					}
					var PopUp_Html = '<div class="portfolio-modal modal fade" id="FB_'+res.duplicate[i].fb_id+'" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-content"><div class="close-modal" data-dismiss="modal"><div class="lr"><div class="rl"></div></div></div><div class="container"><div class="row"><div class="col-lg-8 col-lg-offset-2"><div class="modal-body">\
							<h2>'+res.duplicate[i].album_name+'</h2>\
							<hr class="star-primary">\
							<img src="'+res.duplicate[i].large_img+'" class="img-responsive img-centered" alt="">\
							<p>This Image found duplicate on <a href="http://fb.com/'+res.duplicate[i].fb_id+'" target="_blank">Facebook</a>. Links of the image::</p>\
							<ul class="list-inline item-details">';
						var MorFbIds = res.duplicate[i].fb_ids.split(',');
						for(var j in MorFbIds){
							PopUp_Html+='<li><strong><a href="http://fb.com/'+MorFbIds[j]+'" target="_blank">Link '+ parseInt(parseInt(j)+1) +'</a></strong> | </li>';
						}
					PopUp_Html+='</ul><button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button></div></div></div></div></div></div>';
					$('#FB_popups'+res.duplicate[i].fb_id).remove();
					$('#FB_popups').append(PopUp_Html);
				}
			}
		});
	}
}
$(document).ready(function(){
	if(typeof TotalImages != 'undefined')
	checkImages();
});
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('body').on('click', '.page-scroll a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a:not(.dropdown-toggle)').click(function() {
    $('.navbar-toggle:visible').click();
});