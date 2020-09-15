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

<!-- thousand separator -->
<script>

$(document).on( "keyup", "input.number", function(){
    if (event.which >= 37 && event.which <= 40) return;
    $(this).val(function(index, value) {
        return value
        // Keep only digits and decimal points:
        .replace(/[^\d.]/g, "")
        // Remove duplicated decimal point, if one exists:
        .replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3')
        // Keep only two digits past the decimal point:
        .replace(/\.(\d{2})\d+/, '.$1')
        // Add thousands separators:
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    });
});
</script>

<!-- month change -->
<script>
     $("#month").change(function(){
         $(this).find("option:selected").each(function(){
            var monthVal = $(this).attr("value");
            var oblPre = 0;

            <?php foreach($allotment_amount as $am) : ?>
                // total obligation of of this month
                for ($i = 1; $i <= monthVal; $i++) {
                    <?php foreach($obligations as $obligation) : ?>
                        if(<?php echo $am['amt_id']; ?> == <?php echo $obligation['ob_amt_id']; ?>){
                            if(<?php echo $obligation['ob_month']; ?> == $i){
                                var ob_amt =  <?php echo str_replace(',','',$obligation['ob_amount']); ?>;
                                oblPre = oblPre + ob_amt;
                            }
                        }
                    <?php endforeach; ?>

                }

                oblPre = oblPre.toFixed(2)
                                 .replace(/[^\d.]/g, "")
                                 .replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3')
                                 .replace(/\.(\d{2})\d+/, '.$1')
                                 .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                $('#obligation-this-<?php echo $am['amt_id']; ?>').val(oblPre);
                oblPre = 0;

            <?php endforeach; ?>

            
            // total disbursements previous month
            // var disPre = 0;
            // <?php foreach($obligations as $obl) : ?>
            //     for ($i = 1; $i < monthVal; $i++) {
            //         <?php foreach($disbursements as $dis) : ?>
            //             if(<?php echo $obl['ob_id']; ?> == <?php echo $dis['dis_ob_id']; ?>){
            //                 if(<?php echo $dis['dis_month']; ?> == $i){
            //                     var dis_amt =  <?php echo str_replace(',','',$dis['ob_amount']); ?>;
            //                     disPre = disPre + dis_amt;
            //                 }
            //             }
            //         <?php endforeach; ?>

            //     }
            // <?php endforeach; ?>

            // disPre = disPre.toFixed(2)
            //                     .replace(/[^\d.]/g, "")
            //                     .replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3')
            //                     .replace(/\.(\d{2})\d+/, '.$1')
            //                     .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            // $('#disPre-<?php echo $am['amt_id']; ?>').val(disPre);
            // disPre = 0;

            
            
         });
     });
</script>