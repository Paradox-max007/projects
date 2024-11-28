var modal = document.getElementById("loginModal");
var loginButton = document.getElementById("loginButton");
var closeBtn = document.getElementsByClassName("close")[0];

// Open the modal when the Login button is clicked
loginButton.onclick = function() {
  modal.style.display = "block";
}

// Close the modal when the close button or overlay is clicked
closeBtn.onclick = function() {
  modal.style.display = "none";
}

// Close the modal if the user clicks outside the modal
window.onclick = function(event) {
  if (event.target === modal) {
    modal.style.display = "none";
  }
}
