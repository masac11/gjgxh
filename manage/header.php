<nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            <span>山东省钢结构协会管理端</span>
            <!-- <img src="./imgs/logo.png" alt="logo"> -->
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <!--                    <img src="./imgs/avatar-1.png" class="avatar avatar-sm" alt="logo"> -->
                    <span class="small ml-1 d-md-down-none">管理员</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <?php
                        $uri = 'http://';
                        $uri .= $_SERVER['HTTP_HOST'];
                        $uri1 = $uri . '/gjgxh/manage/passwordEdit/passwordEdit.php';
                        $uri2 = $uri . '/gjgxh/manage/logout.php';
                    ?>
                    <a href="<?php echo $uri1;?>" class="dropdown-item">
                        <i class="fa fa-wrench"></i> 修改密码
                    </a>

                    <a href="<?php echo $uri2;?>" class="dropdown-item">
                        <i class="fa fa-lock"></i> 退出登录
                    </a>
                </div>
            </li>
        </ul>
    </nav>