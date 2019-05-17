<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/verifyLogin.php"); ?>
<?php
    $facilitiesId = $_REQUEST['facilitiesId'];
    require '../../model/facilities.class.php';
    $facilities = new facilities();
    $editfacilities = $facilities->getfacilitiesByfacilitiesId($facilitiesId);
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
                                             修改制造基地
                                         </span>
                                     </div>
                                </div> 
                            </div>
                        </div>
                            <div class="table-responsive">
                                <form action="../../dao/facilitiesDao.php?mode=edit&facilitiesId=<?php echo $facilitiesId;?>" method="post">
                                    <table class="table table-striped">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">基地名称</span>
                                            </div>
                                            <input type="text" name="title" class="form-control" required="" value="<?php echo $editfacilities[0]['title'];?>" placeholder="请输入标题">
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>基地描述:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><!-- 加载编辑器的容器 -->
                                                    <script id="container" name="content" type="text/plain">
                                                        <?php echo $editfacilities[0]['content'];?>
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
                                            <tr>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">发布时间</span>
                                                        </div>
                                                         <input type="text" name="time" value="<?php echo $editfacilities[0]['time'];?>"  class="form-control" required="" id="date">
                                                    </div>
                                                    <script src="../../laydate/laydate.js"></script>
                                                    <script>
                                                    //执行一个laydate实例
                                                    laydate.render({
                                                      elem: '#date' //指定元素
                                                    });
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