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

    let formData = new FormData(form);

    let url = "./indexBack.php";

    let xhr = new XMLHttpRequest();

    xhr.open("POST",url,true)

    xhr.onload = ()=>{
        let data = xhr.responseText;
        // console.log(data)
        data = JSON.parse(data);

        if(data[0]=="success"){
            appendAlert("Success", 'success');
            let image = document.getElementById("image");
            image.value = '';
            window.location.href = `./reportCard.php?id=${data[1]}&email=${data[2]}`;
        }else{
            appendAlert(data[1], 'danger');
            image.value = '';
            return;
        }
        
    }

    xhr.send(formData);
})