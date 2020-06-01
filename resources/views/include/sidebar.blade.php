  <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                      <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        @php
                             $roll_id =Session::get('roll_id');
                        @endphp
                        @if(Request::is('admin*') && $roll_id =1)
                        <li class="sidebar-item {{Request::is('admin/dashboard') ?'active':''}}" > <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                         <li class="sidebar-item {{Request::is('admin/scheduale') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.scheduale')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Sheduale</span></a></li>

                          <li class="sidebar-item {{Request::is('admin/perday-patient') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.perday-patient')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Par Day Patient</span></a></li>

                          <li class="sidebar-item {{Request::is('admin/appointment*') ?'active':''}}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Appointment </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item {{Request::is('admin/appointment') ?'active':''}}"><a href="{{route('admin.appointment')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> All Appointment</span></a></li>

                                <li class="sidebar-item {{Request::is('admin/appointment/new') ?'active':''}}"><a href="{{route('admin.appointment.new')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> New Appointment </span></a></li>

                                <li class="sidebar-item {{Request::is('admin/appointment/old') ?'active':''}}"><a href="{{route('admin.appointment.old')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Old Appointment </span></a></li>

                                 <li class="sidebar-item {{Request::is('admin/appointment/online') ?'active':''}}"><a href="{{route('admin.appointment.online')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Online Appointment </span></a></li>

                                  <li class="sidebar-item {{Request::is('admin/appointment/receive') ?'active':''}}"><a href="{{route('admin.appointment.receive')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Taking Appointment </span></a></li>
                            </ul>
                        </li>


                           <li class="sidebar-item {{Request::is('/admin/patient*') ?'active':''}}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Patient </span></a>
                             <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item {{Request::is('/admin/patient') ?'active':''}}"><a href="{{ route('admin.patient.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> All Patient </span></a></li>
                                <li class="sidebar-item {{Request::is('/admin/patient/patient-apoint') ?'active':''}}"><a href="{{route('admin.patient.patient-apoint')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Patient Appointment </span></a></li>

                                  <li class="sidebar-item {{Request::is('/admin/patient/taking-apoint') ?'active':''}}"><a href="{{route('admin.patient.taking-apoint')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Taking Appointment </span></a></li>
                            </ul>
                        </li>

                         <li class="sidebar-item {{Request::is('/admin/medicine*') ?'active':''}}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Medicine </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item{{Request::is('/admin/medicine/category') ?'active':''}}"><a href="{{ route('admin.medicine.category') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Category </span></a></li>
                                <li class="sidebar-item {{Request::is('/admin/medicine/medi-list') ?'active':''}}"><a href="{{ route('admin.medicine.list') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Medicine List </span></a></li>
                            </ul>
                        </li>

                          <li class="sidebar-item {{Request::is('admin/sms') ?'active':''}}"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.sms')}}" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Send Sms</span></a></li>

                          <li class="sidebar-item {{Request::is('/admin/fontpage*') ?'active':''}}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Fontpage </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item{{Request::is('/admin/fontpage/slider') ?'active':''}}"><a href="{{ route('admin.fontpage.slider') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Slider </span></a></li>
                                <li class="sidebar-item {{Request::is('/admin/fontpage/about-us') ?'active':''}}"><a href="{{ route('admin.fontpage.about') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">About us </span></a></li>

                                <li class="sidebar-item {{Request::is('/admin/fontpage/blog-post') ?'active':''}}"><a href="{{ route('admin.fontpage.blog-post') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Blog post</span></a></li>

                                <li class="sidebar-item {{Request::is('/admin/fontpage/extra') ?'active':''}}"><a href="{{ route('admin.fontpage.extra') }}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu">Header Footer</span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/')}}" target="_blank" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Website</span></a></li>


                        @endif

                        @if(Request::is('user*') && $roll_id =2)
                         <li class="sidebar-item {{Request::is('user/dashboard') ?'active':''}}" > <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('user.dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                        
                          <li class="sidebar-item {{Request::is('user/appointment*') ?'active':''}}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Appointment </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item {{Request::is('user/appointment') ?'active':''}}"><a href="{{route('user.appointment')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> All Appointment</span></a></li>

                                <li class="sidebar-item {{Request::is('user/appointment/new') ?'active':''}}"><a href="{{route('user.appointment.new')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> New Appointment </span></a></li>

                                <li class="sidebar-item {{Request::is('user/appointment/old') ?'active':''}}"><a href="{{route('user.appointment.old')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Old Appointment </span></a></li>

                                <li class="sidebar-item {{Request::is('user/appointment/online') ?'active':''}}"><a href="{{route('user.appointment.online')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Online Appointment </span></a></li>

                                 
                            </ul>
                        </li>

                         <li class="sidebar-item {{Request::is('/user/patient*') ?'active':''}}"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Patient </span></a>
                             <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item {{Request::is('/user/patient') ?'active':''}}"><a href="{{ route('user.patient.index') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> All Patient </span></a></li>
                                <li class="sidebar-item {{Request::is('/user/patient/patient-apoint') ?'active':''}}"><a href="{{route('user.patient.patient-apoint')}}" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Patient Appointment </span></a></li>

                               
                            </ul>
                        </li>


                        @endif
                    

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>