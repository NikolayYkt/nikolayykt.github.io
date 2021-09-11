function Acordion(text,str){
     document.write('<div class="accordion-item"><h2 class="accordion-header" id="flush-heading'+str+'"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'+str+'" aria-expanded="false" aria-controls="flush-collapse'+str+'">'+text+'</button></h2><div id="flush-collapse'+str+'" class="accordion-collapse collapse" aria-labelledby="flush-heading'+str+'" data-bs-parent="#accordionFlushExample"><div class="accordion-body">');
}

function Text09(a,b,c,d,f,g,h,j,k,l,o,a1,a2,a3,a4,av,ob,oc,od,or,op,co,co1,co2,co3,co4,mp,bo,bb){
	let i = 0,id=[],s='',z='',ss='',sd='',sa='|n|cff99ccffПерезарядка:|r';vi='секунд';
    if (bo){s='|n|c00ff0303',z='|r';}else{oc='';}
    if (bb){ss='|n|cff99ccffРадиус действия:|r';sd='|n|cff99ccffОбласть воздействия:|r';}else{or='';op='';}
	id=[
	'<p>'+a+'</p>',	
    '<p>Animnames='+b+'</p>',
    '<p>Buttonpos='+c+'</p>',
    '<p>Researchbuttonpos='+d+'</p>',    
    '<p>Art=ReplaceableTextures\\CommandButtons\\'+f,
    '<p>ResearchArt=ReplaceableTextures\\CommandButtons\\'+f,
    '<p>Hotkey='+g+'</p>',
    '<p>Researchhotkey='+g+'</p>',
    '<p>Casterattach='+h+'</p>',  
    '<p>Name='+j+'</p>',
    '<p>Order='+k+'</p>',
    '<p>Researchtip=Изyчить '+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь %d|r]</p>',
    '<p>Researchubertip="'+l+' |n|n|cffffcc00Уpoвeнь 1|r - '+a1+' '+av+'.|n|cffffcc00Уpoвeнь 2|r - '+a2+' '+av+'.|n|cffffcc00Уpoвeнь 3|r - '+a3+' '+av+'.|n|cffffcc00Уpoвeнь 4|r - '+a4+' '+av+'.|n|n|cff99ccffПерезарядка:|r '+co+' секунд |n|cff99ccff'+mp+'"</p>',
    '<p>Tip='+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 1|r],'+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 2|r],'+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 3|r],'+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 4|r]</p>',
    '<p>Ubertip="'+o+' '+a1+' '+av+''+ob+' ' +s+oc+z+' |n|n|cff99ccff'+od+' '+ss+' '+or+' '+sd+' '+op+' '+sa+' '+co1+' '+vi+'","'+o+' '+a2+' '+av+''+ob+' ' +s+oc+z+' |n|n|cff99ccff'+od+' '+ss+' '+or+' '+sd+' '+op+' |n|cff99ccffПерезарядка:|r '+co2+' секунд","'+o+' '+a3+' '+av+''+ob+' ' +s+oc+z+' |n|n|cff99ccff'+od+' '+ss+' '+or+' '+sd+' '+op+' |n|cff99ccffПерезарядка:|r '+co3+' секунд","'+o+' '+a4+' '+av+''+ob+' ' +s+oc+z+' |n|n|cff99ccff'+od+' '+ss+' '+or+' '+sd+' '+op+' |n|cff99ccffПерезарядка:|r '+co4+' секунд"</p>'
	];
	while(i < 15){
	document.write(id[i]);
	i++;
    }
    document.write('<br>');
}