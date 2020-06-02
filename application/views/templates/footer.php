<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	<?php if ($this->session->flashdata('flash')): ?>
		Swal.fire({
			position: 'top-end',
			icon: 'success',
			title: 'Data Berhasil <?php echo $this->session->flashdata("flash") ?>',
			showConfirmButton: false,
			timer: 1500
		})
	<?php endif ?>


	// 
	$(document).ready(function() {
	var max_fields      = 15; //maximum input boxes allowed
	var wrapper   		= $(".barang"); //Fields wrapper
	var cloning 		= $(".input_fields_wrap");
	var link = '<a href="#" class="remove_field">Remove</a>';
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append(cloning.clone(), link); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); 
		// $(this).parent('div').remove(); x--;
		$(this).prev().remove(); x--;
		$(this).remove(".remove_field");
	})
});
</script>
</body>

</html>
