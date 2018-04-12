<form class="connexion form--sign-in" id="sign-in" action="/sign-in" method="post">
  <h2 class="form--title">Connexion</h2>
  <div class="form--item">
    <label class="form-text" for="sign-in--username">Identifiant</label>
    <input class="form-text" type="text" name="sign-in--username" id="sign-in--username">
  </div>
  <div class="form--item">
    <label class="form-text" for="sign-in--password">Mot de passe</label>
    <input class="form-text" type="password" name="sign-in--password" id="sign-in--password">
  </div>
  <div class="form--item flex flex_around">
    <input class="submit" type="submit" name="sign-in" value="Se connecter">
  </div>
</form>
<p style="text-align: center"><a href="/sign-up">S'inscrire</a></p>
