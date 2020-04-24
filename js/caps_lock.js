var inpPassword = document.getElementById("pw");
var capsLockWarn = document.querySelector("#caps-lock-warn");

inpPassword.addEventListener("keyup", function (e) {
  var isCapsLockOn = e.getModifierState("CapsLock");
  capsLockWarn.style.display = isCapsLockOn ? "block" : "none";
});
