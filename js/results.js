let id = 'login';
let urlPattern = './../api/read.php';
let logCont = document.getElementById('login-container');
const form = document.getElementById(id);
let resTable = document.getElementById('resultsTable');
let result = document.querySelector('tbody');
let foot = document.querySelector('tfoot td');

const app = (input) => {
    
    let {message} = input;
    //Write your code based on responses here
    if(message === "Login failed!"){
        form.reset();
        alert(message);
        form.reset();
    } else if (message === "No posts found!") {
        logCont.classList.toggle('d-none');
        resTable.classList.toggle('d-none');
        result.innerHTML = '<h2>No submissions yet.</h2>';
    } else if(input['data'].length > 0) {
        result.innerHTML = input['data'].map((row) =>{
            return `<tr>
                        <td>${row.phone}</td>
                        <td>${row.full_name}</td>
                    </tr>`;
        }).join('\n');
        console.table(input['data']);
        foot.innerHTML = "Total Responses: " + input['data'].length;
        logCont.classList.toggle('d-none');
        resTable.classList.toggle('d-none');
        form.reset();
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
    




