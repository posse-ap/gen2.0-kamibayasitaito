const falseChoice1 =document.getElementById('false-choice1');
const falseChoice2 =document.getElementById('false-choice2');
const trueChoice =document.getElementById('true-choice');


const trueText =document.getElementById('true-text')
const falseText=document.getElementById('false-text')



trueText.style.display="none"
falseText.style.display="none"


falseChoice1.addEventListener('click',() =>　{
   falseText.style.display="block"
   trueText.style.display="none"
falseChoice1.classList.add('box-after-click')
falseChoice2.classList.remove('box-after-click')
trueChoice.classList.remove('box-after-click')
}
);

falseChoice2.addEventListener('click', () => {
  falseText.style.display="block"
  trueText.style.display="none"
  falseChoice1.classList.remove('box-after-click')
  falseChoice2.classList.add('box-after-click')
  trueChoice.classList.remove('box-after-click')
}
);

trueChoice.addEventListener('click' , ()=>{
trueText.style.display="block"
falseText.style.display="none"
falseChoice1.classList.remove('box-after-click')
falseChoice2.classList.remove('box-after-click')
trueChoice.classList.add('box-after-click')

});



