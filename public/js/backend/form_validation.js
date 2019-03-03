
$(document).ready(function(){

	$("#new_pass").keyup(function() {
		var current_pass = $("#current_pass").val();
		$.ajax( {
			type:'get',
			url:'/admin/check-pass',
			data:{current_pass:current_pass},
			success:function(resp) {
				if (resp == "false") {
					$("#chkPass").html("<font color='#dc3545'>Current Password is Incorrect.</font>");
				} else if (resp == "true") {
					$("#chkPass").html("<font color='#28a745'>Current Password is Correct.</font>");
				}
			}, error:function() {
				alert("Error");
			}
		});
	});

	$(".deleteRecord").click(function() {
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
		    title: 'Are you sure?',
		    text: 'Once deleted, you will not be able to recover it!',
		    icon: 'warning',
		    buttons: true,
		    dangerMode: true,
		})
		.then((willDelete) => {
		    if (willDelete) {
		    	// swal('Poof! Your imaginary file has been deleted!', {
       			// 		icon: 'success',
      			// });
				// function() {
					window.location.href="/admin/"+deleteFunction+"/"+id;
				// };
		    } else {
		    	swal('Delete canceled.');
		    }
    	});
	});

	$(document).ready(function() {
		var maxField = 10;
		var addButton = $('.add_button');
		var wrapper = $('.field_wrapper');
		var fieldHTML = '<div class="form-row"><div class="form-group col-md-2"><input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" required></div><div class="form-group col-md-2"><input type="text" name="size[]" id="size" placeholder="Size" class="form-control" required></div><div class="form-group col-md-2"><input type="text" name="price[]" id="price" placeholder="Price" class="form-control" required></div><div class="form-group col-md-2"><input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control" required></div><div class="form-group col-md-1 remove_button"><a href="javascript:void(0);" class="add_button btn btn-primary input-group-text"><i class="fas fa-minus"></i></a></div></div>';
		var x = 1;

		$(addButton).click(function() {
			if (x < maxField) {
				x++;
				$(wrapper).append(fieldHTML);
			}
		});
		$(wrapper).on('click', '.remove_button', function(e) {
			e.preventDefault();
			$(this).parent('div').remove();
			x--;
		});
	})
});

$().ready(function() {
	// $("#update_password").validate( {
	// 	rules: {
	// 		current_pass: {
	// 			required: true
	// 		},
	// 		new_pass: {
	// 			required: true,
	// 			minlength: 6,
	// 			maxlength: 20
	// 		},
	// 		confirm_pass: {
	// 			required: true,
	// 			minlength: 6,
	// 			maxlength: 20,
	// 			equalTo: "#new_pass"
	// 		}
	// 	},
	// 	messages: {
	// 		current_pass: {
	// 			required: 'Please provide your current password!'
	// 		},
	// 		new_pass: {
	// 			required: "Please enter your new password!",
	// 			minlength: "Your password must be atleast 6 characters",
	// 			maxlength: "Your password must be under 20 characters"
	// 		},
	// 		confirm_pass: {
	// 			required: "Please enter your new password!",
	// 			minlength: "Your password must be atleast 6 characters",
	// 			maxlength: "Your password must be under 20 characters",
	// 			equalTo: "Please enter the same value"
	// 		}
	// 	}
	// });


	// $(".pwstrength").passtrength( {
	// 	minChars: 4,
	// 	passwordToggle: true,
	// 	tooltip: false,
	// 	eyeImg: "/vendors/visual-pass-strength/img/eye.svg"
	// });
});
