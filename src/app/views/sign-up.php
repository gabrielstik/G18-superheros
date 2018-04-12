<form style="padding-top: 100px" class="form--sign-up" id="sign-up" action="/sign-up" method="post">
  <h2 class="form--title">Créer un compte</h2>
  <div class="form--item">
    <label class="form-text" for="sign-up--username">Nom d'utilisateur</label>
    <input class="form-text" ype="text" name="sign-up--username" id="sign-up--username">
  </div>
  <div class="form--item">
    <label class="form-text" for="sign-up--password">Mot de passe</label>
    <input class="form-text" type="password" name="sign-up--password" id="sign-up--password">
  </div>
  <div class="form--item">
    <label class="form-text" for="sign-up--password-confirm">Confirmer le mot de passe</label>
    <input class="form-text" type="password" name="sign-up--password-confirm" id="sign-up--password-confirm">
  </div>
  <div class="form--item">
    <label class="form-text" for="sign-up--alias">Pseudonyme</label>
    <input class="form-text" type="text" name="sign-up--alias" id="sign-up--alias">
  </div>
  <div class="form--item flex flex_around">
    <input class="submit" type="submit" name="sign-up" value="Créer un compte">
  </div>
</form>