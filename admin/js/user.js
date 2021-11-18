$(document).ready(function (){
    $('#data_guru').DataTable();

    $('#btnTambahData').on('click',function (){
        $('#tambahData').modal('show');
    });
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
})

