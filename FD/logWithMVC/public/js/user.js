function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('hidden');
}





document.getElementById("loginForm").addEventListener("submit", function(event) {
  event.preventDefault(); 

  const nameInput = document.getElementById("name");
  const nameError = document.getElementById("nameError");  

  nameError.textContent = "";

  if (nameInput.value.trim() === "") {
    nameError.textContent = "Le nom est requis.";
  } 

  const emailInput = document.getElementById("email");
  const emailError = document.getElementById("emailError");  

  emailError.textContent = "";

  if (emailInput.value.trim() === "") {
    emailError.textContent = "Le nom est requis.";
  }

  const passwordInput = document.getElementById("password");
  const passwordError = document.getElementById("passwordError");  

  passwordError.textContent = "";

  if (passwordInput.value.trim() === "") {
    passwordError.textContent = "Le nom est requis.";
  }
 
});





