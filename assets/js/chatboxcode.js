
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "/includes/themes/construct/chat/messagebox/upload.php?id=<?php echo $user['id']; ?>");
	ajax.send(formdata);
	document.getElementById("barprocc").style.display = "block";
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("others-content").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("others-content").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
	document.getElementById("barprocc").style.display = "none";
}
function errorHandler(event){
	_("others-content").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("others-content").innerHTML = "Upload Aborted";
}