document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
  });
    window.onload = function() {
    // 获取up1元素
    const upElement = document.querySelector('.up1');
  
    // 记录当前滚动位置
    let lastScrollPosition = 0;
  
    // 监听滚动事件
    window.addEventListener('scroll', function() {
        // 获取当前滚动位置
        let currentScrollPosition = window.pageYOffset;
  
        // 判断滚动方向
        if(currentScrollPosition > lastScrollPosition) {
            // 向下滚动
            upElement.style.display = 'none';
        } else {
            // 向上滚动
            upElement.style.display = 'block';
        }
  
        // 更新lastScrollPosition
        lastScrollPosition = currentScrollPosition;
    });
  
    // 点击upElement回到顶部
    upElement.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
  }