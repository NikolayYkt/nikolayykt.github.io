function content(real){
  i='',j='',l='';
 document.write('<div class="page-content">');
document.write('<section class="py-4">');
document.write('<div class ="container">');
document.write('<div class="row">');
   document.write('<div class="col-12 col-lg-9">');
     document.write('<div class="blog-right-sidebar p-3">');
    content_post(real);
           document.write(' <hr><div class="bleach-pagination">');
           if (real == 2){l='index.html';}
           else if (real == 3){l='index-2.html';}
           else if (real == 4){l='index-3.html';}
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
           if (real != 4){document.write('<a class="next page-numbers" href="'+j+'">Далее &rarr;</a>');}
                  document.write('</div></div>');
   document.write(' </div>');
   document.write(' <div class="col-12 col-lg-3">');

    sidebar();

     document.write(' </div>');
  document.write('  </div><!--row-->');
 document.write(' </div><!--container-->');
document.write('</section>');
document.write('</div><!--page-content-->');
}