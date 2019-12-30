<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-brand">
            <a class="navbar-brand" href="/teacher/dashboard"><img src="/img/logo.png" alt="logo"></a>
            <span><h3>School Assistant</h3></span>
          </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="/uploads/images/{{$teacher->image}}" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <h1>{{$teacher->teacher_name}}</h1>
                    </span>
                    <span class="user-role">{{$teacher->email}}</span>
                </div>
            </div>

            <div class="sidebar-menu">
                <ul>
                  <li class="sidebar-submenu">
                  <li>
                    <a href="#sidebar">
                      <i class="fas fa-tachometer-alt"></i>
                      <span>Dashboard</span>
                    </a>
                  </li>

                  <li class="sidebar-dropdown">
                    <a href="#sidebar">
                      <i class="fas fa-user-graduate"></i>
                      <span>Student</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        @foreach($levels as $level)
                        <li>
                          <a href="/student-info/{{$level->id}}">{{$level->name}}</a>
                        </li>
                        @endforeach
                      </ul>
                      </div>
                  </li>
                    </li>

                    <li>
                        <a href="/teacher-list">
                            <i class="fas fa-user-tie"></i>
                            <span>Teacher</span>
                        </a>
                    </li>
                      </li>

                    <li class="sidebar-dropdown">
                        <a href="#sidebar">
                            <i class="fas fa-book"></i>
                            <span>Subjects</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                              @foreach($levels as $level)
                              <li>
                                <a href="/subject/{{$level->id}}">{{$level->name}}</a>
                              </li>
                              @endforeach
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#sidebar">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Exam</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>

                              <li>
                                <a href="/exam-manages">Manage Marks</a>
                              </li>

                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown">
                        <a href="#sidebar">
                            <i class="fa fa-chart-area"></i>
                            <span>Daily Attendance</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                              @foreach($levels as $level)
                              <li>
                                <a href="/attendance">{{$level->name}}</a>
                              </li>
                              @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#sidebar">
                            <i class="fa fa-chart-area"></i>
                            <span>Assignment</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                              <li>
                                <a href="/teacher/assignment-upload">Upload Assignment</a>
                              </li>
                              <li>
                                <a href="/teacher/assignment-view">Assignment List</a>
                              </li>
                              <li>
                                <a href="/teacher/student/assignment">Student Assignment List</a>
                              </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="/teacher/file-view">
                            <i class="fas fa-file"></i>
                            <span>Noticeboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/teacher/edit/{{$teacher->id}}">
                            <i class="fa fa-lock"></i>
                            <span>Account</span>
                        </a>
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
    <!-- page-content" -->
