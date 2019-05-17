<?php
    $appraise_id = $_REQUEST['appraise_id'];
    require '../manage/model/Appraise.class.php';
    $appraise = new Appraise();
    $editAppraise = $appraise->getAppraiseByAppraiseId($appraise_id);
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
    <h2>行业评优</h2>
    <ul>
      <li><a href='../jjappraise/jjappraiseList.php'><span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>山东省钢结构金奖</span></a></li>
      <li><a href='../mxappraise/mxappraiseList.php'><span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>山东省钢结构行业明星企业</span></a></li>
      <li><a href='../yxappraise/yxappraiseList.php'><span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>山东省钢结构行业优秀企业家</span></a></li>
      <li><a href='../jlappraise/jlappraiseList.php'><span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>山东省钢结构行业优秀项目经理</span></a></li>
    </ul>
  </div>
  <div class="listr right">
    <h2><span>您现在的位置: <a href="/">山东省钢结构协会</a>>><a href="jjappraiseList.php">山东省钢结构行业优秀项目经理</a>>><a href="#">山东省钢结构行业优秀项目经理详情</a></span>山东省钢结构行业优秀项目经理</h2>
    <div align="center">
      <?php
        echo "<h1>".$editAppraise[0]['title']."</h1><br/>";
        echo "发布时间：".$editAppraise[0]['time']."<br/>";
      ?>
    </div>
    <ul>

      <?php
        echo $editAppraise[0]['content'];
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
