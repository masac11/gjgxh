<?php 
      require_once '../manage/model/companyNews.class.php';
      $siderCompanyNews = new companyNews();
      $allsiderCompanyNews = $siderCompanyNews->selectAllcompanyNews();
        if ($allsiderCompanyNews!=null) {
            $totalNum = count($allsiderCompanyNews); //数据总条数
            if ($totalNum >= 7) {
              $totalNum = 7;
            }
            for ($i=0; $i < count($allsiderCompanyNews); $i++) { 
                $content = "<li><a href='../companyNews/companyNewsDetail.php?companyNewsId=".$allsiderCompanyNews[$i]['companyNewsId']."' target='_blank'><span style='overflow: hidden;text-overflow:ellipsis;white-space: nowrap;display:block'>".$allsiderCompanyNews[$i]['title']."</span></a></li>";
                echo $content;
            }
            
        }else{
            echo "暂无数据";
        } 
      ?>