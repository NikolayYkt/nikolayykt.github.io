function Acordion(text,str){
     document.write('<div class="accordion-item"><h2 class="accordion-header" id="flush-heading'+str+'"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'+str+'" aria-expanded="false" aria-controls="flush-collapse'+str+'">'+text+'</button></h2><div id="flush-collapse'+str+'" class="accordion-collapse collapse" aria-labelledby="flush-heading'+str+'" data-bs-parent="#accordionFlushExample"><div class="accordion-body">');
}
strA='|c00ff0303Сила|r';
str='|c000042ffСила|r';
agiA='|n|c00ff0303Ловкость|r';
agi='|n|c000042ffЛовкость|r';
int='|n|c000042ffИнтеллект|r';
intA='|n|c00ff0303Интеллект|r';

function Text01(a,b,c,n,d,p,s,v,k,r,o){
   let i=0,id = [];
   id=[
   '<p>'+a+'</p>',  
   '<p>Art=ReplaceableTextures\\CommandButtons\\'+b+'</p>',
   '<p>Attachmentanimprops='+c+'</p>',
   '<p>Awakentip=Bocкpecить: '+n+'</p>',
   '<p>Buttonpos='+p+'</p>',
   '<p>Name='+d+'</p>',
   '<p>Propernames='+n+'</p>',
   '<p>Revivetip=Bocкpecить: '+n+'</p>',
   '<p>ScoreScreenIcon=ReplaceableTextures\\CommandButtons\\'+b+'</p>',
   '<p>Specialart=Objects\\Spawnmodels\\Human\\HumanLargeDeathExplode\\HumanLargeDeathExplode.mdl</p>',
   '<p>Tip='+n+'</p>',
   '<p>Ubertip="'+o+'|n|nCкopocть пepeдвижeния: '+s+'|nДaльнocть aтaки: '+v+'|nРоль в игре: '+r+'|n|nЗаклинания: |n'+k+'"</p>'
   ];
    while(i < 12){
    document.write(id[i]);
    i++;
    }   
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

function TextNew09(a,b,c,d,f,g,h,j,k,l,o,a1,a2,a3,a4,av,ob,oc,od1,od2,od,or,op,co,co1,co2,co3,co4,mp,bo,bb,bc){
  let i = 0,id=[],s='',z='',ss='',sd='',sa='|n|cff99ccffПерезарядка:|r';vi='секунд';
    if (bo){s='|n|c00ff0303',z='|r';}else{oc='';}
    if (bb){ss='|n|cff99ccff';}else{or='';}
    if (bc){sd='|n|cff99ccff';}else{op='';}
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
    '<p>Ubertip="'+o+' '+a1+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+' '+sa+' '+co1+' '+vi+'","'+o+' '+a2+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+' |n|cff99ccffПерезарядка:|r '+co2+' секунд","'+o+' '+a3+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+' |n|cff99ccffПерезарядка:|r '+co3+' секунд","'+o+' '+a4+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+' |n|cff99ccffПерезарядка:|r '+co4+' секунд"</p>'
  ];
  while(i < 15){
  document.write(id[i]);
  i++;
    }
    document.write('<br>');
}

function TextNew10(a,b,c,d,f,g,h,j,k,l,o,a1,a2,a3,a4,av,ob,oc,od1,od2,od,or,op,da,da1,da2,da3,da4,st,st1,st2,st3,st4,za,za1,za2,za3,za4,co,co1,co2,co3,co4,mp,bo,bb,bc,bi,bu,ba,pe,bm){
  let i = 0,id=[],s='',z='',ss='',sd='',sa='';vi='';dac='';sta='';zac='';sve='';svm='';toc='.';
    if (bo){s='|n|c00838B8B',z='|r';}else{oc='';}
    if (bb){ss='|n|cff99ccff';}else{or='';}
    if (bc){sd='|n|cff99ccff';}else{op='';}
    if (bi){dac='|n|cff99ccff';}else{dac='';da='';da1='';da2='';da3='';da4='';}
    if (bu){sta='|n|cff99ccff';}else{sta='';st='';st1='';st2='';st3='';st4='';}
    if (ba){zac='|n|cff99ccff';}else{zac='';za='';za1='';za2='';za3='';za4='';}
    if (pe){sa='|n|cff99ccffПерезарядка:|r ';vi=' секунды';sve='|n|n|cff99ccff'}else{sve='|n';sa='';vi='';co='';co1='';co2='';co3='';co4='';}
    if (bm){svm='|n|cff99ccff';}else{svm='';mp='';}
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
    '<p>Researchubertip="'+l+' |n|n|cffffcc00Уpoвeнь 1|r - '+a1+' '+av+toc+'|n|cffffcc00Уpoвeнь 2|r - '+a2+' '+av+toc+'|n|cffffcc00Уpoвeнь 3|r - '+a3+' '+av+toc+'|n|cffffcc00Уpoвeнь 4|r - '+a4+' '+av+toc+sve+co+' '+vi+svm+mp+'"</p>',
    '<p>Tip='+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 1|r],'+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 2|r],'+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 3|r],'+j+' [|cffffcc00'+g+'|r] - [|cffffcc00Уpoвeнь 4|r]</p>',
    '<p>Ubertip="'+o+' '+a1+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+' '+dac+da+da1+sta+st+st1+zac+za+za1+sa+co1+vi+'","'+o+' '+a2+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+dac+da+da2+sta+st+st2+zac+za+za2+sa+co2+vi+'","'+o+' '+a3+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+dac+da+da3+sta+st+st3+zac+za+za3+sa+co3+vi+'","'+o+' '+a4+' '+av+''+ob+' ' +s+oc+z+'|n|n|cff99ccff'+od1+'|n|cff99ccff'+od2+'|n|cff99ccff'+od+' '+ss+''+or+' '+sd+op+dac+da+da4+sta+st+st4+zac+za+za4+sa+co4+vi+'"</p>'
  ];
  while(i < 15){
  document.write(id[i]);
  i++;
    }
    document.write('<br>');
}