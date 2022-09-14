"use strict";
console.log("sdali");

// constants 
const loginEmail = document.getElementById("floatingInput");
const loginPass = document.getElementById("floatingPassword");
const loginBtn = document.getElementById("userLogin");

const serverResponse = document.getElementById("serverResponse");

const url = "login-confirmation.php";



// Event Listener when click the button :)
loginBtn.addEventListener("click", (e) => {

    e.preventDefault();

    const umairPost = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            email: loginEmail.value,
            pass: loginPass.value
        })
    }

    console.log(loginEmail.value);
    console.log(loginPass.value);

    fetch(url, umairPost).then((res) => res.text()).then((data) => {
        if (data === "1") {
            console.log("Its truing");

            serverResponse.innerHTML = "Login Successful...";
            serverResponse.style.color = "Green";
            setTimeout(() => {
                window.location.href = "//localhost/LMS/student/myprofile.php";
            }, 1000);
        }
        else {
            console.log("It's falsing");
            serverResponse.innerText = "Email Or Password is wrong!";
            serverResponse.style.color = "red";
        }
    });

});

console.log("End of the programm");