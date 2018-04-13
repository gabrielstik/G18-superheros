<form action="/matches" method="post" style="padding-top:150px;width:90%">
  <input class="form-text" type="text" name="create-match--player">
  <button type="submit" name="create-match">Créer une partie</button>
</form>
<ul class="matches">
  <? for ($i = 0; $i < sizeof($opponents); $i++) { ?>
  <a href="/match-<?= $matches[$i]->id ?>">
    <li class="match" style="background:white;padding:10px 10px;border-top:solid 1px black;list-style:none;">
  <div class="match--opponent" style="<? if ($matches[$i]->playing_player == $_SESSION['user-id']) {?>color:black<? } else { ?>color:red<? } ?>"><? if ($matches[$i]->playing_player == $_SESSION['user-id']) {?>Continuer face à <? } ?><?= $opponents[$i] ?><?if ($matches[$i]->playing_player != $_SESSION['user-id']) {?> joue son tour<? } ?></div>
    </li>
  <? } ?>
  </a>
</ul>