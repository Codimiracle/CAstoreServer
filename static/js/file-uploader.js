/**
 * 
 */

var file_uploader = null;

function FileUploader(area) {
	this.getArea = function () {
		return area;
	}
	
	this.appnedFile = function (field) {}
}

window.addEventListener("load", function () {
	var area = document.getElementById("file_upload_area");
	file_uploader = new FileUploader(area);
});
