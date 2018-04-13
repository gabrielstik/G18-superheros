<ul style="padding-top:150px" class="grid">
  <? foreach ($collection as $card) { ?>
    <? $hero = $this->API->get_hero($card->card_id) ?>
    <li style="list-style:none">
      <img style="height: 100px" src="<?= $this->API->get_image($card->card_id) ?>" alt="">
      <?= $this->API->get_hero($card->card_id)->name ?>
      <div>Attaque : <?= $hero->powerstats->strength ?></div>
      <div>Défense : <?= $hero->powerstats->durability ?></div>
      <div>Intelligence : <?= $hero->powerstats->intelligence ?></div>
      <div>Speed : <?= $hero->powerstats->speed ?></div>
      <? if ($card->in_deck == false) { ?>
      <form action="/collection" method="post">
        <input type="hidden" name="add-deck--id" value="<?= $card->id ?>">
        <button type="submit" name="add-deck">Ajouter au deck</button>
      </form>
      <? } else { ?>
      <form action="/collection" method="post">
        <input type="hidden" name="remove-deck--id" value="<?= $card->id ?>">
        <button type="submit" name="remove-deck">Supprimer du deck</button>
      </form>
      <? } ?>
    </li>
    <br>
  <? } ?>
</ul>