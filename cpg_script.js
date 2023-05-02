/*
Filename: cpg_script.js

Purpose: This code will verify that the form
         passes an initial validation test.

         When the form is submitted, the onsubmit event handler
         checks that the form's data is complete and valid.
         An alert box is displayed notifying the user.

         The event function returns a value of false so that the
         user does not have to continually retype values
         in the survey form.
*/

window.onload = init;

function init() {
document.forms[0].onsubmit = function() {
   if (this.checkValidity()) alert("Data passes initial validation tests");
   return false;
}

}