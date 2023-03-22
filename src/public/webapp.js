'use strict';

// SHOW MODAL (PC VERSION)

$(function () {
  $('#modalbtn').click(function(){
    $('#modal').css('display', 'block')
    $('.modal_bg').css('display', 'block')

  });
  $('#close').click(function(){
    $('#modal').css('display', 'none')
    $('.modal_bg').css('display', 'none')
  });
});

// SHOW MODAL (MOBILE VERSION)

$(function () {
  $('#mobile_modalbtn').click(function(){
    $('#mobilemodal').css('display', 'block');
    $('.mobilemodal_bg').css('display', 'block');
    $('.mobilemodal_wrapper').css('display', 'block');

  });
  $('#closemobile').click(function(){
    $('#mobile_modal').css('display', 'none');
    $('.mobilemodal_bg').css('display', 'none');
    $('.mobilemodal_wrapper').css('display', 'none');
  });
});


// DATE 

$('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();

// CHANGE COLOR OF CHECKBOXES (PC)

// CONTENT
for (let i = 1; i <= 3; i++) {
  let content_box = document.getElementById(`content${i}`);
  let content_labels = document.getElementById(`content_label${i}`);
  content_labels.addEventListener('click', function() {
    content_box.classList.toggle('option_clicked')
    content_labels.classList.toggle('circle_clicked');
  })
}

// LANGUAGE
for (let i = 1; i <= 8; i++) {
  let lang_box = document.getElementById(`language${i}`);
  let lang_labels = document.getElementById(`language_label${i}`);
  lang_labels.addEventListener('click', function() {
    lang_box.classList.toggle('option_clicked');
    lang_labels.classList.toggle('circle_clicked');
  })
}


// LOADING (PC)

let bottom = document.getElementById('bottom_btn');

bottom.addEventListener('click', function() {
  let loader = document.getElementById('loader');
  let hideleft = document.getElementById('modal_left');
  let hideright = document.getElementById('modal_right');
  let hidebottom = document.getElementById('modal_bottom');
  loader.style.display = "block";
  hideleft.style.display = "none";
  hideright.style.display = "none";
  hidebottom.style.display = "none";
});


$("#bottom_btn").click(function() {
  setTimeout(function() {
    $("#complete").css("display", "block");
    $("#loader").css("display", "none");
  }, 2000);
});


// LOADING (MOBILE)

let kiroku = document.getElementById('mobile_modalbtn2');

kiroku.addEventListener('click', function() {
  let loadermobile = document.getElementById('loader_mobile');
  let hidecontent = document.getElementById('mobilemodal_wrapper');
  loadermobile.style.display = "block";
  hidecontent.style.display = "none";
});

// setTimeout(function() { 
//   let loadermobile = document.getElementById('loader_mobile');
//   loadermobile.style.display = "none";
//   let complete = document.getElementById('complete_mobile');
//   complete.style.display = "block";
//  }, 5000);

$("#mobile_modalbtn2").click(function() {
  setTimeout(function() {
    $("#complete_mobile").css("display", "block");
    $("#loader_mobile").css("display", "none");
  }, 2000);
});


// CHANGE COLOR OF CHECKBOXES (MOBILE)

//動的なidをつける
let mobilecontentname = "mobilecontent"
let mobilefirstcirclename = "mobilefirstcircle"
let mobileoption1 = document.getElementsByClassName("mobilecontent_op");
let mobilecircle1 = document.getElementsByClassName("mobilecircle_content");


for (let i = 0; i <= 2; i++) {
    //id追加
    mobileoption1[i].setAttribute("id", mobilecontentname + i);
    mobilecircle1[i].setAttribute("id", mobilefirstcirclename + i);
}

for (let i = 0; i <= 2; i++) {
  let mobilecontentbox = document.getElementById(`mobilecontent${i}`);
  let mobilefirstcircles = document.getElementById(`mobilefirstcircle${i}`);
  mobilecontentbox.addEventListener('click', function() {
    mobilecontentbox.classList.toggle('option_clicked');
    mobilefirstcircles.classList.toggle('circle_clicked');

  })
}

let mobilelangname = "mobilelang"
let mobilesecondcirclename = "mobilesecondcircle";
let mobileoption2 = document.getElementsByClassName("mobilelang_op");
let mobilecircle2 = document.getElementsByClassName("mobilecircle_lang");

for (let i = 0; i <= 7; i++) {
    //id追加
    mobileoption2[i].setAttribute("id", mobilelangname + i);
    mobilecircle2[i].setAttribute("id", mobilesecondcirclename + i);
}

for (let i = 0; i <= 7; i++) {
  let mobilelangbox = document.getElementById(`mobilelang${i}`);
  let mobilesecondcircles = document.getElementById(`mobilesecondcircle${i}`);
  mobilelangbox.addEventListener('click', function() {
    mobilelangbox.classList.toggle('option_clicked');
    mobilesecondcircles.classList.toggle('circle_clicked');
  })
}

let twittercircle = document.getElementById('twitter_circle');
twittercircle.addEventListener('click', function() {
  document.getElementById('twitter_label').classList.toggle('twitter_circle_checked');
})


// COLUMN CHART

  // google.charts.load("current", {packages:["corechart"]});
  //       google.charts.setOnLoadCallback(drawColumnChart);
  //       function drawColumnChart() {

  //         var data = new google.visualization.DataTable();
  //         data.addColumn('number', 'Day of Month');
  //         data.addColumn('number', 'Hours Studied');

  //         data.addRows([
  //           [1, 3], 
  //           [2, 4],
  //           [3, 5],
  //           [4, 3],
  //           [5, 0],
  //           [6, 0],
  //           [7, 4],
  //           [8, 2],
  //           [9, 2],
  //           [10, 8],
  //           [11, 8],
  //           [12, 2],
  //           [13, 2],
  //           [14, 1],
  //           [15, 7],
  //           [16, 4],
  //           [17, 4],
  //           [18, 3],
  //           [19, 3],
  //           [20, 3],
  //           [21, 2],
  //           [22, 2],
  //           [23, 6],
  //           [24, 2],
  //           [25, 2],
  //           [26, 1],
  //           [27, 1],
  //           [28, 1],
  //           [29, 7],
  //           [30, 8]
  //         ]);


  //       var options = {
  //         // width: '85%',
  //         // height: '90%',
  //         chartArea: { width: '85%', height: '85%'},
  //         legend: { position: 'none' },
  //         hAxis: { 
  //           ticks: [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30],
  //           // ticks: {
  //           //   min: 1,
  //           //   max: 30,
  //           //   stepSize: 2,
  //           //   // maxTicksLimit: 16,
  //           // },
  //           gridlines: {color: 'transparent'},
  //           textStyle: {
  //             color: '#b8cddf'
  //           }
  //         },
  //         vAxis: {
  //           gridlines: {color: 'transparent'},
  //           baselineColor: 'transparent',
  //           format: '#h',
  //           textStyle: {
  //             color: '#b8cddf'
  //           }
  //         },
  //         colors:['#36c0f5'],
  //         maintainAspectRatio: false

  //       };

  //       var chart = new google.visualization.ColumnChart(
  //         document.getElementById('column'));

  //       drawChart();
  //       window.addEventListener('resize', drawChart, false);
  //       function drawChart() {
  //         chart.draw(data, options);
  //       }
  //       }





// DONUT CHART 

// STUDY LANGUAGE
// google.charts.load("current", {packages:["corechart"]});
//       google.charts.setOnLoadCallback(drawDonut1);
//       function drawDonut1() {
//         var data = google.visualization.arrayToDataTable([
//           ['Task', 'Hours'],
//           ['HTML',     30],
//           ['CSS',      20],
//           ['SQL',  20],
//           ['SHELL',  20],
//           ['Javascript',  10],
//           ['その他',  10],
//           ['PHP',  5],
//           ['Laravel',  5],
//         ]);

//         var options = {
//           chartArea: {  width: "85%", height: "100%" },
//           pieHole: 0.4,
//           slices: {
//             0: { color: '#0445ec' },
//             1: { color: '#0f70bd' },
//             2: { color: '#20bdde' },
//             3: { color: '#3ccefe' },
//             4: { color: '#b29ef3' },
//             5: { color: '#6c46eb' },
//             6: { color: '#4a17ef' },
//             7: { color: '#3005c0' },
//           },
//           legend: {
//             position: 'none',
//           },
//           pieSliceBorderColor: 'none',


//         };

//         var chart = new google.visualization.PieChart(document.getElementById('donut_lang'));
//         chart.draw(data, options);
//       }



// STUDY CONTENT
// google.charts.load("current", {packages:["corechart"]});
//       google.charts.setOnLoadCallback(drawDonut2);
//       function drawDonut2() {
//         var data = google.visualization.arrayToDataTable([
//           ['Task', 'Hours'],
//           ['N予備校',     40],
//           ['課題',  40],
//           ['ドットインストール',      20]
//         ]);

//         var options = {
//           chartArea: {  width: "85%", height: "100%" },
//           pieHole: 0.4,
//           slices: {
//             0: { color: '#0445ec' },
//             1: { color: '#0f70bd' },
//             2: { color: '#20bdde' }
//           },
//           legend: {
//             position: 'none',
//           },
//           pieSliceBorderColor: 'none',

//         };

//         var chart = new google.visualization.PieChart(document.getElementById('donut_content'));
//         chart.draw(data, options);
//       }



// TWITTER投稿

// function GetTweet(str,code) {
//     var text_all = document.getElementById("tweetBox");
//     var input_data = text_all.value.replace(/\r?\n/g, '%0D%0A');
//     TWEET.innerHTML =　'<a class="twitter_button" href="https://twitter.com/intent/tweet?text=' + input_data + '" target="_blank">Twitterにシェアする</a>'
// }

$(function(){
  $('#twitter_circle').click(function(){
    if ($('#twitter_circle').prop('checked')) {
      // tweetBox の内容を取得。2行目は詳しくわからないけど、形式を整えてる感じかな？
      let text_all = document.getElementById("tweetBox");
      let input_data = text_all.value.replace(/\r?\n/g, '%0D%0A');

      // ボタンタグの中に、twitterに飛ぶ a タグをつくる感じ。
      const redirect = document.createElement('a');
      // tweetBox の内容を tweet に埋め込む
      const hrefValue ='https://twitter.com/intent/tweet?text=' + input_data;
      redirect.setAttribute('href', hrefValue);
      // 新しいタブで開く
      const targetValue = '_blank';
      redirect.setAttribute('target', targetValue);
      redirect.classList.add('twitter_button');
      // bottom_btn にすでに「記録・投稿」が割り当てられているから、今回は元々のボタンの innerText を空にしてる
      redirect.innerText = "記録・投稿"
      document.getElementById('bottom_btn').innerText = "";
      document.getElementById('bottom_btn').appendChild(redirect);
      
    } else {
      console.log('bad');
    }
  });
});


// // クイズの内容を埋め込みたい場所の指定
// let element = document.getElementById('box');

// // 埋め込む内容を変数に入れる
// let text = '<p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p><p>aaaaaa</p>'

// // 実際に埋め込む処理
// element.insertAdjacentHTML('beforebegin', '<p>Paragraph</p>');








