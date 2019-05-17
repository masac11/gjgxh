<?php
    $companyStyleId = $_REQUEST['companyStyleId'];
    require '../manage/model/companyStyle.class.php';
    $companyStyle = new companyStyle();
    $allcompanyStyle = $companyStyle->selectAllcompanyStyle();
    $editcompanyStyle = $companyStyle->getcompanyStyleBycompanyStyleId($companyStyleId);
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
    <h2>企业风采</h2>
    <ul>
      <li><a href='companyStyleList.php'><span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>企业风采展示</span></a></li>
    </ul>
  </div>
  <div class="listr right">
    <h2><span>您现在的位置: <a href="/">山东省钢结构协会</a>>><a href="companyStyleList.php">企业风采</a>>><a href="#">企业风采详情</a></span>企业风采</h2>
    <ul>

      <?php
        echo $editcompanyStyle[0]['content'];
      ?>
    </ul>
    <div class="blank"></div>
    <div style="width: 100%; text-align: center;">
      <?php 
      if(isset($prev )){
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页&nbsp;&nbsp;</a>";
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."\">上一页&nbsp;&nbsp;</a>";
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."\">下一页&nbsp;&nbsp;</a>";
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."\">尾页</a>";
              echo "<span> 共". $totalNum."条记录".$nowPage."/".intval($totalPageCount)."页 </span>";
              echo "<span>当前页：". $nowPage."</span>";
        }
      ?>
    </div>
  </div>
</div>
<footer>
<?php require '../footer.php'; ?>
</footer>
</body>
