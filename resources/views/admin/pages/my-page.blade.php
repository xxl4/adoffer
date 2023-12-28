<div class="my-class">
    <h3>自定义页面演示</h3>
</div>

<!--
     引入页面所需的静态资源，这里会按需加载
    js脚本不能直接包含初始化操作，否则页面刷新后无效
-->
{!! admin_js(['xxx/js/page.min.js']) !!}
{!! admin_css(['xxx/js/page.min.css']) !!}

<script init=".my-class">
    // js代码也可以放在模板里面
    console.log('所有JS脚本都加载完了!!!');

    $this.on('click', function () {
   alert(123)
    });
</script>
