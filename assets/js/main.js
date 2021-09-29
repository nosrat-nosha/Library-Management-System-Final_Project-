// Search bar expand
$(document).ready(function(){
  $(".headersearch").click(function(){
    $(".searchicon").toggleClass("active");
    $("input[type='text']").toggleClass("active");
  });
});




// JS For Sidebar Collapse

      document.addEventListener("DOMContentLoaded", function(){
    
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
          element.addEventListener('click', function (e) {
    
            let nextEl = element.nextElementSibling;
            let parentEl  = element.parentElement;	
    
            if(nextEl) {
              e.preventDefault();	
              let mycollapse = new bootstrap.Collapse(nextEl);
    
                if(nextEl.classList.contains('show')){
                  mycollapse.hide();
                } else {
                  mycollapse.show();
                  // find other submenus with class=show
                  var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                  // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
    
                }
              }
    
          });
        })
    
      }); 


// Fixed Top Header
      document.addEventListener("DOMContentLoaded", function(){
        window.addEventListener('scroll', function() {
            if (window.scrollY > 5) {
              document.getElementById('mainheader').classList.add('fixed-top');
              // add padding top to show content behind navbar
              navbar_height = document.querySelector('.topheader').offsetHeight;
              document.body.style.paddingTop = navbar_height + 'px';
            } else {
              document.getElementById('mainheader').classList.remove('fixed-top');
               // remove padding top from body
              document.body.style.paddingTop = '0';
            } 
        });
      }); 



// Change Profile Picture
      const fileSelect = document.getElementById("fileSelect"),
      fileElem = document.getElementById("fileElem");
    
    fileSelect.addEventListener("click", function (e) {
      if (fileElem) {
        fileElem.click();
      }
    }, false);


