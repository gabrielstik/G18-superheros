<ul class="leaderboard" style="padding-top:150px">
  <li class="leaderboard--head flex" style="background:white;padding:10px 10px;width:calc(100% - 20px)">
    <div class="head head--name" style="width:50%;color:black">Pseudo</div>
    <div class="head head--wins" style="width:10%;color:black">Victoires</div>
    <div class="head head--loses" style="width:10%;color:black">Défaites</div>
    <div class="head head--rank" style="width:10%;color:black">Rang</div>
    <div class="head head--level" style="width:10%;color:black">Vibranium</div>
  </li>
  <? foreach ($leaderboard as $player) { ?>
  <li class="leaderboard--player flex" style="background:white;padding:10px 10px;border-top:solid 1px black">
    <div class="player player--name" style="width:50%;color:black"><?= $player->alias ?></div>
    <div class="player player--wins" style="width:10%;color:black"><?= $player->wins ?></div>
    <div class="player player--loses" style="width:10%;color:black"><?= $player->loses ?></div>
    <div class="player player--rank" style="width:10%;color:black"><?= $player->rank ?></div>
    <div class="player player--level" style="width:10%;color:black"><?= $player->xp ?></div>
  </li>
  <? } ?>
</ul>