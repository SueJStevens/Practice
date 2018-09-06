//test to see if the file is linked
console.log("yes");

//fizzBuzz function
var fizzBuzz = function(){
  for (var i = 1; i<=100; i++) {
    //check for divisible evenly by 3 and 5
    if (i%3 === 0 && i%5 === 0) {
      console.log('FizzBuzz: '+i)
    } else if (i%3 === 0) {
      console.log('Fizz: '+i)
    } else if (i%5 === 0) {
      console.log('Buzz: '+i)
    } else {
      console.log('Number: '+i)
    }
  } //end loop
} //end function