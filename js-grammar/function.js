let myBirthTime = new Date(2001, 10, 12, 18, 30);
function updateParagraph() {
  let now = new Date();
  let seconds = (now.getTime() - myBirthTime.getTime()) / 1000;
  document.getElementById('birth-time').innerText 
  ='生まれてから' + seconds + '秒経過。';
}
setInterval(updateParagraph, 50);