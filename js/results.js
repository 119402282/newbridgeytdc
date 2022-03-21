let id = 'login';
let urlPattern = './../api/read.php';
let logCont = document.getElementById('login-container');
const form = document.getElementById(id);
let resTable = document.getElementById('resultsTable');
let result = document.querySelector('tbody');
let foot = document.querySelector('tfoot td');
let btnControls = document.getElementById('btnControls');
let allForms;
const app = (input) => {
    
    let {message, data} = input;
    
    //Write your code based on responses here
    if(message){
        if(message !== "No posts found!") {
            form.reset();
            alert(message);
            form.reset();
        } else if (message === "No posts found!") {
            logCont.classList.toggle('d-none');
            resTable.classList.toggle('d-none');
            result.innerHTML = '<h2>No submissions yet.</h2>';
        }
    }
    if(data){
        if(data.length > 0) {
            result.innerHTML = input['data'].map((row, index) =>{
                return `<tr>
                            <form id="frm${index}" class="clearOne" method="post" action="./../api/delete.php?${encodeURI({ 
                                action: 'one',
                                phone: row.phone,
                                name: row.full_name 
                            })}" >${
                                `<td>${row.phone}</td>`+
                                `<td>${row.full_name}</td>`+
                                `<td><button type="submit" value="Submit" form="frm${index}" >Delete entry</button></td>`
                            }
                            </form>
                        </tr>`;
            }).join('\n');
            foot.innerHTML = "Total Responses: " + input['data'].length;

            if(btnControls.childNodes.length <2){
                const deleteAll = document.createElement('button');
                deleteAll.setAttribute("id", "deleteAll");
                deleteAll.innerText = "Clear All Entries";
                deleteAll.onclick = () => {
                    deleteAllData();
                };
                
                const excel = document.createElement('button');
                excel.innerText = "Export to Excel";
                excel.onclick = () => {
                    $("#resultsTable").table2excel({
                        name: "survey",
                        exclude_inputs: true,
                        filename: "Results.xls", // do include extension
                        preserveColors: false 
                    });
                }
                btnControls.appendChild(deleteAll);
                btnControls.appendChild(excel);
            }
            
            allForms = document.querySelectorAll('form.clearOne');
            for (let i = 0; i < allForms.length; i++){
                allForms[i].onsubmit = async (event) => {
                    event.preventDefault();
                    let datafiedURL =allForms[i].getAttribute('action');

                    const response = await fetch(datafiedURL);
                    const message = await response.json();
                    console.log(await message);
                    //relTable();
                    
                }
            }
            logCont.classList.toggle('d-none');
            resTable.classList.toggle('d-none');
            form.reset();
            
        }
    }
}

const deleteAllData = async () => {
    const response = await fetch('./../api/delete.php?action=all');
    const message = await response.json();
    console.log(await message);
    relTbl();
}

const relTable = () => {
    setTimeout(reloadTbl, 100);
}
function reloadTbl() {
    postHTTP( undefined, urlPattern).then( message => {
        app(message);
    });
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
    




