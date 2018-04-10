<ul class="matches">
  <? for ($i = 0; $i < sizeof($opponents); $i++) { ?>
  <a href="/match/<?= $matches[$i]->id ?>">
    <li class="match">
      <div class="match--opponent"><?= $opponents[$i] ?></div>
    </li>
  <? } ?>
  </a>
</ul>