<li class="dropdown">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="{{ Gravatar::src(auth_user()->email) }}" alt="...">
                  {{--<i class="on md b-white bottom"></i>--}}
              </span>
        <span class="">{{auth_user()->name}}</span> <b class="caret"></b>
    </a>
    <!-- dropdown -->
    <ul class="dropdown-menu animated fadeInRight w">
        <li>
            <a href="{{url('users')}}">
              <i class="icon-user fa-fw" aria-hidden="true"></i>
              &nbsp;
                个人信息
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="{{url('logout')}}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                登出
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
    <!-- / dropdown -->
</li>
