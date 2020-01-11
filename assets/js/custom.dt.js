$(function(){

    $('.datatable_shift').DataTable({
        "pageLength":10,
        "searching" : false,
        "lengthChange": false
    });

  
    table = $('.datatable_shift').DataTable();
    $('.datatable_shift tbody').on('click', 'tr',function(){
        if($(this).hasClass('selected')){
            $(this).removeClass('selected');
        }else{
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });   
})
