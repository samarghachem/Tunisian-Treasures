window.addEventListener("load", function () {
  alert(
    "Please do not put in your real information. This is a learning project that may not be secure"
  );
});

var cardNumber = document.getElementById("card-number");
var expiryDate = document.getElementById("expiry-date");
var cvv = document.getElementById("cvv");
var form = document.getElementById("form");
var email = document.getElementById("email");
var city = document.getElementById("city");
var zipCode = document.getElementById("zip-code");
var nameOnCard = document.getElementById("name-on-card");
var fullName = document.getElementById("full-name");

fullName.addEventListener("input", function () {
  fullName.value = fullName.value.replace(/[^a-zA-Z ]/g, "");
});

cardNumber.addEventListener("input", function () {
  cardNumber.value = cardNumber.value.replace(/\D/g, "").slice(0, 16);
});

cvv.addEventListener("input", function () {
  cvv.value = cvv.value.replace(/\D/g, "").slice(0, 3);
});

nameOnCard.addEventListener("input", function () {
  nameOnCard.value = nameOnCard.value.replace(/[^a-zA-Z ]/g, "");
});

zipCode.addEventListener("input", function () {
  zipCode.value = zipCode.value.replace(/\D/g, "").slice(0, 4);
});
form.addEventListener("submit", function (event) {
  event.preventDefault();
  var currentDate = new Date();
  var selectedDate = new Date(expiryDate.value);
  var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  var namePattern = /^[a-zA-Z ]+$/;

  if (!fullName.value.match(namePattern)) {
    alert("Name must be composed of letters and spaces.");
    fullName.value = "";
    return;
  }

  if (!email.value.match(emailPattern)) {
    alert("Please enter a valid email address.");
    email.value = "";
    return;
  }
  if (!city.value.match(namePattern)) {
    alert("City must be composed of letters and spaces.");
    city.value = "";
    return;
  }
  if (zipCode.value.length !== 4) {
    alert("Zip code must be exactly 4 digits.");
    zipCode.value = "";
    return;
  }
  if (!nameOnCard.value.match(namePattern)) {
    alert("Name on card must be composed of letters and spaces.");
    nameOnCard.value = "";
    return;
  }
  if (cardNumber.value.length !== 16) {
    alert("Card number must be exactly 16 digits.");
    cardNumber.value = "";
    return;
  }
  if (
    selectedDate < new Date(currentDate.getFullYear(), currentDate.getMonth())
  ) {
    alert("Please enter a valid expiry date.");
    expiryDate.value = "";
    return;
  }
  if (cvv.value.length !== 3) {
    alert("CVV must be exactly 3 digits.");
    cvv.value = "";
    return;
  }
  this.submit();
  alert("Payment successfully done. Thank you ! ");
});
