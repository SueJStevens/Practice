//test to see if the file is linked
console.log("yes");

//string split
var str = 'The quick brown fox jumped over the lazy dog.';

var words = str.split(' ');
console.log(words[3]);
// expected output: "fox"

var chars = str.split('');
console.log(chars[8]);
// expected output: "k"

var strCopy = str.split();
console.log(strCopy);
// expected output: Array ["The quick brown fox jumped over the lazy dog."]

//spliting with RegExp 
var myString = 'Hello 1 word. Sentence number 2.';
var splits = myString.split(/(\d)/);

console.log(splits);

//spliting with array asseparator
var myString = 'this|is|a|Test';
var splits = myString.split(['|']);

console.log(splits); //["this", "is", "a", "Test"]

var myString = 'ca,bc,a,bca,bca,bc';

var splits = myString.split(['a','b']); 
// myString.split(['a','b']) is same as myString.split(String(['a','b'])) 

console.log(splits);  //["c", "c,", "c", "c", "c"]

//Reversing a string using split
var str = 'asdfghjkl';
var strReverse = str.split('').reverse().join(''); // 'lkjhgfdsa'
// split() returns an array on which reverse() and join() can be applied
console.log(strReverse);

var str = 'résumé';
var strReverse = str.split(/(?:)/u).reverse().join('');
// => "́emuśer"
console.log(strReverse);


//https://github.com/mathiasbynens/esrever

