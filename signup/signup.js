let btn = document.getElementById("btn");
let form = document.getElementById("form");



const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}



form.addEventListener("submit",(e)=>{
    e.preventDefault();

    let name = document.getElementById("name"); 
    let email = document.getElementById("email"); 
    let password = document.getElementById("password"); 
    let confirmPassword = document.getElementById("confirmPassword"); 
    
    if(email.value == null || email.value == ""){
        appendAlert("Email field is required", 'danger');
        return;
    }

    if(name.value == null || name.value == ""){
        appendAlert("Name field is required", 'danger');
        return;
    }

    if(password.value.length < 6){
        appendAlert("Password too short", 'danger');
        return;
    } 

    if(password.value != confirmPassword.value){
        appendAlert("Password doesn't match!", 'danger')
        return;
    }

    let formData = new FormData(form);

    let url = "./signupBack.php";

    let xhr = new XMLHttpRequest();

    xhr.open("POST",url,true)

    xhr.onload = ()=>{
        let data = xhr.responseText;
        // console.log(data);
        if(data=="success"){
            appendAlert("Success", 'success');
            window.location.href = "../login/login.php";
        }else{
            appendAlert(data, 'danger');
            return;
        }
        
    }

    xhr.send(formData);
})