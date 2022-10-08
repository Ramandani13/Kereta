	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>	
	<script>
	$('.bagian_a').hide();
	$('.bagian_b').hide();
	<?php if($this->uri->segment(1) === "konfirmasi"): ?>
	$(document).ready(function() {
		cekBagian();

		$("select.select_gerbong").change(function(){

			var gerbong = $(this).children("option:selected").val();
        	
			if(gerbong === "1"){
				$('.img_gerbong').attr('src','<?= base_url('assets/gerbong/gerbong1.png') ?>');
			}else if(gerbong === "2"){
				$('.img_gerbong').attr('src','<?= base_url('assets/gerbong/gerbong2.png') ?>');
			}else if(gerbong === "3"){
				$('.img_gerbong').attr('src','<?= base_url('assets/gerbong/gerbong3.png') ?>');
			}

			// Cek Validasi
			var bagian 	= $('.bagian').val();
			var button  = $('#btn_konfirmasi');
			var pesan   = $('.pesan');

			if(gerbong === "0" || bagian === "0"){
				button.attr("disabled",true);
				pesan.removeClass('d-none');
				pesan.text("Pastikan anda Memilih Gerbong dan Bagian Gerbong !!");
				pesan.addClass('text-danger');
			}else{
				button.attr("disabled",false);
				pesan.addClass('d-none');
				pesan.removeClass('text-danger');
			}

		});
	});
	<?php endif; ?>

	var gambar = $('.img_gerbong');
	var gerbong = $('.select_gerbong').val();

	function cekBagian(){
		var bagian 		= $('.bagian');
		var bagian_a 	= $('.bagian_a');
		var bagian_b 	= $('.bagian_b');

		if(bagian.val() === "a"){
			bagian_a.show();
			bagian_b.hide();
			bagian_b.removeAttr('name');
			bagian_b.removeAttr('required');
			bagian_a.attr('name','kursi');
		}else if(bagian.val() === "b"){
			bagian_b.show();
			bagian_a.hide();
			bagian_b.attr('name','kursi');
			bagian_a.removeAttr('name');
			bagian_a.removeAttr('required');
		}

		// / Cek Validasi
		var bagian 	= $('.bagian').val();
		var button  = $('#btn_konfirmasi');
		var pesan   = $('.pesan');

		if(gerbong === "0" || bagian === "0"){
			button.attr("disabled",true);
			pesan.removeClass('d-none');
			pesan.text("Pastikan anda Memilih Gerbong dan Bagian Gerbong !!");
			pesan.addClass('text-danger');
		}else{
			button.attr("disabled",false);
			pesan.addClass('d-none');
			pesan.removeClass('text-danger');
		}
	}

	$('.foto').change(function(){
		var gerbong = $('.select_gerbong').val();
		var bagian 	= $('.bagian').val();
		var button  = $('#btn_konfirmasi');
		var pesan   = $('.pesan');

		if(gerbong === "0" || bagian === "0"){
			button.attr("disabled",true);
			pesan.removeClass('d-none');
			pesan.text("Pastikan anda Memilih Gerbong dan Bagian Gerbong !!");
			pesan.addClass('text-danger');
		}else{
			button.attr("disabled",false);
			pesan.addClass('d-none');
			pesan.removeClass('text-danger');
		}
	});
	
	</script>
</body>
</html>