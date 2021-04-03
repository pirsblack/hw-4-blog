function loading(el) {
              el.classList.add('is-loading');
         	}
 $('#short-article-loading').hover(function (){
              $('#short-article-loading').addClass('is-loading');
            }, function () {
              $('#short-article-loading').removeClass('is-loading');
            });
 $('#article-loading').hover(function (){
              $('#article-loading').addClass('is-loading');
            }, function () {
              $('#article-loading').removeClass('is-loading');
            });