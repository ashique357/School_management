<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-brand">
            <a class="navbar-brand" href="/admin/dashboard"><img src="/img/logo.png" alt="logo"></a>
            <span><h3>School Assistant</h3></span>
          </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/bootstrap4/assets/img/user.jpg" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <h1>{{$admin->name}}</h1>
                    </span>
                    <span class="user-role">{{$admin->email}}</span>
                </div>
            </div>

            <div class="sidebar-menu">
                <ul>
                  <li class="sidebar-submenu">
                    <li class="sidebar-dropdown">
                      <a href="#sidebar">
                        <i class="fas fa-user-graduate"></i>
                        <span>Student</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          @foreach($levels as $level)
                          <li>
                            <a href="/admin/student-info/{{$level->id}}">{{$level->name}}</a>
                          </li>
                          @endforeach
                        </ul>
                        </div>
                    </li>
                    <li>
                      <a href="/admin/teacher-list">
                        <i class="far fa-user"></i>
                        <span>Teacher</span>
                      </a>
                    </li>

                    <li class="sidebar-dropdown">
                      <a href="#sidebar">
                        <i class="fas fa-user-graduate"></i>
                        <span>Batch</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          <li><a href="{{route('create.levels')}}">Add Batch</a></li>
                          <li><a href="{{route('index.levels')}}">Batch Details</a></li>
                        </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                      <a href="#sidebar">
                        <i class="fas fa-user-graduate"></i>
                        <span>Subject</span>
                      </a>
                      <div class="sidebar-submenu">
                        <ul>
                          <li><a href="{{route('add.subject')}}">Add Subject</a></li>
                          @foreach($levels as $level)
                          <li>
                          <a href="/admin/subject/{{$level->id}}">{{$level->name}}</a>
                          </li>
                          @endforeach
                        </ul>
                        </div>
                    </li>
                      </li>
                      <li class="sidebar-dropdown">
                          
                          <a href="#sidebar">
                              <i class="fas fa-graduation-cap"></i>
                              <span>Exam</span>
                          </a>
                          <div class="sidebar-submenu">
                              <ul>
                                <li><a href="/admin/term/create">Add Term</a></li>
                                <li><a href="/admin/exam/create">Add Exam</a></li>
                                @foreach($levels as $level)
                                <li>
                                <a href="/admin/student-result/{{$level->id}}">{{$level->name}}</a>
                                </li>
                                @endforeach
                              </ul>
                          </div>
                      </li>

                    <!-- <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-chart-area"></i>
                            <span>Daily Attendance</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                              @foreach($levels as $level)
                              <li>
                                <a href="">{{$level->name}}</a>
                              </li>
                              @endforeach
                            </ul>
                        </div>
                    </li> -->
                    <li>
                        <a href="/admin/attendance-report">
                            <i class="fa fa-book"></i>
                            <span>Attendance</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#sidebar">
                            <i class="fa fa-chart-area"></i>
                            <span>Noticeboard</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                              <li>
                                <a href="/admin/file-upload">Upload Notice</a>
                              </li>

                              <li>
                                <a href="/admin/file-view">Notice List</a>
                              </li>

                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="/logout">
                            <i class="fa fa-book"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
    </nav>

    <!-- sidebar-wrapper  -->

    <!-- page-content" -->
