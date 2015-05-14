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
