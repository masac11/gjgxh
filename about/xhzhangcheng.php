<?php
    require '../manage/model/About.class.php';
    $About = new About();
    $Abouts = $About->selectXhzhangcheng();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>山东省钢结构协会</title>
<meta name="Keywords" content="" >
<meta name="Description" content="" >
<link href="../css/index.css" rel="stylesheet">
<link href="../css/main.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="../js/modernizr.js"></script>
<![endif]-->
<!--[if IE 6]>
 <script  src="../js/png.js"></script>
 <script type="text/javascript">
    EvPNG.fix('.logo');
 </script>
<![endif]-->
</head>
<body>
<header>
    <div class="logo box">
    <div id="logo1"></div>
  </div>
  <nav id="nav" class="box1">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/nav.php"); ?>
  </nav>
  <script src="../js/silder.js"></script> 
</header>
<!--头部 end-->
<div class="contain">
  <div class="listl left">
    <h2>关于我们</h2>
    <ul>
      <li>
        <a href='xhjianjie.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            协会简介
          </span>
        </a>
      </li>
      <li>
        <a href='xhzizhi.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            协会资质
          </span>
        </a>
      </li>
      <li>
        <a href='xhzhangcheng.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            协会章程
          </span>
        </a>
      </li>
           <li>
        <a href='xhlingdao.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            协会领导
          </span>
        </a>
      </li>
           <li>
        <a href='xhjiagou.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            组织架构
          </span>
        </a>
      </li>
           <li>
        <a href='xhlianxi.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            联系协会
          </span>
        </a>
      </li>
    </ul>
  </div>
  <div class="listr right">
    <h2><span>您现在的位置: <a href="/">山东省钢结构协会</a>>><a href="xhjianjie.php">关于我们</a>>><a href="xhzhangcheng.php">协会章程</a> </span>协会章程</h2>
    <ul>

      <?php
        echo $Abouts[0]['aboutInfo'];
      ?>
    </ul>
    <div class="blank"></div>
   
  </div>
</div>
<footer>
<?php require '../footer.php'; ?>
</footer>
</body>