// JavaScript Document
var timer;

$(".parent").on("mouseover", function() {
  clearTimeout(timer);
    openSubmenu();
}).on("mouseleave", function() {
  timer = setTimeout(
    closeSubmenu
  , 1000);
});

function openSubmenu() {
  $(".li").addClass("open");
}
function closeSubmenu() {
  $(".li").removeClass("open");
}