// let num = prompt('Enter a number to calculate Factorial');

// let fact = 1;
// for(let i = 1; i<=num ;i++){
//     fact = fact*i; 
// }
// alert(`Factorial is ${fact}`);


// Using reduce

// let arr = [];
// for(let i = 1; i<=num ;i++){
//     arr.push(i);
// }

// const red = (a,b) =>{
//     return a*b;
// }

// console.log(arr.reduce(red));


// using reduce another way
let num = parseInt(prompt('Enter a number to calculate Factorial'));

// let num = 8;

function factorial(number){
    alert(number);
    let arr = Array.from(Array(number).keys());
    console.log(arr);
}
alert(num);
factorial(num);