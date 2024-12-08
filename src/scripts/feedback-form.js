export function applyFeedbackForm(form) {
  const submit = form.querySelector('[type="submit"]')
  const messages = form.querySelector('[data-feedack-form-messages]')

  form.addEventListener('submit', (e) => {
    e.preventDefault()

    messages.innerHTML = ''
    form.setAttribute('data-feedack-form-status', 'loading')
    submit.setAttribute('disabled', '')

    const formData = new FormData(e.target)
    formData.append('action', 'feedback_action')

    fetch(e.target.action, {
      method: 'post',
      body: formData
    })
      .then((response) => response.json())
      .then((result) => {
        if (!result.success) {
          messages.innerHTML = Object.values(result.data).join('<br>')
          form.setAttribute('data-feedack-form-status', 'failure')
        } else {
          form.setAttribute('data-feedack-form-status', 'success')
          form.reset()
          messages.innerHTML = result.data

          setTimeout(() => {
            form.removeAttribute('data-feedack-form-status')
            messages.innerHTML = ''
          }, 4000)
        }

        submit.removeAttribute('disabled', '')
      })
      .catch((error) => console.error(error))
  })
}

export function initFeedbackForm() {
  const items = document.querySelectorAll('[data-feedack-form]') || []

  Array.from(items).forEach(applyFeedbackForm)
}
