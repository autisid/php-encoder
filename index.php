<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Encoder</title>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="row text-center" style="margin-top: 30px;">

			<h3>Encrypt & Decrypt</h3>
			<form id="form_encrypt" class="form form-horizontal" style="padding-top: 15px;">
				<div class="form-body">
					<div class="form-group">
						<label  class="control-label col-md-3">K Rotation</label>
						<div class="col-md-7">
							<input type="number" name="k" class="form-control" value="13" min="2" max="25">
						</div>
					</div>
					<div class="form-group">
						<label  class="control-label col-md-3">Secret Key</label>
						<div class="col-md-7">
							<input type="text" id="encrypt_key" name="key" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label  class="control-label col-md-3">Text</label>
						<div class="col-md-7">
							<textarea id="encrypt_text" name="encrypt_text" rows="6" class="form-control" style="resize: none;"></textarea>
						</div>
					</div>
				</div>

				<div class="form-action">
					<div class="col-md-10 text-right">
						<a id="encrypt" class="btn btn-primary">Encrypt</a>
					</div>
				</div>
			</form>
		</div>

		<div class="row text-center" style="margin-top: 30px;">
			<form id="form_decrypt" class="form form-horizontal" style="padding-top: 15px;">
				<div class="form-body">
					<div class="form-group">
						<label  class="control-label col-md-3">K Rotation</label>
						<div class="col-md-7">
							<input type="number" name="k" class="form-control" value="13" min="2" max="25">
						</div>
					</div>
					<div class="form-group">
						<label  class="control-label col-md-3">Secret Key</label>
						<div class="col-md-7">
							<input type="text" id="decrypt_key" name="key" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label  class="control-label col-md-3">Text</label>
						<div class="col-md-7">
							<textarea id="decrypt_text" name="decrypt_text" rows="6" class="form-control" value="13" style="resize: none"></textarea>
						</div>
					</div>
				</div>

				<div class="form-action">
					<div class="col-md-10 text-right">
						<a id="decrypt" class="btn btn-primary">Decrypt</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
		handleEncrypt();
		handleDecrypt();
	});

	function handleEncrypt(){
		$('#encrypt').on('click', function(){
			console.log('encrypt');

			$.ajax({
				type: 'POST',
				url: 'encrypt.php',
				data: $('#form_encrypt').serialize(),
				dataType: 'JSON',
				success: function success(data) {
					$('#encrypt_text').val('');
					$('#encrypt_key').val('');
					$('#decrypt_text').val(data);
				},

				error: function error(jqXHR, textStatus, errorThrown) {
					
				},
				complete: function complete() {
					
				}
			});
		});
	}

	function handleDecrypt(){
		$('#decrypt').on('click', function(){
			console.log('decrypt');

			$.ajax({
				type: 'POST',
				url: 'decrypt.php',
				data: $('#form_decrypt').serialize(),
				dataType: 'JSON',
				success: function success(data) {
					$('#decrypt_text').val('');
					$('#decrypt_key').val('');
					$('#encrypt_text').val(data);
				},

				error: function error(jqXHR, textStatus, errorThrown) {
					
				},
				complete: function complete() {
					
				}
			});
		});
	}
</script>
</html>