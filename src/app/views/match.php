<div class="player-1">
  <div class="player-1--alias">
    Nom :
    <?= $player_1['alias'] ?>
  </div>
  <div class="player-1--deck">
    Cartes : <? foreach ($player_1['deck'] as $card) { echo $card->card_id; } ?>
  </div>
  <div class="player-1--card-1"></div>
  <div class="player-1--card-2"></div>
  <div class="player-1--card-3"></div>
  <div class="player-1--card-4"></div>
  <div class="player-1--card-5"></div>
  <div class="player-1--card-6"></div>
  <div class="player-1--card-7"></div>
  <div class="player-1--card-8"></div>
</div>
<div class="player-2">
  <div class="player-2--alias">Nom : <?= $player_2['alias'] ?></div>
  <div class="player-2--deck"></div>
  <div class="player-2--card-1"></div>
  <div class="player-2--card-2"></div>
  <div class="player-2--card-3"></div>
  <div class="player-2--card-4"></div>
  <div class="player-2--card-5"></div>
  <div class="player-2--card-6"></div>
  <div class="player-2--card-7"></div>
  <div class="player-2--card-8"></div>
</div>