/* Create a business name generator by combining list of adjectives and shop name and another word

Adjectives:
Crazy 
Amazing
Fire 

Shop Name:
Engine
Foods
Garments

Another Word:
Bros
Limited
Hub

*/
const obj1={
    1:'Carzy',
    2:'Amazing',
    3:'Fire'
}
const obj2={
    1:'Engine',
    2:'Foods',
    3:'Garments'
}
const obj3={
    1:'Bros',
    2:'Limited',
    3:'Hub'
}

const rand1 = Math.floor(Math.random()*3)+1;
const rand2= Math.floor(Math.random()*3)+1;
const rand3 = Math.floor(Math.random()*3)+1;
console.log(`${obj1[rand1]} ${obj2[rand2]} ${obj3[rand3]}`);