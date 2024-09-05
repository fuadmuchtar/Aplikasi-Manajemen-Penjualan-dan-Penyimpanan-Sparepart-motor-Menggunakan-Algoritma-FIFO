var keyword = document.getElementById("barang_search");
var container = document.getElementById("containerTransaksi");

keyword.addEventListener("keyup", function () {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status === 200) {
        container.innerHTML = xhr.responseText;
    }
  }

  xhr.open('GET', 'ajax/coba.txt', true);
  xhr.send();
});
