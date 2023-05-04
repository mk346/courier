const openModalButtons = document.querySelectorAll("[data-modal-target]")
const closeModalButtons = document.querySelector("[data-close-button]")
const overlay = document.getElementById("modal-overlay")

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

overlay.addEventListener('click', () => { 
    const modals = document.querySelectorAll('.modal-overlay')
    modals.forEach(modal => {
        closeModal(modal)
    })
})

// closeModalButtons.addEventListener('click', () => { 
//     button.addEventListener('click', () => { 
//         const modal = button.closest('.modal')
//         closeModal(modal)
//     })
// })


function openModal(modal) { 
    if (modal === null) return
    modal.classList.add("active")
    overlay.classList.add("active")
}

// function closeModal(modal) {
//     if (modal === null) return
//     modal.classList.remove("active")
//     overlay.classList.remove("active")
// }