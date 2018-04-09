<form id="sign-up" action="/sign-up" method="post">
  <label for="sign-up--username">Nom d'utilisateur</label>
  <input type="text" name="sign-up--username" id="sign-up--username">
  <label for="sign-up--password">Mot de passe</label>
  <input type="password" name="sign-up--password" id="sign-up--password">
  <label for="sign-up--password-confirm">Confirmer le mot de passe</label>
  <input type="password" name="sign-up--password-confirm" id="sign-up--password-confirm">
  <label for="sign-up--alias">Pseudonyme</label>
  <input type="text" name="sign-up--alias" id="sign-up--alias">
  <input type="file" name="sign-up--picture" id="sign-up--picture" accept=".jpg, .jpeg, .png">
  <input type="submit" name="sign-up" value="Créer un compte">
</form>