
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//RU">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="author" content="denis.kudriakov@gmail.com">
  <style>
    body
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
    var filename1='';
    var filename2='';
    var bit1=8;
    var bit2=8;
    var be1=1;
    var be2=1;
    var startframe1=0;
    var startframe2=0;
    var zooma=1;
    var zoomb=1;
    var i1=new Array(1000);
    var i2=new Array(1000);
    var q1=new Array(1000);
    var q2=new Array(1000);
    var e1=new Array(1000);
    var e2=new Array(1000);
  
    ///////// sinus TMP //////////  
    for (var x=0; x<1000; x++){
      i1[x]=127*Math.sin(Math.PI*x/90);
      q1[x]=127*Math.cos(Math.PI*x/90);
      i2[x]=127*Math.sin(Math.PI*x/90-Math.PI/8);
      q2[x]=127*Math.cos(Math.PI*x/90-Math.PI/8);      
      e1[x]=Math.sqrt(i1[x]*i1[x]+q1[x]*q1[x]);
      e2[x]=Math.sqrt(i2[x]*i2[x]+q2[x]*q2[x]);
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
      var tgs11 = document.getElementById("tgs11");
      var tgs21 = document.getElementById("tgs21");
      var tgs31 = document.getElementById("tgs31");
      var tgs41 = document.getElementById("tgs41");
      var tgs51 = document.getElementById("tgs51");
      var tgs61 = document.getElementById("tgs61");
      var tgs71 = document.getElementById("tgs71");
      var tgs12 = document.getElementById("tgs12");
      var tgs22 = document.getElementById("tgs22");
      var tgs32 = document.getElementById("tgs32");
      var tgs42 = document.getElementById("tgs42");
      var tgs52 = document.getElementById("tgs52");
      var tgs62 = document.getElementById("tgs62");
      var tgs72 = document.getElementById("tgs72");
      var scalems1 = tgs11.value;
      var scalems2 = tgs21.value;
      var scalems3 = tgs31.value;
      var scalems4 = tgs41.value;
      var scalems5 = tgs51.value;
      var scalems6 = tgs61.value;
      var scalems7 = tgs71.value;         
      if (canv=="cano2") {
        zoomz = document.getElementById("zerolevel2");
        zoomy = document.getElementById("zoomybox2");
        scalems1 = tgs12.value;
        scalems2 = tgs22.value;
        scalems3 = tgs32.value;
        scalems4 = tgs42.value;
        scalems5 = tgs52.value;
        scalems6 = tgs62.value;
        scalems7 = tgs72.value;         
      }
      var y0=zoomz.value;
      var zoomvalue=zoomy.value;
      context.beginPath();
        context.moveTo(0, canvas.height - y0);
        context.lineTo(canvas.width, canvas.height - y0);
        context.strokeStyle = "#ffffff";
      context.stroke();
      //zoom-scale:
      context.beginPath();       
      for (var y=(canvas.height - y0 -10); y>=0; y-=10) {
        context.moveTo(0, y);
        context.lineTo(canvas.width,y);      
      }
      for (var y=(canvas.height - y0 +10); y<canvas.height; y+=10) {
        context.moveTo(0, y);
        context.lineTo(canvas.width,y);      
      }      
      context.strokeStyle = "#555555";
      context.stroke();        
      context.beginPath();      
      context.font = "normal 9px monospacing";
      context.fillStyle = "#ffffff";
      for (var y=(canvas.height - y0 -10); y>=0; y-=10) context.fillText("+"+((canvas.height-y-y0)/zoomvalue).toFixed(2), canvas.width-40, y+4 );
      for (var y=(canvas.height - y0 +10); y<canvas.height; y+=10) context.fillText("-"+((canvas.height-y-y0)/zoomvalue).toFixed(2), canvas.width-40, y+4 );
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
 <form onchange='' id="xform">
 <table border=0 width=100%>
  <tr>
   <td>&nbsp; &nbsp;File A :
    <select name=filename>
     <option id='2msec.iq' >2msec.iq
     <option id='400kT2.iq' >400kT2.iq
     <option id='4msec-2.iq' >4msec-2.iq
     <option id='4msec.iq' >4msec.iq
     <option id='4msec0-127.iq' >4msec0-127.iq
     <option id='4msec0-180.iq' >4msec0-180.iq
    </select>
   </td>
   <td>
    <input type=radio name=bitrate1 value=8 checked>8
    <input type=radio name=bitrate1 value=12>12
    <input type=radio name=bitrate1 value=16>16
   </td>
   <td>Big/Litle<input type=checkbox></td>
   <td>Start frame: <input type=text name=startframe1 size=5 value="0"></td>
   <td>Zoom A
    <input id='zoomslider1' type="range" min="1" max="1000" step="1" value="1" onchange='synhro("zoomslider1","zoombox1");' name="zoomslider1" style='topmargin:15;'>
    <input type=text name=zoom1 id='zoombox1' value="1" style='width:50px;' onchange="synhro('zoombox1','zoomslider1');">  
   </td> 
  </tr> 
  <tr>
   <td>&nbsp; &nbsp;File B :
    <select name=filename>
     <option id='2msec.iq' >2msec.iq
     <option id='400kT2.iq' >400kT2.iq
     <option id='4msec-2.iq' >4msec-2.iq
     <option id='4msec.iq' >4msec.iq
     <option id='4msec0-127.iq' >4msec0-127.iq
     <option id='4msec0-180.iq' >4msec0-180.iq
    </select>
   </td>
   <td>
    <input type=radio name=bitrate2 value=8 checked>8
    <input type=radio name=bitrate2 value=12>12
    <input type=radio name=bitrate2 value=16>16
   </td>
   <td>Big/Litle<input type=checkbox></td>
   <td>Start frame: <input type=text name=startframe2 size=5 value="0"></td>
   <td>Zoom B
    <input id='zoomslider2' type="range" min="1" max="1000" step="1" value="1" onchange="synhro('zoomslider2','zoombox2');" name="zoomslider2" style='topmargin:15;'>
    <input type=text name=zoom2 id='zoombox2' value="1" style='width:50px;' onchange="synhro('zoombox2','zoomslider2');">  
   </td> 
  </tr>
 </table>
 </form>
</div>
<div class="lhid"><!-- Left panel1-->
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chi1" >-I1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano1")' id="chiris1">mark point&nbsp;&nbsp;
 color:<input type=text name=colori1 id='colori1' value="#ff0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano1")'><br>
 <input type=checkbox onchange='reoutcanvas("cano1")' id="chq1">-Q1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano1")' id="chqris1">mark point&nbsp;&nbsp;
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
 <input type=text name=zoomy1 id='zoomybox1' value="1" style='width:40px;' onchange="synhro('zoomybox1','zoomyslider1');reoutcanvas('cano1');">
 <input id='zoomyslider1' type="range" min="0.05" max="20" step="0.05" value="1" onchange="synhro('zoomyslider1','zoomybox1');reoutcanvas('cano1');" name="zoomyslider1" style='topmargin:15;'>
 Zoom Y <br>
 <input type=text name=zerolevel1 id='zerolevel1' value="150" style='width:40px;' onchange="synhro('zerolevel1','zeroslider1');reoutcanvas('cano1')">
 <input id='zeroslider1' type="range" min="1" max="300" step="1" value="150" onchange="synhro('zeroslider1','zerolevel1');reoutcanvas('cano1');" name="zerolider1" style='topmargin:15;'>
 Zero<br>
 SamleRate:<input type=text name=sr1 id='sr1' value="5000" style='width:50px;' onchange='reoutcanvas("cano1");'>KHz 
 <br>Grid time:<br>
 <font size="-2">
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs11"><label for="tgs11">1sec</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs21"><label for="tgs21">1/10</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs31"><label for="tgs31">1/100</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs41"><label for="tgs41">1mili</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs51"><label for="tgs51">1/10m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs61"><label for="tgs51">1/100m</label>
  <input type=checkbox onchange='reoutcanvas("cano1")' id="tgs71"><label for="tgs71">1micro</label>
 </font>
</div>
<!-------------------------------------------------------------------------->
<div class="l2hid"> <!-- Left panel2-->
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chi1b" >-I1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2");' id="chiris1b">mark point&nbsp;&nbsp;
 color:<input type=text name=colori1b id='colori1b' value="#ff0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chq1b">-Q1&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2")' id="chqris1b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorq1b id='colorq1b' value="#00ff00" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chp1b">-PWR1<input type=checkbox onchange='reoutcanvas("cano2");' id="chpris1b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorp1b id='colorp1b' value="#0000ff" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'>
 <hr>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chi2b">-I2&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2")' id="chiris2b">mark point&nbsp;&nbsp;
 color:<input type=text name=colori2b id='colori2b' value="#9f0000" style='width:70px;height:10px;' onchange='reoutcanvas("cano2")'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chq2b">-Q2&nbsp;&nbsp;<input type=checkbox onchange='reoutcanvas("cano2")' id="chqris2b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorq2b id='colorq2b' value="#009f00" style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'><br>
 <input type=checkbox onchange='reoutcanvas("cano2");' id="chp2b">-PWR2<input type=checkbox onchange='reoutcanvas("cano2");' id="chpris2b">mark point&nbsp;&nbsp;
 color:<input type=text name=colorp2b id='colorp2b' value="#00009f  " style='width:70px;height:10px;' onchange='reoutcanvas("cano2");'>
 <hr>
 <input type=text name=zoomy2 id='zoomybox2' value="1" style='width:40px;' onchange="synhro('zoomybox2','zoomyslider2');reoutcanvas('cano1');">
 <input id='zoomyslider2' type="range" min=".05" max="20" step=".05" value="1" onchange="synhro('zoomyslider2','zoomybox2');reoutcanvas('cano2');" name="zoomyslider2" style='topmargin:15;'>
 Zoom Y <br>
 <input type=text name=zerolevel2 id='zerolevel2' value="150" style='width:40px;' onchange="synhro('zerolevel2','zeroslider2');reoutcanvas('cano2')">
 <input id='zeroslider2' type="range" min="1" max="300" step="1" value="150" onchange="synhro('zeroslider2','zerolevel2');reoutcanvas('cano2');" name="zerolider2" style='topmargin:15;'>
 Zero<br>
 SamleRate:<input type=text name=sr2 id='sr2' value="5000" style='width:50px;' onchange='reoutcanvas("cano2")'>KHz 
 <br>Grid time:<br>
 <font size="-2">
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs12"><label for="tgs12">1sec</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs22"><label for="tgs22">1/10</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs32"><label for="tgs32">1/100</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs42"><label for="tgs42">1mili</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs52"><label for="tgs52">1/10m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs62"><label for="tgs52">1/100m</label>
  <input type=checkbox onchange='reoutcanvas("cano2")' id="tgs72"><label for="tgs72">1micro</label>
 </font>
</div>
<canvas id="cano1" width="1000" height="300" class="zzpoint"></canvas> 
<canvas id="cano2" width="1000" height="300" class="zzpoint2"></canvas> 
</body>
</html>

