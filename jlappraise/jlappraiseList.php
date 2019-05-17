<?php
    require '../manage/model/Appraise.class.php';
    $appraise = new Appraise();
    $allAppraise = $appraise->selectAllAppraise("山东省钢结构行业优秀项目经理");
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
    <h2><span>您现在的位置: <a href="/">山东省钢结构协会</a>>><a href="#">山东省钢结构行业优秀项目经理</a></span>山东省钢结构行业优秀项目经理</h2>
    <ul>
      <div style="display: flex;flex-wrap:wrap;justify-content:space-between;">
      <?php
        
        if ($allAppraise!=null) {
            $totalNum = count($allAppraise); //数据总条数
            $pageSize = 15;
            $totalPageCount = ceil($totalNum/$pageSize); //总页数
            //判断当前页是哪一页
            $nowPage = isset($_GET['page']) ? ceil($_GET['page']) : 1;
            //上一页
            $prev = ($nowPage-1 <= 0) ? 1 : $nowPage-1;
            //下一页
            $next = ($nowPage+1 >= $totalPageCount) ? $totalPageCount : $nowPage+1;
              
            //偏移量
            $offset = ($nowPage-1)*$pageSize;

            if (isset($_REQUEST['keyword'])&&$_REQUEST['keyword']!="") {
                $pageAppraise = $appraise->selectAppraiseByPageKeyword($offset, $pageSize, $_REQUEST['keyword'], "山东省钢结构行业优秀项目经理");
            }else{
                $pageAppraise = $appraise->selectAppraiseByPage($offset, $pageSize, "山东省钢结构行业优秀项目经理");
            }

            if ($pageAppraise!=null) {
                for ($i=0; $i < count($pageAppraise); $i++) { 

                    $content = "<div style='display:flex;width:200px;'><li><img width='200px' src='../upload/" . $pageAppraise[$i]['img_path'] . "'/><a href='jlappraiseDetail.php?appraise_id=".$pageAppraise[$i]['appraise_id']."'>".$pageAppraise[$i]['title']." </a></li></div>";

                    echo $content;
                }
            }else{
                echo "<td colspan='3' >暂无数据</td>";
            }
            
        }else{
            echo "<td colspan='3' >暂无数据</td>";
        } 
        
    ?>
    </div>
    </ul>
    <div class="blank"></div>
    <div style="width: 100%; text-align: center;">
      <?php 
      if(isset($prev )){
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页&nbsp;&nbsp;</a>";
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."\">上一页&nbsp;&nbsp;</a>";
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."\">下一页&nbsp;&nbsp;</a>";
              echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."\">尾页</a>";
              echo "<span> 共". $totalNum."条记录".$nowPage."/".ceil($totalPageCount)."页 </span>";
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
