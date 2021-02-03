function editar(element){   

row =element.parentNode.parentNode.rowIndex;

table = document.getElementById("clientes");

document.getElementById("idEdit").value = table.rows[row].cells[0].innerHTML;
document.getElementById("nomEdit").value = table.rows[row].cells[1].innerHTML;
document.getElementById("dniEdit").value = table.rows[row].cells[2].innerHTML;
}
function sortTable(n,t) {
var table,rows,cambiando,i,x,y,cambiar,dir,contador = 0;
if (t=='L'){
    table = document.getElementById("localidades");
}
else{
    table = document.getElementById("clientes");
}
    


    cambiando = true;
    dir = "asc";
while (cambiando) {
    cambiando = false;
    rows = table.getElementsByTagName("tr");
    for (i = 1; i < rows.length - 1; i++) {

    cambiar = false;
    x = rows[i].getElementsByTagName("td")[n];
    y = rows[i + 1].getElementsByTagName("td")[n];

    if (dir == "asc") {
        if (n == 0 || n==2){
            if (parseInt(x.innerHTML.toLowerCase(),10) > parseInt(y.innerHTML.toLowerCase(),10)) {
                cambiar = true;
                break;
            }
        }
        else{
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                cambiar = true;
                break;
            }
        }

    } else if (dir == "desc") {
        if (n == 0  || n==2){
            if (parseInt(x.innerHTML.toLowerCase(),10) < parseInt(y.innerHTML.toLowerCase(),10)) {
                cambiar = true;
                break;
            }
        }
        else{
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            cambiar = true;
            break;
        }
        }

    }
    }
    if (cambiar) {
    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
    cambiando = true;
    contador++;
    } else {
    if (contador == 0 && dir == "asc") {
        dir = "desc";
        cambiando = true;
    }
    }
}
}
function reload(){
window.location.reload();
}
function allowNumbersOnly(e) {
var code = (e.which) ? e.which : e.keyCode;
if (code > 31 && (code < 48 || code > 57)) {
    e.preventDefault();
}
}
function buscarDni() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("buscarDni");
filter = input.value.toUpperCase();
table = document.getElementById("clientes");
tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}
function buscarNom() {
// Declare variables
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("buscarNom");
filter = input.value.toUpperCase();
table = document.getElementById("clientes");
tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}
function openTab(evt, tab) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
}

tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
}

document.getElementById(tab).style.display = "block";
evt.currentTarget.className += " active";
}        