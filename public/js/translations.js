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
  var params = '';
  if (ft) {
    params += '?findText=' + ft;
    excel.href = exportUrl + '?findText=' + ft;
  }
  if (gr) {
    params += '' == params ? '?group=' + gr : '&group=' + gr;
  }
  fetch(baseUrl + '/ajax/search' + params).then(function (res) {
    return res.text();
  }).then(function (html) {
    document.querySelector('#table-content').innerHTML = html;
    clickOnKey();
  });
});
/******/ })()
;