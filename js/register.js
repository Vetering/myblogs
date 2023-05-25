    // 获取登录表单元素
    const loginForm = document.querySelector('form[action="./register.php"]');

    // 获取用户名和密码输入框元素
    const usernameInput = document.querySelector('#username');
    const passwordInput = document.querySelector('#password');
    
    // 获取登录按钮元素
    const loginBtn = document.querySelector('input[type="submit"]');
    
    // 给登录按钮绑定点击事件
    loginBtn.addEventListener('click', (event) => {
      // 阻止默认提交行为
      event.preventDefault();
    
      // 判断用户名和密码输入框是否为空
      if (!usernameInput.value || !passwordInput.value) {
        alert('请输入手机号和密码');
        return;
      }
    
      // 输入框不为空，则提交表单
      loginForm.submit();
    });