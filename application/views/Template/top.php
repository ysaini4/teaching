<!doctype html>
<html lang="en_US">
<head>

  <?php
  opent("base",array("href"=>HOST));
  ocloset("title",$title);
  addall_css($css);
  addmycss();
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <meta charset="utf-8"/>
  <script type="text/javascript">
    var HOST="<?php echo HOST; ?>";
  </script>
  <!-- Google Analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-64966801-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>
