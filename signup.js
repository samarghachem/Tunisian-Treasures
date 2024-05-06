document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();

  var lastName = document.getElementById("lastName").value;
  var name = document.getElementById("name").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;
  var email = document.getElementById("email").value;
  var confirmEmail = document.getElementById("confirmEmail").value;
  var agree = document.getElementById("agree").checked;

  var nameRegex = /^[A-Za-z]+$/;
  if (!nameRegex.test(lastName) || !nameRegex.test(name)) {
    alert("Last Name and Name should contain only alphabetic characters.");
    return;
  }

  if (email !== confirmEmail) {
    alert("E-mails do not match ! ");
    return;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match ! ");
    return;
  }

  if (!agree) {
    alert("You must agree to the terms ans conditions.");
    return;
  }
  this.submit();
  alert("Account succefully created. Welcome to our community");
});
