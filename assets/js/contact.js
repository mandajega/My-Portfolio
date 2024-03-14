const contactForm = document.getElementById('contact-form'),
      contactMessage = document.getElementById('contact-message')


const sendEmail = (e) => {
    e.preventDefault()

    emailjs.sendForm('service_vk4tg95','template_4tdix0j','#contact-form','Wn7o5GUACqnnzyky5')
    .then(() => {
        contactMessage.textContent = 'Message sent succesfully ✅'

        setTimeout(() => {
            contactMessage.textContent = ''

        }, 5000)
        contactForm.reset()

    }, () => {

        contactMessage.textContent = 'Message not sent (service error) ❌'

    })
}

contactForm.addEventListener('submit', sendEmail)