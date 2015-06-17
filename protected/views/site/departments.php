<center> <h1> Отделения нашей клиники </h1> </center>

<h4>

<div> <li> <a href="#open2" onclick="show('hidden_2',200,3)">Педиатрия</a> </li> </div> 
<div id=hidden_2 style="display:none;height:200px;width:350px;background-color:#f0f0f0">
ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ.
</div>

<br />

<div> <li> <a href="#open5" onclick="show('hidden_5',200,3)">Хирургия</a> </li> </div> 
<div id=hidden_5 style="display:none;height:200px;width:350px;background-color:#f0f0f0">
ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ.
</div>

<br />

<div> <li> <a href="#open6" onclick="show('hidden_6',200,3)">Стоматология</a> </li> </div> 
<div id=hidden_6 style="display:none;height:200px;width:350px;background-color:#f0f0f0">
ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ.
</div>

<br />

<div> <li> <a href="#open7" onclick="show('hidden_7',200,3)">Неврология</a> </li> </div> 
<div id=hidden_7 style="display:none;height:200px;width:350px;background-color:#f0f0f0">
ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ.
</div>

<br />

<div> <li> <a href="#open8" onclick="show('hidden_8',200,3)">Травматология</a> </li> </div> 
<div id=hidden_8 style="display:none;height:200px;width:350px;background-color:#f0f0f0">
ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ. ОПИСАНИЕ ОТДЕЛЕНИЯ.
</div>

</h4>

 <script language="JavaScript" type="text/javascript">
 /*<![CDATA[*/
 var s=[],s_timer=[];
 function show(id,h,spd)
 { s[id]= s[id]==spd? -spd : spd;
 s_timer[id]=setTimeout(function() {
 var obj=document.getElementById(id);
 if(obj.offsetHeight+s[id]>=h){obj.style.height=h+"px";obj.style.overflow="auto";}
 else if(obj.offsetHeight+s[id]<=0){obj.style.height=0+"px";obj.style.display="none";}
 else {obj.style.height=(obj.offsetHeight+s[id])+"px";
 obj.style.overflow="hidden";
 obj.style.display="block";
 setTimeout(arguments.callee, 10);
 }
 }, 10);
 }
 /*]]>*/
 </script>