<?php
require_once('wikiwiko.php');//main class
$wiki = new wikiwiko();
if(!empty($_GET['q']))
{
   $keyword = $_GET['q'];
}else{
   $keyword = 'Liverpool F.C.';
}
?>
<html>
   <head>
      <title><?php echo $keyword;?></title>
      <style media="screen">
         .thumb{width:100px;height:100px}
      </style>
   </head>
   <body>
      <i>untuk percobaan lain, tambah parameter get contoh <code>url?q=Manchester F.C.</code> <br/><strong>setelah spasi awali dengan huruf besar</strong> </i>
      <h1>Tentang <?php echo str_replace('%20',' ',$keyword);?></h1>
      <!-- gambar -->
      <p>
         <?php
         $src = $wiki->mainpicture($keyword);
         ?>
         <img src="<?php echo $src;?>" alt="<?php echo $keyword?>" style="width:200px" />
      </p>
      <!-- end of gambar -->
      <p>
         <strong>gallery</strong><br/>
         <?php
         $gallery = $wiki->gallery($keyword);
         foreach($gallery as $g):
         $src = $wiki->mainpicture($g->title);
         echo '<img class="thumb" src="'.$src.'" alt="" />';
         endforeach;
         ?>
      </p>
      <!-- conten -->
      <p>
         <strong>Isi</strong><br/>
         <?php
         $singkat = $wiki->singkat($keyword);
         echo $singkat;
         ?>
      </p>
      <!-- end of conten -->
   </body>
</html>
