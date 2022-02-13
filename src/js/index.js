



let checkButton = document.getElementById('checkButton');
checkButton.addEventListener('click', butotnClick);

let scoreArray = [];



function butotnClick() {
   
    for (var i = 1; i < 6; i++) {
        eval("var score" + i + "=" +"document.getElementById('score"+i+"\')"  + ";");
        eval("score"+i+".classList.add('trans-score"+i+"\')" + ";")
        }
        
    let total= document.getElementById('total');
 
    total.classList.add('trans-total-score');
    

}



  

