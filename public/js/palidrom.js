function upper(num) {
    let num2 = num;
    let arr1 = [];
    const length = String(num).length;
    for (let i = 0; i < length; i++) {
        let result1 = num % 10;
        arr1.push(result1);
        num = (num - result1) / 10;
    }

   if(arr1.join('') ===  num2.toString()){
       return true;
       }
       else{
              return false;
       }
}

console.log(upper(121));
