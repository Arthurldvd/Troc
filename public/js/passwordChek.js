function checkPassword(password) {
    var hasLowerCase = false;
    var hasUpperCase = false;
    var hasNumber = false;
    var hasSpecialChar = false;
    var hasLength = false;

    // Vérifiez s'il y a au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial
    for (var i = 0; i < password.length; i++) {
      var char = password.charAt(i);
      if(password.length >= 12) {
        hasLength = true;
        }

      if (/[a-z]/.test(char)) {
        hasLowerCase = true;
      } 
      if (/[A-Z]/.test(char)) {
        hasUpperCase = true;
      } 
       if (/[0-9]/.test(char)) {
        hasNumber = true;
      } 
       if (/[^a-zA-Z0-9]/.test(char)) {
        hasSpecialChar = true;
      }
    }

    // Retourne vrai si le mot de passe remplit tous les critères, sinon faux
    return hasLowerCase && hasUpperCase && hasNumber && hasSpecialChar && hasLength;
  }

  // Ajoutez un écouteur d'événement "input" sur votre champ de mot de passe
  document.getElementById("mdp").addEventListener("keyup", function() {
    // Récupérez la valeur du mot de passe saisi par l'utilisateur
    var password = document.getElementById("mdp").value;

    // Vérifiez si le mot de passe remplit les critères de sécurité
    var isValidPassword = checkPassword(password);

    // Affichez un message d'erreur si le mot de passe n'est pas valide
    if (isValidPassword) {
      // le mot de passe est valide
      document.getElementById("error-message").style.display = "none";
    } else {
      // le mot de passe n'est pas valide
      document.getElementById("error-message").style.display = "block";
    }
  });