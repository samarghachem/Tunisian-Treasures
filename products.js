var openCart = document.querySelector(".shopping");
var closeCart = document.querySelector(".close");
var body = document.querySelector("body");

openCart.addEventListener("click", function () {
  body.classList.add("active");
});
closeCart.addEventListener("click", function () {
  body.classList.remove("active");
});
