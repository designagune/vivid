$(document).ready(function () {
  $(".mobile-menu").click(function () {
    $(".mobile-menu").toggleClass("active");
    $(".mobile-menu-list").slideToggle(500);
  });

  setTimeout(function () {
    $(".loginalert").fadeOut();
  }, 3000);
});
