function content(real,boolean){
  i='',j='',l='';
 document.write('<div class="page-content">');
document.write('<section class="py-4">');
document.write('<div class ="container">');
document.write('<div class="row">');
   document.write('<div class="col-12 col-lg-9">');
     document.write('<div class="blog-right-sidebar p-3">');
    content_post(real);
           if (real != 8 && real != 9) {
           document.write(' <hr><div class="bleach-pagination">');
           if (real == 2){l='index.html';}
           else if (real == 3){l='index-2.html';}
           else if (real == 4){l='index-3.html';}
           else if (real == 6){l='category.html';}
           else if (real == 7){l='category-2.html';}
           if (real < 5) {
           if (real !=1){document.write('<a class="prev page-numbers" href="'+l+'">← Ранее</a>');}
           if (real == 1){j='index-2.html';i='<span aria-current="page" class="page-numbers current">1</span>';}
           else{i='<a class="page-numbers" href="index.html">1</a>';}
           document.write(i);
           if (real == 2){j='index-3.html';i='<span aria-current="page" class="page-numbers current">2</span>';}
           else{i='<a class="page-numbers" href="index-2.html">2</a>';}
           document.write(i);    
           if (real == 3){j='index-4.html';i='<span aria-current="page" class="page-numbers current">3</span>';}
           else{i='<a class="page-numbers" href="index-3.html">3</a>';}
           document.write(i);       
           if (real == 4){i='<span aria-current="page" class="page-numbers current">4</span>';}
           else{i='<a class="page-numbers" href="index-4.html">4</a>';}
           document.write(i);
           }
           if (real > 4) {
           if (real !=5){document.write('<a class="prev page-numbers" href="'+l+'">← Ранее</a>');}
           if (real == 5){j='category-2.html';i='<span aria-current="page" class="page-numbers current">1</span>';}
           else{i='<a class="page-numbers" href="category.html">1</a>';}
           document.write(i);     
           if (real == 6){j='category-3.html';i='<span aria-current="page" class="page-numbers current">2</span>';}
           else{i='<a class="page-numbers" href="category-2.html">2</a>';}
           document.write(i);     
           if (real == 7){j='category-4.html';i='<span aria-current="page" class="page-numbers current">3</span>';}
           else{i='<a class="page-numbers" href="category-3.html">3</a>';}
           document.write(i);                     
           }     
           if (boolean){document.write('<a class="next page-numbers" href="'+j+'">Далее &rarr;</a>');}
                  document.write('</div>');
                }
   document.write(' </div></div>');
   document.write(' <div class="col-12 col-lg-3">');

    sidebar();

     document.write(' </div>');
  document.write('  </div><!--row-->');
 document.write(' </div><!--container-->');
document.write('</section>');
document.write('</div><!--page-content-->');
}


function content_page(real,bb,str){
  a = '';
  if (real == 1){a = 'wp-content/uploads/2021/09/blich_16-1024x554.jpg';}
  else if (real == 3){a = 'wp-content/uploads/2021/09/blich_7-1024x554.jpg';}
  else if (real == 4){a = 'wp-content/uploads/2021/09/blich_5-1024x554.jpg';}
  else if (real == 5){a = 'wp-content/uploads/2021/09/blich_6-1024x554.jpg';}
  else if (real == 6){a = 'wp-content/uploads/2021/09/blich_6-1024x554.jpg';}  
document.write('<section class="py-4">');
  document.write('<div class="container">');
document.write('<article id="post-2" class="post-2 page type-page status-publish hentry">');
      document.write(' <header class="d-lg-none d-xl-block d-xl-none d-md-none d-lg-block">');
   document.write(' <h4 class="mt-4">'+str+'</h4> </header><!-- .entry-header -->');
 document.write(' <div class="entry-content"> ');
document.write('<p>Это пример страницы. От записей в блоге она отличается тем, что остаётся на одном месте и отображается в меню сайта (в большинстве тем). На странице «Детали» владельцы сайтов обычно рассказывают о себе потенциальным посетителям. Например, так:</p>');
document.write('<p>Привет! Днём я курьер, а вечером — подающий надежды актёр. Это мой блог. Я живу в Ростове-на-Дону, люблю своего пса Джека и пинаколаду. (И ещё попадать под дождь.)</p>');
document.write('<div class="wp-block-image"><figure class="aligncenter size-large is-resized">');
if (bb){document.write('<img loading="lazy" src="'+a+'" alt="" class="wp-image-116" width="550" height="297" sizes="(max-width: 550px) 100vw, 550px">');}
document.write('</figure></div><p>или так:</p>');
document.write('<p>Компания «Штучки XYZ» была основана в 1971 году и с тех пор производит качественные штучки. Компания находится в Готэм-сити, имеет штат из более чем 2000 сотрудников и приносит много пользы жителям Готэма.</p>');
document.write('<p>Перейдите&nbsp;<a href="#">в консоль</a>, чтобы удалить эту страницу и создать новые. Успехов!</p>');
 document.write(' </div><!-- .entry-content -->');
 document.write(' </article><!-- #post-2 -->');
 document.write(' </div>');
document.write('</section>');
}