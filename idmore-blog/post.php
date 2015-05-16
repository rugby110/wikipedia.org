<?php
class post{
   private $wikikey;//wikipedia keyword
   public function __construct($wikikey)
   {
      $this->wikikey = $wikikey;
      $this->language = 'id';//option = id,en,etc
   }
   //listing list
   public function listing()
   {

   }
   //single page
   public function single($id)
   {

   }
   //get main thumb
   public function wikiMainThumb()
   {
      $keyword = str_replace(' ','%20',$this->wikikey);//convert to url support
      $apiurl = 'http://'$this->language.'wikipedia.org/w/api.php?action=query&titles='.$keyword.'&prop=pageimages&format=json&pithumbsize=500';
      $response = file_get_contents($apiurl);
      //decoding
      $picture = json_decode($response);
      //get image location
      foreach($picture->query->pages as $p):
         $src = $p->thumbnail->source;
      endforeach;
      return $src;
   }
   //get sort description
   public function wikiShortDescription()
   {
      //huruf pertama harus kapital
      $keyword = str_replace(' ','%20',$this->wikikey);
      $apiurl = $this->url.'/w/api.php?action=query&prop=extracts&format=json&exintro=&titles='.$keyword;
      $response = file_get_contents($apiurl);
      //decoding
      $content = json_decode($response);
      //get content
      foreach($content->query->pages as $p):
         $content = $p->extract;
      endforeach;
      return $content;
   }
}
