<?

class APIsController {
  function __construct($api_url) {
    $data = APIs::get($api_url);
    echo '<pre style="font-size:12px">';
    print_r($data);
    echo '</pre>';
  }
}