var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/;
var numMatch = "/^[0-9]*$/";
var emailMatch = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
var fname;
var lname;
var password;
var email;
var submitBTN;

window.onload = function(){
    password = document.getElementById("password");
    email = document.getElementById("email");
    submitBTN = document.getElementById("btn");

    submitBTN.addEventListener("click", test);

    

}

function test(e){
    console.log("Button Clicked")
    if (email.value === "" || email.value.match === ""){
        alert("Please fill out all fields");
    }
    if (password.value.match(passwordRegex)){
        console.log("Correct Password format")
    }
    else{
        alert("Wrong Password");
    }

    httpR = new XMLHttpRequest;
    httpR.onreadystatechange = function(){  
       if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
           var response = httpR.responseText;
           console.log(response);
       }
   }
   
    httpR.open('POST', "addUser.php?action=gencany&fname="+fname.value+"&lname="+lname.value+"&email="+email.value+"&password="+password.value, true)
    httpR.send();
}


// Validate all the fields