function toggleStatus(id){
	fetch("process.php", {method: "POST", 
		headers: {"Content-Type": "application/x-www-form-urlencoded"},
		body: "toggle=1&id=" + id
	})
	.then(response => response.text())
	.then(status => {
    document.getElementById("status"+id).innerHTML = status;
	});
}
