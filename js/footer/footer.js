'use strict'

window.addEventListener('DOMContentLoaded', function(){
   var footer= document.querySelector('footer');
   var main= document.querySelector('main');
   var body = document.querySelector('body');


   if(body.scrollHeight > window.innerHeight) {
        main.style.paddingBottom = parseInt(footer.offsetHeight) + 'px';
       console.log('main'+main.style.paddingBottom);
   }
});