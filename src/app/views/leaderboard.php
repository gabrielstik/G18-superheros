<ul class="leaderboard">
  <? foreach ($leaderboard as $player) { ?>
  <li class="player flex flex_between">
    <? echo '<pre style="font-size:12px">';
    print_r($player);
    echo '</pre>'; ?>
    <div class="player--name"><?= $player->alias ?></div>
  </li>
  <? } ?>
</ul>