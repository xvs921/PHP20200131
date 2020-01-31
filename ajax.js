function insert() {
	felvetel_url = "";
	felvetel_url += "?input_ar=" + document.getElementById("input_ar").value;
	felvetel_url += "&input_tipus=" + document.getElementById("input_tipus").value;
	felvetel_url += "&input_marka=" + document.getElementById("input_marka").value;
	felvetel_url += "&input_gyartasiIdo=" + document.getElementById("input_gyartasiIdo").value;
	document.getElementById("input_ar").value = "";
	document.getElementById("input_tipus").value = "";
	document.getElementById("input_marka").value = "user";
	document.getElementById("input_gyartasiIdo").value = "";
	console.log(felvetel_url);
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("muvelet").innerHTML =
      		this.responseText;
	  		list();
    	}
  	};
  	xhttp.open("GET", "insert.php" + felvetel_url, true);
  	xhttp.send();
}

function list() {
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("tartalom").innerHTML =
      		this.responseText;
    	}
  	};
  	xhttp.open("GET", "select.php", true);
  	xhttp.send();
}

function torles(id) {
	torol_url = "";
	torol_url += "?input_id=" + id;

	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("tartalom").innerHTML =
			  this.responseText;
			  list();
    	}
  	};
  	xhttp.open("GET", "delete.php" + torol_url, true);
  	xhttp.send();
}

function adatok(id) {
	adatok_url = ""
	adatok_url += "?input_id=" + id;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
			document.getElementById("tartalom").innerHTML =
			this.responseText;
	  }
	};
	xhttp.open("GET", "adatok.php" + upd_url, true);
	xhttp.send();
}

function update(id) {
	upd_url = ""
	upd_url += "?input_id=" + id;
	upd_url += "&input_ar=" + document.getElementById("input_upd_ar").value;
	upd_url += "&input_tipus=" + document.getElementById("input_upd_tipus").value;
	upd_url += "&input_marka=" + document.getElementById("input_upd_marka").value;
	upd_url += "&input_gyartasiIdo=" + document.getElementById("input_upd_gyartasiIdo").value;
	document.getElementById("input_ar").value = "";
	document.getElementById("input_tipus").value = "";
	document.getElementById("input_marka").value = "user";
	document.getElementById("input_gyartasiIdo").value = "";

	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("tartalom").innerHTML =
			  this.responseText;
			  list();
    	}
  	};
  	xhttp.open("GET", "update.php" + upd_url, true);
  	xhttp.send();
}