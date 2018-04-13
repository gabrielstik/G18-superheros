<div class="boardGame">
  <button class="passTurn">Confirm cards position</button>
  <div class="allyBoard">
      <div class="life"><i class="fa fa-heart" aria-hidden="true"></i><?= $player_1['health'] ?></div>
      <div class="energy">
      <i class="fa fa-bolt" aria-hidden="true"></i>
          <span class="energyLeft"> <?= $player_1['mana'] ?></span>
          <!-- <div class="energyTotal" data-energy="5">/5</div> -->
      </div>
        <div class="hand">
        </div>
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
          <? if (!empty($player_1['cards'][0]->id) && $player_1['cards'][0]->hero_id != 0) {
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
          <? if (!empty($player_1['cards'][1]->id) && $player_1['cards'][1]->hero_id != 0) {
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
          <? if (!empty($player_1['cards'][2]->id) && $player_1['cards'][2]->hero_id != 0) {
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
          <? if (!empty($player_1['cards'][3]->id) && $player_1['cards'][3]->hero_id != 0) {
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
          <? if (!empty($player_1['cards'][4]->id) && $player_1['cards'][4]->hero_id != 0) {
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
        <div class="life"><i class="fa fa-heart" aria-hidden="true"></i><?= $player_1['health'] ?></div>
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
          <? if (!empty($player_2['cards'][0]->id) && $player_2['cards'][0]->hero_id != 0) {
            $hero = $API->get_hero($player_2['cards'][0]->hero_id) ?>
              <div class="card" data-id="<?= $player_2['cards'][0]->hero_id ?>" style="z-index: 1;">
                <div class="cardFront" style="transform: scale(1);">
                    <div class="name"><?= $hero->name ?></div> <!-- ajouter l'image 246 -->
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
          <? if (!empty($player_2['cards'][1]->id) && $player_2['cards'][1]->hero_id != 0) {
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
          <? if (!empty($player_2['cards'][2]->id) && $player_2['cards'][2]->hero_id != 0) {
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
          <? if (!empty($player_2['cards'][3]->id) && $player_2['cards'][3]->hero_id != 0) {
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
          <? if (!empty($player_2['cards'][4]->id) && $player_2['cards'][4]->hero_id != 0) {
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
<form action="/match-<?= $match->id ?>" method="post">
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
    <br><br>
    <button class="endround" type="submit" name="sendNewDatas">End round</button>
</form>
<!-- ajouter les avatars ennemy infos 297 -->
<!-- ajouter les avatars ally infos 332 -->
<!-- virer vie et mettre hors du board -->
<br>
<br>
<br>
<script src="./assets/js/app.js">Envoyer</script>
<!-- ajouter le script parallax -->