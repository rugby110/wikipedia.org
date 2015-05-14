<?php
class wikiwiko {
   private $url;
   public function __construct()
	{
      $this->url = 'http://id.wikipedia.org';//default --or-- http://en.wikipedia.org
      error_reporting(E_ALL);
   }
   public function showResult($keyword)
   {
      $keyword = str_replace(' ','%20',$keyword);
      $apiurl = $this->url.'/w/api.php?action=query&titles='.$keyword.'&prop=revisions&rvprop=content&format=json';
      $response = file_get_contents($apiurl);
      return $response;
   }
   public function mainpicture($keyword)//get main picture
   {

   }
   public function singkat($keyword)//singkat cerita
   {
      $apiurl = $this->url.'//w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$keyword;
      $response = file_get_contents($apiurl);
      return $response;
   }
   public function getSejarah($param)
   {
      $param = str_replace('== Sejarah ==','history',$param);
      preg_match('#[\n\r]history(.*)[ \n\r]#s', $param, $sejarah);
      return $sejarah;
      // echo $param;
      // return $param;
   }
   //styling
   public function styling($param)
   {

      // print_r($result);//get the result
      print_r($param);//get parameter
   }
}
