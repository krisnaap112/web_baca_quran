const flashData = $('.flash-data').data('flashdata');

if( flashData ){
	Swal({
		title: 'Data Sub Menu',
		text:  'Berhasil Di' + flashData,
		type:  'success'
	});

	// tombol hapus
	$('.tombol-hapus').on('click', function(e) {

		e.preventDefault();
		const href = $(this).attr('anchor');

		Swal({
			title: 'Apakah Anda Yakin',
			text: 'Untuk Menghapus Data Ini?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus'
		}).then(result) => {
			if(result.value){
				document.location.href = href;
			}
		}
	});