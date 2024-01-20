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
function displayModels(){
    model_list.forEach(list=>{
        const option=document.createElement('option');
        option.value=list;
        option.textContent=list;
        model_field.appendChild(option);
    })
}
function displayYear(){
    console.log(year);
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