<!doctype html>
<html>
<head>
<meta charset="gb2312">
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
        <a href='../policy/policyList.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            政策发布
          </span>
        </a>
      </li>
      <li>
        <a href='lawList.php'>
          <span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>
            法律法规
          </span>
        </a>
      </li>
    </ul>
  </div>
  <div class="listr right">
    <h2><span>您现在的位置: <a href="/">山东省钢结构协会</a>>><a href="#">政策法规</a></span>法律法规</h2>
    <ul>

      <?php
        require '../manage/model/Law.class.php';
        $law = new Law();
        $allLaw = $law->selectAllLaw();
        if ($allLaw!=null) {
            $totalNum = count($allLaw); //数据总条数
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
                $pageLaw = $law->selectLawguerByPageKeyword($offset, $pageSize, $_REQUEST['keyword']);
            }else{
                $pageLaw = $law->selectLawByPage($offset, $pageSize);
            }

            if ($pageLaw!=null) {
                for ($i=0; $i < count($pageLaw); $i++) { 
                    $content = "<li><a href='lawDetail.php?lawId=".$pageLaw[$i]['lawId']."'><span>" . $pageLaw[$i]['time'] ."</span>".$pageLaw[$i]['title']." </a></li>";
                    echo $content;
                }
            }else{
                echo "<td colspan='3' >暂无数据</td>";
            }
            
        }else{
            echo "<td colspan='3' >暂无数据</td>";
        } 
        
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
