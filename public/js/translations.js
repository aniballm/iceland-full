/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/translations.js ***!
  \**************************************/
function clickOnKey() {
  document.querySelectorAll('.full-key').forEach(function (e) {
    e.addEventListener('click', function () {
      var key = e.getAttribute('data-key');
      fetch(baseUrl + '/ajax/translation?fullKey=' + key.toString()).then(function (res) {
        return res.text();
      }).then(function (html) {
        document.querySelector('.modal-content').innerHTML = html;
        modal.show();
      });
    });
  });
}
clickOnKey();
var searchInput = document.querySelector('#search');
searchInput.addEventListener('input', function (e) {
  var val = e.target.value;
  var ft = val != '' ? val : null;
  var gr = group != '' ? group : null;
  var excel = document.querySelector('.btn-excel');
  excel.href = exportUrl;
  if (ft && gr) {
    params = {
      group: gr,
      findText: ft
    };
    excel.href = exportUrl + '?findText=' + ft;
  } else if (gr) {
    params = {
      group: gr
    };
  } else if (ft) {
    params = {
      findText: ft
    };
    excel.href = exportUrl + '?findText=' + ft;
  } else {
    params = {};
  }
  $.ajax({
    url: baseUrl + '/ajax/search',
    method: 'GET',
    data: params,
    success: function success(data) {
      var html = '';
      if (data.length > 0) {
        var i = 1;
        data.forEach(function (e) {
          var par = i % 2 != 0 ? 'impar' : 'par';
          html += '<tr class="' + par + '">';
          html += '<td class="full-key" data-key="' + e['full_key'] + '">' + e['full_key'].toString().replace(ft, '<span class="highlight">' + ft + '</span>') + '</td>';
          html += '<td>' + e['en'].toString().replace(ft, '<span class="highlight">' + ft + '</span>') + '</td>';
          html += '<td>' + e['es'].toString().replace(ft, '<span class="highlight">' + ft + '</span>') + '</td>';
          html += '<td>' + e['de'].toString().replace(ft, '<span class="highlight">' + ft + '</span>') + '</td>';
          html += '<td>' + e['fr'].toString().replace(ft, '<span class="highlight">' + ft + '</span>') + '</td>';
          html += '<td>' + e['it'].toString().replace(ft, '<span class="highlight">' + ft + '</span>') + '</td>';
          html += '<td>' + e['da'].toString().replace(ft, '<span class="highlight">' + ft + '</span>') + '</td>';
          html += '<tr>';
          i++;
        });
      } else {
        html += '<tr><td colspan="7" class="text-center">No existen traducciones que coincidan con la búsqueda</td></tr>';
      }
      $('#table-content').html(html);
      clickOnKey();
    }
  });
});
/******/ })()
;