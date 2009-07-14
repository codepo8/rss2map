<?php 
if(preg_match('/rss2map.php$/',$_SERVER["PHP_SELF"])){?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  <title>RSS 2 Map result</title>
  <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
  <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/base/base.css" type="text/css">
</head>
<body>
<?php }
if(isset($_GET['feed'])){?>
<?php  
  $url = $_GET['feed'];
  $key = 'PbXUT7HV34Fq2KhMd68qS.CRZY9RWjW_dEQLgINMwG.eNxu2hf84BTkvHNttEg4-';

  // ^ get your own! 
  $apiendpoint = 'http://wherein.yahooapis.com/v1/document';
  $inputType = 'text/rss';
  $outputType = 'rss';
  $post = 'appid='.$key.'&documentURL='.$url.'&documentType='.
          $inputType.'&outputType='.$outputType;
  $ch = curl_init($apiendpoint);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
  $results = curl_exec($ch);
  $results = preg_replace('/cl:/','cl',$results);
  $places = simplexml_load_string($results, 'SimpleXMLElement', 
                                   LIBXML_NOCDATA);  
  function cleanup($elm){
    return preg_replace('/\n\r?+/','',addslashes($elm));
  }                                 
  if($places->channel->item){
    $output .= '[';
    foreach($places->channel->item as $p){
      $locs = $p->clcontentlocation;
      if($locs){
        foreach($locs->clplace as $pl){
          $content = '<h2><a href=\"'.$p->link.'\">'.cleanup($p->title).
                     '</a></h2><p>'.cleanup($p->description).'</p>';
          $locations[] = '{"name":"'.$pl->name.'","title":"'.
                          cleanup($p->title).
                         '","lat":"'.$pl->cllatitude.'","content":"'.$content.
                         '","lon":"'.$pl->cllongitude.'"}';
        }
      }
    }
  }
  if(isset($locations)){
    $output .= implode(',',$locations);
  }
  $output .= ']';
  ?>
  <div id="rss2map"></div>
  <link rel="stylesheet" href="rss2map.css" type="text/css">
  <script src="http://yui.yahooapis.com/2.6.0/build/utilities/utilities.js"></script>
  <script type="text/javascript" src="http://l.yimg.com/d/lib/map/js/api/ymapapi_3_8_2_3.js"></script>
  <script type="text/javascript" src="rss2map.js"></script>
  <script type="text/javascript">
      var YMAPPID = '<?php echo $key;?>';
      rss2map(<?php echo $output;?>);
  </script>
<?php } 
if(preg_match('/rss2map.php$/',$_SERVER["PHP_SELF"])){?>
</body>
</html>
<?php } ?>

