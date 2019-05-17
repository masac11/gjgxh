<?php
    require 'manage/model/About.class.php';
    $about = new About();
    $aboutInfo = $about->selectXhjianjie();
    require 'manage/model/News.class.php';
    $news = new News();
    $allXhNews = $news->selectAllNews("协会动态");
    $allGgNews = $news->selectAllNews("通知公告");
    $allHyNews = $news->selectAllNews("行业动态");
    require_once 'manage/model/companyStyle.class.php';
    $companyStyle = new companyStyle();
    $allcompanyStyle = $companyStyle->selectAllcompanyStyle();
    require 'manage/model/Appraise.class.php';
    $appraise = new Appraise();
    $allAppraise = $appraise->selectAllAppraise("山东省钢结构金奖");
    require 'manage/model/Policy.class.php';
    $policy = new Policy();
    $allPolicy = $policy->selectAllPolicy();
    require 'manage/model/Law.class.php';
    $law = new Law();
    $allLaw = $law->selectAllLaw();
    require_once 'manage/model/companyNews.class.php';
    $companyNews = new companyNews();
    $allcompanyNews = $companyNews->selectAllcompanyNews();
    require 'manage/model/SetBanner.class.php';
    $setBanner = new SetBanner();
    $allBanner = $setBanner->getAllBanner();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>山东省钢结构行业协会</title>
<meta name="keywords" content="山东省钢结构行业协会" />
<meta name="description" content="山东省钢结构行业协会（Shandong Steel Construction Society，缩写“SDSCS”，简称“山东钢协”）是由山东省钢结构行业的相关企事业单位和社会组织自愿结成的全省性行业协会商会类社会团体，是非营利性社会组织，其会员分布和活动地域为山东省。" />
<link href="css/index.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" href="css/style.css">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<!--[if IE 6]>
 <script  src="js/png.js"></script>
 <script type="text/javascript">
    EvPNG.fix('.logo');
 </script>
<![endif]-->
</head>
<style type="text/css">
  .double li{
    float: left;
    width: 46%;
  }
  .divcss5{text-align:left; position:relative;width:300px; height:235px; margin:0 auto;}
  .divcss5 a,.divcss5 span{display:none; text-decoration:none}
  .divcss5{cursor:pointer}
  .divcss5 a.now{cursor:pointer; position:absolute; top:0; width:100%; height:100%; z-index:100; left:0; display:block;}
  .divcss5 span{ display:block;position:absolute; bottom:0; color:#FFF;width:300px; z-index:10;height:40px;  background:#000;filter:alpha(opacity=60);-moz-opacity:0.7;opacity: 0.7;}
</style>
<body>
<header> 
  <div class="logo box">
   <div id="logo1"></div>
  </div> 
  <nav id="nav" class="box1">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/nav.php"); ?>
  </nav>
  <script src="js/silder.js"></script> 
</header>
<!--头部 end-->
<div style="height: 10px;"></div>
<!-- <div class="banner box"><img src="images/banner.jpg"></div> -->
<div class="box">
  <div class="news left">
<!--     <h2><span class="more"><a href="/" target="_blank">更多..</a></span>新闻中心</h2> -->
    <ul>
      <div class="pic_news left">
        <div id="wrapper">
          <div id="slider-wrap">
            <ul id="slider">
             <li>
              <!-- <img width=300px; height=235px; src="images/banner-1.png"/>  -->
              <div class="divcss5" style="width: 300px; height: 235px; background:url(images/banner-1.png);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;">
                    <?php 
                        if (isset($allBanner[0]['newstitle'])) {
                          for ($j = 0; $j < count($allXhNews); $j++) {
                            if ($allBanner[0]['newstitle'] == $allXhNews[$j]['title']) {
                              echo "<span style='font-size:14px'>".$allBanner[0]['newstitle']."</span>
                            <a href='xhnews/xhnewsDetail.php?newsId=".$allXhNews[$j]['newsId']."' class='now' target='_blank'>&nbsp;</a>";
                              break;
                            }
                          }
                        } else {
                          echo "<span></span><a href='#' class='now'>&nbsp;</a>";
                        } 
                    ?>
              </div>
             </li>
             
             <li>
                <!-- <img width=300px; height=235px; src="images/banner-2.png"/> -->
                <div class="divcss5" style="width: 300px; height: 235px; background:url(images/banner-2.png);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;">
                    <?php 
                        if (isset($allBanner[1]['newstitle'])) {
                          for ($j = 0; $j < count($allXhNews); $j++) {
                            if ($allBanner[1]['newstitle'] == $allXhNews[$j]['title']) {
                              echo "<span style='font-size:14px'>".$allBanner[1]['newstitle']."</span>
                            <a href='xhnews/xhnewsDetail.php?newsId=".$allXhNews[$j]['newsId']."' class='now' target='_blank'>&nbsp;</a>";
                              break;
                            }
                          }
                        } else {
                          echo "<span></span><a href='#' class='now'>&nbsp;</a>";
                        } 
                    ?>
                </div>
             </li>
             
             <li>
              <!-- <img width=300px; height=235px; src="images/banner-3.png"/> -->
              <div class="divcss5" style="width: 300px; height: 235px; background:url(images/banner-3.png);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;">
                    <?php 
                        if (isset($allBanner[2]['newstitle'])) {
                          for ($j = 0; $j < count($allXhNews); $j++) {
                            if ($allBanner[2]['newstitle'] == $allXhNews[$j]['title']) {
                              echo "<span style='font-size:14px'>".$allBanner[2]['newstitle']."</span>
                            <a href='xhnews/xhnewsDetail.php?newsId=".$allXhNews[$j]['newsId']."' class='now' target='_blank'>&nbsp;</a>";
                              break;
                            }
                          }
                        } else {
                          echo "<span></span><a href='#' class='now'>&nbsp;</a>";
                        } 
                    ?>
                </div>
             </li>
             
             <li>
              <!-- <img width=300px; height=235px; src="images/banner-4.png"/> -->
                <div class="divcss5" style="width: 300px; height: 235px; background:url(images/banner-4.png);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;">
                    <?php 
                        if (isset($allBanner[3]['newstitle'])) {
                          for ($j = 0; $j < count($allXhNews); $j++) {
                            if ($allBanner[3]['newstitle'] == $allXhNews[$j]['title']) {
                              echo "<span style='font-size:14px'>".$allBanner[3]['newstitle']."</span>
                            <a href='xhnews/xhnewsDetail.php?newsId=".$allXhNews[$j]['newsId']."' class='now' target='_blank'>&nbsp;</a>";
                              break;
                            }
                          }
                        } else {
                          echo "<span></span><a href='#' class='now'>&nbsp;</a>";
                        } 
                    ?>
                </div>
             </li>
             
             <li>
              <!-- <img width=300px; height=235px; src="images/banner-5.png"/> -->
              <div class="divcss5" style="width: 300px; height: 235px; background:url(images/banner-5.png);background-repeat:no-repeat;
                background-size:100% 100%;
                -moz-background-size:100% 100%;">
                    <?php 
                        if (isset($allBanner[4]['newstitle'])) {
                          for ($j = 0; $j < count($allXhNews); $j++) {
                            if ($allBanner[4]['newstitle'] == $allXhNews[$j]['title']) {
                              echo "<span style='font-size:14px'>".$allBanner[4]['newstitle']."</span>
                            <a href='xhnews/xhnewsDetail.php?newsId=".$allXhNews[$j]['newsId']."' class='now' target='_blank'>&nbsp;</a>";
                              break;
                            }
                          }
                        } else {
                          echo "<span></span><a href='#' class='now'>&nbsp;</a>";
                        } 
                    ?>
                </div>
             </li>   
            </ul>
            
             <!--controls-->
            <div class="btns" id="next"><i class="fa fa-arrow-right"></i></div>
            <div class="btns" id="previous"><i class="fa fa-arrow-left"></i></div>
            <div id="counter"></div>
            
            <div id="pagination-wrap">
            <ul>
            </ul>
            </div>
            <!--controls-->  
               
          </div>
        </div>
 
      </div>
      <div class="center_news right">
        <section class="c_n_top" style="display: block;height: 80px;">
          <h3 style="font-size: 15px;">协会简介</h3>
          <p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap; "><?php
              echo $aboutInfo[0]['aboutInfo'];
            ?></p>
         <div style="float: right;">[<a href="about/xhjianjie.php" target="_blank">详情</a>]</div>
        </section>
        <ul>
          <?php 
            if ($allXhNews!=null) {
                $totalNum = count($allXhNews); //数据总条数
                if ($totalNum > 5) {
                  $totalNum = 5;
                }
                for ($i=0; $i < $totalNum; $i++) { 
                    $content = "<li><a href='xhnews/xhnewsDetail.php?newsId=".$allXhNews[$i]['newsId']."' target='_blank'>" . $allXhNews[$i]['title'] ."</a></li>";
                    echo $content;
                }
                for ($i=0; $i < 6 - $totalNum; $i++) { 
                  echo "<br/>";
                }
            }else{
                echo "暂无数据";
            } 
          ?>
        </ul>
      </div>
    </ul>
  </div>
  <div class="announce right">
    <h2><a href="ggnews/ggnewsList.php" style="color: #000;">通知公告</a></h2>
    <ul>
     <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="up" height="240">
          <?php 
            if ($allGgNews!=null) {
                $totalNum = count($allGgNews); //数据总条数
                if ($totalNum > 5) {
                  $totalNum = 5;
                }
                for ($i=0; $i < $totalNum; $i++) { 
                    $content = "<li><a href='ggnews/ggnewsDetail.php?newsId=".$allGgNews[$i]['newsId']."' target='_blank'>" . $allGgNews[$i]['title'] ."</a></li>";
                    echo $content;
                }
            }else{
                echo "暂无数据";
            } 
          ?>
      </marquee>
    </ul>
  </div>
  <div class="blank"></div>

  <div class="zhishu left" style="width: 800px;height: 260px;">
    <h3>行业动态
    </h3>
    <section>
      <div id="content">
        <ul style="display:block;">
<!--           <div class="zs_pic left"> <img src="images/newspic1.jpg"> </div> -->
          <div class="zs_news double" style="width: 100%;">
            <ol class="double">
              <?php 
          if ($allHyNews!=null) {
              $totalNum = count($allHyNews); //数据总条数
              if ($totalNum > 16) {
                $totalNum = 16;
              }
              for ($i=0; $i < $totalNum; $i++) { 
                  $content = "<li title='" . $allHyNews[$i]['title'] ."' style='display:block;margin-bottom:10px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap'><a style='overflow:hidden;text-overflow:ellipsis;white-space:nowrap' href='hynews/hynewsDetail.php?newsId=".$allHyNews[$i]['newsId']."' target='_blank'>" . $allHyNews[$i]['title'] ."</a></li>";
                  echo $content;
              }
              for ($i=0; $i < 16 - $totalNum; $i++) { 
                echo "<br/>";
              }
          }else{
              echo "暂无数据";
          } 
        ?>
            </ol>
          </div>
        </ul>
        <ul>
          <div class="zs_pic left"> <img src="images/newspic1.jpg"> </div>
          <div class="zs_news right">
            <ol>

            </ol>
          </div>
        </ul>
      </div>
    </section>
  </div>


  <div class="hd right" style="width: 250px;">
      <h3 style="font-size: 15px;">申请入会</h3>
      <ul>
        <li><a target="_blank" href="procedure/procedureList.php">入会程序</a></li>
        <li><a target="_blank" href="table/tableList.php">会员登记表</a></li>   
      </ul>
  </div>
  <div class="blank"></div>
  <div class="zhishu left" style="width: 800px;height: 260px;">
    <h3>企业风采
    </h3>
    <section>
      <div id="content">
        <ul style="display:block;">
<!--           <div class="zs_pic left"> <img src="images/newspic1.jpg"> </div> -->
          <div class="zs_news double" style="width: 100%;">
            <ol>
              <?php 
              if ($allcompanyStyle!=null) {
                  $totalNum = count($allcompanyStyle); //数据总条数
                  if ($totalNum > 16) {
                    $totalNum = 16;
                  }
                  for ($i=0; $i < $totalNum; $i++) { 
                      $content = "<li title='" . $allcompanyStyle[$i]['title'] ."' style='display:block;margin-bottom:10px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap'><a style='overflow:hidden;text-overflow:ellipsis;white-space:nowrap' href='companyStyle/companyStyleDetail.php?companyStyleId=".$allcompanyStyle[$i]['companyStyleId']."' target='_blank'>" . $allcompanyStyle[$i]['title'] ."</a></li>";
                      echo $content;
                  }
                  for ($i=0; $i < 16 - $totalNum; $i++) { 
                    echo "<br/>";
                  }
              }else{
                  echo "暂无数据";
              } 
            ?>
            </ol>
          </div>
        </ul>
      </div>
    </section>
  </div>
  <div class="hd2 right" style="width: 250px;height: 190px;">
      <h3 style="font-size: 15px;"><a style="color: #fff;" href="jjappraise/jjappraiseList.php">行业评优</a></h3>
      <ul style="background-color: #fff;">
        <div style="height: 5px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="jjappraise/jjappraiseList.php">山东省钢结构金奖</a></li>
        <div style="height: 5px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="mxappraise/mxappraiseList.php">山东省钢结构行业明星企业</a></li>
        <div style="height: 5px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="yxappraise/yxappraiseList.php">山东省钢结构行业优秀企业家</a></li>
        <div style="height: 5px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="jlappraise/jlappraiseList.php">山东省钢结构行业优秀项目经理</a></li> 
        <div style="color: #fff; width: 250px;height: 40px;">
      </div>
      </ul>
      
  </div>

  <!-- <div class="blank" style="width: 802px;float: left;"></div> -->
  <a style="display: block;float: right;" target="_blank" href="message/messageList.php">
          <div style="padding: 40px 0; margin-bottom: 20px; margin-top: 20px; text-align: center; color: #fff; background-color: #539dcf;width: 250px;height: 30px;">
            <i class="fa fa-arrow-down fa-2x">文件下载</i>
          </div>
      </a>
  <div class="zhengce left" style="width: 800px;height: 240px;">
    <h3 class="zhengceh3">政策法规
    </h3>
      <div class="blank"></div>
      <div class="linews left" style="font-size: 14px; width: 48%;margin-right: 1%;margin-left: 1%; background: url(images/newsbg2.jpg) repeat-x top;">
        <h3><span><a target="_blank" href="policy/policyList.php" class="more">更多..</a></span>政策发布</h3>
        <ul>
          <?php 
              if ($allPolicy!=null) {
                  $totalNum = count($allPolicy); //数据总条数
                  if ($totalNum > 6) {
                    $totalNum = 6;
                  }
                  for ($i=0; $i < $totalNum; $i++) { 
                      $content = "<li><a title='" . $allPolicy[$i]['policyTitle'] ."' style='overflow:hidden;text-overflow:ellipsis;white-space:nowrap' href='policy/policyDetail.php?policyId=".$allPolicy[$i]['policyId']."' target='_blank'>" . $allPolicy[$i]['policyTitle'] ."</a></li>";
                      echo $content;
                  }
                  for ($i=0; $i < 6 - $totalNum; $i++) { 
                    echo "<br/>";
                  }
              }else{
                  echo "暂无数据";
              } 
            ?>
        </ul>
      </div>
      <div class="linews left ln" style="font-size: 14px; width: 47%;background: url(images/newsbg2.jpg) repeat-x top;">
        <h3><span><a target="_blank" href="law/lawList.php" class="more">更多..</a></span>法律法规</h3>
        <ul>
          <?php 
              if ($allLaw!=null) {
                  $totalNum = count($allLaw); //数据总条数
                  if ($totalNum > 6) {
                    $totalNum = 6;
                  }
                  for ($i=0; $i < $totalNum; $i++) { 
                      $content = "<li><a title='" . $allLaw[$i]['title'] ."' style='overflow:hidden;text-overflow:ellipsis;white-space:nowrap' href='law/lawDetail.php?lawId=".$allLaw[$i]['lawId']."' target='_blank'>" . $allLaw[$i]['title'] ."</a></li>";
                      echo $content;
                  }
                  for ($i=0; $i < 6 - $totalNum; $i++) { 
                    echo "<br/>";
                  }
              }else{
                  echo "暂无数据";
              } 
            ?>
        </ul>
      </div>
      <div class="blank"></div>
  </div>

    <div class="hd2 right" style="width: 250px;height: 180px;margin-bottom: 5px;">
      <h3 style="font-size: 15px;"><a style="color: #fff;" href="jjappraise/jjappraiseList.php">企业名录</a></h3>
      <ul style="background-color: #fff;">
        <div style="height: 4px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="president/presidentList.php">副会长单位</a></li>
        <div style="height: 4px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="routine/routineList.php">常务理事单位</a></li>
        <div style="height: 4px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="director/directorList.php">理事单位</a></li>
        <div style="height: 4px;"></div>
        <li><a style="font-size: 14.5px;margin-bottom: 8px;display: block;" target="_blank" href="leaguer/leaguerList.php">会员单位</a></li>  
      </ul>
          <div style="background-color: #FFF;width: 250px;height: 100px;">
          </div>
  </div>

<!--   <div class="hd3 right" style="width: 250px;">
      <h3 style="font-size: 15px;">企业名录</h3>
      <ul>
        <li><a target="_blank" href="president/presidentList.php">副会长单位</a></li>
        <li><a target="_blank" href="routine/routineList.php">常务理事单位</a></li>
        <li><a target="_blank" href="director/directorList.php">理事单位</a></li>
        <li><a target="_blank" href="leaguer/leaguerList.php">会员单位</a></li>  
      </ul>
  </div> -->
   <div class="blank"></div>
  <div class="links">
    <p>友情链接:</p>
    <ul>
      <li><a target="_blank" href="http://www.mohurd.gov.cn/">住建部</a></li>
      <li><a target="_blank" href="http://www.mca.gov.cn/index.shtml">民政部</a></li>
      <li><a target="_blank" href="http://www.sdnpo.gov.cn/">山东省社会组织管理局</a></li>
      <li><a target="_blank" href="http://www.sdjs.gov.cn/">山东省住房和城乡建设厅</a></li>
      <li><a target="_blank" href="http://www.ccmsa.net.cn/">中国建筑金属结构协会</a></li>
      <li><a target="_blank" href="http://www.cncscs.org/">中国钢结构协会</a></li>
    </ul>
  <ul style="display:none">
      <a href="/"><img src="images/ad01.jpg"></a><a href="/"><img src="images/ad02.jpg"></a>
  </ul>
  </div>
</div>
<footer>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/footer.php"); ?>
</footer>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/huadong.js"></script>