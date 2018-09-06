//test to see if the file is linked
console.log("yes");

//sort function will treat numbers like alpha
var numArray = [140000, 104, 99];
numArray = numArray.sort()
console.log(numArray);

//sort numbers function
function sortNumber(a,b) {
  return a - b;
} //end function

//option 1 uses SortNumber function to return numbers
var numArray = [140000, 104, 99];
numArray.sort(sortNumber);
console.log(numArray.join(","));

//option 2 uses arrow functions
console.log("Ascending Order: " + numArray.sort((a, b) => a - b)); // For ascending sort
console.log("Decending Order: " + numArray.sort((a, b) => b - a)); // For descending sort

//bubble sort method:
var a = [34, 203, 3, 746, 200, 984, 198, 764, 9];
 
function bubbleSort(a)
{
    var swapped;
    do {
        swapped = false;
        for (var i=0; i < a.length-1; i++) {
            if (a[i] > a[i+1]) {
                var temp = a[i];
                a[i] = a[i+1];
                a[i+1] = temp;
                swapped = true;
            }
        }
    } while (swapped);
}
 
bubbleSort(a);
console.log("Bubble Sort: " + a);



//return the minimum and maximum value in an array
console.log(Math.max(1, 3, 2));
// expected output: 3

console.log(Math.max(-1, -3, -2));
// expected output: -1

var array1 = [34, 203, 3, 746, 200, 984, 198, 764, 9];

console.log(Math.max(...array1));
// expected output: 984

console.log(Math.min(...array1));
// expected output: 3
