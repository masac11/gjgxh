<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/verifyLogin.php"); ?>
<?php
    $id = $_REQUEST['id'];
    require '../../model/Setbanner.class.php';
    $setbanner = new Setbanner();
    $banner = $setbanner->getBannerById($id);
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
                        <div class="card-header bg-light">
	                        <div class="row">
		                        <div class="col-md-4">
			                         <div class="input-group">
			                             <span>
			                                 修改滚动图
			                             </span>
			                         </div>
		                     	</div> 
	                        </div>
                        </div>
                            <div class="table-responsive">
                                <form action="../../dao/setBannerDao.php?mode=edit&id=<?php echo $id;?>" method="post"  enctype="multipart/form-data">
                                    <table class="table table-striped">
<!--                                         <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">标题</span>
                                            </div>
                                            <input type="text" name="title" class="form-control" required="" value="<?php echo $banner[0]['newstitle'];?>" placeholder="请输入标题">
                                        </div> -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">原标题图片</span>
                                            </div>
                                            <img width="300px" height="235px" src="../../../images/banner-<?php echo $id ?>.png">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">修改成的图片</span>
                                            </div>
                                            <input type="file" name="file" required="" class="form-control" value="选择处理文件"/>
                                        </div>
                						<tfoot>
               							<tr>
                							<td colspan="1" class="text-center" >
                                                <button type="submit" class="btn btn-primary">
                                                     保存
                                                </button>
    						            		 <button type="button" onclick="window.history.go(-1);" class="btn btn-primary">
                                                     返回
                                                </button>
    						            	</td>
    					            	</tr>
                						</tfoot>
                                    </table>
                                </form>
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