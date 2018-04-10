<ul>
  <? foreach ($shop as $item) { ?>
  <li>
  <?
  echo '<pre style="font-size:12px">';
  print_r($item);
  echo '</pre>';
  ?>
  </li>
  <? } ?>
</ul>