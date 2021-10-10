var question_list = new Array
question_list.push(['たかなわ', 'たかわ', 'こうわ']);
question_list.push(['かめいど', 'かめど', 'かめと']);
question_list.push(['こうじまち', 'かゆまち', 'おかとまち']);
question_list.push(['おなりもん', 'ごせいもん', 'おかどもん']);
question_list.push(['とどろき', 'たたら', 'たたりき']);
question_list.push(['しゃくじい', 'いじい', 'せきこうい']);
question_list.push(['ぞうしき', 'ざっしょく', 'ざっしき']);
question_list.push(['おかちまち', 'ごしろちょう', 'みとちょう']);
question_list.push(['ししぼね', 'ろっこつ', 'しこね']);
question_list.push(['こぐれ', 'こばく', 'こしゃく']);

 var contents='<p class="quiz_title">ガチで東京の人しか解けない！ #東京の難読地名クイズ</p>'

   
function shuffle(array,question_id){
let answer=array[0]

for (var k = (question_list.length - 1); 0 < k; k--) {

    
    var r = Math.floor(Math.random() * (k + 1));

    
    var tmp = question_list[k];
    question_list[k] = question_list[r];
    question_list[r] = tmp;
}
createquestion(question_id,array.indexOf(answer)+1)
}

for (let i = 0; i < question_list.length; i++) {
    
    shuffle(question_list[i],i)
}




function createquestion(question_id,answer_number){
    contents+=  `<div class="quiz_box">`+
    '<h1 class="quiz">' + (question_id + 1) + '.この地名は</h1>'+'<h1 class="quiz2">なんて読むでしょう</h1>' +
    `</div>` +

    '<img class="image_size" src=./img/'+(question_id+1)+'.png>'+
    '<ul>' +
    `<li class="box-before-click" id="select_${question_id + 1}_1" onclick="result(${question_id+ 1},1,${answer_number})">` + question_list[question_id][0] + `</li>` +
    `<li class="box-before-click" id="select_${question_id + 1}_2" onclick="result(${question_id+ 1},2,${answer_number})">` + question_list[question_id][1] + `</li>` +
    `<li class="box-before-click" id="select_${question_id+ 1}_3" onclick="result(${question_id+ 1},3,${answer_number})">` + question_list[question_id][2] + `</li>` +

    '</ul>' +
    `<div class="answer_box" id="true_box_${question_id+ 1}">` +
    '<p class="true_text">正解！</p>' +
    `<p class="true_sentence">正解は${question_list[question_id][answer_number-1]}です！</p>` +
    `</div>` +
    `<div class="answer_box" id="false_box_${question_id + 1}">` +
    '<p class="false_text">不正解！</p>' +
    `<p class="false_sentence">正解は${question_list[question_id][answer_number-1]}です！<p>` +
    `</div>`
   

}

function result(question_id,pushed_id,answer_number){

    if(pushed_id===answer_number){

        document.getElementById("select_" + question_id + "_" + pushed_id).classList.add('true_choice');
        document.getElementById("true_box_" + question_id).style.display = "block ";
    }
    else{
    document.getElementById("select_" + question_id + "_" + pushed_id).classList.add('false_choice');
    document.getElementById("select_" + question_id + "_" + answer_number).classList.add('true_choice');
    document.getElementById("false_box_" + question_id).style.display = "block ";
}

    document.getElementById("select_" + question_id + "_1").classList.add('cant_click');
    document.getElementById("select_" + question_id + "_2").classList.add('cant_click');
    document.getElementById("select_" + question_id + "_3").classList.add('cant_click');

}


document.getElementById('main').insertAdjacentHTML('beforeend', contents);