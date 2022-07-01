

// login

function login() {

	var user_email = document.getElementById("user_email").value;
	var user_pass = document.getElementById("user_pass").value;

	if(user_email == "admin" && user_pass == "1234")
	{
		window.location.href = "admin.html";
	}else if (user_email == "user" && user_pass == "1234")
	{
		window.location.href = "user.html";
	}
	else
	{
		alert("Incorrent Email or Password :( ");
	}
}


// signup
function signup() {

	window.location.href = "user.html";
}




// navbar
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})





// switch name to id number
function switch_id() {

	tbl_h_1.style.display = "none";
	tbl_h_2.style.display = "block";
	tbl_h_2.style.background = "#FCF3CF";
}
function switch_name() {

	tbl_h_1.style.display = "block";
	tbl_h_2.style.display = "none";
}







// date and time
function display_ct6() {
	var x = new Date()
	var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
	hours = x.getHours( ) % 12;
	hours = hours ? hours : 12;
	var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
	x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
	document.getElementById('ct6').innerHTML = x1;
	display_c6();
}
	function display_c6(){
		var refresh=1000; // Refresh rate in milli seconds
		mytime=setTimeout('display_ct6()',refresh)
	}
	display_c6()
