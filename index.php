
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//RU">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="author" content="denis.kudriakov@gmail.com">
  <style>
   select { width: 200px;}      
    .zzpoint {position: fixed ; left: 12px; top: 12px; z-index: 1;}
    .hid {position: fixed; left: 0px; top: -73px; width: 100%; height: 80px; 
    background: #777777; color: #111111; margin-top: 5px; 
    transition: top .2s linear; z-index: 10;font-family:arial;}
    .hid:hover {top: 0px; z-index: 8;}
    .zzpoint2 {position: fixed ; left: 12px; top: 312px; z-index: 3;}
    .lhid {position: fixed; left: -350px; top: 8px; width: 360px; height: 298px; 
    background: #777777; color: #111111; margin-top: 5px; 
    transition: left .2s linear; z-index: 10;font-family:monospace;}
    .lhid:hover {left: 0px; z-index: 2;}
    .l2hid {position: fixed; left: -350px; top: 308px; width: 360px; height: 298px; 
    background: #777777; color: #111111; margin-top: 5px; 
    transition: left .2s linear; z-index: 10;font-family:monospace;}
    .l2hid:hover {left: 0px; z-index: 10;}
  </style>
  <script>
  ////////////////// PHP
<?php
/*
if (!$zoomtype) $zoomtype=0;
if (!$type) $type='nbr';
*/

$filename1=@$_GET['filename1'];
$filename2=@$_GET['filename2'];
$bitrate1=@$_GET['bitrate1'];
$bitrate2=@$_GET['bitrate2'];
$startframe1=@$_GET['startframe1'];
$startframe2=@$_GET['startframe2'];
$zoom1=@$_GET['zoom1'];
$zoom2=@$_GET['zoom2'];
$byteorder1=@$_GET['bl1'];
$byteorder2=@$_GET['bl2'];

if (!$filename1) $filename1='demosinus'; //default file 2 out
if (!$filename2) $filename2='demosinus'; //
if (!$bitrate1) $bitrate1=16;
if (!$bitrate2) $bitrate2=16;
if (!$startframe1) $startframe1=0;
if (!$startframe2) $startframe2=0;
if (!$zoom1) $zoom1=1;
if (!$zoom2) $zoom2=1;
if (!$byteorder1) $byteorder1='off';
if (!$byteorder2) $byteorder2='off';

$itmp=0;
$qtmp=0;
$etmp=0;

//variables 2 JS
echo "
    var filename1='$filename1';
    var filename2='$filename2';
    var bit1=$bitrate1;
    var bit2=$bitrate2;
    var be1='$byteorder1';
    var be2='$byteorder2';
    var startframe1=$startframe1;
    var startframe2=$startframe2;
    var zooma=$zoom1;
    var zoomb=$zoom2;
    var i1=new Array(1000);
    var i2=new Array(1000);
    var q1=new Array(1000);
    var q2=new Array(1000);
    var e1=new Array(1000);
    var e2=new Array(1000);
";

// read file 1
$f = fopen("iq/".$filename1, "r");
// shift @startframe
while ($startframe1-- >0){
  $tmp=fgetc($f);
  $tmp=fgetc($f);
  if ($bitrate1==12) $tmp=fgetc($f);
  if ($bitrate1==16) {
    $tmp=fgetc($f);
    $tmp=fgetc($f);
  }
}
$i=0;
while (($i++ < 1000 ) AND !feof($f)){ //read 1000 frames file A
  $y=ord(fgetc($f)); // I
  if ($byteorder1=='off') $y=$y + 256 * ord(fgetc($f));
  else $y * 256 + ord(fgetc($f));
  if ($y>32767) $y=$y-65536; // 2unsigned    
  echo "i1[$i]=".$y.";"; 
  $y=ord(fgetc($f)); // Q
  if ($byteorder1=='off') $y=$y + 256 * ord(fgetc($f));
  else $y * 256 + ord(fgetc($f));
  if ($y>32767) $y=$y-65536; // 2unsigned    
  echo "q1[$i]=".$y.";"; 
}
fclose($f);
$f2 = fopen("iq/".$filename2, "r");
while ($startframe2-- >0){ //farmes i+q
  $tmp=fgetc($f2);
  $tmp=fgetc($f2);
  if ($bitrate2==12) $tmp=fgetc($f2);
  if ($bitrate2==16) {
    $tmp=fgetc($f2);
    $tmp=fgetc($f2);
  }
}
$i=0;
echo "\n";
while (($i++ < 1000 ) AND !feof($f2)){ //read 1000 frames file B
  $y=ord(fgetc($f2)); // I
  if ($byteorder2=='off') $y=$y + 256 * ord(fgetc($f2));
  else $y * 256 + ord(fgetc($f2));
  if ($y>32767) $y=$y-65536; // 2unsigned    
  echo "i2[$i]=".$y.";"; 
  $y=ord(fgetc($f2)); // Q
  if ($byteorder2=='off') $y=$y + 256 * ord(fgetc($f2));
  else $y * 256 + ord(fgetc($f2));
  if ($y>32767) $y=$y-65536; // 2unsigned    
  echo "q2[$i]=".$y.";"; 
}
fclose($f2);

?>   
     ///////// sinus TMP //////////  
    if (filename1=='demosinus' && filename2=='demosinus') {
      for (var x=0; x<1000; x++){
        i1[x]=127*Math.sin(Math.PI*x/90);
        q1[x]=27*Math.sin(Math.PI*x/90-Math.PI/8);
        i2[x]=1000*Math.sin(Math.PI*x/90-Math.PI/16);
        q2[x]=0*Math.cos(Math.PI*x/90-Math.PI/16);      
        e1[x]=Math.sqrt(i1[x]*i1[x]+q1[x]*q1[x]);
        e2[x]=Math.sqrt(i2[x]*i2[x]+q2[x]*q2[x]);
      }
    }
    ///////////////////                 
    function clsscale(canid){ //cls convas
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      context.setTransform(1, 0, 0, 1, 0, 0);
      context.clearRect(0, 0, canvas.width, canvas.height);
    }
    function paintscale(canid,color){ //cls convas
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      var i=0;
      context.beginPath();    
      while (i++ < canvas.width){
        context.moveTo(i, canvas.height); 
        context.lineTo(i, 1);   
        context.moveTo(i+.5, canvas.height); 
        context.lineTo(i+.5, 1);   
      }
      context.strokeStyle = color;
      context.stroke();
    }
    
    function outgrid(canv){
      var canvas = document.getElementById(canv);
      var context = canvas.getContext("2d");
      //zeroline
      var zoomz = document.getElementById("zerolevel1");
      var zoomy = document.getElementById("zoomybox1");
      var zoomyauto = document.getElementById("autoy1");
      var zoomxp = document.getElementById("zoomxbox1");
      var zoomys = document.getElementById("zoomyslider1");

      var chi1 = document.getElementById("chi1");// I @A checkbox
      var chq1 = document.getElementById("chq1");// Q @A checkbox
      var chi2 = document.getElementById("chi2");// I @B checkbox
      var chq2 = document.getElementById("chq2");// Q @B checkbox

      var sr = document.getElementById("sr1"); //samplerate

      var tgs11 = document.getElementById("tgs11"); //time checkbox
      var tgs21 = document.getElementById("tgs21"); //time checkbox
      var tgs31 = document.getElementById("tgs31"); //time checkbox
      var tgs41 = document.getElementById("tgs41"); //time checkbox
      var tgs51 = document.getElementById("tgs51"); //time checkbox
      var tgs61 = document.getElementById("tgs61"); //time checkbox
      var tgs71 = document.getElementById("tgs71"); //time checkbox

      var tgs12 = document.getElementById("tgs12"); //time checkbox
      var tgs22 = document.getElementById("tgs22"); //time checkbox
      var tgs32 = document.getElementById("tgs32"); //time checkbox
      var tgs42 = document.getElementById("tgs42"); //time checkbox
      var tgs52 = document.getElementById("tgs52"); //time checkbox
      var tgs62 = document.getElementById("tgs62"); //time checkbox
      var tgs72 = document.getElementById("tgs72"); //time checkbox

      var scalems1 = tgs11;
      var scalems2 = tgs21;
      var scalems3 = tgs31;
      var scalems4 = tgs41;
      var scalems5 = tgs51;
      var scalems6 = tgs61;
      var scalems7 = tgs71;         
      
      if (canv=="cano2") {
        zoomz = document.getElementById("zerolevel2");
        zoomy = document.getElementById("zoomybox2");
        zoomys = document.getElementById("zoomyslider2");
        zoomxp = document.getElementById("zoomxbox2");
        zoomyauto = document.getElementById("autoy2");
        chi1 = document.getElementById("chi1b");
        chq1 = document.getElementById("chq1b");
        chi2 = document.getElementById("chi2b");
        chq2 = document.getElementById("chq2b");
        sr = document.getElementById("sr2");
        scalems1 = tgs12;
        scalems2 = tgs22;
        scalems3 = tgs32;
        scalems4 = tgs42;
        scalems5 = tgs52;
        scalems6 = tgs62;
        scalems7 = tgs72;         
      }      
      var y0=zoomz.value;
      var zoomvalue=zoomy.value;
      var maxiq=0;
      var minscale=canvas.width-y0;
      if (minscale > y0) minscale = y0;
      if (zoomyauto.checked){ //find max in file A
        if (chi1.checked) for (var i=0;i<1000;i++) {if (maxiq<i1[i]) maxiq=i1[i]}; 
        if (chi2.checked) for (var i=0;i<1000;i++) if (maxiq<i2[i]) maxiq=i2[i]; 
        if (chq1.checked) for (var i=0;i<1000;i++) if (maxiq<q1[i]) maxiq=q1[i]; 
        if (chq2.checked) for (var i=0;i<1000;i++) if (maxiq<q2[i]) maxiq=q2[i]; 

        if (minscale < maxiq) zoomvalue=minscale/maxiq;////////////////////////////////
        
      }
console.log ("zval="+zoomvalue+" maxiq="+maxiq);
      zoomy.value=zoomvalue;
      zoomys.value=zoomvalue;
      
      var zoomx=zoomxp.value;
      zoomx=1/zoomx;
///////////////////////////////   X-grad   
      if (scalems7.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value/1000)){
//          context.moveTo(x, canvas.height - y0-5);
//          context.lineTo(x, canvas.height - y0+5);
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#111111";
        context.stroke();                
      }
      if (scalems6.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value/100)){
//          context.moveTo(x, canvas.height - y0-7);
//          context.lineTo(x, canvas.height - y0+7);
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#333333";
        context.stroke();                
      }
      if (scalems5.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value/10)){
//          context.moveTo(x, canvas.height - y0-13);
//          context.lineTo(x, canvas.height - y0+13);
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#555555";
        context.stroke();                
      }
      if (scalems4.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value)){
//          context.moveTo(x, canvas.height - y0-20);
//          context.lineTo(x, canvas.height - y0+20);
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#777777";
        context.stroke();                
      }
      if (scalems3.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value*10)){
//          context.moveTo(x, canvas.height - y0-25);
//          context.lineTo(x, canvas.height - y0+25);
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#999999";
        context.stroke();                
      }
      if (scalems2.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value*100)){
//          context.moveTo(x, canvas.height - y0-30);
//          context.lineTo(x, canvas.height - y0+30);
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#bbbbbb";
        context.stroke();                
      }
      if (scalems1.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value*1000)){
//          context.moveTo(x, canvas.height - y0-40);
//          context.lineTo(x, canvas.height - y0+40);
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#ffffff";
        context.stroke();                
      }


      context.beginPath();
        context.moveTo(0, canvas.height - y0);
        context.lineTo(canvas.width, canvas.height - y0);
        context.strokeStyle = "#ffffff";
      context.stroke();
      //  Y-zoom scale line:
      context.beginPath();       
      for (var y=(canvas.height - y0 -10); y>=0; y-=20) {
        context.moveTo(0, y);
        context.lineTo(canvas.width,y);      
      }
      for (var y=(canvas.height - y0 +10); y<canvas.height; y+=20) {
        context.moveTo(0, y);
        context.lineTo(canvas.width,y);
      }
      
      context.strokeStyle = "#555555";
      context.stroke();        
      context.beginPath();      
      context.font = "normal 9px monospacing";
      context.fillStyle = "#ffffff";
      for (var y=(canvas.height - y0 -10); y>=0; y-=20) context.fillText("+"+((canvas.height-y-y0)/zoomvalue).toFixed(2), canvas.width-40, y+4 );
      for (var y=(canvas.height - y0 +10); y<canvas.height; y+=20) context.fillText("-"+((canvas.height-y-y0)/zoomvalue).toFixed(2), canvas.width-40, y+4 );
      context.stroke();        
    }
///////////////// out I ch A
    function outi1(canid){ 
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      if (canid=="cano1") {
        var outokp=document.getElementById("chi1");
        var colorp=document.getElementById("colori1");
        var riskap=document.getElementById("chiris1");
        var  zoomz = document.getElementById("zerolevel1");
        var  zoomy = document.getElementById("zoomybox1");
        var  zoomx = zooma;
      } else if (canid=="cano2"){
        var  zoomx = zoomb;
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chi1b");
        var colorp=document.getElementById("colori1b");
        var riskap=document.getElementById("chiris1b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999;x++) {
        context.moveTo(x, canvas.height-zoomz.value-zoomy.value*i1[x]); 
        context.lineTo(x+1,canvas.height-zoomz.value-zoomy.value*i1[x+1]);
        if (riskap.checked) {
          context.moveTo(x-4, canvas.height-zoomz.value-zoomy.value*i1[x]); 
          context.lineTo(x+4, canvas.height-zoomz.value-zoomy.value*i1[x]); 
        }
      }
      context.stroke();                   
    }
    function outq1(canid){ /// out Q ch A
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      if (canid=="cano1") {
        var outokp=document.getElementById("chq1");
        var colorp=document.getElementById("colorq1");
        var riskap=document.getElementById("chqris1");
        var  zoomz = document.getElementById("zerolevel1");
        var  zoomy = document.getElementById("zoomybox1");
        var  zoomx = zooma;
      } else if (canid=="cano2"){
        var  zoomx = zoomb;
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chq1b");
        var colorp=document.getElementById("colorq1b");
        var riskap=document.getElementById("chqris1b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999;x++) {
        context.moveTo(x, canvas.height-zoomz.value-zoomy.value*q1[x]); 
        context.lineTo(x+1,canvas.height-zoomz.value-zoomy.value*q1[x+1]);
        if (riskap.checked) {
          context.moveTo(x-4, canvas.height-zoomz.value-zoomy.value*q1[x]); 
          context.lineTo(x+4, canvas.height-zoomz.value-zoomy.value*q1[x]); 
        }
      }
      context.stroke();                   
    }
    function outp1(canid){ /// out P ch A
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      if (canid=="cano1") {
        var outokp=document.getElementById("chp1");
        var colorp=document.getElementById("colorp1");
        var riskap=document.getElementById("chpris1");
        var  zoomz = document.getElementById("zerolevel1");
        var  zoomy = document.getElementById("zoomybox1");
        var  zoomx = zooma;
      } else if (canid=="cano2"){
        var  zoomx = zoomb;
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chp1b");
        var colorp=document.getElementById("colorp1b");
        var riskap=document.getElementById("chpris1b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999;x++) {
        context.moveTo(x, canvas.height-zoomz.value-zoomy.value*e1[x]); 
        context.lineTo(x+1,canvas.height-zoomz.value-zoomy.value*e1[x+1]);
        if (riskap.checked) {
          context.moveTo(x-4, canvas.height-zoomz.value-zoomy.value*e1[x]); 
          context.lineTo(x+4, canvas.height-zoomz.value-zoomy.value*e1[x]); 
        }
      }
      context.stroke();                   
    }
/// out I ch B
    function outi2(canid){
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      if (canid=="cano1") {
        var outokp=document.getElementById("chi2");
        var colorp=document.getElementById("colori2");
        var riskap=document.getElementById("chiris2");
        var  zoomz = document.getElementById("zerolevel1");
        var  zoomy = document.getElementById("zoomybox1");
        var  zoomx = zooma;
      } else if (canid=="cano2"){
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chi2b");
        var colorp=document.getElementById("colori2b");
        var riskap=document.getElementById("chiris2b");        
        var  zoomx = zoomb;
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999;x++) {
        context.moveTo(x, canvas.height-zoomz.value-zoomy.value*i2[x]); 
        context.lineTo(x+1,canvas.height-zoomz.value-zoomy.value*i2[x+1]);
        if (riskap.checked) {
          context.moveTo(x-4, canvas.height-zoomz.value-zoomy.value*i2[x]); 
          context.lineTo(x+4, canvas.height-zoomz.value-zoomy.value*i2[x]); 
        }
      }
      context.stroke();                   
    }
    function outq2(canid){ /// out Q ch B
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      if (canid=="cano1") {
        var outokp=document.getElementById("chq2");
        var colorp=document.getElementById("colorq2");
        var riskap=document.getElementById("chqris2");
        var  zoomz = document.getElementById("zerolevel1");
        var  zoomy = document.getElementById("zoomybox1");
        var  zoomx = zooma;
      } else if (canid=="cano2"){
        var  zoomx = zoomb;
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chq2b");
        var colorp=document.getElementById("colorq2b");
        var riskap=document.getElementById("chqris2b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999;x++) {
        context.moveTo(x, canvas.height-zoomz.value-zoomy.value*q2[x]); 
        context.lineTo(x+1,canvas.height-zoomz.value-zoomy.value*q2[x+1]);
        if (riskap.checked) {
          context.moveTo(x-4, canvas.height-zoomz.value-zoomy.value*q2[x]); 
          context.lineTo(x+4, canvas.height-zoomz.value-zoomy.value*q2[x]); 
        }
      }
      context.stroke();                   
    }
    function outp2(canid){ /// out P ch B
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      if (canid=="cano1") {
        var outokp=document.getElementById("chp2");
        var colorp=document.getElementById("colorp2");
        var riskap=document.getElementById("chpris2");
        var  zoomz = document.getElementById("zerolevel1");
        var  zoomy = document.getElementById("zoomybox1");
        var  zoomx = zooma;
      } else if (canid=="cano2"){
        var  zoomx = zoomb;
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chp2b");
        var colorp=document.getElementById("colorp2b");
        var riskap=document.getElementById("chpris2b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999;x++) {
        context.moveTo(x, canvas.height-zoomz.value-zoomy.value*e2[x]); 
        context.lineTo(x+1,canvas.height-zoomz.value-zoomy.value*e2[x+1]);
        if (riskap.checked) {
          context.moveTo(x-4, canvas.height-zoomz.value-zoomy.value*e2[x]); 
          context.lineTo(x+4, canvas.height-zoomz.value-zoomy.value*e2[x]); 
        }
      }
      context.stroke();                   
    }        
    function synhro(inid,outid){
      var x = document.getElementById(inid);
      var y = document.getElementById(outid);
      y.value = x.value;
    }
    function reoutcanvas(canid){
      var canvas = document.getElementById(canid);
      var context = canvas.getContext("2d");
      clsscale(canid);
      paintscale(canid,"#000000"); //killit!
      outgrid(canid);
      outi1(canid);
      outi2(canid);
      outq1(canid);
      outq2(canid);
      outp1(canid);
      outp2(canid);
    }
    window.onload = function() { 
      synhro('zoombox1','zoomslider1');
      synhro('zoombox2','zoomslider2');      
      paintscale("cano1","#000000"); //killit!
      paintscale("cano2","#000000");  // killit!
      reoutcanvas("cano1");
      reoutcanvas("cano2");  
    }
  </script>
 </head>
<body>
<div class="hid"> <!-- TOP panel-->
 <form method="get" action="./index.php" onchange='' id="xform">
 <table border=0 width=100%>
  <tr>
   <td >&nbsp; &nbsp;File A :
 <select name=filename1 >
 <?php 
   $files = scandir("./iq");
   foreach($files as $f) {
     if ($filename1==$f) $chk = " SELECTED"; else $chk="";
     if (strpos($f,".iq") || strpos($f,".bin")) echo "<option id='".$f."' ".$chk.">".$f;
   }
?>
</select>


   </td>
   <td>
    <input type=radio name=bitrate1 value=8>8
    <input type=radio name=bitrate1 value=12>12
    <input type=radio name=bitrate1 value=16 checked>16
   </td>
   <td>Big/Litle<input type=checkbox name=bl1 id='bl1'></td>
   <td>Start frame: <input type=text name=startframe1 size=5 value="0"></td>
   <td>Zoom A
    <input id='zoomslider1' type="range" min="1" max="1000" step="1" value="1" onchange='synhro("zoomslider1","zoombox1");' name="zoomslider1" style='topmargin:15;'>
    <input type=text name=zoom1 id='zoombox1' value="1" style='width:50px;' onchange="synhro('zoombox1','zoomslider1');">  
   </td> 
   <td><input type="submit" value="update"></td> 
  </tr> <!--  second:-->
  <tr>
   <td>&nbsp; &nbsp;File B :
 <select name=filename2 >
 <?php 
   $files = scandir("./iq");
   foreach($files as $f) {
     if ($filename2==$f) $chk = " SELECTED"; else $chk="";
     if (strpos($f,".iq") || strpos($f,".bin")) echo "<option id='".$f."' ".$chk.">".$f;
   }
?>
</select>
   </td>
   <td>
    <input type=radio name=bitrate2 value=8>8
    <input type=radio name=bitrate2 value=12>12
    <input type=radio name=bitrate2 value=16 checked>16
   </td>
   <td>Big/Litle<input type=checkbox name=bl2 id='bl2'></td>
   <td>Start frame: <input type=text name=startframe2 size=5 value="0"></td>
   <td>Zoom B
    <input id='zoomslider2' type="range" min="1" max="1000" step="1" value="1" onchange="synhro('zoomslider2','zoombox2');" name="zoomslider2" style='topmargin:15;'>
    <input type=text name=zoom2 id='zoombox2' value="1" style='width:50px;' onchange="synhro('zoombox2','zoomslider2');">  
   </td> 
   <td><input type="submit" value="update"></td> 
  </tr>
 </table>
 </form>
</div>
<div class="lhid"><!-- Left panel1-->
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chi1"  checked>-I1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano1")' id="chiris1">mark point&nbsp;&nbsp;
 color:<input type=text name=colori1 id='colori1' value="#ff0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chq1"  checked>-Q1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano1")' id="chqris1">mark point&nbsp;&nbsp;
 color:<input type=text name=colorq1 id='colorq1' value="#00ff00" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chp1">-PWR1<input type=checkbox onchange='reoutcanvas("cano1")' id="chpris1">mark point&nbsp;&nbsp;
 color:<input type=text name=colorp1 id='colorp1' value="#0000ff" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'>
 <hr>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chi2">-I2&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano1")' id="chiris2">mark point&nbsp;&nbsp;
 color:<input type=text name=colori2 id='colori2' value="#9f0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chq2">-Q2&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano1")' id="chqris2">mark point&nbsp;&nbsp;
 color:<input type=text name=colorq2 id='colorq2' value="#009f00" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chp2">-PWR2<input type=checkbox onchange='reoutcanvas("cano1")' id="chpris2">mark point&nbsp;&nbsp;
 color:<input type=text name=colorp2 id='colorp2' value="#00009f  " style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'>
 <hr>
 <input type=text name=zoomy1 id='zoomybox1' value="1" style='width:40px;height:10px;' onchange="synhro('zoomybox1','zoomyslider1');reoutcanvas('cano1');">
 <input id='zoomyslider1' type="range" min="0.005" max="20" step="0.005" value="1" onchange="synhro('zoomyslider1','zoomybox1');reoutcanvas('cano1');" name="zoomyslider1" style='topmargin:15;'>
 Zoom Y <input type=checkbox onchange='reoutcanvas("cano2");' id="autoy1" checked><br>

 <input type=text name=zoomx1 id='zoomxbox1' value="1" style='width:40px;height:10px;' onchange="synhro('zoomxbox1','zoomxslider1');reoutcanvas('cano1');">
 <input id='zoomxslider1' type="range" min="0.05" max="20" step="0.05" value="1" onchange="synhro('zoomxslider1','zoomxbox1');reoutcanvas('cano1');" name="zoomxslider1" style='topmargin:15;'>
 Zoom X <br>


 <input type=text name=zerolevel1 id='zerolevel1' value="150" style='width:40px;height:10px;' onchange="synhro('zerolevel1','zeroslider1');reoutcanvas('cano1')">
 <input id='zeroslider1' type="range" min="1" max="300" step="1" value="150" onchange="synhro('zeroslider1','zerolevel1');reoutcanvas('cano1');" name="zerolider1" style='topmargin:15;'>
 Zero<br>
 SamleRate:<input type=text name=sr1 id='sr1' value="5000" style='width:50px;height:10px;' onchange='reoutcanvas("cano1");'>KHz<br>
 <font size="-2">
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs11"><label for="tgs11">sec</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs21"><label for="tgs21">1/10</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs31"><label for="tgs31">1/100</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs41"><label for="tgs41">1m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs51"><label for="tgs51">1/10m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs61"><label for="tgs51">1/100m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs71"><label for="tgs71">1micro</label>
 </font>
</div>
<!-------------------------------------------------------------------------->
<div class="l2hid"> <!-- Left panel2-->
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chi1b">-I1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2");' id="chiris1b">mark point&nbsp;&nbsp;
 color:<input type=text name=colori1b id='colori1b' value="#ff0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chq1b">-Q1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2")' id="chqris1b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorq1b id='colorq1b' value="#00ff00" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chp1b">-PWR1<input type=checkbox onchange='reoutcanvas("cano2");' id="chpris1b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorp1b id='colorp1b' value="#0000ff" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'>
 <hr>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chi2b"  checked>-I2&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2")' id="chiris2b">mark point&nbsp;&nbsp;
 color:<input type=text name=colori2b id='colori2b' value="#9f0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chq2b"   checked>-Q2&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2")' id="chqris2b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorq2b id='colorq2b' value="#009f00" style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chp2b">-PWR2<input type=checkbox onchange='reoutcanvas("cano2");' id="chpris2b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorp2b id='colorp2b' value="#00009f  " style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'>
 <hr>
 <input type=text name=zoomy2 id='zoomybox2' value="1" style='width:40px;height:10px;' onchange="synhro('zoomybox2','zoomyslider2');reoutcanvas('cano2');">
 <input id='zoomyslider2' type="range" min=".005" max="20" step=".005" value="1" onchange="synhro('zoomyslider2','zoomybox2');reoutcanvas('cano2');" name="zoomyslider2" style='topmargin:15;'>
 Zoom Y <input type=checkbox onchange='reoutcanvas("cano2");' id="autoy2" checked><br>
  <input type=text name=zoomx2 id='zoomxbox2' value="1" style='width:40px;height:10px;' onchange="synhro('zoomxbox2','zoomxslider2');reoutcanvas('cano2');">
 <input id='zoomxslider2' type="range" min="0.05" max="20" step="0.05" value="1" onchange="synhro('zoomxslider2','zoomxbox2');reoutcanvas('cano2');" name="zoomxslider2" style='topmargin:15;'>
 Zoom X <br>


 <input type=text name=zerolevel2 id='zerolevel2' value="150" style='width:40px;height:10px;' onchange="synhro('zerolevel2','zeroslider2');reoutcanvas('cano2')">
 <input id='zeroslider2' type="range" min="1" max="300" step="1" value="150" onchange="synhro('zeroslider2','zerolevel2');reoutcanvas('cano2');" name="zerolider2" style='topmargin:15;'>
 Zero<br>
 SamleRate:<input type=text name=sr2 id='sr2' value="5000" style='width:50px;height:10px;' onchange='reoutcanvas("cano2")'>KHz 
 <br>Grid time:<br>
 <font size="-2">
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs12"><label for="tgs12">sec</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs22"><label for="tgs22">1/10</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs32"><label for="tgs32">1/100</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs42"><label for="tgs42">1m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs52"><label for="tgs52">1/10m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs62"><label for="tgs52">1/100m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs72"><label for="tgs72">1micro</label>
 </font>
</div>
<canvas id="cano1" width="1000" height="300" class="zzpoint"></canvas> 
<canvas id="cano2" width="1000" height="300" class="zzpoint2"></canvas> 
</body>
</html>

