const openModalButtons = document.querySelectorAll("[data-modal-target]")
const closeModalButtons = document.querySelectorAll("[data-close-button]")
const overlay = document.getElementById("modal-overlay")
var topbar = document.getElementById("top-bar")
var container = document.getElementById("container")
var subwrapper = document.getElementById("sub-wrapper")
var modal2 = document.getElementById("modal-status")
var update = document.getElementById("update-status")
var modal1 = document.getElementById("modal-parcel")
var closemodal = document.getElementById("close-modal2")

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

//close the modal upon clicking outside of the modal
overlay.addEventListener('click', () => { 
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
        closeModal(modal)
    })
})


closeModalButtons.forEach(button => { 
    button.addEventListener('click', () => { 
        const modal = button.closest('.modal')
        closeModal(modal)
    })
})

//function to open modal
function openModal(modal) { 
    if (modal === null) return
    modal1.classList.add("active")
    overlay.classList.add("active")
    topbar.classList.add("active")
    container.classList.add("active")
    subwrapper.classList.add("active")
    modal1.style.display = 'block';
}

//function closeModal(modal) 
function closeModal(modal) {
    if (modal === null) return
    modal1.classList.remove("active")
    overlay.classList.remove("active")
    topbar.classList.remove("active")
    container.classList.remove("active")
    subwrapper.classList.remove("active")
    modal2.style.display = 'none';
}


closemodal.addEventListener('click', () => { 
    modal2.style.display = 'none';
    overlay.classList.remove("active")
    topbar.classList.remove("active")
    container.classList.remove("active")
    subwrapper.classList.remove("active")
})


update.addEventListener('click', () => { 
    modal1.style.display = 'none';
    modal2.style.display = 'block';
    modal1.classList.remove('active');
    overlay.classList.add("active")
    topbar.classList.add("active")
    container.classList.add("active")
    subwrapper.classList.add("active")

})