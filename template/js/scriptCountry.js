$(document).ready(function () {

    function handleSorting(columnName, order) {

        var num = document.getElementsByName('pageNumber')[0].value;
        $.ajax({
            url:'template/ajax/getCountries.php',
            method:"POST",
            data:{num:num , columnName:columnName, order:order},
            success:function(data) {
                $('#table').html(data);
                $('#' + columnName).data('order', order);
            }
        });
    }

    $(document).on('click', '.columnSort', function(){
        var columnName = $(this).attr("id");
        var order = $(this).data("order");

        var newOrder = (order == 'desc') ? 'asc' : 'desc';

        handleSorting(columnName, newOrder);
    });
    var defaultColumnName = 'name';
    var defaultOrder = 'desc';
    handleSorting(defaultColumnName, defaultOrder);
});
    function checkAll(source) {
                var checkboxes = document.getElementsByClassName("checkBox");
                Array.from(checkboxes).forEach(function(checkbox) {
                    checkbox.checked = source.checked;
                });
            }
            function confirmDelete(){
                if(!confirm("Are you sure u want to delete this/these user(s)?")){
                    preventDefault();
                }
            }