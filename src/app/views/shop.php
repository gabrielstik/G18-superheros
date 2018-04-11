<div class="current-money"><?= $money ?></div>
<br>
<br>
<br>
<ul>
  <? foreach ($datas as $data) { if (!empty($data->name)) { ?>
  <li>
    <div class="card--name">
      Nom : <?= $data->name ?>
    </div>
    <div class="card--attack">
      Attaque : <?= $data->powerstats->strength ?>
    </div>
    <div class="card--defense">
      Défense : <?= $data->powerstats->durability ?>
    </div>
    <div class="card--intelligence">
      Intelligence : <?= $data->powerstats->intelligence ?>
    </div>
    <div class="card--speed">
      Vitesse : <?= $data->powerstats->speed ?>
    </div>
    <div class="card--price">
      Prix :
      <?= $this->Db->get_price($data->id) ?>
    </div>
    <form action="/shop" method="post">
      <input type="hidden" name="buy--id" value="<?= $data->id ?>"></input>
      <button type="submit" name="buy">Acheter</button>
    </form>
  </li>
  <br>
  <br>
  <? }} ?>
</ul>