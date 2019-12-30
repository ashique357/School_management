<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-brand">
            <a class="navbar-brand" href="/student/dashboard"><img src="/img/logo.png" alt="logo"></a>
            <span><h3>School Assistant</h3></span>
          </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="/uploads/images/{{$student->image}}" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name">
                        <h1>{{$student->student_name}}</h1>
                    </span>
                    <br>
                    <span class="user-role">{{$student->email}}</span>
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
                    </li>

                    <li>
                        <a href="/student/teacher-list">
                            <i class="fas fa-user-tie"></i>
                            <span>Teacher</span>
                        </a>
                    </li>

                    <li>
                        <a href="/student/subject">
                            <i class="fas fa-user-tie"></i>
                            <span>Subject</span>
                        </a>
                    </li>
                    <li>
                        <a href="/student/attendance-report">
                            <i class="fas fa-user-tie"></i>
                            <span>Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="/student/exam-marks">
                            <i class="fas fa-user-tie"></i>
                            <span>Exam Marks</span>
                        </a>
                    </li>
                    <li>
                        <a href="/student/assignment-view">
                            <i class="fas fa-user-tie"></i>
                            <span>Assignment</span>
                        </a>
                    </li>
                      </li>

                    <li>
                        <a href="/student/notice-view">
                            <i class="fas fa-file"></i>
                            <span>Noticeboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/student/{{$student->id}}/edit">
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
            </div>            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
    </nav>

    <!-- sidebar-wrapper  -->

    <!-- page-content" -->
