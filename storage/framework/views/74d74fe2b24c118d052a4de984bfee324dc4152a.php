<style type="text/css">
    .scrollToTop {
      position: fixed;
      top: 90%;
      right: 10px;
      block-size: 40px;
      inline-size: 40px;
      background-color: #234a66;
      border-radius: 50%;
      justify-content: center;
      align-items: center;
      display: none; 
    }
    .scrollToTop span{
        color: white;
    }
</style>
 <div class="scrollToTop">
  <span class="arrow" style="cursor: pointer;">&uarr;</span>
</div>
<script type="text/javascript">
    const scrollToTop = document.querySelector(".scrollToTop");
    const $rootElement = document.documentElement;
    const $body = document.body;

    window.onscroll = () => {
      if (window.scrollY > 500) {
        scrollToTop.style.display = "flex";
      } else {
        scrollToTop.style.display = "none";
      }
    };

    scrollToTop.onclick = () => {
      // $rootElement.scrollTop = $body.scrollTop = 0;
      window.scrollTo({top: 0, behavior: 'smooth'});
    };
</script><?php /**PATH E:\xampp7428\htdocs\phongkham\resources\views/frontend/panels/scrolltop.blade.php ENDPATH**/ ?>