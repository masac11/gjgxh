<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/verifyLogin.php"); ?>
<?php
 require '../../model/SetBanner.class.php';
 $setBanner = new SetBanner();
 $arr = $setBanner->getAllBanner();
?>
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
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th style="width: 235px;">图片</th>
                                        <th>关联动态标题</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for ($i = 0; $i < 5; $i++) {
                                                $content = "<tr><td><img style='float: left;' width='300px' height='235px' src='../../../images/banner-".($i+1).".png'></td><td>";
                                                if (isset($arr[$i]['newstitle']) ) {
                                                    $content .= $arr[$i]['newstitle'];
                                                } else {
                                                    $content .= "暂无标题";
                                                }
                                                $content .= "</td><td><a href='setbannerEdit.php?id=".$i."'><i class='fa fa-wrench'></i> &nbsp;修改图片&nbsp;&nbsp;&nbsp; </a><a href='setbannerEditTitle.php?id=".($i+1)."'><i class='fa fa-wrench'></i> &nbsp;修改标题&nbsp;&nbsp;&nbsp; </a></td></tr>";
                                                echo $content;
                                            }
                                        ?>
                                    </tbody>
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
