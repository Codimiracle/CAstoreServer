$(document).ready(function () {
	var count = 2;
	$("#append-file").click(function () {
		$("#illustration-container").append('<div class="form-group">' +
				'<label>插图 ' + count + '</label> <input type="file" name="illustration[]" />' +
			'</div>')
		count++;
		$(this).preventDefault();
	});
});