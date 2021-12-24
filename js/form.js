let id = 'survey';
let urlPattern = 'api/create.php'
let toast = document.getElementById('toast');
let survey = document.getElementById('survey-container');

const app = (input) => {
    
    
    let {message} = input;
    alert(message);

    //Write your code based on responses here
    survey.classList.toggle('d-none');
    





















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

const form = document.getElementById(id);

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
    




