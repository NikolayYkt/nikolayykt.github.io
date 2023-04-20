function contenb($esli,$url) {
		if($esli == 1){
	$bolt = 'Единицы измерения информации 1 байт = 8 бит — 23 байт 1 Кбайт (килобайт) = 1024 байта — 210 байт 1 Мбайт (мегабайт) = 1024 Кбайта — 210 Кбайт 1 Гбайт (гигабайт) = 1024 Мбайта — 210 Мбайт 1 Тбайт (терабайт) = 1024 Гбайта — 240 байта 1 Пбайт (петабайт) = 1024 Тбайта — 250 &hellip;';
    $bor = '1 задания ОГЭ по информатике';
}
		if($esli == 2){
	$bolt = 'Кодирование и декодирование информации&nbsp; От разведчика была получена следующая шифрованная радиограмма, переданная с использованием азбуки Морзе: –•–•–•––••–••–•–•• При передаче радиограммы было потеряно разбиение на буквы, но известно, что в радиограмме могли использоваться только следующие буквы: Н К И Л М –• –•– •• •–•• –– Расшифруйте радиограмму. Запишите в ответе расшифрованную радиограмму. Ответ: ННКНЛКИ. Уровень сложности &hellip;';
    $bor = '2 задания ОГЭ по информатике';
}
		if($esli == 3){
	$bolt = 'Значение логического выражения Результаты для операции&nbsp;НЕ&nbsp;(отрицание): НЕ(5 &gt; 0) НЕ(5 &gt;= 0) НЕ(5 &lt; 0) НЕ(5 &gt;= 0) НЕ(X чётное) НЕ(X нечётное) 5 &lt;= 0 5 &lt; 0 5 &gt;= 0 5 &lt; 0 X нечётное X чётное Порядок выполнения логических операций: 1 НЕ 2 выражение в скобках 3 И 4 ИЛИ Напишите наибольшее целое &hellip;';
    $bor = '3 задания ОГЭ по информатике';
}
		if($esli == 4){
	$bolt = 'Формальные описания реальных объектов и процессов Рисуем произвольный граф и находим ответ: Уровень сложности — базовый,Максимальный балл — 1,Примерное время выполнения — 3 минуты.';
    $bor = '4 задания ОГЭ по информатике';
}
		if($esli == 5){
	$bolt = 'Простой линейный алгоритм для формального исполнителя 1) У исполнителя Альфа две команды. которым присвоены номера: 1. Вычти&nbsp;b; 2. Умножь на 5. (b  — неизвестное натуральное число). Выполняя первую из них, Альфа уменьшает число на экране на&nbsp;b, а выполняя вторую, умножает это число на 5. Программа для исполнителя Альфа  — это последовательность номеров команд. Известно, что программа 21121 &hellip;';
    $bor = '5 задания ОГЭ по информатике';
}
		if($esli == 6){
	$bolt = 'Программа с условным оператором Ниже приведена программа, записанная на пяти языках программирования. Бейсик Python DIM s, t AS INTEGER INPUT s INPUT t IF s &gt; 8 OR t &gt; 8 THEN     PRINT ‘YES’ ELSE     PRINT ‘NO’ ENDIF s = int(input()) t = int(input()) if s &gt; 8 or t &gt; 8:     print(&#8216;YES&#8217;) else:     print(&#8216;NO&#8217;) &hellip;';
    $bor = '6 задания ОГЭ по информатике';
}
		if($esli == 7){
	$bolt = 'Информационно-коммуникационные технологии&nbsp; 1) Костя записал IP-адрес школьного сервера на листке бумаги и положил его в карман куртки. Костина мама случайно постирала куртку вместе с запиской. После стирки Костя обнаружил в кармане четыре обрывка с фрагментами IP-адреса. Эти фрагменты обозначены буквами А, Б, В и Г: .33 3.232 3.20 23 А Б В Г Восстановите IP-адрес. &hellip;';
    $bor = '7 задания ОГЭ по информатике';
}	
			document.write('<article class="post-84 post type-post status-publish format-standard hentry category-3 ast-grid-common-col ast-full-width ast-article-post" id="post-1" itemtype="https://schema.org/CreativeWork" itemscope="itemscope">');
		document.write('<div class="ast-post-format- ast-no-thumb blog-layout-1">');
	document.write('<div class="post-content ast-grid-common-col" >');
		document.write('<div class="ast-blog-featured-section post-thumb ast-grid-common-col ast-float"></div>		<header class="entry-header">');
			document.write('<h2 class="entry-title" itemprop="headline"><a href="'+$url+'" rel="bookmark">'+$bor+'</a></h2>			<div class="entry-meta">');

		document.write('</div>		</header><!-- .entry-header -->');
				document.write('<div class="entry-content clear" itemprop="text"		>');
			document.write('<p>'+$bolt+'</p>');
document.write('<p class="read-more"> <a class="" href="'+$url+'"> <span class="screen-reader-text">'+$bor+'</span> Читать далее &raquo;</a></p>');
		document.write('</div><!-- .entry-content .clear -->');
	document.write('</div><!-- .post-content -->');
document.write('</div> <!-- .blog-layout-1 -->');
	document.write('</article><!-- #post-## -->');
}