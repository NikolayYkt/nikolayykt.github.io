function Data02() {
Acordion("Хатаке Какаши","Kakashi");
damage=['100','200','300','400'];
duration=['4 секунды','4 секунды','4 секунды','4 секунды'];
second=['15 секунды','15 секунды','15 секунды','15 секунды'];  
TextNew11(//Райкири
'[AVU6]','spell,three',
'1,2','1,0',
'BTNManaFlare.blp',
'W','origin',
'Райкири','rainoffire',
'Какаши устремляется к указанной точке, нанося серьезный урон всем врагам на своём пути.',
'Какаши устремляется к указанной точке, нанося серьезный урон всем врагам на своём пути.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: направленная на точку|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Тип урона:|r магический',
'Задержка:|r 0.35 секунды',
'Дистанция прохождения:|r 1000',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность замедления:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность жизни клона:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 15',15,15,15,15,
'Tpeбуeт мaны:|r 100',
false,//прерываемо
true,//дальность 
true,//радиус
true,//урон
false,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['60','120','180','240'];
duration=['4 секунды','4 секунды','4 секунды','4 секунды'];
second=['15 секунды','15 секунды','15 секунды','15 секунды'];  
TextNew11(//Теневой Клон из Молнии
'[A21E]','',
'2,2','2,0',
'BTNMonsoon.blp',
'E','origin',
'Теневой Клон из Молнии','channel',
'Kaкaши coздaёт клoнa из элeктричecтвa, принимавшего облик героя. При получения урона, клон взрывается и наносит противникам урон, тaкжe снижaeт иx cкopocть пepeдвижeния и aтaки нa короткое время.',
'Kaкaши coздaёт клoнa из элeктричecтвa, принимавшего облик героя. При получения урона, клон взрывается и наносит противникам урон, тaкжe снижaeт иx cкopocть пepeдвижeния и aтaки нa короткое время.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bда|r',
'Тип урона:|r магический',
'Задержка:|r 0.35 секунды',
'300',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность замедления:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность жизни клона:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 20',20,20,20,20,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
false,//дальность 
true,//радиус
true,//урон
true,//оглушение
true,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['20','40','60','80'];
duration=['150','200','250','300'];
second=['7','10','13','16'];
TextNew11(//Сусаноо
'[A1W8]','stand',
'3,2','3,0',
'BTNUnholyAura.blp',
'R','origin',
'Сусаноо','metamorphosis',
'Какаши призывает Сусаноо. Получает бонус к урону и дополнительное здоровье.',
'Какаши призывает Сусаноо. Получает бонус к урону и дополнительное здоровье.',''+damage[0]+' урона, '+duration[0]+'',''+damage[1]+' урона, '+duration[1]+'',''+damage[2]+' урона, '+duration[2]+'',''+damage[3]+' урона, '+duration[3]+'','здоровья',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bда|r',
'Тип урона:|r чистый',
'Задержка:|r 1.5 секунды',
'Время действия:|r 70 секунды',
'Радиус:|r 1400',
'Доп. урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Доп. здоровье:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 70',70,70,70,70,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
true,//дальность 
false,//радиус
true,//урон
true,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
damage=['150','300','450','600'];
duration=['150','200','250','300'];
second=['7','10','13','16'];
TextNew11(//Камуй Сюрикэн
'[AVU7]','attack',
'3,2','3,0',
'BTNImprovedUnholyArmor.blp',
'R','origin',
'Камуй Сюрикэн','controlmagic',
'Создает массивный сюрикэн и бросает его на врагов.',
'Создает массивный сюрикэн и бросает его на врагов.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: направленная на точку|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: |c0000FF00да|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Тип урона:|r чистый',
'Задержка:|r 1.5 секунды',
'Дальность применения:|r 1400',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Доп. здоровье:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 5',5,5,5,5,
'Tpeбуeт мaны:|r 60/70/80/90',
false,//прерываемо
true,//дальность 
true,//радиус
true,//урон
false,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
document.write('</div></div></div>');
Acordion("Хьюго Ханаби","Hanabi");
damage=['70','140','210','280'];
duration=['300','300','300','300'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Хакке Кушо
'[A0O6]','attack',
'1,2','1,0',
'BTNFanOfKnives.blp',
'W','origin',
'Хакке Кушо','flamestrike',
'Ханаби создаёт ветровые волны, которые наносят урон всем врагам, оказавшимся у них на пути.',
'Ханаби создаёт ветровые волны, которые наносят урон всем врагам, оказавшимся у них на пути.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: направленная на точку|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии:|r |c0000FF00да|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Тип урона:|r физический',
'Задержка:|r 0.5 секунды',
'Дальность применения:|r 1200',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Радиус:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 10',10,10,10,10,
'Tpeбуeт мaны:|r 70/80/90/100',
false,//прерываемо
true,//дальность 
true,//радиус
true,//урон
false,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
false,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['100','200','300','400'];
duration=['1.5 секунды','2 секунды','2.5 секунды','3 секунды'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Хаккещоо Кайтэн
'[A0O7]','',
'2,2','2,0',
'BTNDispelMagic.blp',
'E','origin',
'Хаккещоо Кайтэн','whirlwind',
'Ханаби вращается так быстро, что все физические атаки противников отталкиваются назад на пару метров.',
'Ханаби вращается так быстро, что все физические атаки противников отталкиваются назад на пару метров.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии:|r |c0000FF00да|r',
'Можно развеять: да|r',
'Тип урона:|r физический',
'Задержка:|r 0.5 секунды',
'Дальность применения:|r 1200',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность оглушения:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 9/8/7/6',9,8,7,6,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
false,//дальность 
true,//радиус
true,//урон
true,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['20','40','60','80'];
duration=['64','84','104','124'];
second=['7','10','13','16'];
TextNew11(//Двойной Кулак Тигра
'[A0O5]','Morph',
'3,2','3,0',
'BTNManaBurn.blp',
'R','origin',
'Двойной Кулак Тигра','berserk',
'Ханаби использует cтиль мягкой руки: двойной кулак тигра. Получает бонус к урону и дополнительную способность сжигать ману за атаку.',
'Ханаби использует cтиль мягкой руки: двойной кулак тигра. Получает бонус к урону и дополнительную способность сжигать ману за атаку.',''+damage[0]+' урона, сжигание маны: '+duration[0]+'',''+damage[1]+' урона, сжигание маны: '+duration[1]+'',''+damage[2]+' урона, сжигание маны: '+duration[2]+'',''+damage[3]+' урона, сжигание маны: '+duration[3]+'','',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bда|r',
'Тип урона:|r чистый',
'Задержка:|r 0.35 секунды',
'Время действия:|r 25 секунды',
'Радиус:|r 1400',
'Доп. урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Cжигание маны:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 50',50,50,50,50,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
true,//дальность 
false,//радиус
true,//урон
true,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
document.write('</div></div></div>');
Acordion("Куросаки Ичиго","Ichigo");
damage=['75','150','225','300'];
duration=['1000','1000','1000','1000'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Гетсуга Теншоу
'[A0YM]','attack',
'0,2','0,0',
'BTNMoonStone.blp',
'Q','origin',
'Гетсуга Теншоу','flamestrike',
'Духовная энергия, наносящая урон всем врагам, оказавшимся у нее на пути.',
'Духовная энергия, наносящая урон всем врагам, оказавшимся у нее на пути.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: направленная на точку|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: |c0000FF00да|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Тип урона:|r чистый',
'Задержка:|r 0.5 секунды',
'Дистанция прохождения:|r 1400',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность оглушения:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 13/12/11/10',13,12,11,10,
'Tpeбуeт мaны:|r 70/80/90/100',
false,//прерываемо
true,//дальность 
true,//радиус
true,//урон
false,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['20','40','60','80'];
duration=['150','200','250','300'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Банкай
'[A03Q]','Morph',
'3,2','3,0',
'BTNUnholyAura.blp',
'R','origin',
'Банкай','metamorphosis',
'Ичиго высвобождает силу духовного меча. Получает бонус к урону и дополнительное здоровье.',
'Ичиго высвобождает силу духовного меча. Получает бонус к урону и дополнительное здоровье.',''+damage[0]+' урона, '+duration[0]+'',''+damage[1]+' урона, '+duration[1]+'',''+damage[2]+' урона, '+duration[2]+'',''+damage[3]+' урона, '+duration[3]+'','здоровья',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет',
'Можно развеять:|r |c00838B8Bда|r',
'Тип урона:|r чистый',
'Задержка:|r 1.5 секунды',
'Время действия:|r 70 секунды',
'Радиус:|r 1400',
'Доп. урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Доп. здоровье:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 70',70,70,70,70,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
true,//дальность 
false,//радиус
true,//урон
true,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
damage=['100%','150%','200%','250%'];
duration=['10%','10%','10%','10%'];
second=['15 секунды','15 секунды','15 секунды','15 секунды'];
TextNew11(//Рейрёку
'[A0PL]','',
'1,2','1,0',
'BTNThorns.blp',
'W','origin',
'Рейрёку','berserk',
'Герой получает бонус доп.скорости передвижения. При атаке герой получает 15% шанс нанести врагу критический урон.',
'Герой получает бонус доп.скорости передвижения. При атаке герой получает 15% шанс нанести врагу критический урон.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Время действия:|r 15 сек.',
'Задержка:|r 0.5 секунды',
'Дистанция прохождения:|r 1400',
'Радиус:|r 300',
'Критический урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Доп.скорость передвижения:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 42',42,42,42,42,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
false,//дальность 
false,//радиус
true,//урон
true,//оглушение
true,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
false,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
damage=['2','3','4','5'];
duration=['2 секунды','3 секунды','4 секунды','5 секунды'];
second=['100','200','300','400'];
TextNew11(//Реяцу
'[ADU6]','attack',
'3,2','3,0',
'BTNArcaniteMelee.blp',
'R','origin',
'Реяцу','thunderbolt',
'Ичиго бьет одного врага в течении нескольких секунд. Во время действия заклинания герой получает дополнительную скорость атаки.',
'Ичиго бьет одного врага в течении нескольких секунд. Во время действия заклинания герой получает дополнительную скорость атаки.',damage[0],damage[1],damage[2],damage[3],'секунды',
'Прерываема.',
'Тип: направленная на юнита|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bсильным развеиванием|r',
'Тип урона:|r физический',
'Задержка:|r 1 секунда',
'Дальность применения:|r 100',
'Радиус:|r 600',
'Урон в секунду:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность оглушения:|r ',duration[0],duration[1],duration[2],duration[3],
'Доп. скорость атаки:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 10',10,10,10,10,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
true,//дальность 
true,//радиус
false,//урон
true,//оглушение
true,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['400','600','800','1000'];
duration=['1,5 секунды','2 секунды','2,5 секунды','3 секунды'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Шунпо
'[A03P]','stand',
'2,2','2,0',
'BTNBlink.blp',
'E','origin',
'Шунпо','blink',
'Перемещение нa кopoткoe paccтoяниe, пoзвoляющее мгнoвeннo пpиблизитьcя к пpoтивнику или выйти из бoя.',
'Перемещение нa кopoткoe paccтoяниe, пoзвoляющее мгнoвeннo пpиблизитьcя к пpoтивнику или выйти из бoя.',damage[0],damage[1],damage[2],damage[3],'дaльнocть',
'Прерываема.',
'Тип: направленная на точку|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Минимальная область:|r 200',
'Задержка:|r 0.5 секунды',
'Дистанция прохождения:|r 1000',
'Радиус:|r 1000',
'Макс. дальность телепортации:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность оглушения:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 13/11/9/7',13,11,9,7,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
false,//дальность 
false,//радиус
true,//урон
false,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
false,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
//Areaeffectart=e_!Shunpo!.mdx
document.write('</div></div></div>');
Acordion("Белый Ичиго","White");
damage=['80','160','240','320'];
duration=['1,5 секунды','2 секунды','2,5 секунды','3 секунды'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Гетсуга Теншоу
'[AVU1]','attack',
'0,2','0,0',
'BTNMoonStone.blp',
'Q','origin',
'Гетсуга Теншоу','flamestrike',
'Духовная энергия, наносящая урон всем врагам, оказавшимся у нее на пути.',
'Духовная энергия, наносящая урон всем врагам, оказавшимся у нее на пути.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: направленная на точку|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: |c0000FF00да|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Тип урона:|r чистый',
'Задержка:|r 0.5 секунды',
'Дистанция прохождения:|r 1400',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность оглушения:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 12',12,12,12,12,
'Tpeбуeт мaны:|r 70/80/90/100',
false,//прерываемо
true,//дальность 
true,//радиус
true,//урон
false,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['120','90','60','30'];
duration=['75%','75%','75%','75%'];
second=['5 секунды','5 секунды','5 секунды','5 секунды'];
TextNew11(//Бессмертие
'[A01Y]','',
'3,2','3,0',
'BTNBanish.blp',
'R','origin',
'Бессмертие','',
'После смерти тело героя вновь собирается воедино, и он воскрешается на поле боя. Возвращает к жизни с полным запасом здоровья и маны.',
'После смерти тело героя вновь собирается воедино, и он воскрешается на поле боя. Герой не возродится, если у него недостаточно маны. Возвращает к жизни с полным запасом здоровья и маны.',damage[0],damage[1],damage[2],damage[3],'сек. перезарядка',
'Прерываема.',
'Тип: пассивная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: |c0000FF00да|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Время действия замедления:|r 5 секунд',
'Время перерождения:|r 3 секунды',
'Дистанция прохождения:|r 1400',
'Радиус замедления:|r 900',
'Замедление скорости атаки:|r ',75,75,75,75,
'Замедление скорости передвижения:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 120/90/60/30',120,90,60,30,
'Tpeбуeт мaны:|r 160',
false,//прерываемо
false,//дальность 
true,//радиус
true,//урон
true,//оглушение
true,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
document.write('</div></div></div>');
Acordion("Чад","Chad");
damage=['75','150','225','300'];
duration=['5 секунды','5 секунды','5 секунды','5 секунды'];
second=['100','200','300','400'];
TextNew11(//Эль Директо
'[A15S]','attack',
'0,2','0,0',
'BTNImmolationOff.blp',
'Q','origin',
'Эль Директо','flamestrike',
'Духовная энергия, наносящая урон всем врагам, оказавшимся у нее на пути.',
'Духовная энергия, наносящая урон всем врагам, оказавшимся у нее на пути.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: направленная на точку|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: |c0000FF00да|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Тип урона:|r физический',
'Задержка:|r 0.5 секунды',
'Дистанция прохождения:|r 1200',
'Радиус:|r 300',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Время действия:|r ',duration[0],duration[1],duration[2],duration[3],
'Замедление:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 15/14/13/12',15,14,13,12,
'Tpeбуeт мaны:|r 70/80/90/100',
false,//прерываемо
true,//дальность 
true,//радиус
true,//урон
false,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['95','190','285','380'];
duration=['0.5 секунды','0.5 секунды','0.5 секунды','0.5 секунды'];
second=['100','200','300','400'];
TextNew11(//Быстрый Удар
'[A15V]','attack',
'1,2','1,0',
'BTNGolemThunderclap.blp',
'W','origin',
'Быстрый Удар','thunderbolt',
'Чад цепляется за врага и быстро летит вместе с врагом вперёд на короткое расстояние и наносит ему урон.',
'Чад цепляется за врага и быстро летит вместе с врагом вперёд на короткое расстояние и наносит ему урон.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: направленная на юнита|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: нет|r',
'Можно развеять:|r |c00838B8Bсильным развеиванием|r',
'Тип урона:|r физический',
'Задержка:|r 0.5 секунды',
'Дальность применения:|r 100',
'Радиус:|r 800',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность оглушения:|r ',duration[0],duration[1],duration[2],duration[3],
'Замедление:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 13/12/11/10',13,12,11,10,
'Tpeбуeт мaны:|r 100',
false,//прерываемо
true,//дальность 
true,//радиус
true,//урон
true,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['60','120','180','240'];
duration=['1 секунда','1 секунда','1 секунда','1 секунда'];
second=['100','200','300','400'];
TextNew11(//Мощный Удар
'[A0R5]','spell,slam',
'2,2','2,0',
'BTNEarthquake.blp',
'E','origin',
'Мощный Удар','stomp',
'Чад бьёт кулаком перед собой по земле, оглушая ближайщих врагов и нанося им урон.',
'Чад бьёт кулаком перед собой по земле, оглушая ближайщих врагов и нанося им урон.',damage[0],damage[1],damage[2],damage[3],'урона',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: врагов|r',
'Cквозь невосприимчивость к магии: |c0000FF00да|r',
'Можно развеять:|r |c00838B8Bнет|r',
'Тип урона:|r физический',
'Задержка:|r 0.5 секунды',
'Дистанция прохождения:|r 1200',
'Радиус:|r 1000',
'Урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Длительность оглушения:|r ',duration[0],duration[1],duration[2],duration[3],
'Замедление:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 15',15,15,15,15,
'Tpeбуeт мaны:|r 100',
false,//прерываемо
false,//дальность 
true,//радиус
true,//урон
true,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
false,//задержка
true,//можно развеять
true,//тип урона
true,//Cквозь невосприимчивость к магии
);
damage=['20','40','60','80'];
duration=['100','150','200','250'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Бразо Изкерда
'[A15J]','Morph',
'3,2','3,0',
'BTNUnholyAura.blp',
'R','origin',
'Бразо Изкерда','metamorphosis',
'Чад покрывает всю свою левую руку так же, как и правую. Получает бонус к урону и дополнительное здоровье.',
'Чад покрывает всю свою левую руку так же, как и правую. Получает бонус к урону и дополнительное здоровье.',''+damage[0]+' урона, '+duration[0]+'',''+damage[1]+' урона, '+duration[1]+'',''+damage[2]+' урона, '+duration[2]+'',''+damage[3]+' урона, '+duration[3]+'','здоровья',
'Прерываема.',
'Тип: ненаправленная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет',
'Можно развеять:|r |c00838B8Bда|r',
'Тип урона:|r чистый',
'Задержка:|r 1.5 секунды',
'Время действия:|r 60 секунды',
'Радиус:|r 1400',
'Доп. урон:|r ',damage[0],damage[1],damage[2],damage[3],
'Доп. здоровье:|r ',duration[0],duration[1],duration[2],duration[3],
'Длительность замедления:|r ',second[0],second[1],second[2],second[3],
'Перезарядка:|r 60',60,60,60,60,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
true,//дальность 
false,//радиус
true,//урон
true,//оглушение
false,//замедление
true,//перезарядка
true,//требует маны
true,//задержка
true,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
damage=['20','30','40','50'];
duration=['100%','100%','100%','100%'];
second=['2 секунды','3 секунды','4 секунды','5 секунды'];
TextNew11(//Броня
'[AD36]','',
'3,2','3,0',
'PASBTNDevotion.blp',
'R','origin',
'Броня','',
'Чад сoздaeт нeпpoбивaeмую бpoню, кoтopая блокирует часть физического урона.',
'Чад сoздaeт нeпpoбивaeмую бpoню, кoтopая блокирует часть физического урона.',damage[0],damage[1],damage[2],damage[3],'',
'Прерываема.',
'Тип: пассивная|r',
'Действует на: себя|r',
'Cквозь невосприимчивость к магии: нет',
'Можно развеять:|r |c00838B8Bда|r',
'Блoкиpoвкa уpoнa нe cуммиpуeтcя c блoкиpoвкoй oт Stout Shield и Vanguard.',
'Задержка:|r 1.5 секунды',
'Время действия:|r 60 секунды',
'Радиус:|r 1400',
'Шанс срабатывания блокировки урона:|r ',duration[0],duration[1],duration[2],duration[3],
'Блок урона:|r ',damage[0],damage[1],damage[2],damage[3],
'Блoкиpoвкa уpoнa нe cуммиpуeтcя c блoкиpoвкoй oт Stout Shield и Vanguard.','','','','',
'Перезарядка:|r 60',60,60,60,60,
'Tpeбуeт мaны:|r 50',
false,//прерываемо
false,//дальность 
false,//радиус
true,//урон
true,//оглушение
true,//замедление
false,//перезарядка
false,//требует маны
false,//задержка
false,//можно развеять
false,//тип урона
false,//Cквозь невосприимчивость к магии
);
document.write('</div></div></div>');
}