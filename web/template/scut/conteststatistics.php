<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv='refresh' content='60'>
	<title><?php echo $view_title?></title>
	<link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
  <script type="text/javascript" src="include/jquery-latest.js"></script> 
  <script type="text/javascript" src="include/jquery.tablesorter.js"></script> 
  <script type="text/javascript">
  $(document).ready(function() 
      { 
          $("#cs").tablesorter(); 
      } 
  ); 
  </script>

  <script language="javascript" type="text/javascript" src="include/jquery-latest.js"></script>
      <script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
      <script type="text/javascript">
  $(function () {
      var d1 = [];
      var d2 = [];
      <?php
         foreach($chart_data_all as $k=>$d){
      ?>
          d1.push([<?php echo $k?>, <?php echo $d?>]);
          <?php }?>
      <?php
         foreach($chart_data_ac as $k=>$d){
      ?>
          d2.push([<?php echo $k?>, <?php echo $d?>]);
          <?php }?>
      var d3 = [[0, 12], [7, 12], null, [7, 2.5], [12, 2.5]];
     
    $.plot($("#submission"), [
      {label:"<?php echo $MSG_SUBMIT?>",data:d1,lines: { show: true }},
      {label:"<?php echo $MSG_AC?>",data:d2,bars:{show:true}} ],{
              xaxis: {
                mode: "time"
              },
          grid: {
              backgroundColor: { colors: ["#fff", "#333"] }
          }
          });
  });
  </script>
</head>

<body>
  <?php require_once("contest-header.php");?>

  <h3 class="common-header container">Contest Statistics</h3>

<div class="container-fluid buttomspace">
  <div class="row-fluid">
<table id="cs" class="table darkshadow">
  <thead>
    <tr align="center" class="toprow">
        <th>No</th>
        <th>AC</th>
        <th>PE</th>
        <th>WA</th>
        <th>TLE</th>
        <th>MLE</th>
        <th>OLE</th>
        <th>RE</th>
        <th>CE</th>
        <th>Total</th>
        <th></th>
        <th>C</th>
        <th>C++</th>
        <th>Pascal</th>
        <th>Java</th>
        <th>Ruby</th>
        <th>Bash</th>
        <th>Python</th>
        <th>PHP</th>
        <th>Perl</th>
        <th>C#</th>
        <th>Obj-c</th>
        <th>FreeBasic</th>
    </tr>
  </thead>
  <tbody>
    <?php
    for ($i=0;$i<$pid_cnt;$i++){
      if(!isset($PID[$i])) $PID[$i]="";
      
      if ($i&1) 
        echo "<tr align='center' class='oddrow'><td>";
      else 
        echo "<tr align='center' class='evenrow'><td>";
      echo "<a href='problem.php?cid=$cid&pid=$i'>$PID[$i]</a>";
      for ($j=0;$j<22;$j++) {
        if(!isset($R[$i][$j])) $R[$i][$j]="";
        echo "<td>".$R[$i][$j];
      }
      echo "</tr>";
    }
    
    echo "<tr align='center' class='evenrow'><td>Total</td>";  
    for ($j=0;$j<22;$j++) {
      if(!isset($R[$i][$j])) $R[$i][$j]="";
      echo "<td>".$R[$i][$j]."</td>";
    }
    echo "</tr>";
    ?>
  </tbody>
</table>

<div id="submission" style="width:600px;height:300px" ></div>

</div>
</div>

  <div id="foot">
     <?php require_once("oj-footer.php");?>
  </div>
</body>
</html>
