export function applyFeedbackForm(form) {
  form.addEventListener('submit', (e) => {
e.preventDefault()
console.log(new FormData(form))
  })
}

export function initFeedbackForm() {
  const items = document.querySelectorAll('[data-feedack-form]') || []

  Array.from(items).forEach(applyFeedbackForm)
}
