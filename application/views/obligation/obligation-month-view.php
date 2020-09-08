<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class='successmsg'>
        <?php if($this->session->flashdata('successmsg')): ?> 
            <p><?php echo $this->session->flashdata('successmsg'); ?></p>
        <?php endif; ?>
    </div>
    <div>
        <a class="btn btn-info create-btn" href="<?php echo base_url()."obligation"; ?>">Back</a>
    </div>
    <?php foreach($allotments as $allotment){
        $region = $allotment['all_region'];
        $year = $allotment['all_year'];
        $category = $allotment['all_category'];
        $type = $allotment['all_type'];
        $funding = $allotment['all_funding'];
            if($funding == 'or' || $funding == 'sa'){
                $all_saa_no = $allotment['all_saa_no'];
                $all_saa_desc = $allotment['all_saa_desc'];
            }
        $class = $allotment['all_class'];

    }
    ?>
    <div class="form-group-create">
        <p><b><?php echo 'Region '.$region ?></b></p>    
        <p><?php echo 'For year '.$year ?></p>
        <?php
            if($category == 'cu'){
                echo"<p style='color:blue;'><i>Current</i></p>";
            }else if($category == 'ca'){
                echo"<p style='color:blue;'><i>Continuing Appropriation</i></p>";
            }else if($category == 'aa'){
                echo"<p style='color:blue;'><i>Automatic Appropriation</i></p>";
            }
        ?>

        <class class="row">
            <div class="col-sm-2">
                Type:
            </div>
            <div class="col-sm-5">
                <?php
                    if($type == 'sb'){
                        echo"Specific Budget";
                    }else if($type == 'sp'){
                        echo"Special Purpose Fund";
                    }else if($type == 'rlip'){
                        echo"RLIP";
                    }
                ?>
            </div>
            <div class="col-sm-5"></div>

            <div class="col-sm-2">
                Funding: 
            </div>
            <div class="col-sm-5">
                <?php
                   if($funding == 'as'){
                    echo"Agency Specific";
                    }else if($funding == 'or'){
                        echo"Other Releases";
                        echo"<br/>No: $all_saa_no";
                        echo"<br/>Description: $all_saa_desc";
                    }else if($funding == 'sa'){
                        echo"SAA";
                        echo"<br/>No: $all_saa_no";
                        echo"<br/>Description: $all_saa_desc";
                    }
                ?>
            </div>
            <div class="col-sm-5"></div>
           
        
            <div class="col-sm-2">
                Allotment Class:
            </div>
            <div class="col-sm-5">
                <?php echo strtoupper($class); ?>
            </div>
            <div class="col-sm-5"></div>

            <div class="col-sm-2">
                Month:
            </div>
            <div class="col-sm-5">
            <select name="month" id="month" size='1'>
            <option value=''>SELECT</option>
                <?php
                for ($i = 0; $i < 12; $i++) {
                    $time = strtotime(sprintf('%d months', $i));   
                    $label = date('F', $time);   
                    $value = date('n', $time);
                    if ($value >= $i){
                        echo "<option value='$value'>$label</option>";
                    }
                    
                }
                ?>
            </select>
            </div>
            <div class="col-sm-5"></div>
            
        </class> 

    </div>


    <?php 
    foreach($main_pap as $mp){
        $mp_id = $mp['mp_id'];
        $mp_code = $mp['mp_code'];
        $mp_name = $mp['mp_name'];

        echo"
        <div class='col-sm-12'>
            <h5 style='margin-top: 20px;'>$mp_code - $mp_name</h5>
        </div>


        <table border=1>
        ";

        
        foreach($allotment_amount as $am){
            $sp_name = $am['sp_name'];
            $amt_id = $am['amt_id'];
            $sp_mp_id = $am['sp_mp_id'];
            
            $jan = str_replace(',','', $am['amt_jan']);
            $feb = str_replace(',','', $am['amt_feb']);
            $mar = str_replace(',','', $am['amt_mar']);
            $apr = str_replace(',','', $am['amt_apr']);
            $may = str_replace(',','', $am['amt_may']);
            $jun = str_replace(',','', $am['amt_jun']);
            $jul = str_replace(',','', $am['amt_jul']);
            $aug = str_replace(',','', $am['amt_aug']);
            $sep = str_replace(',','', $am['amt_sep']);
            $oct = str_replace(',','', $am['amt_oct']);
            $nov = str_replace(',','', $am['amt_nov']);
            $dec = str_replace(',','', $am['amt_dec']);
            $total_all = (float)$jan + (float)$feb + (float)$mar +
                        (float)$apr + (float)$may + (float)$jun +
                        (float)$jul + (float)$aug + (float)$sep +
                        (float)$oct + (float)$nov + (float)$dec;

            $total_all = number_format($total_all,2);

            if( $mp_id == $sp_mp_id){
            
                echo"
                <tr>
                    <td colspan=5><b>$sp_name</b></td>
                </tr>
                <tr>
                    <td align=center>Allotment</td>
                    <td align=center>Obligation as of the<br/>Previous Month</td>
                    <td align=center>Obligation for<br/>This Month</td>
                </tr>
                <tr>
                    <td align=center><input placeholder='0000' name='allotment-$amt_id' id='allotment-$amt_id' value='$total_all' readonly></td>
                    <td align=center><input placeholder='0000' name='oblPre-$amt_id' id='oblPre-$amt_id' readonly></td>
                    <td align=center><input type='number' placeholder='0000' name='obligation-amount-$amt_id' id='obligation-amount-$amt_id'></td>
                </tr>
                ";

            }

        };

        echo "</table>";

    };
    ?>
   
    </div>
<!-- /.content-wrapper -->
