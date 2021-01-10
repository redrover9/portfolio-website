<!DOCTYPE html>
<html>
	<?php
	session_start();
if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
}  else {
        header("location: login.php");
        exit;
}
?>
	<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

		         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>Torah Reader</title>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 50px auto;
  font-family: Raleway;
  padding: 20px;
  width: 50%;
  min-width: 300px;
}

h1 {
  text-align: center;
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
  text-transform: capitalize;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4b68d1;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4b68d1;
}
   * { box-sizing: border-box; }
body {
  font: 16px Arial;
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>
<body>
 <form autocomplete="off" id="regForm" action="/torah.php" method="post">

<h1>Torah Reader</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">

	Calendar:
	<select name="cycle" id="cycle">
	<option value="Annual">Annual</option>
	<option value="Triennial">Triennial</option>
</select>
<div style='display:none;' id='year'>
<br><br>Triennial Year:
<select name="year" id="year">
<option value="One">5780 (2019-2020)</option>
<option value="Two">5781 (2020-2021)</option>
<option value="Three">5782 (2021-2022)</option>
</select>
</div>
</div>
<div class="tab">Parasha:
	<div class="autocomplete" style="width:300px;">
		<input id="parasha" type="text" name="parasha" placeholder="Parasha" oninput="this.className = ''">

</div>
</div>

<div class="tab">Section:
	<select name="aliyah" id="aliyah">
		<option value="1">First Aliyah</option>
<option value="2">Second Aliyah</option>
<option value="3">Third Aliyah</option>
<option value="4">Fourth Aliyah</option>
<option value="5">Fifth Aliyah</option>
<option value="6">Sixth Aliyah</option>
<option value="7">Seventh Aliyah</option>
<option value="maf">Maftir Aliyah</option>
<option value="H">Haftara</option>
	</select>
</div>
<div class="tab">Highlighted Trope Marks
	<select name="highlighting" id="highlighting">
		<option value="No">No</option>
		<option value="Yes">Yes</option>
	</select>
<br><br>
<div style='display: none;' id='trope'>
	Sof Pasuk: <select name="sofPasuk" id="sofPasuk">
			<option value="">None</option>
			<option value="Pink">Pink</option>
			<option value="Green">Green</option>
			<option value="Purple">Purple</option>
			<option value="Orange">Orange</option>
			<option value="White">White</option>
			<option value="Aqua">Aqua</option>
			<option value="Salmon">Salmon</option>
			<option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
	</select>
	<br><br>
	Zakef Katon: <select name="zakefKaton" id="zakefKaton"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Tevir: <select name="tevir" id="tevir"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Geresh: <select name="geresh" id="geresh"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Telisha Gedola: <select name="telishaGedola" id="telishaGedola"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Pazer: <select name="pazer" id="pazer"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Karne Para: <select name="karnePara" id="karnePara"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Etnachta: <select name="etnachta" id="etnachta"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Revia: <select name="revia" id="revia"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Segol: <select name="segol" id="segol"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Gershayim: <select name="gershayim" id="gershayim"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Zakef Gadol: <select name="zakefGadol" id="zakefGadol"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
	<br><br>
	Shalshelet: <select name="shalshelet" id="shalshelet"> 
			<option value="">None</option>
                        <option value="Pink">Pink</option>
                        <option value="Green">Green</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                        <option value="White">White</option>
                        <option value="Aqua">Aqua</option>
                        <option value="Salmon">Salmon</option>
                        <option value="Yellow">Yellow</option>
			<option value="Red">Red</option>
        </select>
</div>
</div>
  <div class="tab">
        Layout: <select name="layout" id="layout">
                <option value="tikkun">Tikkun</option>
        <option value="STaM">STaM</option>
        </select>
</div>
<div class="tab">
        Pitch: <select name="pitch" id="pitch">
                <option value="">Default</option>
                <option value="high-">High</option>
                <option value="medium-high-">Medium High</option>
                <option value="medium-low-">Medium Low</option>
                <option value="low-">Low</option>
        </select>
</div>
<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form> 
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
		<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var parashot = ["Bereshit","Noach","Lech-Lecha","Vayera","Chayei Sara","Toldot","Vayetzei","Vayishlach","Vayeshev",
"Miketz","Vayigash","Vayechi","Shemot","Vaera","Bo","Beshalach","Yitro","Mishpatim","Terumah","Tetzaveh",
"KiTisa","Vayikra","Tzav","Shmini","Tazria-Metzora","AchreiMot-Kedoshim","Emor","Behar-Bechukotai",
"Bamidbar","Nasso","Behaalotcha","Shlach","Korach","Chukat","Balak","Pinchas","Matot-Masei","Devarim",
"Vaetchanan","Eikev","Reeh","Shoftim","KiTetzei","KiTavo","Nitzavim","Haazinu"];
autocomplete(document.getElementById("parasha"), parashot);

		</script>
	<script>
		$(document).ready(function(){
    $('#cycle').on('change', function() {
      if ( this.value == 'Triennial')
      {
        $("#year").show();
      }
      else
      {
        $("#year").hide();
      }
    });
});
	</script>
	<script>
                $(document).ready(function(){
    $('#highlighting').on('change', function() {
      if ( this.value == 'Yes')
      {
        $("#trope").show();
      }
      else
      {
        $("#trope").hide();
      }
    });
});

	</script>
</body>
</html>
