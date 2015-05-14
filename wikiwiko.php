<?php
class wikiwiko {
   private $url;
   public function __construct()
	{
      $this->url = 'http://id.wikipedia.org';//default --or-- http://en.wikipedia.org
      // error_reporting(E_ALL);
   }
   public function showResult($keyword)
   {
      $keyword = str_replace(' ','%20',$keyword);
      $apiurl = $this->url.'/w/api.php?action=parse&titles='.$keyword.'&prop=revisions&rvprop=content&format=json';
      $response = file_get_contents($apiurl);
      echo $response;
   }
   public function mainpicture($keyword)//get main picture
   {
      $keyword = str_replace(' ','%20',$keyword);
      $apiurl = $this->url.'/w/api.php?action=query&titles='.$keyword.'&prop=pageimages&format=json&pithumbsize=500';
      $response = file_get_contents($apiurl);
      //decoding
      $picture = json_decode($response);
      //get page id
      foreach($picture->query->pages as $p):
      // $pageid = $p->pageid;
      $src = $p->thumbnail->source;
      endforeach;
      return $src;
   }
   public function singkat($keyword)//singkat cerita
   {
      //huruf pertama harus kapital
      $apiurl = $this->url.'/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=Liverpool%20F.C.';
      $response = file_get_contents($apiurl);
      //decoding
      $content = json_decode($response);
      //get page id
      foreach($content->query->pages as $p):
      // $pageid = $p->pageid;
      $content = $p->extract;
      endforeach;
      return $content;
   }
}
