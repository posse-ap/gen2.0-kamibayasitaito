let choice= [
['たかなわ','たかわ','こうわ'],
['かめど','かめいど','かめと'],
['こうじまち','かゆまち','おかとまち'],
['おかどもん','ごせいもん','おなりもん'],
['とどろき','たたら','たたりき'],
['いじい','しゃくじい','せきこうい'],
['ざっしき','ざっしょく','ぞうしき'],
['おかちまち','ごしろちょう','みとちょう'],
['ししぼね','ろっこつ','しこね'],
['こばく','こぐれ','こしゃく']
]
var title ='<p>ガチで東京の人しか解けない！ #東京の難読地名クイズ</p>'

for (let i = 0; i < choice.length; i++) {

    title+='<h1>'+(i+1)+'この地名なんて読むでしょう</h1>'+

  '<img src="https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png ">'
   +
    '<ul>'+ 
    '<li class="box-before-click">'+choice[i][0]+'</li>'+
    '<li class="box-before-click">'+choice[i][1]+'</li>'+
    '<li class="box-before-click">'+choice[i][2]+'</li>'+
   
    '</ul>'
  
   
    
    


    
    
}


document.getElementById('main').insertAdjacentHTML('beforeend', title);