var choices = new Array

choices.push(['たかなわ', 'たかわ', 'こうわ']);
choices.push(['かめいど', 'かめど', 'かめと']);
choices.push(['こうじまち', 'かゆまち', 'おかとまち']);
choices.push(['おなりもん', 'ごせいもん', 'おかどもん']);
choices.push(['とどろき', 'たたら', 'たたりき']);
choices.push(['しゃくじい', 'いじい', 'せきこうい']);
choices.push(['ぞうしき', 'ざっしょく', 'ざっしき']);
choices.push(['おかちまち', 'ごしろちょう', 'みとちょう']);
choices.push(['ししぼね', 'ろっこつ', 'しこね']);
choices.push(['こぐれ', 'こばく', 'こしゃく']);
choices.push(['くにもとたいき', 'くにもとたいき', 'くにもとたいき']);

var title = '<p class="quiz_title">ガチで東京の人しか解けない！ #東京の難読地名クイズ</p>'

function arrayShuffle(array,question_number) {
    let answer_index =array[0]
    for (var k = (array.length - 1); 0 < k; k--) {

        // 0〜(i+1)の範囲で値を取得
        var r = Math.floor(Math.random() * (k + 1));

        // 要素の並び替えを実行
        var tmp = array[k];
        array[k] = array[r];
        array[r] = tmp;

        
    }
    makingquestion(question_number,array.indexOf(answer_index)+1);

    return array;
}

for (var i= 0; i < choices.length; i++) {
    arrayShuffle(choices[i],i);
}





function makingquestion(question_number,answer_number){
    title += `<div class="quiz_box">`+
    '<h1 class="quiz">' + (question_number + 1) + '.この地名は</h1>'+'<h1 class="quiz2">なんて読むでしょう</h1>' +
    `</div>` +

    '<img class="image_size" src=./img/'+(question_number+1)+'.png>'+
    '<ul>' +
    `<li class="box-before-click" id="choices_${question_number + 1}_1" onclick="show_result(${question_number+ 1},1,${answer_number})">` + choices[question_number][0] + `</li>` +
    `<li class="box-before-click" id="choices_${question_number + 1}_2" onclick="show_result(${question_number+ 1},2,${answer_number})">` + choices[question_number][1] + `</li>` +
    `<li class="box-before-click" id="choices_${question_number+ 1}_3" onclick="show_result(${question_number + 1},3,${answer_number})">` + choices[question_number][2] + `</li>` +

    '</ul>' +
    `<div class="answer_box" id="true_box_${question_number+ 1}">` +
    '<p class="true_text">正解！</p>' +
    `<p>正解は${choices[question_number][answer_number-1]}です！</p>` +
    `</div>` +
    `<div class="answer_box" id="false_box_${question_number + 1}">` +
    '<p class="false_text">不正解！</p>' +
    `<p>正解は${choices[question_number][answer_number-1]}です！<p>` +
    `</div>`
   

}

//選択肢押したときの処理
function show_result(question_number, pushed_number, answer_number) {



    if (pushed_number == answer_number) {
        // document.getElementById("answer-title-"+question_number).innerHTML="正解！"
        document.getElementById("choices_" + question_number + "_" + pushed_number).classList.add('true_choice');
        document.getElementById("true_box_" + question_number).style.display = "block ";

    } else {
        // document.getElementById("answer-title-"+question_number).innerHTML="不正解！"
        document.getElementById("choices_" + question_number + "_" + pushed_number).classList.add('false_choice');
        document.getElementById("choices_" + question_number + "_" + answer_number).classList.add('true_choice');
        document.getElementById("false_box_" + question_number).style.display = "block ";
    }


    document.getElementById("choices_" + question_number + "_1").classList.add('cant_click');
    document.getElementById("choices_" + question_number + "_2").classList.add('cant_click');
    document.getElementById("choices_" + question_number + "_3").classList.add('cant_click');



}

document.getElementById('main').insertAdjacentHTML('beforeend', title);