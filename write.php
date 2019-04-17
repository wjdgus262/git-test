<?php
    include ("./php/dbcon.php");
    session_start();

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
        <div id="page-wrapper" style="height: 1005px">
                <div class="panel panel-default"> 
<!-- Default panel contents --> 
                    <div class="panel-heading"><h2>Write</h2></div> 
                            <div class="container"> 
                                    <div class="con_div">
                                        <table>
                                            <tr>
                                                <th>E-mail </th><td><input type="text" name="uu" class="form-control ii write_email" placeholder="이메일을 입력해주세요" value="<?php echo $_SESSION['userid']?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <th>작성자 </th><td><input type="text" name="uu" class="form-control ii write_name" placeholder="이름을 입력해주세요" value="<?php echo $_SESSION['username']?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <th>카테고리 </th><td><select class="form-control select_fom ii">
                                                <option value="취미">취미</option>
                                                <option value="재능">재능</option>
                                                <option value="특기">특기</option>
                                                <option value="아아">아아</option>
                                                <option value="몰라">몰라</option>
                                              </select></td>
                                            </tr>
                                            <tr>
                                                <th>제목 </th><td><input type="text" name="uu" class="form-control ii write_title" placeholder="제목을 입력해주세요"></td>
                                            </tr>
                                            <tr>
                                                <th>본문</th><td><textarea class="form-control  write_bodytext" rows="10" name="content" id="content" placeholder="본문을 입력해주세요"></textarea> </td>
                                            </tr>
                                            <tr>
                                                <th>이미지 </th><td><label class="btn btn-primary btn-file" style="margin-left: 10%">
        이미지추가 <input type="file" style="display: none;" accept=".gif, .jpg, .png" onchange="fileCheck(this);" class="file">
    </label></td>
                                            </tr>
                                        </table>
                                        <button type="button" class="btn btn-default write_btn">글쓰기</button>
                                        <a href='index.php' class="btn btn-default">취소</a>
                                    </div>

                            </div>
                    </div>
                </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>
<script type="text/javascript">
    function fileCheck(obj)
    {
        pathpoint = obj.value.lastIndexOf('.');
        filepoint = obj.value.substring(pathpoint+1,obj.length);
        filetype = filepoint.toLowerCase();
        if(filetype =='jpg' || filetype == 'gif' || filetype =='pnag' || filetype =='jpeg' || filetype == 'bmp')
        {
            $("#danger-alert").hide();
        }else{
            $(".alert_info").text('이미지 파일만 선택할수있습니다');
            $("#success-alert").hide();
            $("#danger-alert").show();
            parentObj = obj.parentNode;
            node = parentObj.replaceChild(obj.cloneNode(true),obj);
            return false;
        }
        if(filetype == 'bmp')
        {
            $("#danger-alert").hide();
            var result = confirm('BMP 파일은 웹상에서 사용하기엔 적절한 이미지 포맷이 아닙니다. 그래도 계속 하시겠습니까?');
            IF(result)
            {
                return false;
            }
        }
    }
</script>

</html>
