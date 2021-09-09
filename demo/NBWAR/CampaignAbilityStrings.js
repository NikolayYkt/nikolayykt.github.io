function Text01(){
      let res = '|n|n|cffffcc00Уpoвeнь 1|r - 100 урона. |n|cffffcc00Уpoвeнь 2|r - 200 урона.|n|cffffcc00Уpoвeнь 3|r - 300 урона.|n|cffffcc00Уpoвeнь 4|r - 400 урона.';   
      document.write(res);
}
function Text02(){
      let res = '|n|n|cffffcc00Уpoвeнь 1|r - 70 урона. |n|cffffcc00Уpoвeнь 2|r - 140 урона. |n|cffffcc00Уpoвeнь 3|r - 210 урона. |n|cffffcc00Уpoвeнь 4|r - 280 урона.';   
      document.write(res);
}
function Text03(){
     let res = '|n|c00ff0303Прерываема.|r |n|n|cff99ccffТип урона:|r чистый |n|cff99ccffРадиус действия:|r 1200  |n|cff99ccffОбласть воздействия:|r 1000|n|cff99ccffПерезарядка:|r 15 секунд';
     document.write(res);
}
function Text04(text){
     document.write('<div class="accordion-item"><h2 class="accordion-header" id="flush-headingOne"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">'+text+'</button></h2><div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"><div class="accordion-body">');
}
function Text05(){
    document.write('|n|n|cff99ccffТип урона:|r чистый |n|cff99ccffРадиус действия:|r 1000 |n|cff99ccffОбласть воздействия:|r 300|n|cff99ccffПерезарядка:|r 10 секунд');
}
function Text06(boolean,type,radius,area,cool){
	let a,b,c,d,f;
	if (boolean) {a = ' |n|c00ff0303Прерываема.|r';}else{ a = '';} 
	if (type == 1) {b = 'магический';} 
	else if (type == 2) {b = 'физический';} 
	else if (type == 3) {b = 'чистый';}
	c = String(radius);
	d = String(area);
	f = String(cool);
    document.write(a+'|n|n|cff99ccffТип урона:|r '+b+'|n|cff99ccffРадиус действия:|r '+c+'|n|cff99ccffОбласть воздействия:|r '+d+'|n|cff99ccffПерезарядка:|r '+f+' секунд');
}
function Text07(boolean,type,area,cool){
	let a,b,d,f;
	if (boolean) {a = ' |n|c00ff0303Прерываема.|r';}else{ a = '';} 
	if (type == 1) {b = 'магический';} 
	else if (type == 2) {b = 'физический';} 
	else if (type == 3) {b = 'чистый';}
	d = String(area);
	f = String(cool);
    document.write(a+'|n|n|cff99ccffТип урона:|r '+b+'|n|cff99ccffОбласть воздействия:|r '+d+'|n|cff99ccffПерезарядка:|r '+f+' секунд');
}