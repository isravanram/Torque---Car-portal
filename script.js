//document.cookie = "type=sedan";

document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC";

function showGif () {
    
    //document.querySelector('.animated-gif').style.display = "block";
}

/* if(document.readyState === 'complete') {
            // good to go!
            
    $(".animated-gif").hide();
}


//paste this code under the head tag or in a separate js file.
	// Wait for window load
    $(window).onload(function() {
		// Animate loader off screen
		$(".animated-gif").show();
        
        

        
	});
*/

var definedUser = "naishar.shah31@gmail.com";
var definedPassword = "naishar";
var flag = 0;


function autoplays(audio) {
    
    audio.src = "bensound-acousticbreeze.mp3";
    
    if(audio.src) {
        audio.play();    
    }
    
}

function enlarge(element) {
   
    console.log("Working correctly");
    element.style.transform = "translateY(-2%)";
    
}


function small(element) {
   
    console.log("Working correctly");
    element.style.transform = "translateY(0%)";
}
 

function checkLogin() {
    
    var username = document.querySelector('#loginUsername').value;
    var password = document.querySelector('#loginPassword').value;
    
    if(username == definedUser && password == definedPassword) {
        return true;
    } else {
        document.querySelector("#errorMessage").innerHTML = "Username or Password is incorrect";
        return false;
    }
    
}

function checkRegistration() {
    
    var firstname = document.querySelector('#firstname').value;
    var lastname = document.querySelector('#lastname').value;
    var contact = document.querySelector('#contact').value;
    var regex = "/[0-9]{10}/";
    
    alert(firstname + " " + lastname + " " + contact);
    
    var result = regex.test(contact);
    
    if(result == false) {
        alert("false");
    }
    
    /*if(result)
        flag += 1;
        document.querySelector(".contactError").innerHTML = "Contact Number must have 10 digits.";
        alert("correct");
    } else {
        alert("not correct");
    }
    */
    if(firstname.length < 4) {
        flag += 1;
        document.querySelector(".firstnameError").innerHTML = "Firstname must be atleast have 3 alphabets";        
        
    }
    
    
    if(flag == 0) {
        return true;
    }
    
    return false;

    
}


/* ---------------- Cookie --------------------- */

function GetCookie (name) 
        {  
            var arg = name + "=";  
            var alen = arg.length;  
            var clen = document.cookie.length;  
            var i = 0;  
            while (i < clen) 
            {
                var j = i + alen;    
                if (document.cookie.substring(i, j) == arg)      
                return getCookieVal (j);    
                i = document.cookie.indexOf(" ", i) + 1;    
                if (i == 0) break;   
            }  
return null;
}
function SetCookie (name, value) {  
var argv = SetCookie.arguments;  
var argc = SetCookie.arguments.length;  
var expires = (argc > 2) ? argv[2] : null;  
var path = (argc > 3) ? argv[3] : null;  
var domain = (argc > 4) ? argv[4] : null;  
var secure = (argc > 5) ? argv[5] : false;  
document.cookie = name + "=" + escape (value) + 
((expires == null) ? "" : ("; expires=" + expires.toGMTString())) + 
((path == null) ? "" : ("; path=" + path)) +  
((domain == null) ? "" : ("; domain=" + domain)) +    
((secure == true) ? "; secure" : "");
}
function DeleteCookie (name) {  
var exp = new Date();  
exp.setTime (exp.getTime() - 1);   
var cval = GetCookie (name);  
document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString();
}
var expDays = 30;
var exp = new Date(); 
exp.setTime(exp.getTime() + (expDays*24*60*60*1000));
function amt(){
var count = GetCookie('count')
if(count == null) {
SetCookie('count','1')
return 1
}
else {
var newcount = parseInt(count) + 1;
DeleteCookie('count')
SetCookie('count',newcount,exp)
return count
   }
}
function getCookieVal(offset) {
var endstr = document.cookie.indexOf (";", offset);
if (endstr == -1)
endstr = document.cookie.length;
return unescape(document.cookie.substring(offset, endstr));
}


/*  AJAX XML */


function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(xhttp.responseText);
        myFunction(data);
    }
  };
  xhttp.open("GET", "cars.json", true);
  xhttp.send();
}

function myFunction(data) {
  var i;
  
  var table="<tr><th>Title</th><th>Price</th></tr>";
  
  for (i = 0; i < data.length; i++) { 
    table += "<tr><td>" +
    data[i].name +
    "</td><td>" +
    data[i].price +
    "</td></tr>";
  }
    
  document.getElementById("demo").innerHTML = table;
}




