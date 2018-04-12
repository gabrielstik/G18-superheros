<div class="match--round"><?= $match->round ?></div>
<div class="match--playing"><?= $match->playing_player ?></div>
<br>
<br>
<div class="player-1">
  <div class="player-1--alias">
    Nom :
    <?= $player_1['alias'] ?>
  </div>
  <div class="player-1--health">
    Santé :
    <?= $player_1['health'] ?>
  </div>
  <div class="player-1--mana">
    Mana :
    <?= $player_1['mana'] ?>
  </div>
  <div class="player-1--deck">
    Deck : <? foreach ($player_1['deck'] as $card) { echo $card->card_id.' '; } ?>
  </div>
  <div class="player-1--card-0">1 : <?= !empty($player_1['cards'][0]->id) ? $player_1['cards'][0]->id : '' ?></div>
  <div class="player-1--card-1">2 : <?= !empty($player_1['cards'][1]->id) ? $player_1['cards'][1]->id : '' ?></div>
  <div class="player-1--card-2">3 : <?= !empty($player_1['cards'][2]->id) ? $player_1['cards'][2]->id : '' ?></div>
  <div class="player-1--card-3">4 : <?= !empty($player_1['cards'][3]->id) ? $player_1['cards'][3]->id : '' ?></div>
  <div class="player-1--card-4">5 : <?= !empty($player_1['cards'][4]->id) ? $player_1['cards'][4]->id : '' ?></div>
  <div class="player-1--card-5">6 : <?= !empty($player_1['cards'][5]->id) ? $player_1['cards'][5]->id : '' ?></div>
  <div class="player-1--card-6">7 : <?= !empty($player_1['cards'][6]->id) ? $player_1['cards'][6]->id : '' ?></div>
  <div class="player-1--card-7">8 : <?= !empty($player_1['cards'][7]->id) ? $player_1['cards'][7]->id : '' ?></div>
  <div class="player-1--card-8">9 : <?= !empty($player_1['cards'][8]->id) ? $player_1['cards'][8]->id : '' ?></div>
  <div class="player-1--card-9">10 : <?= !empty($player_1['cards'][9]->id) ? $player_1['cards'][9]->id : '' ?></div>
  <div class="player-1--card-10">11 : <?= !empty($player_1['cards'][10]->id) ? $player_1['cards'][10]->id : '' ?></div>
  <div class="player-1--card-11">12 : <?= !empty($player_1['cards'][11]->id) ? $player_1['cards'][11]->id : '' ?></div>
</div>
<br>
<br>
<div class="player-2">
  <div class="player-2--alias">
    Nom : <?= $player_2['alias'] ?>
  </div>
  <div class="player-2--health">
    Santé :
    <?= $player_2['health'] ?>
  </div>
  <div class="player-2--mana">
    Mana :
    <?= $player_2['mana'] ?>
  </div>
  <div class="player-2--deck">
    Deck : <? foreach ($player_2['deck'] as $card) { echo $card->card_id.' '; } ?>
  </div>
  <div class="player-2--card-0">1 : <?= !empty($player_2['cards'][0]->id) ? $player_2['cards'][0]->id : '' ?></div>
  <div class="player-2--card-1">2 : <?= !empty($player_2['cards'][1]->id) ? $player_2['cards'][1]->id : '' ?></div>
  <div class="player-2--card-2">3 : <?= !empty($player_2['cards'][2]->id) ? $player_2['cards'][2]->id : '' ?></div>
  <div class="player-2--card-3">4 : <?= !empty($player_2['cards'][3]->id) ? $player_2['cards'][3]->id : '' ?></div>
  <div class="player-2--card-4">5 : <?= !empty($player_2['cards'][4]->id) ? $player_2['cards'][4]->id : '' ?></div>
  <div class="player-2--card-5">6 : <?= !empty($player_2['cards'][5]->id) ? $player_2['cards'][5]->id : '' ?></div>
  <div class="player-2--card-6">7 : <?= !empty($player_2['cards'][6]->id) ? $player_2['cards'][6]->id : '' ?></div>
  <div class="player-2--card-7">8 : <?= !empty($player_2['cards'][7]->id) ? $player_2['cards'][7]->id : '' ?></div>
  <div class="player-2--card-8">9 : <?= !empty($player_2['cards'][8]->id) ? $player_2['cards'][8]->id : '' ?></div>
  <div class="player-2--card-9">10 : <?= !empty($player_2['cards'][9]->id) ? $player_2['cards'][9]->id : '' ?></div>
  <div class="player-2--card-10">11 : <?= !empty($player_2['cards'][10]->id) ? $player_2['cards'][10]->id : '' ?></div>
  <div class="player-2--card-11">12 : <?= !empty($player_2['cards'][11]->id) ? $player_2['cards'][11]->id : '' ?></div>
</div>


<div class="boardGame">
  <div class="passTurn">Pass turn</div>
  <div class="allyBoard">
      <div class="life"><?= $player_1['health'] ?></div>
      <div class="energy">
          <div class="energyLeft"><?= $player_1['mana'] ?></div>
          <div class="energyTotal" data-energy="5">/5</div>
      </div>
        <div class="hand">
        </div>
        <?
        echo '<pre style="font-size:12px">';
        print_r($player_1['deck']);
        echo '</pre>';
        ?>
        <div class="deck">
            <? for ($i = 0; $i < sizeof($player_1['deck']); $i++) { ?>
            <? $hero = $API->get_hero($player_1['deck'][$i]->card_id) ?>
            <div class="card" data-id="<?= $player_1['deck'][$i]->card_id ?>">
                <div class="cardFront">
                    <div class="name"><?= $hero->name ?></div>
                    <div class="cardStats">
                        <div class="attack"><?= $hero->powerstats->strength ?></div>
                        <div class="defence"><?= $hero->powerstats->durability ?></div>
                        <div class="speed"><?= $hero->powerstats->speed ?></div>
                        <div class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                    <img img draggable="false" src="<?= $API->get_image($player_1['deck'][$i]->card_id) ?>" class="card__image" alt="#">
                </div>
                <div class="cardBack"></div>
            </div>
            <? } ?>
        </div>
        <div class="allyField">
        <div class="field__slot0 field_slots">
          <? if (!empty($player_1['cards'][0]->id)) {
            $hero = $API->get_hero($player_1['cards'][0]->hero_id) ?>
              <div class="card" data-id="<?= $player_1['cards'][0]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_1['cards'][0]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot1 field_slots">
          <? if (!empty($player_1['cards'][1]->id)) {
            $hero = $API->get_hero($player_1['cards'][1]->hero_id) ?>
              <div class="card" data-id="<?= $player_1['cards'][1]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_1['cards'][1]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot2 field_slots">
          <? if (!empty($player_1['cards'][2]->id)) {
            $hero = $API->get_hero($player_1['cards'][2]->hero_id) ?>
              <div class="card" data-id="<?= $player_1['cards'][2]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_1['cards'][2]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot3 field_slots">
          <? if (!empty($player_1['cards'][3]->id)) {
            $hero = $API->get_hero($player_1['cards'][3]->hero_id) ?>
              <div class="card" data-id="<?= $player_1['cards'][3]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_1['cards'][3]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot4 field_slots">
          <? if (!empty($player_1['cards'][4]->id)) {
            $hero = $API->get_hero($player_1['cards'][4]->hero_id) ?>
              <div class="card" data-id="<?= $player_1['cards'][4]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_1['cards'][4]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>
        </div>
    </div>
    <div class="ennemyBoard">
        <div class="life"><?= $player_1['health'] ?></div>
        <div class="hand">
            <div class="card" data-id="1">
                <div class="cardFront">
                    <div class="name">thor</div>
                    <div class="cardStats">
                        <div data-attack="50" class="attack">50</div>
                        <div data-defence="60" class="defence">60</div>
                        <div data-speed="20" class="speed">20</div>
                        <div data-inteligence="60" class="inteligence">60</div>
                    </div>
                    <img img draggable="false" src="../img/iron_man.jpg" class="card__image" alt="#">
                </div>
                <div class="cardBack"></div>
            </div>
        </div>
        <div class="ennemyField">
        <div class="field__slot0 field_slots">
          <? if (!empty($player_2['cards'][0]->id)) {
            $hero = $API->get_hero($player_2['cards'][0]->hero_id) ?>
              <div class="card" data-id="<?= $player_2['cards'][0]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_2['cards'][0]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot1 field_slots">
          <? if (!empty($player_2['cards'][1]->id)) {
            $hero = $API->get_hero($player_2['cards'][1]->hero_id) ?>
              <div class="card" data-id="<?= $player_2['cards'][1]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_2['cards'][1]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot2 field_slots">
          <? if (!empty($player_2['cards'][2]->id)) {
            $hero = $API->get_hero($player_2['cards'][2]->hero_id) ?>
              <div class="card" data-id="<?= $player_2['cards'][2]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_2['cards'][2]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot3 field_slots">
          <? if (!empty($player_2['cards'][3]->id)) {
            $hero = $API->get_hero($player_2['cards'][3]->hero_id) ?>
              <div class="card" data-id="<?= $player_2['cards'][3]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_2['cards'][3]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>

            <div class="field__slot4 field_slots">
          <? if (!empty($player_2['cards'][4]->id)) {
            $hero = $API->get_hero($player_2['cards'][4]->hero_id) ?>
              <div class="card" data-id="<?= $player_2['cards'][4]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div>
                    <img img="" draggable="false" src="<?= $API->get_image($player_2['cards'][4]->hero_id) ?>" class="card__image" alt="#">
                    <div class="cardStats">
                        <div data-attack="<?= $hero->powerstats->strength ?>" class="attack"><?= $hero->powerstats->strength ?></div>
                        <div data-defence="<?= $hero->powerstats->durability ?>" class="defence"><?= $hero->powerstats->durability ?></div>
                        <div data-speed="<?= $hero->powerstats->speed ?>" class="speed"><?= $hero->powerstats->speed ?></div>
                        <div data-inteligence="<?= $hero->powerstats->intelligence ?>" class="inteligence"><?= $hero->powerstats->intelligence ?></div>
                    </div>
                </div>
                <div class="cardBack"></div>
              </div>
              <? } ?>
            </div>
        </div>
       </div>
        </div>
    </div>
</div>
<form action="" method="">
    <input type="hidden" name="life" value="">
    <input type="hidden" name="slot0" value="">
    <input type="hidden" name="slot1" value="">
    <input type="hidden" name="slot2" value="">
    <input type="hidden" name="slot3" value="">
    <input type="hidden" name="slot4" value="">
    <input type="hidden" name="cardDefence0" value="">
    <input type="hidden" name="cardDefence1" value="">
    <input type="hidden" name="cardDefence2" value="">
    <input type="hidden" name="cardDefence3" value="">
    <input type="hidden" name="cardDefence4" value="">
    <input type="hidden" name="hand0" value="">
    <input type="hidden" name="hand1" value="">
    <input type="hidden" name="hand2" value="">
    <input type="hidden" name="hand3" value="">
    <input type="hidden" name="hand4" value="">
    <input type="hidden" name="hand5" value="">
    <input type="hidden" name="hand6" value="">
</form>
<script src="./assets/js/app.js"></script>