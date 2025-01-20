let cari = document.getElementById('cari');
let list_buku = document.getElementById('listbuku');
cari.addEventListener('keyup', function() {
    // cari buku show hide element
    let filter = cari.value.toUpperCase();
    let buku = list_buku.getElementsByTagName('div');
    for (let i = 0; i < buku.length; i++) {
        let a = buku[i].getElementsByTagName('h2')[0];
        let txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            buku[i].style.display = "";
        } else {
            buku[i].style.display = "none";
        }
    }

});