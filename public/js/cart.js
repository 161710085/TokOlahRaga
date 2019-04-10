$(document).ready(function(){
	createData();
	function createData(){
		$('#formCart').submit(function(e){
			$.ajaxSetup({
				header:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"').attr('content')
				}
			});
			e.preventDefault();
			$.ajax({
				url :'/produk',
				type :'post',
				data : new FormData(this),
				chace :true,
				contentType : false,
				processData : false,
				async: false,
				dataType: 'json',
				success: function(data){
					console.log(data);
					swal({
						title:'Success Tambah',
						text:data.message,
						type:'success',
						timer:'2000'
					});
				}
			});
		});
	}
});