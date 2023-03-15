function clickOnKey() {
    document.querySelectorAll('.full-key').forEach((e) => {
        e.addEventListener('click', () => {
            let key = e.getAttribute('data-key')

            $.ajax({
                url: baseUrl + '/ajax/translation',
                method: 'GET',
                data: {
                    fullKey: key.toString(),
                },
                success: function (data) {
                    $('#modal-key').text(data['full_key'])
                    $('#modal-en').html(data['en'])
                    $('#modal-es').html(data['es'])
                    $('#modal-de').html(data['de'])
                    $('#modal-fr').html(data['fr'])
                    $('#modal-it').html(data['it'])
                    $('#modal-da').html(data['da'])

                    modal.show()
                }
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

    if (ft && gr) {
        params = {
            group: gr,
            findText: ft
        }

        excel.href = exportUrl + '?findText=' + ft
    } else if (gr) {
        params = {
            group: gr
        }
    } else if (ft) {
        params = {
            findText: ft
        }

        excel.href = exportUrl + '?findText=' + ft
    } else {
        params = {}
    }

    $.ajax({
        url: baseUrl + '/ajax/search',
        method: 'GET',
        data: params,
        success: function ( data ) {
            let html = '';

            if (data.length > 0) {
                let i = 1

                data.forEach(e => {
                    let par = ( i % 2 != 0 ) ? 'impar' : 'par'

                    html += '<tr class="' + par + '">';
                    html += '<td class="full-key" data-key="' + e['full_key'] + '">' + e['full_key'].toString().replace(ft,'<span class="highlight">' + ft + '</span>') + '</td>'
                    html += '<td>' + e['en'].toString().replace(ft,'<span class="highlight">' + ft + '</span>') + '</td>'
                    html += '<td>' + e['es'].toString().replace(ft,'<span class="highlight">' + ft + '</span>') + '</td>'
                    html += '<td>' + e['de'].toString().replace(ft,'<span class="highlight">' + ft + '</span>') + '</td>'
                    html += '<td>' + e['fr'].toString().replace(ft,'<span class="highlight">' + ft + '</span>') + '</td>'
                    html += '<td>' + e['it'].toString().replace(ft,'<span class="highlight">' + ft + '</span>') + '</td>'
                    html += '<td>' + e['da'].toString().replace(ft,'<span class="highlight">' + ft + '</span>') + '</td>'
                    html += '<tr>';

                    i++
                })
            } else {
                html += '<tr><td colspan="7" class="text-center">No existen traducciones que coincidan con la búsqueda</td></tr>'
            }

            $('#table-content').html(html)

            clickOnKey()
        }
    })
})
