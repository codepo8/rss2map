<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  <title>RSS 2 Map example page</title>
  <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
  <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/base/base.css" type="text/css">
</head>
<body>
<div id="doc" class="yui-t1">
  <div id="hd" role="banner"><h1>RSS 2 Map - turn an RSS feed into a map :)</h1></div>
  <div id="bd" role="main">
    <div id="yui-main">
      <div class="yui-b first">
      <?php include('rss2map.php');?>
      </div>
    </div>
    <div class="yui-b">
    <ul>
      <li><a href="index.php?feed=http://www.telegraph.co.uk/travel/rss">Telegraph Travel</a></li>
      <li><a href="index.php?feed=http://www.telegraph.co.uk/news/rss">Telegraph News</a></li>
      <li><a href="index.php?feed=http://www.telegraph.co.uk/finance/rss">Telegraph Finance</a></li>
      <li><a href="index.php?feed=http://rss.news.yahoo.com/rss/world">Yahoo World News</a></li>
      <li><a href="index.php?feed=http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/front_page/rss.xml">BBC World News</a></li>
    </ul>
    </div>
  </div>
  <div id="ft" role="contentinfo"><p>RSS2Map written by <a href="http://icant.co.uk">Christian Heilmann</a> using <a href="http://developer.yahoo.com/yui">YUI</a> and <a href="http://developer.yahoo.com/geo/placemaker">Placemaker</a></p></div>
  </div>
</body>
</html>


