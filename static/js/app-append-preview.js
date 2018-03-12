/**
 * 
 */
var bindingMap = {
		"#name" : ".app-name .body",
		"#developer" : ".app-developer .body",
		"#description" : ".app-description .body"
}

for (var key in bindingMap) {
	let target = bindingMap[key];
	$(key).keyup(function () {
		$(target).text($(this).val());
	});
}