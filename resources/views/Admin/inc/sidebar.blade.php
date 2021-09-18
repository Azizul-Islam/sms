<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('uploads/backend/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/backend/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                {{-- @auth('admin')
                <a href="#" class="d-block">{{ auth('admin')->user->name }}</a>
            @elseif ('dept_admin')

            @endauth --}}
                @if (auth('admin')->user())
                    <a href="#" class="d-block">{{ auth('admin')->user()->name }}</a>

                @elseif (auth('dept_admin')->user())
                    <a href="#" class="d-block">{{ auth('dept_admin')->user()->name }}</a>
                    <a href="#" class="d-block">Dept : {{ auth('dept_admin')->user()->department->name }}</a>

                @elseif (auth('teacher')->user())
                    <a href="#" class="d-block">{{ auth('teacher')->user()->name }}</a>
                    <a href="#" class="d-block">Dept : {{ auth('teacher')->user()->department->name }}</a>

                @elseif (auth('student')->user())
                    <a href="#" class="d-block">{{ auth('student')->user()->name }}</a>
                    <a href="#" class="d-block">Dept : {{ auth('student')->user()->department->name }}</a>
                @endif
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}

                @auth('admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.department.index') }}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Depeartment
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.session.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Session
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.semester.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-school"></i>
                            <p>
                                Semester
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.course.index') }}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Course
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dept-admin.index') }}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Depatment Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.teachers') }}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Teachers
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.students') }}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Students
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings') }}" class="nav-link">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" class="d-inline" method="POST">
                            @csrf
                            <input type="hidden" value="admin" name="auth">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                        </form>
                    </li>
                @endauth

                <!-- Dept admin -->
                @auth('dept_admin')
                    <li class="nav-item">
                        <a href="{{ route('d-admin.teacher.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-alt"></i>
                            <p>
                                Teacher
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('d-admin.student.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-alt-slash"></i>
                            <p>
                                Student
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('d-admin.assign-course.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Assign Course
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('d-admin.register-student.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-alt-slash"></i>
                            <p>
                                Registered Student
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('d-admin.notices.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-alt-slash"></i>
                            <p>
                                Notice
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" class="d-inline" method="POST">
                            @csrf
                            <input type="hidden" value="dept_admin" name="auth">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                        </form>
                    </li>
                @endauth

                <!-- Teacher -->

                @auth('teacher')
                    <li class="nav-item">
                        <a href="{{ route('teacher.my-course') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                My Course
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.my-enroll-course') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Enrolled Course
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.marks') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Mark
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" class="d-inline" method="POST">
                            @csrf
                            <input type="hidden" value="teacher" name="auth">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                        </form>
                    </li>
                @endauth

                <!-- Student -->

                @auth('student')

                    <li class="nav-item">
                        <a href="{{ route('student.course-registration.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Registration
                            </p>
                        </a>
                    </li>
                    @if(App\Models\Registration::where(['student_id'=>auth('student')->user()->id,'status'=>'approve'])->first())
                    <li class="nav-item">
                        <a href="{{ route('student.enroll-course') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Enroll Course
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('student.my-course') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                My Courses
                            </p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('student.marks') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Mark
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student.notice') }}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Notice
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" class="d-inline" method="POST">
                            @csrf
                            <input type="hidden" value="student" name="auth">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
