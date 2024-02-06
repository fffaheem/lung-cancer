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

    let email = document.getElementById("email"); 
    let password = document.getElementById("password"); 
    
    if(email.value == null || email.value == ""){
        appendAlert("Email field is required", 'danger');
        return;
    }



    if(password.value == null || password.value == ""){
        appendAlert("Password too short", 'danger');
        return;
    } 



    let formData = new FormData(form);

    let url = "./loginBack.php";

    let xhr = new XMLHttpRequest();

    xhr.open("POST",url,true)

    xhr.onload = ()=>{
        let data = xhr.responseText;
        // console.log(data);
        if(data=="success"){
            appendAlert("Success", 'success');
            window.location.reload();
        }else{
            appendAlert(data, 'danger');
            return;
        }
        
    }

    xhr.send(formData);
})