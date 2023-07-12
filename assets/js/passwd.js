const inputIcon3 = document.querySelector('.input_icon3')
const inputPasswd3 = document.querySelector('.pass3')


inputIcon3.addEventListener('click', () => {
    inputIcon3.classList.toggle('ri-eye-off-line')
    inputIcon3.classList.toggle('ri-eye-line')
    inputPasswd3.type =
        inputPasswd3.type === 'password' ? 'text' : 'password'
})