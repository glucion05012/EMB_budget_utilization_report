<!-- DataTable -->
<script>
     
     $(document).ready(function() {
         // Setup - add a text input to each footer cell
         $('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
         $('#myTable thead tr:eq(1) th').each( function (i) {
             var title = $(this).text();
             $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
     
             $( 'input', this ).on( 'keyup change', function () {
                 if ( table.column(i).search() !== this.value ) {
                     table
                         .column(i)
                         .search( this.value )
                         .draw();
                 }
             } );
         } );
     
         var table = $('#myTable').DataTable( {
             orderCellsTop: true,
             fixedHeader: true
         } );
     } );
</script>

<!-- month change -->
<script>
     $("#month").change(function(){
         $(this).find("option:selected").each(function(){
            var monthVal = $(this).attr("value");

            <?php foreach($allotment_amount as $am) : ?>
                $('#oblPre-<?php echo $am['amt_id']; ?>').val(monthVal);
            <?php endforeach; ?>
            
         });
     });
</script>

<!-- obligation for this month change -->
<script>
    <?php foreach($allotment_amount as $am) : ?>
    $("#obligation-amount-<?php echo $am['amt_id']; ?>").keyup(function(){
       
        var all =  $('#allotment-<?php echo $am['amt_id']; ?>').val().replace(/,/g, '');
        var oblPre =  $('#oblPre-<?php echo $am['amt_id']; ?>').val().replace(/,/g, '');

        var total = Number(all) + Number(oblPre);
        alert(total);

    });
    <?php endforeach; ?>
</script>