const inputIcon1 = document.querySelector('.input_icon1')
const inputPasswd1 = document.querySelector('.pass1')
const inputIcon2 = document.querySelector('.input_icon2')
const inputPasswd2 = document.querySelector('.pass2')
const inputIcon3 = document.querySelector('.input_icon3')
const inputPasswd3 = document.querySelector('.pass3')


inputIcon1.addEventListener('click', () => {
    inputIcon1.classList.toggle('ri-eye-off-line')
    inputIcon1.classList.toggle('ri-eye-line')
    inputPasswd1.type =
        inputPasswd1.type === 'password' ? 'text' : 'password'
})
inputIcon2.addEventListener('click', () => {
    inputIcon2.classList.toggle('ri-eye-off-line')
    inputIcon2.classList.toggle('ri-eye-line')
    inputPasswd2.type =
        inputPasswd2.type === 'password' ? 'text' : 'password'
})
inputIcon3.addEventListener('click', () => {
    inputIcon3.classList.toggle('ri-eye-off-line')
    inputIcon3.classList.toggle('ri-eye-line')
    inputPasswd3.type =
        inputPasswd3.type === 'password' ? 'text' : 'password'
})