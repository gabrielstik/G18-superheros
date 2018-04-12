<?

class API {

  private function get($url) {
    $path = './cache/'.md5($url);
    if (!is_dir('./cache')) mkdir('./cache');
    if (file_exists($path) && time() - filemtime($path) < 604800) {
      $data = json_decode(file_get_contents($path));
    }
    else {
      $data = json_decode(file_get_contents($url));
      file_put_contents('./cache/'.md5($url), json_encode($data));
    }
    return $data;
  }

  public function get_signup_pictures() {
    $images = array();
    $characters = array(69, 307, 332, 370, 149, 213, 729, 310, 574);
    foreach ($characters as $character) {
      $image = $this->get('http://superheroapi.com/api/'.SUPERHERO_API_KEY.'/'.$character.'/image');
      array_push($images, $image);
    }
    return $images;
  }

  public function get_hero($id) {
    $data = $this->get('http://superheroapi.com/api/'.SUPERHERO_API_KEY.'/'.$id);
    return $data;
  }

  public function get_image($id) {
    $data = $this->get('http://superheroapi.com/api/'.SUPERHERO_API_KEY.'/'.$id.'/image');
    return str_replace('http://', 'https://', $data->url);
  }
}