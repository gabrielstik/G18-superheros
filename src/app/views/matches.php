<form action="/matches" method="post">
  <input class="form-text" type="text" name="create-match--player">
  <button type="submit" name="create-match">Créer une partie</button>
</form>
<br>
<br>
<br>
<ul class="matches">
  <? for ($i = 0; $i < sizeof($opponents); $i++) { ?>
  <a href="/match-<?= $matches[$i]->id ?>">
    <li class="match">
      <div class="match--opponent"><?= $opponents[$i] ?></div>
    </li>
  <? } ?>
  </a>
</ul>