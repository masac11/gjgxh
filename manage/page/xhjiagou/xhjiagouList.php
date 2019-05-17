<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/verifyLogin.php"); ?>
<?php
  
    require '../../model/About.class.php';
    $About = new About();
    $editAbout = $About->selectXhjiagou();
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
			                             <span >
			                                 修改组织架构
			                             </span>
			                         </div>
		                     	</div> 
	                        </div>
                        </div>
                            <div class="table-responsive">
                                <form action="../../dao/aboutDao.php?mode=editXhjiagou" method="post">
                                    <table class="table table-striped">
                                       
                                        <thead>
                                            <tr>
                                                <th >输入内容:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><!-- 加载编辑器的容器 -->
                                                    <script id="container" name="aboutInfo" type="text/plain">
                                                        <?php echo $editAbout[0]['aboutInfo'];?>
                                                    </script>
                                                    <!-- 配置文件 -->
                                                    <script type="text/javascript" src="../../ueditor/ueditor.config.js"></script>
                                                    <!-- 编辑器源码文件 -->
                                                    <script type="text/javascript" src="../../ueditor/ueditor.all.js"></script>
                                                    <!-- 实例化编辑器 -->
                                                    <script type="text/javascript">
                                                        var ue = UE.getEditor('container');
                                                    </script>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                						<tfoot>
               							<tr>
                							<td colspan="1" class="text-center" >
                                                <button type="submit" class="btn btn-primary">
                                                     保存
                                                </button>
    						            		 <button type="button" onclick="location.href='xhjiagou.php'" class="btn btn-primary">
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