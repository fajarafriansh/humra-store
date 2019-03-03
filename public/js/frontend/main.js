$(function() {
	"use strict";

	//------- Parallax -------//
	skrollr.init( {
		forceHeight: false
	});

	//------- Active Nice Select --------//
	$('select').niceSelect();

	//------- hero carousel -------//
	$(".hero-carousel").owlCarousel( {
		items:3,
		margin: 10,
		autoplay:false,
		autoplayTimeout: 5000,
		loop:true,
		nav:false,
		dots:false,
		responsive:{
			0: {
				items:1
			},
			600: {
				items: 2
			},
			810: {
				items:3
			}
		}
	});

	//------- Best Seller Carousel -------//
	if($('.owl-carousel').length > 0) {
		$('#bestSellerCarousel').owlCarousel( {
			loop:true,
			margin:30,
			nav:true,
			navText: ["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],
			dots: false,
			responsive: {
				0: {
					items:1
				},
				600: {
					items: 2
				},
				900: {
					items:3
				},
				1130: {
					items:4
				}
			}
		})
	}

	//------- single product area carousel -------//
	$(".s_Product_carousel").owlCarousel( {
		items:1,
		autoplay:false,
		autoplayTimeout: 5000,
		loop:true,
		nav:false,
		dots:false
	});

	//------- mailchimp --------//
	function mailChimp() {
		$('#mc_embed_signup').find('form').ajaxChimp();
	}
	mailChimp();

	//------- fixed navbar --------//
	$(window).scroll(function() {
		var sticky = $('.header_area'),
			scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed');
		else sticky.removeClass('fixed');
	});

	//------- Price Range slider -------//
	if(document.getElementById("price-range")) {
		var nonLinearSlider = document.getElementById('price-range');

		noUiSlider.create(nonLinearSlider, {
			connect: true,
			behaviour: 'tap',
			start: [ 500, 4000 ],
			range: {
				// Starting at 500, step the value by 500,
				// until 4000 is reached. From there, step by 1000.
				'min': [ 0 ],
				'10%': [ 500, 500 ],
				'50%': [ 4000, 1000 ],
				'max': [ 10000 ]
			}
		});

		var nodes = [
			document.getElementById('lower-value'), // 0
			document.getElementById('upper-value')  // 1
		];

		// Display the slider value and how far the handle moved
		// from the left edge of the slider.
		nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {
		    nodes[handle].innerHTML = values[handle];
		});
	}
});

// Price & stock change
$(document).ready(function() {
	$("#product_size").change(function() {
		var product_size = $(this).val();
		if (product_size == "") {
			return false;
		}
		$.ajax( {
			type: 'get',
			url: '/get-product-price',
			data: {product_size:product_size},
			success: function(resp) {
				//alert(resp); return false;
				var arr = resp.split('#');
				$("#product_price").html("RP. " + arr[0]);
				$("#price_cart").val(arr[0]);
				if (arr[1] == 0) {
					$("#cart_button").hide();
					$("#availibility").text("Out Of Stock");
				} else {
					$("#cart_button").show();
					$("#availibility").text("In Stock");
				}
			}, error: function() {
				alert('Error');
			}
		});
	});
});

// Instantiate EasyZoom instances
var $easyzoom = $('.easyzoom').easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.thumbnails').on('click', 'a', function(e) {
	var $this = $(this);

	e.preventDefault();

	// Use EasyZoom's `swap` method
	api1.swap($this.data('standard'), $this.attr('href'));
});

// Setup toggles example
var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

$('.toggle').on('click', function() {
	var $this = $(this);

	if ($this.data("active") === true) {
		$this.text("Switch on").data("active", false);
		api2.teardown();
	} else {
		$this.text("Switch off").data("active", true);
		api2._init();
	}
});

$().ready(function() {
	$("#register_form").validate( {
		rules: {
			name: {
				required: true,
				minlength: 2,
				accept: "[a-zA-Z]+"
			},
			password: {
				required: true,
				minlength: 6
			},
			email: {
				required: true,
				email: true,
				remote: "/user/check-email"
			}
		},
		messages: {
			name: {
				required: "Please enter your name!",
				minlength: "Your name must be atleast 2 characters",
				accept: "Your name must contain only letters"
			},
			password: {
				required: "Please provide your password!",
				minlength: "Your password must be atleast 6 characters"
			},
			email: {
				required: "Please enter your email address!",
				email: "Please enter valid email!",
				remote: "Email already exists."
			}
		}
	});

	$(".pwstrength").passtrength( {
		minChars: 4,
		passwordToggle: true,
		tooltip: false,
		eyeImg: "/vendors/visual-pass-strength/img/eye.svg"
	});

	$("#login_form").validate( {
		rules: {
			password: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			password: {
				required: "Please provide your password!"
			},
			email: {
				required: "Please enter your email address!",
				email: "Please enter valid email!"
			}
		}
	});

	$("#account_form").validate( {
		rules: {
			name: {
				required: true,
				minlength: 2,
				accept: "[a-zA-Z]+"
			},
			address: {
				required: true
			},
			city: {
				required: true
			},
			state: {
				required: true
			},
			country: {
				required: true
			}
		},
		messages: {
			name: {
				required: "Please enter your name!",
				minlength: "Your name must be atleast 2 characters",
				accept: "Your name must contain only letters"
			},
			address: {
				required: "Please provide your address!"
			},
			city: {
				required: "Please provide your city!"
			},
			state: {
				required: "Please provide your state!"
			},
			country: {
				required: "Please select your country!"
			}
		}
	});

	$("#password_form").validate( {
		rules: {
			current_password: {
				required: true
			},
			new_password: {
				required: true,
				minlength: 6,
				maxlength: 20
			},
			confirm_password: {
				required: true,
				minlength: 6,
				maxlength: 20,
				equalTo: "#new_password"
			}
		},
		messages: {
			current_password: {
				required: "Please provide your current password!"
			},
			new_password: {
				required: "Please enter your new password!",
				minlength: "Your password must be atleast 6 characters",
				maxlength: "Your password must be under 20 characters"
			},
			confirm_password: {
				required: "Please enter your new password!",
				minlength: "Your password must be atleast 6 characters",
				maxlength: "Your password must be under 20 characters",
				equalTo: "Please enter the same value"
			}
		}
	});

	$("#current_password").keyup(function() {
		var current_password = $(this).val();
		$.ajax( {
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: 'post',
			url: '/user/check-password',
			data: {current_password:current_password},
			success: function(resp) {
				if (resp == "false") {
					$("#check_password").html("<font color='red'>Current password is incorrect.</font>");
				} else if (resp == "true") {
					$("#check_password").html("<font color='green'>Current password is correct.</font>");
				}
			}, error: function() {
				alert("Error");
			}
		})
	})

	$("#billtoShip").click(function() {
		if (this.checked) {
			$("#shipping_name").val($("#billing_name").val());
			$("#shipping_address").val($("#billing_address").val());
			$("#shipping_city").val($("#billing_city").val());
			$("#shipping_state").val($("#billing_state").val());
			$("#shipping_country").val($("#billing_country").val());
			$("#shipping_zipcode").val($("#billing_zipcode").val());
			$("#shipping_mobile").val($("#billing_mobile").val());
		} else {
			$("#shipping_name").val('');
			$("#shipping_address").val('');
			$("#shipping_city").val('');
			$("#shipping_state").val('');
			$("#shipping_country").val('');
			$("#shipping_zipcode").val('');
			$("#shipping_mobile").val('');
		}
	});
});

function selectPaymentMethod() {
	if ($("#paypal").is(":checked") || $("#COD").is(":checked") || $("#check").is(":checked")) {

	} else {
		alert("Please Select Payment Method!");
		return false;
	}
}

