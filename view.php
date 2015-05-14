<?php
require_once('wikiwiko.php');
$wiki = new wikiwiko();
if(!empty($_GET['q']))
{
   $keyword = $_GET['q'];
}else{
   $keyword = 'Liverpool F.C.';
}
$result = $wiki->showResult($keyword);
$resultDec = json_decode($result);
?>
<pre>
   <?php
   foreach($resultDec->query->pages as $v):
      $pageid = $v->pageid;//get page id
   endforeach;
   ?>
   <?php
   $query = $resultDec->query->pages->$pageid->revisions;//get main data
   foreach($query as $q):
         $view = (array)$q;
   endforeach;
   ?>
</pre>
<html>
   <head>
      <title><?php echo $keyword;?></title>
   </head>
   <body>
      <h1>Tentang <?php echo str_replace('%20',' ',$keyword);?></h1>
      <p>
         <strong>Singkat Cerita</strong><br/>
         <?php
         $singkat = $wiki->singkat($keyword);
         $singkat = json_decode($singkat);
         print_r($singkat);
         echo $singkat->query->pages->$pageid->extract;
         ?>
      </p>
      <p>
         <strong>Sejarah</strong><br/>
         <pre><?php
         $lastview = $view['*'];
         $sejarah = $wiki->getSejarah($lastview);
         $sejarah =  substr($sejarah[1],0,1000);
         // echo $sejarah;
         // $wiki->styling($sejarah);//style
         ?>
      </p>
   </body>
</html>
