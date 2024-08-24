var preloadTime;

function preloader() {
  preloadTime = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("preloader").style.display = "none";
}