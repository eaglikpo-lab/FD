// bouton login :page d'accueil
const frame29 = document.getElementById("loginBtnframe29");

if (frame29) {
    frame29.addEventListener("click", function () {
        window.location.href = "./logWithMVC/controllers/SignupControllerc.php";
    });
} else {
    console.warn("⚠️ Bouton #loginBtnframe29 non trouvé sur cette page.");
}


// bouton login :lien sur signin
const loginBtn= document.getElementById("loginBtn");

if (loginBtn) {
  loginBtn.addEventListener("click", function () {
    window.location.href = "/FooDa/logWithMVC/controllers/LoginControllerc.php";
  });
} else {
    console.warn("⚠️ Bouton #loginBtn non trouvé sur cette page.");
}



// bouton sigup :lien sur login
const signinBtn= document.getElementById("signinBtn");

if (signinBtn) {
  signinBtn.addEventListener("click", function () {
    window.location.href = "/FooDa/logWithMVC/controllers/SignupControllerc.php";
  });
} else {
    console.warn("⚠️ Bouton #signinBtn non trouvé sur cette page.");
}



// bouton sigup :lien sur login
const disconnect= document.getElementById("disconnect");

if (disconnect) {
  disconnect.addEventListener("click", function () {
    window.location.href = '/FooDa/logWithMVC/controllers/LogOutControllerc.php';
  });
} else {
    console.warn("⚠️ Bouton #signinBtn non trouvé sur cette page.");
}

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('hidden');
}




const loginForm = document.getElementById("loginForm");
if (loginForm) {

  loginForm.addEventListener("submit", function (event) {
    //event.preventDefault();

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
      emailError.textContent = "L'email est requis.";
    }

    const passwordInput = document.getElementById("password");
    const passwordError = document.getElementById("passwordError");

    passwordError.textContent = "";

    if (passwordInput.value.trim() === "") {
      passwordError.textContent = "Le mot de passe est requis.";
    }
  
  });

} else {
    console.warn("⚠️ Bouton #loginForm non trouvé sur cette page.");
}



