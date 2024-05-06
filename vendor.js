const Name = document.getElementById("name");
const lastName = document.getElementById("lastName");
const cin = document.getElementById("CIN");
const email = document.getElementById("email");

Name.addEventListener("input", function () {
  Name.value = Name.value.replace(/[^a-zA-Z]/g, "");
});

lastName.addEventListener("input", function () {
  lastName.value = lastName.value.replace(/[^a-zA-Z]/g, "");
});

cin.addEventListener("input", function () {
  cin.value = cin.value.replace(/\D/g, "").slice(0, 8);
});

document.addEventListener("submit", function (event) {
  var valid = true;
  var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (!email.value.match(emailPattern)) {
    alert("Please enter a valid email address.");
    email.value = "";
    valid = false;
  }
  if (cin.value.length !== 8) {
    alert("CIN must be exactly 8 digits.");
    cin.value = "";
    valid = false;
  }
  if (!valid) {
    event.preventDefault();
  } else {
    alert("Welcome to our community !");
  }
});
