let boxes = document.getElementsByClassName('box');
// console.log(boxes);

function getRandomBackground(){
    let val1 = Math.ceil(150+Math.random()*(255-150));
    let val2 = Math.ceil(150+Math.random()*(255-150)) ;
    let val3 = Math.ceil(150+Math.random()*(255-150));
    return `rgb(${val1},${val2},${val3})`; 
}
function getRandomColor(){
    let val1 = Math.ceil(0+Math.random()*250);
    let val2 = Math.ceil(0+Math.random()*250) ;
    let val3 = Math.ceil(0+Math.random()*250);
    return `rgb(${val1},${val2},${val3})`; 
}

Array.from(boxes).forEach(e=>{
    e.style.backgroundColor = getRandomBackground();
    e.style.color = getRandomColor();
});