<div id="reg" class="col-md-5 col-md-offset-4">
    <form action="<?php echo \M\App::buildUrl('Index','reg');?>" method="post">
        <div class="form-group">
            <label>用户名</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="username">
        </div>
        <div class="form-group">
            <label for="email">邮箱</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
            <label for="rePassword">再次输入密码</label>
            <input type="password" name="rePassword" id="rePassword" class="form-control" placeholder="rePassword">
        </div>
        <input type="submit" name="reg" class="btn btn-default pull-right" value="注册">
    </form>
</div>