<ul>
  <? foreach ($leaderboard as $user) { ?>
  <li>
  <?
  echo '<pre style="font-size:12px">';
  print_r($user);
  echo '</pre>';
  ?>
  </li>
  <? } ?>
</ul>