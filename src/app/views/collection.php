<ul>
  <? foreach ($collection as $card) { ?>
    <li>
      <?= $card->card_id ?>
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