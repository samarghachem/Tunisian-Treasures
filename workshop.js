var firstName = document.getElementById("firstName");
var lastName = document.getElementById("lastName");
var email = document.getElementById("email");
var number = document.getElementById("phone-number");
var form = document.getElementById("form");

firstName.addEventListener("input", function () {
  firstName.value = firstName.value.replace(/[^a-zA-Z]/g, "");
});

lastName.addEventListener("input", function () {
  lastName.value = lastName.value.replace(/[^a-zA-Z]/g, "");
});

number.addEventListener("input", function () {
  number.value = number.value.replace(/\D/g, "").slice(0, 8);
});

form.addEventListener("submit", function (event) {
  var emailPattern = /^[a-z]+\.[a-z]+@ensi-uma\.tn$/i;
  var valid = true;
  if (!email.value.match(emailPattern)) {
    alert("Note: Only ENSI Students/Staff are allowed to register.");
    email.value = "";
    valid = false;
  }

  if (number.value.length != 8) {
    alert("Phone Number must be composed of exactly 8 digits.");
    valid = false;
    number.value = "";
  }

  if (!valid) {
    event.preventDefault();
  } else {
    alert("Registration successfully done ! Save the date!");
  }
});
