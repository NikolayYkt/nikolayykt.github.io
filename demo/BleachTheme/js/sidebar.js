function sidebar(){
	a = 'single.html';
	b = 'single-2.html';
	c = 'single-3.html';
	d = 'single-4.html';
	f = 'single-5.html';
     document.write(' <div class="blog-left-sidebar p-3 ">');

document.write('<aside id="secondary" class="widget-area">');
  document.write('<section id="block-8" class="widget widget_block">');
document.write('<div class="wp-block-columns">');
document.write('<div class="wp-block-column" style="flex-basis:100%">');
document.write('<div class="wp-block-group"><div class="wp-block-group__inner-container"><form role="search" method="get" action="" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search"><label for="wp-block-search__input-1" class="wp-block-search__label screen-reader-text">Поиск</label><div class="wp-block-search__inside-wrapper"><input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Искать.."  required /><button type="submit" class="wp-block-search__button ">Поиск</button></div></form></div></div>');
document.write('</div>');
document.write('</div>');
document.write('</section><section id="block-3" class="widget widget_block">');
document.write('<div class="wp-block-group"><div class="wp-block-group__inner-container">');
document.write('<h2>Свежие записи</h2>');


document.write('<ul class="wp-block-latest-posts__list wp-block-latest-posts"><li><a href="'+a+'">Привет мир!</a></li>');
document.write('<li><a href="'+b+'">Куросаки Ичиго</a></li>');
document.write('<li><a href="'+c+'">Рукиа Кучики</a></li>');
document.write('<li><a href="'+d+'">Урахара Киске</a></li>');
document.write('<li><a href="'+f+'">Ясутора Садо</a></li>');
document.write('</ul></div></div>');
document.write('</section><section id="block-4" class="widget widget_block">');
document.write('<div class="wp-block-group"><div class="wp-block-group__inner-container">');
document.write('<h2>Свежие комментарии</h2>');


document.write('<ol class="wp-block-latest-comments"><li class="wp-block-latest-comments__comment"><article><footer class="wp-block-latest-comments__comment-meta"><a class="wp-block-latest-comments__comment-author" href="">Kolyan</a> к <a class="wp-block-latest-comments__comment-link" href="">Привет мир!</a></footer></article></li><li class="wp-block-latest-comments__comment"><article><footer class="wp-block-latest-comments__comment-meta"><a class="wp-block-latest-comments__comment-author" href="">Kolyan</a> к <a class="wp-block-latest-comments__comment-link" href="">Привет мир!</a></footer></article></li></ol></div></div>');
document.write('</section><section id="block-5" class="widget widget_block">');
document.write('<div class="wp-block-group"><div class="wp-block-group__inner-container">');
document.write('<h2>Архивы</h2>');


document.write("<ul class='' wp-block-archives-list wp-block-archives'>  <li><a href='archive.html'>Сентябрь 2021</a></li>");
document.write('</ul></div></div>');
document.write('</section><section id="block-6" class="widget widget_block">');
document.write('<div class="wp-block-group"><div class="wp-block-group__inner-container">');
document.write('<h2>Рубрики</h2>');


document.write('<ul class="wp-block-categories-list wp-block-categories"> <li class="cat-item cat-item-1"><a href="category.html">Без рубрики</a>');
document.write('</li>');
 document.write(' <li class="cat-item cat-item-21"><a href="category-bleach.html">Рубрика Блич</a>');
document.write('</li>');
document.write('</ul></div></div>');
document.write('</section></aside><!-- #secondary -->');
         document.write('</div>');
}

function comments(){
	document.write('<div id="comments" class="border-top comments-area">');
	document.write('<div id="respond" class="comment-respond">');
	document.write('<h3 id="reply-title" class="comment-reply-title">Добавить комментарий <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Отменить ответ</a></small></h3><form action="" method="post" id="commentform" class="comment-form" novalidate=""><p class="comment-notes"><span id="email-notes">Ваш адрес email не будет опубликован.</span> Обязательные поля помечены <span class="required">*</span></p><p class="comment-form-comment"><label for="comment">Комментарий</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p><p class="comment-form-author"><label for="author">Имя <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" required="required"></p>');
document.write('<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required"></p>');
document.write('<p class="comment-form-url"><label for="url">Сайт</label> <input id="url" name="url" type="url" value="" size="30" maxlength="200"></p>');
document.write('<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label for="wp-comment-cookies-consent">Сохранить моё имя, email и адрес сайта в этом браузере для последующих моих комментариев.</label></p>');
document.write('<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Отправить комментарий"> <input type="hidden" name="comment_post_ID" value="153" id="comment_post_ID">');
document.write('<input type="hidden" name="comment_parent" id="comment_parent" value="0">');
document.write('</p></form>	</div><!-- #respond -->');
	
document.write('</div><!-- #comments -->');
}

function breadcrumb(a,b,c){
	d='category.html';
    document.write('<div class="page-breadcrumb d-flex align-items-center">');
		document.write('<h3 class="breadcrumb-title pe-3">'+a+'</h3>');
					document.write('<div class="ms-auto">');
		document.write('<nav aria-label="breadcrumb">');
		document.write('	<ol class="breadcrumb mb-0 p-0">');
			document.write('	<li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i> Главная</a>');
			document.write('	</li>');		
			if (c){d='category-bleach.html';}			
			document.write('	  <li class="breadcrumb-item"><a href=""></a><a href="'+d+'" rel="category tag">'+b+'</a></li>');		
               if (a != 'Без рубрики' && a != 'Рубрика Блич'){document.write('<li class="breadcrumb-item active">'+a+'');}	
			document.write('	</li>');
		document.write('	</ol>');
	document.write('	</nav>');
	document.write('</div>');
document.write('</div>');
}