$(document).ready(function() {
	$("#input-zh").fileinput({
		language: "zh", 
		allowedFileExtensions: ["jpg", "png", "gif", "bmp", "jpeg"], 
		overwriteInitial: true,
		initialPreview: [
			$("#posted-path").val(),
	    ],
	    maxFileSize: 1500,
	    initialPreviewShowDelete: false,
	    initialPreviewAsData: true, // 特别重要
	});
});