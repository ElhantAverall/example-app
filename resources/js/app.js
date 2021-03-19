const selected = document.querySelector('#add-select')
const price = document.querySelector('.price')

selected.addEventListener('change', () => {

    price.value = selected.options[selected.selectedIndex].text
})
