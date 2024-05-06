document.getElementById("form").addEventListener("submit", function (event) {
  event.preventDefault();
  var Name = document.getElementById("Name").value;
  var last_name = document.getElementById("last_name").value;
  var message = document.getElementById("message").value;
  var email = document.getElementById("email").value;
  var emailRepeat = document.getElementById("email-repeat").value;

  if (email !== emailRepeat) {
    alert("Emails do not match.");
    return;
  }

  var nameRegex = /^[A-Za-z]+$/;
  if (!nameRegex.test(last_name) || !nameRegex.test(Name)) {
    alert("Last Name and Name should contain only alphabetic characters.");
    return;
  }

  if (message === "") {
    alert("Please write a message.");
    return;
  }

  this.submit();

  alert("Thank you for your feedback.");
});

document.querySelectorAll(".form-field").forEach(function (field) {
  field.addEventListener("blur", function () {
    {
      if (this.value === "") {
        this.style.border = "1px solid red";
      } else {
        this.style.border = "1px solid green";
      }
    }
  });
});
document.getElementById("email").addEventListener("select", function () {
  alert("Copying email should be avoided! Please rewrite your email.");
});

window.addEventListener("resize", function () {
  // rand hex color
  var randomColor = "#" + Math.floor(Math.random() * 16777215).toString(16);

  const form = document.getElementById("form");

  form.style.padding = "16px";
  form.style.border = "1px solid " + randomColor;
});
