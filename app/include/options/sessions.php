<?php 
    $years = range(strftime("%Y", time()), 2000); 
    foreach($years as $year) : 
    $year_ahead = $year++;
?>
    <option value="<?php echo $year_ahead.'/'.$year; ?>"><?php echo $year_ahead.'/'.$year; ?></option>
<?php endforeach; ?>