<?php
require("./db_connect.php");




$timestamp = time();
?>




<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
    <!-- 【】内は適宜書き換えて下さい -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="【@basketball_1012】" />
    <meta name="twitter:title" content="【シェアするページのタイトル】" />
    <meta name="twitter:description" content="【シェアするページの概要】" />
    <meta name="twitter:image" content="【シェアするページのアイコン画像(絶対パス)】" />
    <meta name="twitter:url" content="【シェアするページのURL】" />
    <title>app</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="app_pc.css">
    <link rel="stylesheet" href="app_smartphone.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="all_wraper">
        <div id="mainPage">

            <header class="header">


                <img src="https://posse.anti-pattern.co.jp/img/posseLogo.png" alt="" class="header_logo_img">
                <p class="header_week">4th week</p>
                <button class="header_button" id="headerButton">記録・投稿</button>

            </header>

            <div class="container">
                <div class="main_left">
                    <div class="main_time">
                        <ul class="time_box_container">
                            <li class="time_box">


                                <span class="time_title">Today

                                </span><br>
                                <span class="time_result"><?php


                                                            $timestamp = time();
                                                            $find   = date("Y-m-d", $timestamp);
                                                            $pos = strpos($data['date'], $find);

                                                            if ($pos !== false) {
                                                                $f_total += $data['study_time'];
                                                            } else {
                                                                $f_total = 0;
                                                            }


                                                            echo $f_total . PHP_EOL;


                                                            ?>


                                </span>
                                <br>
                                <span class="time_unit">hour

                                </span>

                            </li>
                            <li class="time_box">


                                <span class="time_title">Month

                                </span><br>
                                <span class="time_result">

                                    <?php
                                    $stmt = $db->prepare('SELECT * FROM studyPost');
                                    $stmt->execute();
                                    $month_times = $stmt->fetchAll();



                                    // UNIX TIMESTAMPを取得
                                    $timestamp = time();
                                    $f_total = 0;
                                    foreach ($month_times as $data) {


                                        $find   = date("Y-m", $timestamp);
                                        $pos = strpos($data['date'], $find);

                                        if ($pos !== false) {
                                            $f_total += $data['study_time'];
                                        } else {
                                            $f_total += 0;
                                        }
                                    }
                                    echo $f_total . PHP_EOL;












                                    ?>


                                </span>
                                <br>
                                <span class="time_unit">hour

                                </span>

                            </li>
                            <li class="time_box">


                                <span class="time_title">Total

                                </span><br>
                                <span class="time_result">

                                    <?php

                                    $stmt = $db->prepare('SELECT * FROM studyPost');
                                    $stmt->execute();
                                    $month_times = $stmt->fetchAll();






                                    $f_total = 0;
                                    foreach ($month_times as $data) {



                                        $f_total += $data['study_time'];
                                    }





                                    echo $f_total . PHP_EOL;


                                    ?>

                                </span>
                                <br>
                                <span class="time_unit">hour

                                </span>

                            </li>
                        </ul>
                    </div>

                    <div class="time_graph_container">
                        <canvas class="time_graph" id="myBarChart"></canvas>
                        
                    </div>

                </div>

                <div class="main_right">
                    <div class="main_contents">
                        <ul class="study_result_container">
                            <li class="study_result">
                                <h1 class="study_result_title">学習言語</h1>
                                <div class="study_chart">
                                    <canvas id="studyLanguageChart"></canvas>

                                </div>
                                <ul class="study_language_language_container">
                                    <div class="study_language_display">

                                        <li>
                                            <div class="study_language_javascript">

                                            </div>
                                            <p>JavaScript</p>
                                        </li>
                                        <li>
                                            <div class="study_language_css">

                                            </div>
                                            <p>CSS</p>
                                        </li>
                                        <li>
                                            <div class="study_language_php">

                                            </div>
                                            <p>PHP</p>
                                        </li>

                                    </div>
                                    <div class="study_language_display">
                                        <li>
                                            <div class="study_language_html">

                                            </div>
                                            <p>HTML</p>
                                        </li>
                                        <li>
                                            <div class="study_language_laravel">

                                            </div>
                                            <p>Laravel</p>
                                        </li>
                                        <li>
                                            <div class="study_language_sql">

                                            </div>
                                            <p>SQL</p>
                                        </li>
                                    </div>
                                    <li>
                                        <div class="study_language_shell">

                                        </div>
                                        <p>SHELL</p>
                                    </li>
                                    <li>
                                        <div class="study_language_other">

                                        </div>
                                        <p>情報システム基礎知識（その他）</p>
                                    </li>


                                </ul>





                            </li>
                            <li class="study_result">
                                <h1 class="study_result_title">学習コンテンツ</h1>
                                <div class="study_chart">
                                    <canvas id="studyContentsChart"></canvas>
                                </div>

                                <ul class="study_contents_contents_container">
                                    <li>
                                        <div class="study_contents_dot">

                                        </div>
                                        <p>ドットインストール</p>
                                    </li>
                                    <li>
                                        <div class="study_contents_N">

                                        </div>
                                        <p>N予備校</p>
                                    </li>
                                    <li>
                                        <div class="study_contents_posse">

                                        </div>
                                        <p>POSSE課題</p>
                                    </li>



                                </ul>




                            </li>
                        </ul>


                    </div>

                </div>




            </div>
            <div class="month_change_container">
                <div class="month_change">
                    <div>
                        < </div>

                            <div>
                                <time><?php echo date("Y年m月"); ?></time>




                            </div>
                            >

                            <div>


                            </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="mordal" id="mordal">
            <div class="mordal_container" id="mordalContainer">
                <div class="mordal_left">
                    <div class="study_day_container">
                        <p class="mordal_sub_title">学習日</p>
                        <div class="study_day_write_space">
                            <input type="date" maxlength="30" size="50" style="font-size:px;" class="study_currendor">

                        </div>





                    </div>
                    <div class="study_contents_container">
                        <p class="mordal_sub_title">学習コンテンツ</p>
                        <ul class="choices_container">
                            <div class="display_flex">
                                <li role="checkbox" class="choices check_box">
                                    N予備校
                                </li>
                                <li role="checkbox" class="choices check_box">
                                    ドットインストール
                                </li>
                            </div>
                            <li role="checkbox" class="choices check_box">
                                POSSE課題
                            </li>
                        </ul>


                    </div>

                    <div class="study_language_container">
                        <p class="mordal_sub_title">学習言語（複数選択可）</p>
                        <ul class="choices_container">
                            <div class="display_flex">

                                <li role="checkbox" class="choices check_box">HTML</li>
                                <li role="checkbox" class="choices check_box">CSS</li>
                                <li role="checkbox" class="choices check_box">JavaScript</li>

                            </div>
                            <div class="display_flex">

                                <li role="checkbox" class="choices check_box">PHP</li>
                                <li role="checkbox" class="choices check_box">Laravel</li>
                                <li role="checkbox" class="choices check_box">SQL</li>
                                <li role="checkbox" class="choices check_box">SHELL</li>

                            </div>

                            <div role="checkbox" class="choices check_box">情報システム基礎知識（その他）</div>

                        </ul>


                    </div>





                </div>

                <div class="mordal_right">

                    <div class="study_time">
                        <p class="mordal_sub_title">学習時間</p>
                        <!-- 学習 -->
                        <form action=“index.php” method=“POST”>
                            <input class="study_time_write_space" size="38" type=“text” name=“comment/“><br />

                        </form>


                    </div>

                    <div class="twitter_comment_container">
                        <p class="mordal_sub_title">Twitter用コメント</p>
                        <textarea id="twitterText" cols="37" rows="7" type="text" class="twitter_comment_write_space"></textarea>


                    </div>

                    <div class="twitter_shere_button">


                    </div>

                    <div>
                        <p id="checkTwitter" class="share_twitter_button">Twitterにシェアする</p>
                    </div>



                </div>
            </div>



            <div class="back_button" id="backButton">
                <p>×</p>
            </div>


            <div class="submit_container">
                <a href="javascript:twitText()" class="submit_button" id="submitButton" onclick="submit_click()">記録・投稿</a>








            </div>









        </div>

        <div class="load_mordal" id="loadMordal">

            <div class="loader">Loading...</div>

        </div>

        <div class="awesome_page" id="awesomePage">
            <div class="awesome_container">
                <h1 class="awesome_character">AWESOME</h1>
                <i class="fas fa-check-circle fa-4x"></i>
                <p>記録・投稿<br>完了しました</p>
            </div>

            <div class="back_button" id="mainBackButton">
                <p>×</p>
            </div>



        </div>














        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="app.js"></script>

        <script>



                            // 棒グラフ



                            // 
                               <?php $stmt = $db->prepare('SELECT * FROM studyPost');
                                $stmt->execute();
                                $study_hours = $stmt->fetchAll();

                                  ?>

                                // $sql = "SELECT
                                //     FROM studyPost
                                //     INNER JOIN language 
                                //     ON language_id = language_id
                                //     INNER JOIN contents 
                                //     ON contents_id = contents_id
                                //    ";
                                // $stmt = ($dbh->prepare($sql));
                                // $stmt->execute();





                                //           $date = '';
                                //           $hour = '';


                                //           //2．データ登録SQL作成
                                //           //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ


                                //           //loop through the returned data
                                //             $array =array();



                                //             for ($i=1; $i <32 ; $i++) { 









                                //             };





                                //           $hour = trim($hour,",");








                                //           
                                








var ctx = document.getElementById("myBarChart").getContext("2d");;
var gradientStroke = ctx.createLinearGradient(0, 100, 0, 500);
gradientStroke.addColorStop(0, "#0f71bc");
gradientStroke.addColorStop(1, "#3ccfff");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
     
      labels: ['', '2', '','4','', '6','', '8','', '10','', '12','', '14','', '16','', '18','', '20','', '22','', '24','','26','', '28','', '30', ''],
      datasets: [
        {
          label: '勉強時間',
          data: [<?php $hour = trim($hour,",");

          foreach($study_hours as $hour){
              echo $hour['study_time'] ;


          }
            ?>],
          backgroundColor: gradientStroke
          
        }
          
        
      ]
    },
    options: {
      title: {
        display: true,
        
      },
      legend: {
        display: false
     },
     responsive: true,
        maintainAspectRatio: false,
 

      scales: {
        xAxes: [{
            display: true,
            stacked: false,
            gridLines: {
              display: false,
              drawBorder: false
            }
          }],
        yAxes: [{
            gridLines: {
                display: false,
                drawBorder: false
              },
          ticks: {
            
            suggestedMax: 8,
            suggestedMin: 0,
            stepSize: 2,
            callback: function(value, index, values){
              return  value +  'h'
            }
          }
        }]
      },
    }
  });
// //学習言語 円グラフ


var ctx = document.getElementById("studyLanguageChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["JavaScript", "CSS", "PHP", "HTML","Laravel","SQL","SHELL","情報システム情報システム基礎知識（その他）"],
      datasets: [{
          backgroundColor: [
            "#0345EC",
            "#0F71BD",
            "#20BDDE",
            "#3CCEFE",
            "#B29EF3",
            "#6D46EC",
            "#4A17EF",
            "#3105C0",
          ],
          data: [42, 18, 10,10, 8,6,4,2]
          
      }]
    },
    options: {
      title: {
        display: true,
        
      },
      legend: {
        display: false
     },
     responsive: true,
        maintainAspectRatio: false,
    }
  });


 
// 円グラフ

  var ctx = document.getElementById("studyContentsChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["ドットインストール", "N予備校", "POSSE課題", ],
    datasets: [{
        backgroundColor: [
            "#0445EC",
            "#0F70BC",
            "#20BDDE",
            
        ],
        data: [42, 33, 25]
    }]
  },
  options: {
    title: {
      display: true,
  
    },
    legend: {
        display: false
     },
     responsive: true,
        maintainAspectRatio: false,
  }
});

                          
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        </script>


</body>

</html>