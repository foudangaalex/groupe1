import './bootstrap';


$('.delete_demande').on('click',function(e){
    e.preventDefault();
    console.log($(this).attr('demandeid'));
   // $('.form-control').prop('disabled',false);
    $('#demandeid').val($(this).attr('demandeid'));


});
