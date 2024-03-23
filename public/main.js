const csrfBody=document.querySelector("meta[name='csrf-token']");
let model_list=[];
let year="";

/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId)
    toggle.addEventListener('click', () =>{
        // Add show-menu class to nav menu
        nav.classList.toggle('show-menu')
        // Add show-icon to show and hide the menu icon
        toggle.classList.toggle('show-icon')
    })
}
showMenu('nav-toggle','nav-menu')


/*============= toggle suggestion car===================*/
let select_vehicle=document.getElementById('manufacturer');
let model_field=document.getElementById('model');
let year_field=document.getElementById('year');
function handleForm(formData){
    fetch('/suggest-battery',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrfBody.content
        },
        body:JSON.stringify({
            manufacturer:formData.get('manufacturer'),
            model:formData.get('model'),
            year:formData.get('year')
        })
    })
    .then(response=>response.json())
    .then(data=>{
        let formBattery= document.getElementById('battery-form');
        if(data.result === true){
            const dataBody=data.body;
            displaySuccess(dataBody,data.mvgi,data.jis);
            formBattery.reset();
        }
        else if (data.result === false)
        {   
            displayFail();
            formBattery.reset();
        }
    })
    .catch(error=>{
        console.log('Error',error);
    });
}

function displaySuccess(body,mvgi,jis){
    const battery = document.getElementById('battery');
    const form = document.getElementById('battery-form');
    battery.innerHTML='';
    battery.innerHTML=`
        <img src="${body.asset}" alt="battery" id="battery-img">
        <div class="battery-details">
            <h2 style="color:white" id="battery-header">${body.name}</h2>
            <ul>
                <li style="color:white" id="battery-mvgi"><strong>MVGI Battery:</strong>${mvgi}</li>
                <li style="color:white"id="battery-jis"><strong>JIS Code:</strong>${jis}</li>
                <li style="color:white" id="battery-warranty"><strong>Warranty:</strong>${body.warranty}</li>
            </ul>
        </div>
        <br>
    `;
    battery.classList.add('animate');
    form.classList.add('animate');
}

function displayFail(){
    const battery= document.getElementById('battery');
    const form = document.getElementById('battery-form');
    battery.innerHTML='';
    battery.innerHTML=`
        <div class="battery-details">
            <br><br>
            <h2 style="color:white" id="battery-header">Battery Not Found</h2>
            <button type="button" style="align-self:center;width:50%" onclick="window.location.href='/contact'">Send us a message</button>
        </div>
        <br>
    `;
    battery.classList.add('animate');
    form.classList.add('animate');
}

function submitForm(){
    let formData= new FormData();
    formData.append('manufacturer',select_vehicle.value);
    formData.append('model',model_field.value);
    formData.append('year',year_field.value);
    handleForm(formData);
}

// If nadetect na false yung result na response
// mauupdate yung SUBMIT button to Send us a message button
function changeSubmitButton() {
    const submitButton = document.getElementById('submit-btn');
    const newButton= document.getElementById('message-btn');
    submitButton.style.position="absolute";
    newButton.style.position="relative";
    submitButton.style.visibility="hidden";
    newButton.style.visibility="visible";
}


function displayModels(){
    model_list.forEach(list=>{
        const option=document.createElement('option');
        option.value=list;
        option.textContent=list;
        model_field.appendChild(option);
    })
}

function displayYear(){
    const option=document.createElement('option');
    option.value=year;
    option.textContent=year;
    year_field.appendChild(option);
}

function projectModels(car){
    fetch('/show-models',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrfBody.content
        },
        body:JSON.stringify({manufacturer:car})
    })
    .then(response=>response.json())
    .then(data=>{
        const model_data=data.message;
        const option_instance=model_field.querySelectorAll('option');
        //populate model first
        model_data.forEach(list=>{
            model_list.push(list.model);
        })
        displayModels();
    })
    .catch(error=>{
        console.log('Error',error);
    })
}

function refreshModelOptions(){
    model_list.forEach(list=>{
        const selector=`option[value="${list}"]`;
        const options_deletion=model_field.querySelector(selector);
        model_field.removeChild(options_deletion);
    })
    model_list=[];
}

function refreshYearOptions(){
    const selector=`option[value="${year}"]`;
    const options_deletion=year_field.querySelector(selector);
    year_field.removeChild(options_deletion);
    year=""
}

function projectYear(model,car){
    fetch('/show-year',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrfBody.content
        },
        body:JSON.stringify({model:model,car:car})
    })
    .then(response=>response.json())
    .then(data=>{
        const year_data=data.message;
        year=year_data[0].year;
        displayYear()
    })
    .catch(error=>{
        console.log('Error',error);
    })
}

select_vehicle.addEventListener('change',()=>{
    const car_value=select_vehicle.value;
    if(car_value === "MANUFACTURER"){
        refreshModelOptions();
        refreshYearOptions();
        return;
    }
    if(model_list.length>0){
        refreshModelOptions();
    }
    projectModels(car_value);
})
model_field.addEventListener('change',()=>{
    const model_value=model_field.value;
    const car_value=select_vehicle.value;
    console.log(model_value);
    if(year.length>0){
        refreshYearOptions();
    }
    projectYear(model_value,car_value);
})

/***************Message code*****************/
function sendEmail(event){
    event.preventDefault();
    const email=document.getElementById('email').value;
    const subject=document.getElementById('subject').value;
    const message=document.getElementById('message-content').value;
    fetch('/send-message',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token':csrfBody.content
        },
        body:JSON.stringify({
            'email':email,
            'subject':subject,
            'message':message,
        })
    })
    .then(response=>response.json())
    .then(data=>{
        if(data.success){
            alert('You message has been sent');
        }
        else{
            console.log(data.error);
        }
    })
}