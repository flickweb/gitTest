function myFunction() {
  var x = document.getElementById("myInput");
  console.log(x);
  if (x.type == "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
