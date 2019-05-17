<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/verifyLogin.php"); ?>
<?php
    $standardId = $_REQUEST['standardId'];
    require '../../model/Standard.class.php';
    $standard = new Standard();
    $editStandard = $standard->getStandardByStandardId($standardId);
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
	                         <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">标题</span>
                                </div>
                                <input type="text" name="title" class="form-control" required="" value="<?php echo $editStandard[0]['title'];?>" readonly/>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>内容:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $editStandard[0]['content']?></td>
                                        </tr> 
                                         <tr>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">发布时间</span>
                                                    </div>
                                                     <input type="text" name="time" value="<?php echo $editStandard[0]['time'];?>"  class="form-control" readonly  id="date"/>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
            						<tfoot>
           							<tr>
            							<td colspan="1" class="text-center" >
						            		 <button type="button" onclick="window.history.go(-1);" class="btn btn-primary">
                                                 返回
                                            </button>
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