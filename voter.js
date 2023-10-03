var table = document.getElementById('tb-user'), rIndex;

for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
        rIndex = this.rowIndex;
        document.getElementById("id-1").value = this.cells[0].innerHTML;
        document.getElementById("nic").value = this.cells[1].innerHTML;
        document.getElementById("name").value = this.cells[2].innerHTML;
        document.getElementById("gender").value = this.cells[3].innerHTML;
        document.getElementById("district").value = this.cells[4].innerHTML;
        document.getElementById("division").value = this.cells[5].innerHTML;
        document.getElementById("gn_division").value = this.cells[6].innerHTML;
    };
}
