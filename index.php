<?php
    include ("./php/dbcon.php");
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="ko">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>웹하드</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</head>

<body>
 <div class="alert alert-danger collapse" id="danger-alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><p class="alert_info">이메일 혹은 비밀번호를 확인해주세요</p></div>

 <div class="alert alert-success collapse" id="success-alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><p class="alert_info">이메일 혹은 비밀번호를 확인해주세요</p></div>

    <div id="wrapper">
<!-- Navigation -->
       
            
            <!-- /.navbar-header -->

            
            <!-- /.navbar-top-links -->
            <div class="cu_nav">
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <div class="input-group1">
                        
                        <div class="group">
                            <?php
                                if(isset($_SESSION['userid']))
                                {
                                    $sql = "SELECT COUNT('write_email') as count FROM board where write_email = '".$_SESSION['userid']."'";
                                    $result = mysqli_query($con,$sql);
                                    $row = mysqli_fetch_array($result);
                            ?>

                                <span>이름 : </span><span><?php echo $_SESSION['username'] ?></span><br>
                                <span>이메일 : </span><span><?php echo $_SESSION['userid']?></span><br>
                                <span>등록한 게시물 : </span><span><?php echo $row['count']."개"?></span><br><br>
                                <button type="button" class="btn btn-primary g_btn logout_btn">로그아웃</button>
                                <button type="button" class="btn btn-primary g_btn write">글쓰기</button>
                            <?php
                                }else{
                            ?>
                            <h4 style="margin-left: 10%">로그인</h4>
                            <input type="text" name="id" class="form-control loginid" placeholder="email을 입력해주세요"><br>
                            <input type="password" name="pw" class="form-control loginpw" placeholder="비밀번호를 입력해주세요"><br>
                            <button class="btn btn-primary login" style="margin-left: 10%;">로그인</button>
                            <button class="btn btn-primary go_join" style="float: right; margin-right: 10%;">회원가입</button>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    

                    <ul class="nav" id="side-menu" style="margin-top: 50px">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control search_input" placeholder="검색..." style="height: 34px; margin-left: 0;">
                                <span class="input-group-btn">
                                    <button class="btn btn-default search_btn" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>

                        <?php
                            
                            $sql = "SELECT COUNT('num') as count FROM `board`";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                        ?>
                        <li>
                            <a href="index.php?mode=index">전체보기<?php echo "(".$row['count'].")"?></a>
                        </li>

                        <?php
                            $sql = "SELECT COUNT('num') as count FROM `board` where categories = '취미'";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                        ?>
                        <li>
                            <a href="index.php?mode=cate&cate=취미">취미<?php echo "(".$row['count'].")"?></a>
                        </li>
                        <?php
                            $sql = "SELECT COUNT('num') as count FROM `board` where categories = '재능'";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                        ?>
                        <li>
                            <a href="index.php?mode=cate&cate=재능">재능<?php echo "(".$row['count'].")"?></a>
                        </li>
                        <?php
                            $sql = "SELECT COUNT('num') as count FROM `board` where categories = '특기'";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                        ?>
                        <li>
                            <a href="index.php?mode=cate&cate=특기">특기<?php echo "(".$row['count'].")"?></a>
                        </li>
                        <li>
                            <?php
                            $sql = "SELECT COUNT('num') as count FROM `board` where categories = '아아'";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                        ?>
                            <a href="index.php?mode=cate&cate=아아">아아<?php echo "(".$row['count'].")"?></a>
                        </li>
                        <li>
                            <?php
                            $sql = "SELECT COUNT('num') as count FROM `board` where categories = '몰라'";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                        ?>
                            <a href="index.php?mode=cate&cate=몰라">몰라<?php echo "(".$row['count'].")"?></a>
                        </li>
                    </ul>
                </div>
                
                <div class="Authors" style="margin-top: 30px; ">
                    <div class="au_top">
                        <h3 style="margin-left: 10px;">Authors</h3>
                    </div>
                    <div class="au_bottom">
                        <div style="width: 100%;">
                            <?php
                                $sql = "SELECT DISTINCT writer FROM `board`";
                                $result = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_array($result))
                                {
                            ?>
                            <div style="margin-top: 10px; margin-left: 10px;">
                                    <?php
                                        $sql = "SELECT DISTINCT writer, COUNT('num') as num FROM `board` WHERE writer = '".$row['writer']."'";
                                        $result1 = mysqli_query($con,$sql);
                                        $row1 = mysqli_fetch_array($result1);
                                    ?>
                                <a href="index.php?mode=click&writer=<?php echo $row['writer']?>"><?php echo $row['writer']."(".$row1['num'].")"?></a>
                            </div>
                            <?php
                                }
                            ?>
                            <!-- <div style="margin-top: 10px; margin-left: 10px;">
                                <a href="#">aa</a>
                            </div>
                            <div style="margin-top: 10px; margin-left: 10px;">
                                <a href="#">aa</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            </div>

        <!-- Page Content -->
        <div id="page-wrapper">
            <?php
                $mode = $_GET['mode'];
               
                if(isset($mode))
                {
                    if($mode == "index")
                    {
                        $sql = "SELECT * FROM `board`";
                    }else if($mode == 'cate')
                    {
                         $cate = $_GET['cate'];
                         $sql = "SELECT * FROM `board` where categories = '$cate'";
                     }else if($mode == "ser")
                     {
                        $value = $_GET['value'];
                        $sql = "SELECT * FROM `board` WHERE `title` LIKE '%$value%' or `bodytitle` LIKE '%$value%'";
                     }else if($mode == "click")
                     {
                        $writer = $_GET['writer'];
                        $sql = "SELECT * FROM `board` WHERE writer = '$writer'";
                     }
                     else{
                        $sql = "SELECT * FROM `board`";
                     }
                }
                else{
                    $sql = "SELECT * FROM `board`";
                }
                $result = mysqli_query($con,$sql);
                $row1 = mysqli_fetch_array($result);
                if($row1)
                {
                    if(isset($mode))
                    {
                    if($mode == "index")
                    {
                        $sql = "SELECT COUNT(`num`) as total FROM `board`";
                    }else if($mode == 'cate')
                    {
                         $cate = $_GET['cate'];
                         $sql = "SELECT COUNT(`num`) as total FROM `board` where categories = '$cate'";
                     }else if($mode == "ser")
                     {
                        $value = $_GET['value'];
                        $sql = "SELECT COUNT(`num`) as total FROM `board` WHERE `title` LIKE '%$value%' or `bodytitle` LIKE '%$value%'";
                     }else if($mode == "click"){
                         $writer = $_GET['writer'];
                        $sql = "SELECT COUNT(`num`) as total FROM `board` WHERE writer = '$writer'";
                     }else{
                        $sql = "SELECT COUNT(`num`) as total FROM `board`";
                     }
                }
                else{
                    $sql = "SELECT COUNT(`num`) as total FROM `board`";
                }
                    $result1 = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);

                    $page_set = 5;
                    $block_set = 5;

                    $total = $row['num'];

                    $total_page = ceil($total / $page_set);
                    $total_block = ceil($total_page / $block_set);

                    $page = $_GET['page'];
                    if(!$page) $page = 1;

                    $block = ceil($page / $block_set);
                    $limit_idx = ($page - 1 ) * $page_set;
                    if(isset($mode))
                    {
                        if($mode == "index")
                        {
                            $sql = "SELECT * FROM `board` order by num DESC LIMIT $limit_idx,$page_set";
                        }else if($mode == 'cate')
                        {
                             $cate = $_GET['cate'];
                             $sql = "SELECT * FROM `board` where categories = '$cate' order by num DESC LIMIT $limit_idx,$page_set";

                         }else if($mode == "ser")
                         {
                            $value = $_GET['value'];
                            $sql = "SELECT * FROM `board` WHERE `title` LIKE '%$value%' or `bodytitle` LIKE '%$value%' order by num DESC LIMIT $limit_idx,$page_set";
                         }else if($mode == "click"){
                             $writer = $_GET['writer'];
                            $sql = "SELECT * FROM `board` WHERE writer = '$writer' order by num DESC LIMIT $limit_idx,$page_set";
                         }
                         else{
                            $sql = "SELECT * FROM `board` order by num DESC LIMIT $limit_idx,$page_set";
                         }
                    }
                    else{
                        $sql = "SELECT * FROM `board` order by num DESC LIMIT $limit_idx,$page_set";
                    }
                    $result = mysqli_query($con,$sql);
                    $rows = mysqli_num_rows($result);
                    while($row = mysqli_fetch_array($result))
                    {
                ?>

                        <div class="notice_body">
                <div class="notice_title">
                    <div class="title_div">
                        <p>제목 : </p><p><?php echo $row['title']?></p>
                    </div>
                    <div class="title_div">
                        <p>카테고리 : </p><p><?php echo $row['categories']?></p>
                    </div>
                </div>
                <div class="notice_writer">
                    <p>작성자 : </p><p><?php echo $row['writer']?></p>
                </div>
                <div class="notice_bodytitle">
                    <?php
                        if($row['image_url'] == "")
                        {
                    ?>
                        <p><?php echo htmlspecialchars(substr($row['bodytitle'],0,300))?></p>
                    <?php
                        }else{

                    
                    ?>
                    <img src="<?php echo $row['image_url']?>" class="aaa"><p><?php echo htmlspecialchars(substr($row['bodytitle'],0,300))?></p>
                    <?php
                        }
                    ?>
                </div>
                <div class="notice_footer">

                    <?php
                        $c_sql = "SELECT COUNT('num') as count from comment where board_num = ".$row['num'];
                        $c_result = mysqli_query($con,$c_sql);
                        $c_row = mysqli_fetch_array($c_result);
                    ?>
                    <div class="footer_div">
                        <p>댓글수 :  </p>&nbsp;<p> <?php echo $c_row['count']?>개</p>
                    </div>
                    <div class="footer_div">
                        <button type="button" class="btn btn-primary more_btn" data-num="<?php echo $row['num']?>">더보기</button>
                        <?php
                            if($_SESSION['userid'] == $row['write_email'])
                            {


                        ?>
                        <button type="button" class="btn btn-primary delete_btn" data-num="<?php echo $row['num']?>" data-url="<?php echo $row['image_url']?>">삭제</button>
                        <button type="button" class="btn btn-primary update_btn" data-num="<?php echo $row['num']?>">수정</button>
                        <?php
                            }else{
                                
                            }
                        ?>
                    </div>
                </div>
           </div>
                <?php
                    }
                    $first_page = (($block - 1) * $block_set) + 1;
                    $last_page = min($total_page,$block * $block_set);

                    $prev_page = $page - 1;
                    $next_page = $page + 1;

                    $prev_block = $block - 1;
                    $next_block = $block + 1;

                    $prev_block_page = $prev_block * $block_set;
                    $next_block_page = $next_block * $block_set - ($block_set - 1);

            ?>
                <div style="width: 100%; height: 100px; ">
                    <div style="height: 50%; ; width: 100%;">
                        <?php
                            if($prev_page > 0)
                            {
                                echo "<a href='index.php?mode=$mode&cate=$cate&page=$prev_page' style='margin-left: 48%'>prev</a>";
                            }else{
                                echo "<a href='#' style='margin-left: 48%'>prev</a>";
                            }

                            for($i = $first_page; $i <= $last_page; $i++)
                            {
                                // echo $page;
                                if($i != $page)
                                {
                                    echo " <a href='index.php?mode=$mode&cate=$cate&page=$i'>$i</a>";
                                }else{
                                    echo " <a href='#' style='color:red;'>$i</a>";
                                }
                            }
                            if($next_page <= $total_page)
                             {
                                    echo " <a href='index.php?mode=$mode&cate=$cate&page=$next_page' class='next_a'>next</a>";
                            }else{
                                    echo " <a href='#' class='next_a'>next</a>";
                            }
                        ?>
                    </div>
                   
            </div>
            <?php
                }else{
                    echo $cate."게시글이 없습니다.";
                }
            ?>
                     
            
           <!-- <div class="notice_body">
                <div class="notice_title">
                    <div class="title_div">
                        <p>제목 : </p><p>아 겁나게 힘들다</p>
                    </div>
                    <div class="title_div">
                        <p>카테고리 : </p><p>뭐가 있는데</p>
                    </div>
                </div>
                <div class="notice_writer">
                    <p>작성자 : </p><p>호무새</p>
                </div>
                <div class="notice_bodytitle">
                    <img src="img/200.png"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t</p>
                </div>
                <div class="notice_footer">
                    <div class="footer_div">
                        <p>댓글수 : </p><p></p>
                    </div>
                    <div class="footer_div">
                        <button type="button" class="btn btn-primary">더보기</button>
                        <button type="button" class="btn btn-primary">삭제</button>
                        <button type="button" class="btn btn-primary">수정</button>
                        
                        
                    </div>
                </div>
           </div>

           <div class="notice_body">
                <div class="notice_title">
                    <div class="title_div">
                        <p>제목 : </p><p>아 겁나게 힘들다</p>
                    </div>
                    <div class="title_div">
                        <p>카테고리 : </p><p>뭐가 있는데</p>
                    </div>
                </div>
                <div class="notice_writer">
                    <p>작성자 : </p><p>호무새</p>
                </div>
                <div class="notice_bodytitle">
                    <img src="img/200.png"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t</p>
                </div>
                <div class="notice_footer">
                </div>
           </div>

           <div class="notice_body">
                <div class="notice_title">
                    <div class="title_div">
                        <p>제목 : </p><p>아 겁나게 힘들다</p>
                    </div>
                    <div class="title_div">
                        <p>카테고리 : </p><p>뭐가 있는데</p>
                    </div>
                </div>
                <div class="notice_writer">
                    <p>작성자 : </p><p>호무새</p>
                </div>
                <div class="notice_bodytitle">
                    <img src="img/200.png"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t</p>
                </div>
                <div class="notice_footer">
                </div>
           </div>

           <div class="notice_body">
                <div class="notice_title">
                    <div class="title_div">
                        <p>제목 : </p><p>아 겁나게 힘들다</p>
                    </div>
                    <div class="title_div">
                        <p>카테고리 : </p><p>뭐가 있는데</p>
                    </div>
                </div>
                <div class="notice_writer">
                    <p>작성자 : </p><p>호무새</p>
                </div>
                <div class="notice_bodytitle">
                    <img src="img/200.png"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t</p>
                </div>
                <div class="notice_footer">
                </div>
           </div>

           <div class="notice_body">
                <div class="notice_title">
                    <div class="title_div">
                        <p>제목 : </p><p>아 겁나게 힘들다</p>
                    </div>
                    <div class="title_div">
                        <p>카테고리 : </p><p>뭐가 있는데</p>
                    </div>
                </div>
                <div class="notice_writer">
                    <p>작성자 : </p><p>호무새</p>
                </div>
                <div class="notice_bodytitle">
                    <img src="img/200.png"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also t</p>
                </div>
                <div class="notice_footer">
                </div>
           </div> -->


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
