// function find_max(nums) {
//     let max_num = Number.NEGATIVE_INFINITY; // smaller than all other numbers
//     for (let num of nums) {
//         if (num > max_num) {

//             // max_num=num;
//             max_num+=1
//             // max_num+=num;
//             // num=max_num;

//             // (Fill in the missing line here)
//         }
//     }
//     return max_num;
//     // console.log(max_num);
// }

// find_max(29, 2, 4);
// var y

function add_numbers(x,y){
    console.log(x+y);

    return x*y;
}

add_numbers(7,7)

let name="Amos",age=4, time=40;

console.log(name,', ',age,',',time);

let person={  //Javascript objects
    name:"elvis",
    age:30

}
console.log(person.age,person.name)

// Javascript arrays

let myColors=['red','green','purple'];

console.log(myColors);

myColors[1]="orange"
 console.log(myColors)

//  Functions

function myGreetings(name,age)
{
    console.log('Hi '+name+' ' +age)

}
myGreetings("Moragu",20);
// myGreetings(20);

function square(number){

    return number*number;

}



console.log(square(90));