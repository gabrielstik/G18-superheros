<ul>
  <? foreach ($cards as $card) { ?>
  <li>
  <?
  echo '<pre style="font-size:12px">';
  print_r($card);
  echo '</pre>';
  ?>
  </li>
  <? } ?>
</ul>