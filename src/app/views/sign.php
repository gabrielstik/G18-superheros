<form id="sign-in" action="/sign" method="post">
  <input type="text" name="sign-in--username">
  <input type="password" name="sign-in--password">
  <input type="submit" name="sign-in">
</form>

<form id="sign-up" action="/sign" method="post">
  <input type="text" name="sign-up--username">
  <input type="password" name="sign-up--password">
  <input type="password" name="sign-up--password-confirm">
  <input type="submit" name="sign-up">
</form>

<? 

echo '<pre style="font-size:12px">';
print_r($sign);
echo '</pre>';
echo '<pre style="font-size:12px">';
print_r($this->error);
echo '</pre>';