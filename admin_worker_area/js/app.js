var btnsignin=document.querySelector("#signin");
var btnsignup=document.querySelector("#signup");

var body = document.querySelector("body");

btnsignin.addEventListener("click",function() {
   body.className="sign-in-js"; 
});

btnsignup.addEventListener("click",function() {
    body.className="sign-up-js"; 
 });