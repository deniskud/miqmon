
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//RU">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="author" content="denis.kudriakov@gmail.com">
  <style>
   select { width: 200px;}      
    .zzpoint {position: fixed ; left: 12px; top: 12px; z-index: 1;}
    .nav1 {position: fixed ; left: 12px; top: 700px; z-index: 1;}
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
    .expl {position: fixed; left: 0px; top: 616px; width: 360px; height: 50px; 
    background: #777777; color: #111111; margin-top: 5px; 
    transition: left .2s linear; z-index: 10;font-family:monospace;}
  </style>
  <script>
  ////////////////// PHP
<?php
// top panel
$filename1=@$_GET['filename1'];
if (!$filename1) $filename1='demosinus'; //default file 2 out
$filename2=@$_GET['filename2'];
if (!$filename2) $filename2='demosinus'; //
$bitrate1=@$_GET['bitrate1'];
$bitrate2=@$_GET['bitrate2'];
if (!$bitrate1) $bitrate1=16;
if (!$bitrate2) $bitrate2=16;
$startframe1=@$_GET['startframe1'];
$startframe2=@$_GET['startframe2'];
if (!$startframe1) $startframe1=0;
if (!$startframe2) $startframe2=0;
$zoom1=@$_GET['zoom1'];
$zoom2=@$_GET['zoom2'];
if (!$zoom1) $zoom1=1;
if (!$zoom2) $zoom2=1;
$byteorder1=@$_GET['bl1'];
$byteorder2=@$_GET['bl2'];
if (!$byteorder1) $byteorder1='off';
if (!$byteorder2) $byteorder2='off';
/////////////////////// left panel TOP
$chi1=@$_GET['chi1'];
$chq1=@$_GET['chq1'];
$chp1=@$_GET['chp1'];
if (!$chi1) $chi1="false"; else $chi1="true";
if (!$chq1) $chq1="false"; else $chq1="true";
if (!$chp1) $chp1="false"; else $chp1="true";

$chiris1=@$_GET['chiris1'];
$chqris1=@$_GET['chqris1'];
$chpris1=@$_GET['chpris1'];
if (!$chiris1) $chiris1="false"; else $chiris1="true";
if (!$chqris1) $chqris1="false"; else $chqris1="true";
if (!$chpris1) $chpris1="false"; else $chpris1="true";

$colori1=@$_GET['colori1'];
$colorq1=@$_GET['colorq1'];
$colorp1=@$_GET['colorp1'];
if (!$colori1) $colori1='#ff0000';
if (!$colorq1) $colorq1='#00ff00';
if (!$colorp1) $colorp1='#0000ff';

$chi2=@$_GET['chi2'];
$chq2=@$_GET['chq2'];
$chp2=@$_GET['chp2'];
if (!$chi2) $chi2="false"; else $chi2="true";
if (!$chq2) $chq2="false"; else $chq2="true";
if (!$chp2) $chp2="false"; else $chp2="true";

$chiris2=@$_GET['chiris2'];
$chqris2=@$_GET['chqris2'];
$chpris2=@$_GET['chpris2'];
if (!$chiris2) $chiris2="false"; else $chiris2="true";
if (!$chqris2) $chqris2="false"; else $chqris2="true";
if (!$chpris2) $chpris2="false"; else $chpris2="true";
$colori2=@$_GET['colori2'];
$colorq2=@$_GET['colorq2'];
$colorp2=@$_GET['colorp2'];
if (!$colori2) $colori2='#ff5555';
if (!$colorq2) $colorq2='#55ff55';
if (!$colorp2) $colorp2='#5555ff';
$zoomy1=@$_GET['zoomy1'];
$zoomx1=@$_GET['zoomx1'];
if (!$zoomy1) $zoomy1=1;
if (!$zoomx1) $zoomx1=1;
$zerolevel1=@$_GET['zerolevel1'];
if (!$zerolevel1) $zerolevel1=150;
$sr1=@$_GET['sr1'];
if (!$sr1) $sr1=5000;
$tgs11=@$_GET['tgs11'];
$tgs21=@$_GET['tgs21'];
$tgs31=@$_GET['tgs31'];
$tgs41=@$_GET['tgs41'];
$tgs51=@$_GET['tgs51'];
$tgs61=@$_GET['tgs61'];
$tgs71=@$_GET['tgs71'];
if (!$tgs11) $tgs11="false"; else $tgs11="true";
if (!$tgs21) $tgs21="false"; else $tgs21="true";
if (!$tgs31) $tgs31="false"; else $tgs31="true";
if (!$tgs41) $tgs41="false"; else $tgs41="true";
if (!$tgs51) $tgs51="false"; else $tgs51="true";
if (!$tgs61) $tgs61="false"; else $tgs61="true";
if (!$tgs71) $tgs71="false"; else $tgs71="true";
$autoy1=@$_GET['autoy1'];
if (!$autoy1) $autoy1="false"; else $autoy1="true";
///////// left panel bottom
$chi1b=@$_GET['chi1b'];
$chq1b=@$_GET['chq1b'];
$chp1b=@$_GET['chp1b'];
if (!$chi1b) $chi1b="false"; else $chi1b="true";
if (!$chq1b) $chq1b="false"; else $chq1b="true";
if (!$chp1b) $chp1b="false"; else $chp1b="true";
$chiris1b=@$_GET['chiris1b'];
$chqris1b=@$_GET['chqris1b'];
$chpris1b=@$_GET['chpris1b'];
if (!$chiris1b) $chiris1b="false"; else $chiris1b="true";
if (!$chqris1b) $chqris1b="false"; else $chqris1b="true";
if (!$chpris1b) $chpris1b="false"; else $chpris1b="true";
$colori1b=@$_GET['colori1b'];
$colorq1b=@$_GET['colorq1b'];
$colorp1b=@$_GET['colorp1b'];
if (!$colori1b) $colori1b='#ff0000';
if (!$colorq1b) $colorq1b='#00ff00';
if (!$colorp1b) $colorp1b='#0000ff';
$chi2b=@$_GET['chi2b'];
$chq2b=@$_GET['chq2b'];
$chp2b=@$_GET['chp2b'];
if (!$chi2b) $chi2b="false"; else $chi2b="true";
if (!$chq2b) $chq2b="false"; else $chq2b="true";
if (!$chp2b) $chp2b="false"; else $chp2b="true";
$chiris2b=@$_GET['chiris2b'];
$chqris2b=@$_GET['chqris2b'];
$chpris2b=@$_GET['chpris2b'];
if (!$chiris2b) $chiris2b="false"; else $chiris2b="true";
if (!$chqris2b) $chqris2b="false"; else $chqris2b="true";
if (!$chpris2b) $chpris2b="false"; else $chpris2b="true";
$colori2b=@$_GET['colori2b'];
$colorq2b=@$_GET['colorq2b'];
$colorp2b=@$_GET['colorp2b'];
if (!$colori2b) $colori2b='#ff5555';
if (!$colorq2b) $colorq2b='#55ff55';
if (!$colorp2b) $colorp2b='#5555ff';
$zoomy2=@$_GET['zoomy2'];
$zoomx2=@$_GET['zoomx2'];
if (!$zoomy2) $zoomy2=1;
if (!$zoomx2) $zoomx2=1;
$zerolevel2=@$_GET['zerolevel2'];
if (!$zerolevel2) $zerolevel2=150;
$sr1=@$_GET['sr2'];
if (!$sr2) $sr2=5000;

$tgs12=@$_GET['tgs12'];
$tgs22=@$_GET['tgs22'];
$tgs32=@$_GET['tgs32'];
$tgs42=@$_GET['tgs42'];
$tgs52=@$_GET['tgs52'];
$tgs62=@$_GET['tgs62'];
$tgs72=@$_GET['tgs72'];
if (!$tgs12) $tgs12="false"; else $tgs12="true";
if (!$tgs22) $tgs22="false"; else $tgs22="true";
if (!$tgs32) $tgs32="false"; else $tgs32="true";
if (!$tgs42) $tgs42="false"; else $tgs42="true";
if (!$tgs52) $tgs52="false"; else $tgs52="true";
if (!$tgs62) $tgs62="false"; else $tgs62="true";
if (!$tgs72) $tgs72="false"; else $tgs72="true";

$autoy2=@$_GET['autoy2'];
if (!$autoy2) $autoy2="false"; else $autoy2="true";

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
//    document.getElementById('autoy1').checked = $autoy1; 
//    var sf1=document.getElementById(\"startframe1\"); 
//    var sf2=document.getElementById(\"startframe2\");
//    sf1.value=$startframe1; 
//    sf2.value=$startframe2; 
    
";
//;document.getElementById("autoy1")
// read file 1
$filesize1=0;
$filesize2=0;
if ($filename1!='demosinus'){
  $filesize1=filesize("iq/".$filename1);// *4/$bitrate1;
  $framesize1=$filesize1*4/$bitrate1;
  $f = fopen("iq/".$filename1, "r");
  if ($bitrate1==8) $shift=$startframe1*2;
  if ($bitrate1==12) $shift=$startframe1*3;
  if ($bitrate1==16) $shift=$startframe1*4;
  if ($filesize1>=$shift) fseek($f,$shift);
  $i=0;
  while (($i++ < 1000 ) && !(feof($f))){ //read 1000 frames file A
    $y=ord(fgetc($f)); // I
    if ($bitrate1==8){ 
      if ($y>127) $y=$y-256;
    } 
    if ($bitrate1==16){
      if ($byteorder1=='off') $y=$y + 256 * ord(fgetc($f));
      else $y * 256 + ord(fgetc($f));
      if ($y>32767) $y=$y-65536; // 2unsigned    
    }
    echo "i1[$i]=".$y.";"; 
    $y=ord(fgetc($f)); // Q
    if ($bitrate1==8){ 
      if ($y>127) $y=$y-256;
    } 
    if ($bitrate1==16){
      if ($byteorder1=='off') $y=$y + 256 * ord(fgetc($f));
      else $y * 256 + ord(fgetc($f));
      if ($y>32767) $y=$y-65536; // 2unsigned    
    }
    echo "q1[$i]=".$y.";"; 
  }
  fclose($f);
}
echo "\n";
if ($filename2!='demosinus'){
  $filesize2=filesize("iq/".$filename2);// *4/$bitrate1;
  $framesize2=$filesize2*4/$bitrate2;
  $f2 = fopen("iq/".$filename2, "r");
// shift @startframe
  if ($bitrate2==8) $shift=$startframe2*2;
  if ($bitrate2==12) $shift=$startframe2*3;
  if ($bitrate2==16) $shift=$startframe2*4;
  if ($filesize2>=$shift) fseek($f2,$shift);
  $i=0;
  while (($i++ < 1000 ) AND !feof($f2)){ //read 1000 frames file B
    $y=ord(fgetc($f2)); // I
    if ($bitrate2==8){ 
      if ($y>127) $y=$y-256;
    } 
    if ($bitrate2==16){
      if ($byteorder2=='off') $y=$y + 256 * ord(fgetc($f2));
      else $y * 256 + ord(fgetc($f2));
      if ($y>32767) $y=$y-65536; // 2unsigned    
    }
    echo "i2[$i]=".$y.";"; 
    $y=ord(fgetc($f2)); // Q
    if ($bitrate2==8){ 
      if ($y>127) $y=$y-256;
    } 
    if ($bitrate2==16){
      if ($byteorder2=='off') $y=$y + 256 * ord(fgetc($f2));
      else $y * 256 + ord(fgetc($f2));
      if ($y>32767) $y=$y-65536; // 2unsigned    
    }
    echo "q2[$i]=".$y.";"; 
  }
  fclose($f2);
}
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
      var minscale=canvas.height-y0;
      if (minscale > y0) minscale = y0;
      if (zoomyauto.checked){ //find max in file A
        if (chi1.checked) for (var i=0;i<1000;i++) {if (maxiq<i1[i]) maxiq=i1[i]}; 
        if (chi2.checked) for (var i=0;i<1000;i++) if (maxiq<i2[i]) maxiq=i2[i]; 
        if (chq1.checked) for (var i=0;i<1000;i++) if (maxiq<q1[i]) maxiq=q1[i]; 
        if (chq2.checked) for (var i=0;i<1000;i++) if (maxiq<q2[i]) maxiq=q2[i]; 
        if (minscale < maxiq) zoomvalue=minscale/maxiq;////////////////////////////////      
      }
      zoomy.value=zoomvalue;
      zoomys.value=zoomvalue;      
      var zoomx=zoomxp.value;
      zoomx=1/zoomx;
///////////////////////////////   X-grad   
      if (scalems7.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value/1000)){
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#111111";
        context.stroke();                
      }
      if (scalems6.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value/100)){
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#333333";
        context.stroke();                
      }
      if (scalems5.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value/10)){
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#555555";
        context.stroke();                
      }
      if (scalems4.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value)){
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#777777";
        context.stroke();                
      }
      if (scalems3.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value*10)){
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#999999";
        context.stroke();                
      }
      if (scalems2.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value*100)){
          context.moveTo(x,0);
          context.lineTo(x,canvas.height);
        }
        context.strokeStyle = "#bbbbbb";
        context.stroke();                
      }
      if (scalems1.checked){
        context.beginPath();    
        for (var x=0; x<canvas.width;x+=(zoomx*sr.value*1000)){
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
        context.lineTo(canvas.width-40,y);      
      }
      for (var y=(canvas.height - y0 +10); y<canvas.height; y+=20) {
        context.moveTo(0, y);
        context.lineTo(canvas.width-40,y);
      }      
      context.strokeStyle = "#555555";
      context.stroke();        
      context.beginPath();      
      context.font = "normal 10px monospacing";
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
        var  zoomx = document.getElementById("zoomxbox1");
      } else if (canid=="cano2"){
        var  zoomx = document.getElementById("zoomxbox2");
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chi1b");
        var colorp=document.getElementById("colori1b");
        var riskap=document.getElementById("chiris1b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999/zoomx.value;x+=1) {
        context.moveTo(x/zoomx.value, canvas.height-zoomz.value-zoomy.value*i1[x]); 
        context.lineTo(x/zoomx.value+1/zoomx.value,canvas.height-zoomz.value-zoomy.value*i1[x+1]);
        if (riskap.checked) {
          context.moveTo(x/zoomx.value-4, canvas.height-zoomz.value-zoomy.value*i1[x]); 
          context.lineTo(x/zoomx.value+4, canvas.height-zoomz.value-zoomy.value*i1[x]); 
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
        var  zoomx = document.getElementById("zoomxbox1");
      } else if (canid=="cano2"){
        var  zoomx = document.getElementById("zoomxbox2");
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chq1b");
        var colorp=document.getElementById("colorq1b");
        var riskap=document.getElementById("chqris1b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999/zoomx.value;x++) {
        context.moveTo(x/zoomx.value, canvas.height-zoomz.value-zoomy.value*q1[x]); 
        context.lineTo(x/zoomx.value+1/zoomx.value,canvas.height-zoomz.value-zoomy.value*q1[x+1]);
        if (riskap.checked) {
          context.moveTo(x/zoomx.value-4, canvas.height-zoomz.value-zoomy.value*q1[x]); 
          context.lineTo(x/zoomx.value+4, canvas.height-zoomz.value-zoomy.value*q1[x]); 
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
        var  zoomx = document.getElementById("zoomxbox1");
      } else if (canid=="cano2"){
        var  zoomx = document.getElementById("zoomxbox2");
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chp1b");
        var colorp=document.getElementById("colorp1b");
        var riskap=document.getElementById("chpris1b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999/zoomx.value;x++) {
        context.moveTo(x/zoomx.value, canvas.height-zoomz.value-zoomy.value*e1[x]); 
        context.lineTo(x/zoomx.value+1/zoomx.value,canvas.height-zoomz.value-zoomy.value*e1[x+1]);
        if (riskap.checked) {
          context.moveTo(x/zoomx.value-4, canvas.height-zoomz.value-zoomy.value*e1[x]); 
          context.lineTo(x/zoomx.value+4, canvas.height-zoomz.value-zoomy.value*e1[x]); 
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
        var  zoomx = document.getElementById("zoomxbox1");
      } else if (canid=="cano2"){
        var  zoomx = document.getElementById("zoomxbox2");
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chi2b");
        var colorp=document.getElementById("colori2b");
        var riskap=document.getElementById("chiris2b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999/zoomx.value;x++) {
        context.moveTo(x/zoomx.value, canvas.height-zoomz.value-zoomy.value*i2[x]); 
        context.lineTo(x/zoomx.value+1/zoomx.value,canvas.height-zoomz.value-zoomy.value*i2[x+1]);
        if (riskap.checked) {
          context.moveTo(x/zoomx.value-4, canvas.height-zoomz.value-zoomy.value*i2[x]); 
          context.lineTo(x/zoomx.value+4, canvas.height-zoomz.value-zoomy.value*i2[x]); 
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
        var  zoomx = document.getElementById("zoomxbox1");
      } else if (canid=="cano2"){
        var  zoomx = document.getElementById("zoomxbox2");
        var  zoomz = document.getElementById("zerolevel2");
        var  zoomy = document.getElementById("zoomybox2");
        var outokp=document.getElementById("chq2b");
        var colorp=document.getElementById("colorq2b");
        var riskap=document.getElementById("chqris2b");        
      } else return;
      if (!outokp.checked) return;
      context.beginPath();
      context.strokeStyle = colorp.value;
      for (var x=0;x<999/zoomx.value;x++) {
        context.moveTo(x/zoomx.value, canvas.height-zoomz.value-zoomy.value*q2[x]); 
        context.lineTo(x/zoomx.value+1/zoomx.value,canvas.height-zoomz.value-zoomy.value*q2[x+1]);
        if (riskap.checked) {
          context.moveTo(x/zoomx.value-4, canvas.height-zoomz.value-zoomy.value*q2[x]); 
          context.lineTo(x/zoomx.value+4, canvas.height-zoomz.value-zoomy.value*q2[x]); 
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
        var  zoomx = document.getElementById("zoomxbox1");
      } else if (canid=="cano2"){
        var  zoomx = document.getElementById("zoomxbox2");
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
        context.moveTo(x/zoomx.value, canvas.height-zoomz.value-zoomy.value*e2[x]); 
        context.lineTo(x/zoomx.value+1/zoomx.value,canvas.height-zoomz.value-zoomy.value*e2[x+1]);
        if (riskap.checked) {
          context.moveTo(x/zoomx.value-4, canvas.height-zoomz.value-zoomy.value*e2[x]); 
          context.lineTo(x/zoomx.value+4, canvas.height-zoomz.value-zoomy.value*e2[x]); 
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
      if (canid=="cano1") paintscale(canid,"#0a0000"); //killit!
      else paintscale(canid,"#00000a");
      outgrid(canid);
      outi1(canid);
      outi2(canid);
      outq1(canid);
      outq2(canid);
//      outp1(canid);
//      outp2(canid);
      outgrid(canid); //reout 4 top layer
    }
    function reread(){document.getElementById("xform").submit();}
/*
    function reread2(){
      var fn1=document.getElementById('filename1');
      var br18=document.getElementById('br18');
      var br112=document.getElementById('br112');
      var br116=document.getElementById('br116');
      var sf1=document.getElementById('startframe1');
      var z1=document.getElementById('zoombox1');
      var fn2=document.getElementById('filename2');
      var br28=document.getElementById('br28');
      var br212=document.getElementById('br212');
      var br216=document.getElementById('br216');
      var sf2=document.getElementById('startframe2');
      var z2=document.getElementById('zoombox2');
      var urlstr='index.php?filename1='+fn1.value+"&bitrate1=";
      if (br18.checked) urlstr+='8&startframe1=';
      if (br112.checked) urlstr+='12&startframe1=';
      if (br116.checked) urlstr+='16&startframe1=';
      urlstr+=sf1.value;
      urlstr+="&zoom1=";
      urlstr+=z1.value;
      urlstr+='&filename2=';
      urlstr+=fn2.value;
      urlstr+="&bitrate2="
      if (br28.checked) urlstr+='8&startframe2=';
      if (br212.checked) urlstr+='12&startframe2=';
      if (br216.checked) urlstr+='16&startframe2=';
      urlstr+=sf2.value;
      urlstr+="&zoom2=";
      urlstr+=z2.value;
      window.location.replace(urlstr);
//  console.log(urlstr);      
    }

    */
    window.onload = function() { 
      document.getElementById('autoy1').checked = <?php echo $autoy1;?>; 
      document.getElementById('autoy2').checked = <?php echo $autoy2;?>; 

      document.getElementById('chi1').checked = <?php echo $chi1;?>; 
      document.getElementById('chq1').checked = <?php echo $chq1;?>; 
      document.getElementById('chp1').checked = <?php echo $chp1;?>; 
      document.getElementById('chi2').checked = <?php echo $chi2;?>; 
      document.getElementById('chq2').checked = <?php echo $chq2;?>; 
      document.getElementById('chp2').checked = <?php echo $chp2;?>; 

      document.getElementById('chi1b').checked = <?php echo $chi1b;?>; 
      document.getElementById('chq1b').checked = <?php echo $chq1b;?>; 
      document.getElementById('chp1b').checked = <?php echo $chp1b;?>; 
      document.getElementById('chi2b').checked = <?php echo $chi2b;?>; 
      document.getElementById('chq2b').checked = <?php echo $chq2b;?>; 
      document.getElementById('chp2b').checked = <?php echo $chp2b;?>; 

      document.getElementById('chiris1').checked = <?php echo $chiris1;?>; 
      document.getElementById('chqris1').checked = <?php echo $chqris1;?>; 
      document.getElementById('chpris1').checked = <?php echo $chpris1;?>; 
      document.getElementById('chiris2').checked = <?php echo $chiris2;?>; 
      document.getElementById('chqris2').checked = <?php echo $chqris2;?>; 
      document.getElementById('chpris2').checked = <?php echo $chpris2;?>; 

      document.getElementById('chiris1b').checked = <?php echo $chiris1b;?>; 
      document.getElementById('chqris1b').checked = <?php echo $chqris1b;?>; 
      document.getElementById('chpris1b').checked = <?php echo $chpris1b;?>; 
      document.getElementById('chiris2b').checked = <?php echo $chiris2b;?>; 
      document.getElementById('chqris2b').checked = <?php echo $chqris2b;?>; 
      document.getElementById('chpris2b').checked = <?php echo $chpris2b;?>; 

      document.getElementById('colori1').value = '<?php echo $colori1;?>'; 
      document.getElementById('colorq1').value = '<?php echo $colorq1;?>'; 
      document.getElementById('colorp1').value = '<?php echo $colorp1;?>'; 
      document.getElementById('colori2').value = '<?php echo $colori2;?>'; 
      document.getElementById('colorq2').value = '<?php echo $colorq2;?>'; 
      document.getElementById('colorp2').value = '<?php echo $colorp2;?>'; 

      document.getElementById('colori1b').value = '<?php echo $colori1b;?>'; 
      document.getElementById('colorq1b').value = '<?php echo $colorq1b;?>'; 
      document.getElementById('colorp1b').value = '<?php echo $colorp1b;?>'; 
      document.getElementById('colori2b').value = '<?php echo $colori2b;?>'; 
      document.getElementById('colorq2b').value = '<?php echo $colorq2b;?>'; 
      document.getElementById('colorp2b').value = '<?php echo $colorp2b;?>'; 
      
      document.getElementById('zoomxbox1').value = <?php echo $zoomx1;?>; 
      document.getElementById('zoomybox1').value = <?php echo $zoomy1;?>; 
      document.getElementById('zerolevel1').value = <?php echo $zerolevel1;?>; 
                                
      document.getElementById('zoomxbox2').value = <?php echo $zoomx2;?>; 
      document.getElementById('zoomybox2').value = <?php echo $zoomy2;?>; 
      document.getElementById('zerolevel2').value = <?php echo $zerolevel2;?>; 

      document.getElementById('tgs11').checked = <?php echo $tgs11;?>; 
      document.getElementById('tgs21').checked = <?php echo $tgs21;?>; 
      document.getElementById('tgs31').checked = <?php echo $tgs31;?>; 
      document.getElementById('tgs41').checked = <?php echo $tgs41;?>; 
      document.getElementById('tgs51').checked = <?php echo $tgs51;?>; 
      document.getElementById('tgs61').checked = <?php echo $tgs61;?>; 
      document.getElementById('tgs71').checked = <?php echo $tgs71;?>; 

      document.getElementById('tgs12').checked = <?php echo $tgs12;?>; 
      document.getElementById('tgs22').checked = <?php echo $tgs22;?>; 
      document.getElementById('tgs32').checked = <?php echo $tgs32;?>; 
      document.getElementById('tgs42').checked = <?php echo $tgs42;?>; 
      document.getElementById('tgs52').checked = <?php echo $tgs52;?>; 
      document.getElementById('tgs62').checked = <?php echo $tgs62;?>; 
      document.getElementById('tgs72').checked = <?php echo $tgs72;?>; 
      
      document.getElementById('sr1').value = <?php echo $sr1;?>;     
      document.getElementById('sr2').value = <?php echo $sr2;?>;     
      
      
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
<form method="get" action="./index.php" onchange='' id="xform">
<div class="hid"> <!-- TOP panel-->
 <table border=0 width=100%>
  <tr>
   <td >&nbsp; &nbsp;File A :
 <select name=filename1 id='filename1'>
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
    <input id='br18' type=radio name=bitrate1 value=8 <?php if ($bitrate1==8) echo "checked";?>>8
    <input id='br112' type=radio name=bitrate1 value=12 <?php if ($bitrate1==12) echo "checked";?>>12
    <input id='br116' type=radio name=bitrate1 value=16 <?php if ($bitrate1==16) echo "checked";?>>16
   </td>
   <td>Big/Litle<input type=checkbox name=bl1 id='bl1'></td>
   <td>Start frame: <input type=text name='startframe1' id='startframe1' size=5 value="0"></td>
   <td>Zoom A
    <input id='zoomslider1' type="range" min="1" max="1000" step="1" value="1" onchange='synhro("zoomslider1","zoombox1");' name="zoomslider1" style='topmargin:15;'>
    <input type=text name=zoom1 id='zoombox1' value="1" style='width:50px;' onchange="synhro('zoombox1','zoomslider1');">  
   </td> 
   <td><input type="submit" value="update"></td> 
  </tr> <!--  second:-->
  <tr>
   <td>&nbsp; &nbsp;File B :
 <select name=filename2 id='filename2'>
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
    <input id='br28' type=radio name=bitrate2 value=8 <?php if ($bitrate2==8) echo "checked";?>>8
    <input id='br212' type=radio name=bitrate2 value=12 <?php if ($bitrate2==12) echo "checked";?>>12
    <input id='br216' type=radio name=bitrate2 value=16 <?php if ($bitrate2==16) echo "checked";?>>16
   </td>
   <td>Big/Litle<input type=checkbox name=bl2 id='bl2'></td>
   <td>Start frame: <input type=text name='startframe2' size=5 value="0" id='startframe2'></td>
   <td>Zoom B
    <input id='zoomslider2' type="range" min="1" max="1000" step="1" value="1" onchange="synhro('zoomslider2','zoombox2');" name="zoomslider2" style='topmargin:15;'>
    <input type=text name=zoom2 id='zoombox2' value="1" style='width:50px;' onchange="synhro('zoombox2','zoomslider2');">  
   </td> 
   <td><input type="submit" value="update"></td> 
  </tr>
 </table>
</div>
<div class="lhid"><!-- Left panel1-->
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chi1" name="chi1" checked>
 -I1&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chiris1" name="chiris1">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colori1 id='colori1' value="#ff0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chq1" name="chq1"  checked>
 -Q1&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chqris1" name="chqris1">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colorq1 id='colorq1' value="#00ff00" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chp1" name="chp1">
 -PWR1
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chpris1" name="chpris1" >
 mark point&nbsp;&nbsp;color:
 <input type=text name=colorp1 id='colorp1' value="#0000ff" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'>
 <hr>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chi2" name="chi2">
 -I2&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chiris2" name="chiris2">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colori2 id='colori2' value="#9f0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chq2" name="chq2">
 -Q2&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chqris2" id="chqris2">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colorq2 id='colorq2' value="#009f00" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chp2" name="chp2">-PWR2
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chpris2" name="chpris2" >mark point&nbsp;&nbsp;
 color:<input type=text name=colorp2 id='colorp2' value="#00009f  " style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'>
 <hr>
 <input type=text name=zoomy1 id='zoomybox1' value="1" style='width:40px;height:10px;' onchange="synhro('zoomybox1','zoomyslider1');reoutcanvas('cano1');">
 <input id='zoomyslider1' type="range" min="0.005" max="20" step="0.005" value="1" onchange="synhro('zoomyslider1','zoomybox1');reoutcanvas('cano1');" name="zoomyslider1" style='topmargin:15;'>
 Zoom Y <input type=checkbox onchange='reoutcanvas("cano1");' id="autoy1" name="autoy1" checked><br>
 <input type=text name=zoomx1 id='zoomxbox1' value="1" style='width:40px;height:10px;' onchange="synhro('zoomxbox1','zoomxslider1');reoutcanvas('cano1');">
 <input id='zoomxslider1' type="range" min="0.01" max="1" step="0.01" value="1" onchange="synhro('zoomxslider1','zoomxbox1');reoutcanvas('cano1');" name="zoomxslider1" style='topmargin:15;'>
 Zoom X <br>
 <input type=text name=zerolevel1 id='zerolevel1' value="150" style='width:40px;height:10px;' onchange="synhro('zerolevel1','zeroslider1');reoutcanvas('cano1')">
 <input id='zeroslider1' type="range" min="1" max="300" step="1" value="150" onchange="synhro('zeroslider1','zerolevel1');reoutcanvas('cano1');" name="zerolider1" style='topmargin:15;'>
 Zero<br>
 SamleRate:<input type=text name=sr1 id='sr1' value="5000" style='width:50px;height:10px;' onchange='reoutcanvas("cano1");'>KHz<br>
 <font size="-2">
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs11" name="tgs11"><label for="tgs11">sec</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs21" name="tgs21"><label for="tgs21">1/10</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs31" name="tgs31"><label for="tgs31">1/100</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs41" name="tgs41"><label for="tgs41">1m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs51" name="tgs51"><label for="tgs51">1/10m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs61" name="tgs61"><label for="tgs51">1/100m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs71" name="tgs71"><label for="tgs71">1micro</label>
 </font>
</div>
<!-------------------------------------------------------------------------->
<div class="l2hid"> <!-- Left panel2-->
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chi1b" name="chi1b">
 -I1&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chiris1b" name="chiris1b">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colori1b id='colori1b' value="#ff0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chq1b" name="chq1b">
 -Q1&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano2")' id="chqris1b" name="chqris1b">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colorq1b id='colorq1b' value="#00ff00" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chp1b" name="chp1b">
 -PWR1
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chpris1b" name="chpris1b">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colorp1b id='colorp1b' value="#0000ff" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'>
 <hr>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chi2b" name="chi2b"  checked>
 -I2&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano2")' id="chiris2b" name="chiris2b">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colori2b id='colori2b' value="#9f0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chq2b"  name="chq2b"   checked>
 -Q2&nbsp;&nbsp;
 <input type=checkbox onchange='reoutcanvas("cano2")' id="chqris2b" name="chqris2b">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colorq2b id='colorq2b' value="#009f00" style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chp2b" name="chp2b">
 -PWR2
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chpris2b" name="chpris2b">
 mark point&nbsp;&nbsp;color:
 <input type=text name=colorp2b id='colorp2b' value="#00009f  " style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'>
 <hr>
 <input type=text name=zoomy2 id='zoomybox2' value="1" style='width:40px;height:10px;' onchange="synhro('zoomybox2','zoomyslider2');reoutcanvas('cano2');">
 <input id='zoomyslider2' type="range" min=".005" max="20" step=".005" value="1" onchange="synhro('zoomyslider2','zoomybox2');reoutcanvas('cano2');" name="zoomyslider2" style='topmargin:15;'>
 Zoom Y 
 <input type=checkbox onchange='reoutcanvas("cano2");' id="autoy2" name="autoy2" checked><br>
 <input type=text name=zoomx2 id='zoomxbox2' value="1" style='width:40px;height:10px;' onchange="synhro('zoomxbox2','zoomxslider2');reoutcanvas('cano2');">
 <input id='zoomxslider2' type="range" min="0.01" max="1" step="0.01" value="1" onchange="synhro('zoomxslider2','zoomxbox2');reoutcanvas('cano2');" name="zoomxslider2" style='topmargin:15;'>
 Zoom X <br>
 <input type=text name=zerolevel2 id='zerolevel2' value="150" style='width:40px;height:10px;' onchange="synhro('zerolevel2','zeroslider2');reoutcanvas('cano2')">
 <input id='zeroslider2' type="range" min="1" max="300" step="1" value="150" onchange="synhro('zeroslider2','zerolevel2');reoutcanvas('cano2');" name="zerolider2" style='topmargin:15;'>
 Zero<br>
 SamleRate:<input type=text name=sr2 id='sr2' value="5000" style='width:50px;height:10px;' onchange='reoutcanvas("cano2")'>KHz<br>
 <font size="-2">
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs12" name="tgs12"><label for="tgs12">sec</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs22" name="tgs22"><label for="tgs22">1/10</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs32" name="tgs32"><label for="tgs32">1/100</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs42" name="tgs42"><label for="tgs42">1m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs52" name="tgs52"><label for="tgs52">1/10m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs62" name="tgs62"><label for="tgs52">1/100m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs72" name="tgs72"><label for="tgs72">1micro</label>
 </font>
</div>
 </form>
<canvas id="cano1" width="1000" height="300" class="zzpoint"></canvas> 
<canvas id="cano2" width="1000" height="300" class="zzpoint2"></canvas> 
<div class='expl'>
 0<input type='range' id='nav1' value=<?php echo $startframe1;?> min="0" max=<?php if ($framesize1>1000) echo($framesize1-1000); else echo "0";?> step='100' name='nav1' onchange="synhro('nav1','nav1box');synhro('nav1','startframe1');synhro('nav1','startframe2');reread();" autofocus>
 <?php echo($framesize1);?> &nbsp;&nbsp;
 <input type=text name=nav1box id='nav1box' value="<?php echo $startframe1;?>" style='width:40px;height:10px;' onchange="synhro('nav1box','nav1'); synhro('nav1','startframe1'); synhro('nav1','startframe2');reread();">
</div>
</body>
</html>

