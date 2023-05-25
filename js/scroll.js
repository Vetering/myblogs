window.addEventListener('scroll', function () {
    var scrollTop = window.pageYOffset; /* 获取页面滚动高度 */
    var docHeight = document.body.offsetHeight;
    var winHeight = window.innerHeight;
    var scrollPercent = (scrollTop / (docHeight - winHeight)) * 100; /* 计算滚动百分比 */
    document.getElementById('progress').style.width = scrollPercent + '%'; /* 更新进度条宽度 */
});