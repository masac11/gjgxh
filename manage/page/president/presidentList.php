<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/verifyLogin.php"); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" $content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" $content="ie=edge">
    <title>山东省钢结构行业协会</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
	<script src="../../vendor/jquery/jquery.min.js"></script>
	<script src="../../vendor/popper.js/popper.min.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../js/bootstrap-paginator.min.js"></script>
	<script src="../../js/carbon.js"></script>
	<script src="../../js/demo.js"></script>
	<script src="../../vendor/layer/layer.js"></script>
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/header.php"); ?>

    <div class="main-container">
        <div class="sidebar">
            <?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/sidebar.php"); ?>
        </div>
        <div class="content">
			 <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
	                        <div class="row">
		                        <div class="col-md-4">
                                    <form action="leaguerList.php">
                                        <div class="input-group">
                                             <input type="text" id="keyword" name="keyword" name="input1-group2" class="form-control" placeholder="输入标题名">
                                             <span class="input-group-btn">
                                                 <button type="submit" class="btn btn-primary" id="serachBtn"><i class="fa fa-search"></i> 搜索</button>
                                             </span>
                                         </div>
                                    </form>  
		                     	</div> 
		                     	<div class="col-md-6">
		                            <button type="button" onclick="javascript:location.href='presidentAdd.php'" class="btn btn-primary">
		                                <i class="fa fa-plus"></i> &nbsp; 增加
	                                </button>
<!-- 	                                <button type="button" id="delBtn" class="btn btn-danger">
	                                    <i class="fa fa-trash"></i> &nbsp; 删除
	                                </button> -->
		                        </div>
	                        </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>标题</th>
                                        <th>发布时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require '../../model/Leaguer.class.php';
                                            $leaguer = new Leaguer();
                                            if (isset($_REQUEST['keyword'])&&$_REQUEST['keyword']!="") {
                                                $allLeaguer = $leaguer->selectLeaguerByKeyword($_REQUEST['keyword']);
                                            }else{
                                                $allLeaguer = $leaguer->selectAllPre();
                                            }
                                            
                                            if ($allLeaguer!=null) {
                                                $totalNum = count($allLeaguer); //数据总条数
                                                $pageSize = 8;
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
                                                    $pageLeaguer = $leaguer->selectLeaguerByPageKeyword($offset, $pageSize, $_REQUEST['keyword']);
                                                }else{
                                                    $pageLeaguer = $leaguer->selectPreByPage($offset, $pageSize);
                                                }

                                                if ($pageLeaguer!=null) {
                                                    for ($i=0; $i < count($pageLeaguer); $i++) { 
                                                        $content = "<tr><td>" . $pageLeaguer[$i]['title'] . "</td>";
                                                        $content .= "<td class='text-nowrap'>" . $pageLeaguer[$i]['time'] ."</td>";
                                                        $content .= "<td>". 
                                                        "<a href='presidentDetail.php?leaguerId=".$pageLeaguer[$i]['leaguerId']."'><i class='fa fa-eye'></i>&nbsp;查看内容&nbsp;&nbsp;&nbsp;</a>".  
                                                        "<a href='presidentEdit.php?leaguerId=".$pageLeaguer[$i]['leaguerId']."'><i class='fa fa-wrench'></i> &nbsp;修改&nbsp;&nbsp;&nbsp; </a>".    
                                                        "<a href=\"javascript:if(confirm('确实要删除吗?'))location='../../dao/leaguerDao.php?mode=del&leaguerId=".$pageLeaguer[$i]['leaguerId']."'\"><i class='fa fa-trash'></i> &nbsp;删除</a>" . 
                                                        "</td>";
                                                        $content .= "</tr>";
                                                        echo $content;
                                                    }
                                                }else{
                                                    echo "<td colspan='3' >暂无数据</td>";
                                                }
                                                
                                            }else{
                                                echo "<td colspan='3' >暂无数据</td>";
                                            } 
                                              
                                        ?>
                                    </tbody>
            						<tfoot>
           							<tr>
            							<td colspan="5" >
						            		<?php
                                            if (isset($_REQUEST['keyword'])&&$_REQUEST['keyword']!=""&&isset($prev )) {
                                                $keyword = $_REQUEST['keyword'];
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1&keyword=".$keyword."\">首页&nbsp;&nbsp;</a>";
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."&keyword=".$keyword."\">上一页&nbsp;&nbsp;</a>";
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."&keyword=".$keyword."\">下一页&nbsp;&nbsp;</a>";
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."&keyword=".$keyword."\">尾页</a>";
                                                echo "<div style='flaot:right'>";
                                                echo "<span>". $totalNum."条记录".$nowPage."/".ceil($totalPageCount)."页 </span>";
                                                echo "<span>当前页：". $nowPage."</span>";
                                                echo "</div>";
                                            }else if(isset($prev )){
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1\">首页&nbsp;&nbsp;</a>";
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."\">上一页&nbsp;&nbsp;</a>";
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."\">下一页&nbsp;&nbsp;</a>";
                                                echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."\">尾页</a>";
                                                echo "<div style='flaot:right'>";
                                                echo "<span>". $totalNum."条记录".$nowPage."/".ceil($totalPageCount)."页 </span>";
                                                echo "<span>当前页：". $nowPage."</span>";
                                                echo "</div>";
                                            }
                                            
                                           
                                            ?>
						            	</td>
					            	</tr>
            						</tfoot>
                                </table>
                            </div>
                        </div><!-- cardbody -->
                    </div><!-- card -->
                </div><!-- col-md-12 -->
            </div><!-- row -->
        </div>
    </div>
</div>
</body>
</html>
 <script type="text/javascript">
 
</script>
