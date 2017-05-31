<li class="{{ Request::is('abouts*') ? 'active' : '' }}">
    <a href="{!! route('abouts.index') !!}"><i class="fa fa-building-o"></i><span>Abouts</span></a>
</li>

<li class="{{ Request::is('feedback*') ? 'active' : '' }}">
    <a href="{!! route('feedback.index') !!}"><i class="fa fa-plane"></i><span>Feedback</span></a>
</li>

<li class="{{ Request::is('supports*') ? 'active' : '' }}">
    <a href="{!! route('supports.index') !!}"><i class="fa fa-life-ring"></i><span>Supports</span></a>
</li>

<li class="{{ Request::is('catalogs*') ? 'active' : '' }}">
    <a href="{!! route('catalogs.index') !!}"><i class="fa fa-th"></i><span>Catalogs</span></a>
</li>

<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{!! route('menus.index') !!}"><i class="fa fa-th"></i><span>Menus</span></a>
</li>

<li class="{{ Request::is('lessons*') ? 'active' : '' }}">
    <a href="{!! route('lessons.index') !!}"><i class="fa fa-credit-card"></i><span>Lessons</span></a>
</li>

<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{!! route('students.index') !!}"><i class="fa fa-user"></i><span>Students</span></a>
</li>

<li class="{{ Request::is('events*') ? 'active' : '' }}">
    <a href="{!! route('events.index') !!}"><i class="fa fa-star"></i><span>Events</span></a>
</li>

<li class="{{ Request::is('news*') ? 'active' : '' }}">
    <a href="{!! route('news.index') !!}"><i class="fa fa-newspaper-o"></i><span>News</span></a>
</li>

<li class="{{ Request::is('teachers*') ? 'active' : '' }}">
    <a href="{!! route('teachers.index') !!}"><i class="fa fa-user"></i><span>Teachers</span></a>
</li>

<li class="{{ Request::is('times*') ? 'active' : '' }}">
    <a href="{!! route('times.index') !!}"><i class="fa fa-clock-o"></i><span>Times</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>