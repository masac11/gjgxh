<?php
    $policyId = $_REQUEST['policyId'];
    require '../manage/model/Policy.class.php';
    $policy = new Policy();
    $editPolicy = $policy->getPolicyByPolicyId($policyId);
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
    <h2>政策法规</h2>
    <ul>
      <li>
        <a href='policyList.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            政策发布
          </span>
        </a>
      </li>
      <li>
        <a href='../law/lawList.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            法律法规
          </span>
        </a>
      </li>
    </ul>
  </div>
  <div class="listr right">
   <h2><span>您现在的位置: <a href="/">山东省钢结构协会</a>>><a href="policyList.php">政策法规</a>>><a href="policyList.php">政策发布</a>>><a href="#">政策发布详情</a></span>政策发布</h2>
    <ul>
      <div style="    display: block;font-size: 1.17em;margin-block-start: 1em;margin-block-end: 1em; margin-inline-start: 0px;margin-inline-end: 0px;font-weight: bold;">  
        <?php echo $editPolicy[0]['policyTitle']; ?></div>
      <p style='text-align: center;'>发布时间：
        <?php echo $editPolicy[0]['policyTime']; ?>
      </p>
      <br>
      <?php
        echo $editPolicy[0]['policyContent'];
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
