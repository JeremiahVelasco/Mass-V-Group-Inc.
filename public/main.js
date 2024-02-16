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
const select_vehicle=document.querySelector('#manufacturer');
const model_field=document.querySelector('#model');
const year_field=document.querySelector('#year');
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
        const s_index=Math.floor(Math.random()*data.body.length)+0;
        displaySuggestedBattery(data.body[s_index],data.mvgi,data.jis);
    })
    .catch(error=>{
        console.log('Error',error);
    });
}

function submitForm(){
    let formData= new FormData();
    formData.append('manufacturer',select_vehicle.value);
    formData.append('model',model_field.field);
    formData.append('year',year_field.value);
    handleForm(formData);
}

function displaySuggestedBattery(body,mvgi,jis) {
    const battery = document.getElementById('battery');
    const form = document.getElementById('battery-form');
    const battery_header=document.getElementById('battery-header');
    const battery_image=document.getElementById('battery-img');
    const battery_mvgi=document.getElementById('battery-mvgi');
    const battery_jis=document.getElementById('battery-jis');
    const battery_warranty=document.getElementById('battery-warranty');
    if (battery) {
        battery.classList.add('animate');
        form.classList.add('animate');
        battery_header.textContent=body.name;
        battery_image.src=body.asset;
        battery_mvgi.innerHTML='<strong>MVGI Battery:</strong>'+mvgi;
        battery_jis.innerHTML='<strong>JIS Code:</strong>'+jis;
        battery_warranty.innerHTML='<strong> Warranty:</strong>'+body.warranty;
    }
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