function getDataForm(event){
    event.preventDefault();
    const form = event.currentTarget;
    const btnCloseConfirm = document.getElementById("btnCloseConfirm");
    const formData = new FormData(form);
    const method = form.getAttribute("method") || "POST";
    const action = form.getAttribute("action");
    const config = {
        method: method,
        mode: 'cors',
        cache: 'no-cache',
        body: formData
    };

    fetch(action,config)
    .then(res => res.json())
    .then(res => {
        if (btnCloseConfirm){
            openConfirmationModal(res.response,res.boolean)
            btnCloseConfirm.addEventListener("click", () => closeConfirmationModal(res.boolean));
        }
    })
    .catch(err => {
        console.error("Error: " + err.message);
    });
}

function openConfirmationModal(message,boolean){
    const modal = document.getElementById("confirmationModal").classList;
    if(modal){
        modal.remove("hidden");
        modal.add("flex");
        const messageContainer = document.getElementById("confirmationMessage");
        messageContainer.textContent = message;
    }
}

function closeConfirmationModal(boolean){
    const modal = document.getElementById("confirmationModal").classList;
    if(modal){
        if(boolean){
            location.reload();
        }else{
            modal.remove("flex");
            modal.add("hidden");
        }
    }
}

const formAdd = document.getElementById("modalForm");
if (formAdd){
    formAdd.addEventListener("submit", getDataForm);
}