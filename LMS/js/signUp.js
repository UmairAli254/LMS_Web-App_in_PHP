"use strict";

// Constants
let signup = document.getElementById("signUp");
let username = document.getElementById("username");
let email = document.getElementById("email");
let pass = document.getElementById("pass");
let conf_pass = document.getElementById("conf-pass");
let urlSignUp = "signup-confirmation.php";

let alertBar = document.getElementById("alertBar");
let c_pass_check = document.getElementsByClassName("c_pass_check")[0];


// Disable the submit button if all or one field(s) are empty.
if (username.value === "" || email.value === "" || pass.value === "" || conf_pass.value === "")
    signup.setAttribute("disabled", "disabled");
else
    signup.removeAttribute("disabled");



// Check if password doesn't match
conf_pass.addEventListener("input", () => {

    if (pass.value !== "") {
        if (pass.value !== conf_pass.value) {
            c_pass_check.innerText = "Password doesn't match.";
            c_pass_check.classList.remove("text-success");
            c_pass_check.classList.add("text-danger");
            signup.setAttribute("disabled", "disabled");
        }
        else {
            c_pass_check.innerText = "Password match!";
            c_pass_check.classList.remove("text-danger");
            c_pass_check.classList.add("text-success");
            signup.removeAttribute("disabled");
        }

    }

});
pass.addEventListener("input", () => {
    // It will check if the conf_pass vlaue is not null
    if (conf_pass.value !== "") {

        if (pass.value !== conf_pass.value) {
            c_pass_check.innerText = "Password doesn't match";
            c_pass_check.classList.remove("text-success");
            c_pass_check.classList.add("text-danger");
            signup.setAttribute("disabled", "disabled");
        }
        else {
            c_pass_check.innerText = "Password match";
            c_pass_check.classList.remove("text-danger");
            c_pass_check.classList.add("text-success");
            signup.removeAttribute("disabled");
        }

    }

});
// End of the Check if password doesn't match




// Event Listener when clicks on the signup form :)
signup.addEventListener("click", function (e) {

    e.preventDefault();

    // Start Ajax From Here 
    const xhr = new XMLHttpRequest();
    xhr.open("POST", urlSignUp, true); 

    // Response Type and Request Header
    xhr.responseType = "text";
    xhr.setRequestHeader("content-type", "application/json");

    xhr.onprogress = () => {
        console.log("Progressinge...");
    };

    xhr.onload = function () {
        console.log(xhr.response);

        // Alert Bar Starts Here
        alertBar.style.display = "block";
        alertBar.classList.add("alert-danger");
        alertBar.innerText = xhr.response;

        if (xhr.response.includes("successfully")) {
            alertBar.classList.remove("alert-danger");
            alertBar.classList.add("alert-success");
        }
        // Alert Bar Ends Here
    }

    // Data that we will send to server
    let data = JSON.stringify({
        username: username.value,
        email: email.value,
        pass: pass.value,
        conf_pass: conf_pass.value
    });
    xhr.send(data);
    // Ajax ends here

});
// Envet Listener ends here :)