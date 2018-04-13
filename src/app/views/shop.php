<div style="padding-top:150px;font-size:24px;text-align:center" class="money">Argent : <?= $money ?></div>
<ul style="margin-top:50px;" class="grid">
  <? foreach ($datas as $data) { if (!empty($data->name)) { ?>
  <li>
    <img style="height: 100px" src="<?= $API->get_image($data->id) ?>" alt="">
    <div class="card--name">
      <?= $data->name ?>
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