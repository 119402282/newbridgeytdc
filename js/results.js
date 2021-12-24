let id = 'login';
let urlPattern = 'api/read.php';
let logCont = document.getElementById('login-container');
const form = document.getElementById(id);
let resTable = document.getElementById('resultsTable');
let result = document.querySelector('tbody');

const app = (input) => {
    
    
    let {message} = input;
    console.log("0" + message);
    console.log("1" + input);
    console.log("2" + {input});

    //Write your code based on responses here
    if(input['data'].length > 0) {
        result.innerHTML = input['data'].map((row) =>{
            return '<tr><td>'+row.phone+'</td><td>'+full_name+'</td></tr>';
        });
        logCont.classList.toggle('d-none');
        resTable.classList.toggle('d-none');
        console.table({input});
    } else if(message === "Login failed!"){
        alert(message);
        form.reset();
    } else if (message === "No posts found!") {
        logCont.classList.toggle('d-none');
        resTable.classList.toggle('d-none');
        result.innerHTML = '<h2>No submissions yet.</h2>';
    }





















}

const encodeURI = (content) => new URLSearchParams(content).toString();

const postHTTP = async (content, urlPattern) => {
    const response = await fetch(`./${urlPattern}`, {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: encodeURI(content)
        });
    const message = await response.json();
    return message;
};

form.onreset = (event) => {
    event.preventDefault();
};


form.onsubmit = (event) => {
    event.preventDefault();
    let data = new FormData(form);
    postHTTP(data, urlPattern).then( message => {
        app(message);
    });
};
    




