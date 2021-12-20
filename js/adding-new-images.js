
 
let path = (word) => `images\\gallery\\harris-visit\\${word}.jpg`

const numbers = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];
const letters = ['A', 'B', 'C', 'D'];

let result = '';
for (let i = 0; i < numbers.length; i++){
    let blocks = [];
    for (let j = 0; j < letters.length; j++){
        blocks[j] = `<div class="card d-inline-block" style="width: 100%;"><a href="${path(numbers[i]+letters[j])}" data-gallery="example-gallery" data-toggle="lightbox"><img src="${path(numbers[i]+letters[j])}" class="card-img-top" width="100%"></a></div>`;
    }
    let row = `<div class="row justify-content-center"><div class="card-columns inline-block">${blocks.join('')}</div></div>`;
    result += row;
}


console.log(result);

