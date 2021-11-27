// モーダル
const mordal=document.getElementById('mordal');
const mordalbutton= document.getElementById('headerButton');
const mainpage=document.getElementById('mainPage');
// モーダルの可視性を定義
const visibilityOriginal = mordal.style.visibility;
mordal.style.visibility = 'hidden'

const mordalchange= e=>{
mordal.style.visibility = visibilityOriginal;
mainpage.classList.add('main_page');



};



mordalbutton.addEventListener('click',mordalchange);

const smartphoneButton=


const backbutton =document.getElementById('backButton');
const mordalback=e=>{
    mordal.style.visibility = 'hidden'
   mainpage.classList.remove('main_page');


}
backbutton.addEventListener('click', mordalback);
// モーダル表示ここまで

// 選択欄の色変え
const choices=document.querySelectorAll('[role="checkbox"]');


const changeChoices=e =>{
 const target =e.target
 target.classList.toggle('choices_after_click');
 target.classList.toggle('choices');
 target.classList.toggle('check_box');
 target.classList.toggle('check_box_after_click');
 



}

choices.forEach(choice=> {
  choice.addEventListener('click',changeChoices);


});


// 記録・投稿ボタン処理
const submit =document.getElementById('submitButton');

















// twitterのチェックマーク
const checkTwitter=document.getElementById('checkTwitter');

const changeCheck=t =>{
  const target =t.target
  target.classList.toggle('share_twitter_button');
  target.classList.toggle('share_twitter_button_after_click');




};
checkTwitter.addEventListener('click',changeCheck);
// twitterボタンの処理


  

function submit_click(){
  var s, url;
    var twitterText=document.getElementById('twitterText')
    s =twitterText.value ;
    url = document.location.href;

  if (checkTwitter.className===("share_twitter_button_after_click")){
    
    
   
      if (s.length > 140) {
        //文字数制限
        alert("テキストが140字を超えています");
      } else {
        //投稿画面を開く
        url = "http://twitter.com/share?"  + "&text=" + s;
        window.open(url,"_blank","width=600,height=300");
      }
    

  }
  else{

    
  }

};






// ロード画面処理
const loadMordal =document.getElementById('loadMordal')
loadMordal.style.visibility='hidden'
const loadChange=e =>{
 loadMordal.style.visibility='visible'
 mordal.style.visibility = 'hidden'
 setTimeout(awesomeChange,3000)
};


submit.addEventListener('click', loadChange);

// 完了画面
const awesome =document.getElementById('awesomePage');
awesome.style.visibility='hidden'
const awesomeChange=e=>{

awesome.style.visibility='visible'


}



// 完了画面バックボタン
const mainBackbutton =document.getElementById('mainBackButton');
const mainback=e=>{
    awesome.style.visibility = 'hidden'
    loadMordal.style.visibility = 'hidden'
   mainpage.classList.remove('main_page');


}
mainBackbutton.addEventListener('click', mainback);






// 棒グラフ

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
          data: [3, 5, 7, 3, 10, 0, 5,3, 5, 7, 3, 10, 0, 5,3, 5, 7, 3, 10, 0, 5,3, 5, 7, 3, 10, 0, 5,3, 5, 7, 3, 10, 0, 5],
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


// 棒グラフのサイズ変更jquery
if (matchMedia('only screen and (min-width: 767px)').matches) {
  
  $(function () {
    var container = $('.study_chart');
    var ctx= $('#chart');
    ctx.attr('width', container.width());
    ctx.attr('height', 400);
});
  //スマホ・タブレットの時の処理
  
  }else{
  
  $(function () {
    var container = $('.study_chart');
    var ctx= $('#chart');
    ctx.attr('width', container.width());
    ctx.attr('height', 900);
});
  //PCの時の処理
  
  }
  


 
//学習言語 円グラフ

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

  
