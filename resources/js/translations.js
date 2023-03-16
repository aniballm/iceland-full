function clickOnKey() {
    document.querySelectorAll('.full-key').forEach((e) => {
        e.addEventListener('click', () => {
            let key = e.getAttribute('data-key')

            fetch( baseUrl + '/ajax/translation?fullKey=' + key.toString() )
                .then(res => res.text())
                .then(html => {
                    document.querySelector('.modal-content').innerHTML = html
                    modal.show()
                })
        })
    })
}

clickOnKey()

const searchInput = document.querySelector('#search')

searchInput.addEventListener('input', (e) => {
    let val = e.target.value

    let ft = (val != '' ) ? val : null
    let gr = (group != '') ? group : null

    let excel = document.querySelector('.btn-excel');
    excel.href = exportUrl

    let params = ''

    if (ft) {
        params += '?findText=' + ft
        excel.href = exportUrl + '?findText=' + ft
    }

    if (gr) {
        params += ( '' == params ) ? '?group=' + gr : '&group=' + gr
    }

    fetch( baseUrl + '/ajax/search' + params )
        .then(res => res.text())
        .then(html => {
            document.querySelector('#table-content').innerHTML = html
            clickOnKey()
        })
})
