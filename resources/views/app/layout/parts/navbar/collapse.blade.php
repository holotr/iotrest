<!-- navbar collapse -->
<div class="collapse pos-rlt navbar-collapse bg-primary">
    <!-- buttons -->
    <div class="nav navbar-nav hidden-xs">
        <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
        </a>
        <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
            <i class="icon-user fa-fw"></i>
        </a>
    </div>
    <!-- / buttons -->

    @include('app.layout.parts.navbar.navbar_links')

    @include('app.layout.parts.navbar.navbar_right')
</div>
<!-- / navbar collapse -->
