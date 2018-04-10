<ul class="leaderboard">
  <li class="leaderboard--head flex flex_between">
    <div class="head head--name">Pseudo</div>
    <div class="head head--wins">Victoires</div>
    <div class="head head--loses">Défaites</div>
    <div class="head head--rank">Rang</div>
    <div class="head head--level">Vibranium</div>
  </li>
  <? foreach ($leaderboard as $player) { ?>
  <li class="leaderboard--player flex flex_between">
    <div class="player player--name"><?= $player->alias ?></div>
    <div class="player player--wins"><?= $player->wins ?></div>
    <div class="player player--loses"><?= $player->loses ?></div>
    <div class="player player--rank"><?= $player->rank ?></div>
    <div class="player player--level"><?= $player->xp ?></div>
  </li>
  <? } ?>
</ul>