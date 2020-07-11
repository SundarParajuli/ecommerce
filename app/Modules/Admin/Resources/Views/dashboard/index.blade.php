@extends('admin::layout')
@section('title') Dashboard @endsection
@section('content')
    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-7">
            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Traffic sources<a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h6>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                    <input type="checkbox" class="switch" checked="checked" data-switchery="true"
                                           style="display: none;">
                                    <span class="switchery switchery-default"
                                          style="background-color: rgb(76, 175, 80); border-color: rgb(76,175,80); box-shadow: rgb(76, 175, 80) 0px 0px 0px 8px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2s;">
                                        <small style="left: 14px; background-color: rgb(255, 255, 255); transition: background-color 0.4s, left 0.2s;">
                                        </small></span>
                                    Live update:
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#"
                                       class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom legitRipple"><i
                                                class="icon-plus3"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">New visitors</div>
                                    <div class="text-muted">2,349 avg</div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#"
                                       class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom legitRipple"><i
                                                class="icon-watch2"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">New sessions</div>
                                    <div class="text-muted">08:20 avg</div>
                                </li>
                            </ul>

                        </div>

                        <div class="col-lg-4">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#"
                                       class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom legitRipple"><i
                                                class="icon-people"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Total online</div>
                                    <div class="text-muted"><span
                                                class="status-mark border-success position-left"></span> 5,378 avg
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /traffic sources -->
        </div>

        <div class="col-lg-5">

            <!-- Sales stats -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Sales statistics<a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h6>
                    <div class="heading-elements">
                        <form class="heading-form" action="#">
                            <div class="form-group">
                                <select class="change-date select-sm" id="select_date" style="display: none;">
                                    <optgroup label="<i class='icon-watch pull-right'></i> Time period">
                                        <option value="val1">June, 29 - July, 5</option>
                                        <option value="val2">June, 22 - June 28</option>
                                        <option value="val3" selected="selected">June, 15 - June, 21</option>
                                        <option value="val4">June, 8 - June, 14</option>
                                    </optgroup>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="container-fluid">

                    <div class="row text-center">

                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                            class="icon-calendar5 position-left text-slate"></i> 5,689</h5>
                                <span class="text-muted text-size-small">orders weekly</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                            class="icon-calendar52 position-left text-slate"></i> 32,568</h5>
                                <span class="text-muted text-size-small">orders monthly</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i class="icon-cash3 position-left text-slate"></i>
                                    $23,464</h5>
                                <span class="text-muted text-size-small">average revenue</span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <h1>SALES</h1>
                    </div>

                </div>

            </div>
            <!-- /sales stats -->

        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <!-- Available hours -->
            <div class="panel text-center">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li class="dropdown text-muted">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Progress counter -->
                    <div class="content-group-sm svg-center position-relative" id="hours-available-progress">
                        <svg width="76" height="76">
                            <g transform="translate(38,38)">
                                <path class="d3-progress-background"
                                      d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z"
                                      style="fill: rgb(238, 238, 238);"></path>
                                <path class="d3-progress-foreground" filter="url(#blur)"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(240, 98, 146); stroke: rgb(240, 98, 146);"></path>
                                <path class="d3-progress-front"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(240, 98, 146); fill-opacity: 1;"></path>
                            </g>
                        </svg>
                        <h2 class="mt-15 mb-5">68%</h2><i class="icon-watch text-pink-400 counter-icon"
                                                          style="top: 22px"></i>
                        <div>Hours available</div>
                        <div class="text-size-small text-muted">64% average</div>
                    </div>
                    <!-- /progress counter -->


                    <!-- Bars -->
                    <div id="hours-available-bars">
                        <svg width="207.484375" height="40">
                            <g width="207.484375">
                                <rect class="d3-random-bars" width="5.976916152263374" x="2.56153549382716" height="34"
                                      y="6" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="11.099987139917694"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="19.63843878600823" height="30"
                                      y="10" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="28.176890432098762"
                                      height="20" y="20" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="36.715342078189295"
                                      height="40" y="0" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="45.25379372427983" height="24"
                                      y="16" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="53.79224537037036" height="20"
                                      y="20" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="62.330697016460896"
                                      height="34" y="6" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="70.86914866255144" height="28"
                                      y="12" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="79.40760030864197" height="32"
                                      y="8" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="87.94605195473251" height="22"
                                      y="18" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="96.48450360082305" height="34"
                                      y="6" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="105.02295524691357"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="113.5614068930041" height="36"
                                      y="4" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="122.09985853909464"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="130.6383101851852" height="38"
                                      y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="139.1767618312757" height="26"
                                      y="14" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="147.71521347736623"
                                      height="32" y="8" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="156.25366512345678"
                                      height="32" y="8" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="164.7921167695473" height="28"
                                      y="12" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="173.33056841563786"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="181.86902006172838"
                                      height="28" y="12" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="190.40747170781893"
                                      height="30" y="10" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="198.94592335390945"
                                      height="30" y="10" style="fill: rgb(236, 64, 122);"></rect>
                            </g>
                        </svg>
                    </div>
                    <!-- /bars -->

                </div>
            </div>
            <!-- /available hours -->

        </div>
        <div class="col-md-3">
            <!-- Productivity goal -->
            <div class="panel text-center">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li class="dropdown text-muted">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Progress counter -->
                    <div class="content-group-sm svg-center position-relative" id="goal-progress">
                        <svg width="76" height="76">
                            <g transform="translate(38,38)">
                                <path class="d3-progress-background"
                                      d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z"
                                      style="fill: rgb(238, 238, 238);"></path>
                                <path class="d3-progress-foreground" filter="url(#blur)"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(92, 107, 192); stroke: rgb(92, 107, 192);"></path>
                                <path class="d3-progress-front"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(92, 107, 192); fill-opacity: 1;"></path>
                            </g>
                        </svg>
                        <h2 class="mt-15 mb-5">82%</h2><i class="icon-trophy3 text-indigo-400 counter-icon"
                                                          style="top: 22px"></i>
                        <div>Productivity goal</div>
                        <div class="text-size-small text-muted">87% average</div>
                    </div>
                    <!-- /progress counter -->

                    <!-- Bars -->
                    <div id="goal-bars">
                        <svg width="207.484375" height="40">
                            <g width="207.484375">
                                <rect class="d3-random-bars" width="5.976916152263374" x="2.56153549382716" height="30"
                                      y="10" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="11.099987139917694"
                                      height="36" y="4" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="19.63843878600823" height="32"
                                      y="8" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="28.176890432098762"
                                      height="22" y="18" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="36.715342078189295"
                                      height="20" y="20" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="45.25379372427983" height="28"
                                      y="12" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="53.79224537037036" height="24"
                                      y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="62.330697016460896"
                                      height="40" y="0" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="70.86914866255144" height="28"
                                      y="12" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="79.40760030864197" height="20"
                                      y="20" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="87.94605195473251" height="26"
                                      y="14" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="96.48450360082305" height="26"
                                      y="14" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="105.02295524691357"
                                      height="32" y="8" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="113.5614068930041" height="38"
                                      y="2" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="122.09985853909464"
                                      height="24" y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="130.6383101851852" height="26"
                                      y="14" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="139.1767618312757" height="22"
                                      y="18" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="147.71521347736623"
                                      height="20" y="20" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="156.25366512345678"
                                      height="34" y="6" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="164.7921167695473" height="34"
                                      y="6" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="173.33056841563786"
                                      height="24" y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="181.86902006172838"
                                      height="24" y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="190.40747170781893"
                                      height="34" y="6" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="198.94592335390945"
                                      height="38" y="2" style="fill: rgb(92, 107, 192);"></rect>
                            </g>
                        </svg>
                    </div>
                    <!-- /bars -->

                </div>
            </div>
            <!-- /productivity goal -->

        </div>
        <div class="col-md-3">
            <!-- Available hours -->
            <div class="panel text-center">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li class="dropdown text-muted">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Progress counter -->
                    <div class="content-group-sm svg-center position-relative" id="hours-available-progress">
                        <svg width="76" height="76">
                            <g transform="translate(38,38)">
                                <path class="d3-progress-background"
                                      d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z"
                                      style="fill: rgb(238, 238, 238);"></path>
                                <path class="d3-progress-foreground" filter="url(#blur)"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(240, 98, 146); stroke: rgb(240, 98, 146);"></path>
                                <path class="d3-progress-front"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.38342799370878,16.179613079472677L-32.57377388877674,15.328054496342538A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(240, 98, 146); fill-opacity: 1;"></path>
                            </g>
                        </svg>
                        <h2 class="mt-15 mb-5">68%</h2><i class="icon-watch text-pink-400 counter-icon"
                                                          style="top: 22px"></i>
                        <div>Hours available</div>
                        <div class="text-size-small text-muted">64% average</div>
                    </div>
                    <!-- /progress counter -->


                    <!-- Bars -->
                    <div id="hours-available-bars">
                        <svg width="207.484375" height="40">
                            <g width="207.484375">
                                <rect class="d3-random-bars" width="5.976916152263374" x="2.56153549382716" height="34"
                                      y="6" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="11.099987139917694"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="19.63843878600823" height="30"
                                      y="10" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="28.176890432098762"
                                      height="20" y="20" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="36.715342078189295"
                                      height="40" y="0" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="45.25379372427983" height="24"
                                      y="16" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="53.79224537037036" height="20"
                                      y="20" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="62.330697016460896"
                                      height="34" y="6" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="70.86914866255144" height="28"
                                      y="12" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="79.40760030864197" height="32"
                                      y="8" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="87.94605195473251" height="22"
                                      y="18" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="96.48450360082305" height="34"
                                      y="6" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="105.02295524691357"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="113.5614068930041" height="36"
                                      y="4" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="122.09985853909464"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="130.6383101851852" height="38"
                                      y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="139.1767618312757" height="26"
                                      y="14" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="147.71521347736623"
                                      height="32" y="8" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="156.25366512345678"
                                      height="32" y="8" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="164.7921167695473" height="28"
                                      y="12" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="173.33056841563786"
                                      height="38" y="2" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="181.86902006172838"
                                      height="28" y="12" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="190.40747170781893"
                                      height="30" y="10" style="fill: rgb(236, 64, 122);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="198.94592335390945"
                                      height="30" y="10" style="fill: rgb(236, 64, 122);"></rect>
                            </g>
                        </svg>
                    </div>
                    <!-- /bars -->

                </div>
            </div>
            <!-- /available hours -->

        </div>
        <div class="col-md-3">
            <!-- Productivity goal -->
            <div class="panel text-center">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li class="dropdown text-muted">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Progress counter -->
                    <div class="content-group-sm svg-center position-relative" id="goal-progress">
                        <svg width="76" height="76">
                            <g transform="translate(38,38)">
                                <path class="d3-progress-background"
                                      d="M0,38A38,38 0 1,1 0,-38A38,38 0 1,1 0,38M0,36A36,36 0 1,0 0,-36A36,36 0 1,0 0,36Z"
                                      style="fill: rgb(238, 238, 238);"></path>
                                <path class="d3-progress-foreground" filter="url(#blur)"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(92, 107, 192); stroke: rgb(92, 107, 192);"></path>
                                <path class="d3-progress-front"
                                      d="M2.326828918379971e-15,-38A38,38 0 1,1 -34.3834279937087,-16.179613079472855L-32.573773888776664,-15.328054496342704A36,36 0 1,0 2.204364238465236e-15,-36Z"
                                      style="fill: rgb(92, 107, 192); fill-opacity: 1;"></path>
                            </g>
                        </svg>
                        <h2 class="mt-15 mb-5">82%</h2><i class="icon-trophy3 text-indigo-400 counter-icon"
                                                          style="top: 22px"></i>
                        <div>Productivity goal</div>
                        <div class="text-size-small text-muted">87% average</div>
                    </div>
                    <!-- /progress counter -->

                    <!-- Bars -->
                    <div id="goal-bars">
                        <svg width="207.484375" height="40">
                            <g width="207.484375">
                                <rect class="d3-random-bars" width="5.976916152263374" x="2.56153549382716" height="30"
                                      y="10" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="11.099987139917694"
                                      height="36" y="4" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="19.63843878600823" height="32"
                                      y="8" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="28.176890432098762"
                                      height="22" y="18" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="36.715342078189295"
                                      height="20" y="20" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="45.25379372427983" height="28"
                                      y="12" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="53.79224537037036" height="24"
                                      y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="62.330697016460896"
                                      height="40" y="0" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="70.86914866255144" height="28"
                                      y="12" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="79.40760030864197" height="20"
                                      y="20" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="87.94605195473251" height="26"
                                      y="14" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="96.48450360082305" height="26"
                                      y="14" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="105.02295524691357"
                                      height="32" y="8" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="113.5614068930041" height="38"
                                      y="2" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="122.09985853909464"
                                      height="24" y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="130.6383101851852" height="26"
                                      y="14" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="139.1767618312757" height="22"
                                      y="18" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="147.71521347736623"
                                      height="20" y="20" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="156.25366512345678"
                                      height="34" y="6" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="164.7921167695473" height="34"
                                      y="6" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="173.33056841563786"
                                      height="24" y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="181.86902006172838"
                                      height="24" y="16" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="190.40747170781893"
                                      height="34" y="6" style="fill: rgb(92, 107, 192);"></rect>
                                <rect class="d3-random-bars" width="5.976916152263374" x="198.94592335390945"
                                      height="38" y="2" style="fill: rgb(92, 107, 192);"></rect>
                            </g>
                        </svg>
                    </div>
                    <!-- /bars -->

                </div>
            </div>
            <!-- /productivity goal -->

        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">

            <!-- Members online -->
            <div class="panel bg-teal-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <span class="heading-text badge bg-teal-800">+53,6%</span>
                    </div>

                    <h3 class="no-margin">3,450</h3>
                    Members online
                    <div class="text-muted text-size-small">489 avg</div>
                </div>

                <div class="container-fluid">
                    <div id="members-online">
                        <svg width="316.65625" height="50">
                            <g width="316.65625">
                                <rect class="d3-random-bars" width="9.121784979423868" x="3.909336419753086"
                                      height="47.5" y="2.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="16.940457818930042"
                                      height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="29.971579218106996"
                                      height="30" y="20" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="43.002700617283956"
                                      height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="56.03382201646091"
                                      height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="69.06494341563787"
                                      height="27.500000000000004" y="22.499999999999996"
                                      style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="82.09606481481482"
                                      height="47.5" y="2.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="95.12718621399178"
                                      height="47.5" y="2.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="108.15830761316873"
                                      height="25" y="25" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="121.18942901234568"
                                      height="50" y="0" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="134.22055041152265"
                                      height="32.5" y="17.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="147.2516718106996"
                                      height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="160.28279320987656"
                                      height="30" y="20" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="173.3139146090535" height="45"
                                      y="5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="186.34503600823047"
                                      height="45" y="5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="199.37615740740742"
                                      height="42.5" y="7.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="212.40727880658437"
                                      height="45" y="5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="225.43840020576133"
                                      height="35" y="15" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="238.46952160493828"
                                      height="40" y="10" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="251.50064300411523"
                                      height="35" y="15" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="264.5317644032922" height="40"
                                      y="10" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="277.5628858024691" height="30"
                                      y="20" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="290.5940072016461" height="40"
                                      y="10" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                                <rect class="d3-random-bars" width="9.121784979423868" x="303.625128600823"
                                      height="32.5" y="17.5" style="fill: rgba(255, 255, 255, 0.5);"></rect>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- /members online -->

        </div>
        <div class="col-lg-4">

            <!-- Current server load -->
            <div class="panel bg-pink-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                    <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                    <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                    <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <h3 class="no-margin">49.4%</h3>
                    Current server load
                    <div class="text-muted text-size-small">34.6% avg</div>
                </div>

                <div id="server-load">
                    <svg width="336.65625" height="50">
                        <g transform="translate(0,0)" width="336.65625">
                            <defs>
                                <clipPath id="load-clip-server-load">
                                    <rect class="load-clip" width="336.65625" height="50"></rect>
                                </clipPath>
                            </defs>
                            <g clip-path="url(#load-clip-server-load)">
                                <path d="M-12.948317307692308,-0.33333333333333215L-10.790264423076923,1.444444444444445C-8.632211538461538,3.2222222222222223,-4.316105769230769,6.777777777777777,0,11.888888888888888C4.316105769230769,17,8.632211538461538,23.666666666666664,12.948317307692307,26.777777777777775C17.264423076923077,29.888888888888886,21.580528846153847,29.444444444444443,25.896634615384613,26.777777777777775C30.212740384615387,24.111111111111107,34.52884615384615,19.22222222222222,38.84495192307693,20.777777777777775C43.16105769230769,22.333333333333332,47.47716346153846,30.333333333333336,51.793269230769226,34.333333333333336C56.109375,38.333333333333336,60.425480769230774,38.333333333333336,64.74158653846155,32.333333333333336C69.0576923076923,26.333333333333336,73.37379807692308,14.333333333333334,77.68990384615385,13.666666666666668C82.00600961538461,13,86.32211538461537,23.666666666666668,90.63822115384615,26.333333333333336C94.9543269230769,29,99.27043269230768,23.666666666666668,103.58653846153845,22.333333333333336C107.90264423076923,21,112.21875,23.666666666666664,116.53485576923077,23.88888888888889C120.85096153846153,24.111111111111107,125.1670673076923,21.888888888888886,129.48317307692307,21C133.79927884615384,20.11111111111111,138.1153846153846,20.555555555555557,142.4314903846154,18.555555555555557C146.74759615384616,16.555555555555557,151.06370192307693,12.11111111111111,155.37980769230768,10.555555555555555C159.69591346153845,8.999999999999998,164.01201923076923,10.333333333333332,168.328125,11.666666666666664C172.64423076923077,12.999999999999998,176.96033653846152,14.333333333333332,181.27644230769226,17.444444444444443C185.59254807692304,20.555555555555557,189.9086538461538,25.444444444444443,194.22475961538458,24.11111111111111C198.54086538461536,22.77777777777778,202.85697115384613,15.222222222222221,207.1730769230769,13.888888888888888C211.48918269230768,12.555555555555554,215.80528846153845,17.444444444444443,220.12139423076923,19.888888888888886C224.43749999999997,22.333333333333332,228.75360576923075,22.333333333333332,233.06971153846155,20.11111111111111C237.3858173076923,17.888888888888886,241.70192307692307,13.444444444444443,246.0180288461538,13C250.3341346153846,12.555555555555555,254.6502403846154,16.11111111111111,258.9663461538462,19.22222222222222C263.2824519230769,22.333333333333332,267.5985576923077,25,271.91466346153845,23.444444444444443C276.2307692307692,21.888888888888886,280.546875,16.111111111111107,284.8629807692307,15.444444444444443C289.17908653846155,14.777777777777777,293.49519230769226,19.22222222222222,297.81129807692304,22.333333333333332C302.1274038461538,25.444444444444443,306.44350961538464,27.22222222222222,310.75961538461536,24.11111111111111C315.0757211538462,21,319.3918269230769,13,323.7079326923077,11C328.02403846153845,9,332.3401442307692,12.999999999999998,336.65625,13C340.9723557692308,12.999999999999998,345.28846153846155,9,349.6045673076923,9.222222222222221C353.9206730769231,9.444444444444445,358.2367788461538,13.88888888888889,360.3948317307692,16.111111111111114L362.5528846153846,18.333333333333336L362.5528846153846,50L360.39483173076917,49.999999999999986C358.2367788461538,49.99999999999999,353.9206730769231,49.99999999999999,349.6045673076923,49.999999999999986C345.28846153846155,49.99999999999999,340.9723557692308,49.99999999999999,336.65625,49.999999999999986C332.3401442307692,49.99999999999999,328.02403846153845,49.99999999999999,323.7079326923077,49.999999999999986C319.3918269230769,49.99999999999999,315.0757211538462,49.99999999999999,310.75961538461536,49.999999999999986C306.44350961538464,49.99999999999999,302.1274038461538,49.99999999999999,297.81129807692304,49.999999999999986C293.49519230769226,49.99999999999999,289.17908653846155,49.99999999999999,284.8629807692308,49.999999999999986C280.546875,49.99999999999999,276.2307692307692,49.99999999999999,271.91466346153845,49.999999999999986C267.5985576923077,49.99999999999999,263.2824519230769,49.99999999999999,258.96634615384613,49.999999999999986C254.6502403846154,49.99999999999999,250.3341346153846,49.99999999999999,246.0180288461538,49.999999999999986C241.70192307692307,49.99999999999999,237.3858173076923,49.99999999999999,233.06971153846155,49.999999999999986C228.75360576923075,49.99999999999999,224.43749999999997,49.99999999999999,220.1213942307692,49.999999999999986C215.80528846153845,49.99999999999999,211.48918269230768,49.99999999999999,207.1730769230769,49.999999999999986C202.85697115384613,49.99999999999999,198.54086538461536,49.99999999999999,194.22475961538458,49.999999999999986C189.9086538461538,49.99999999999999,185.59254807692304,49.99999999999999,181.27644230769226,49.999999999999986C176.96033653846152,49.99999999999999,172.64423076923077,49.99999999999999,168.328125,49.999999999999986C164.01201923076923,49.99999999999999,159.69591346153845,49.99999999999999,155.37980769230768,49.999999999999986C151.06370192307693,49.99999999999999,146.74759615384616,49.99999999999999,142.4314903846154,49.999999999999986C138.1153846153846,49.99999999999999,133.79927884615384,49.99999999999999,129.48317307692307,49.999999999999986C125.1670673076923,49.99999999999999,120.85096153846153,49.99999999999999,116.53485576923076,49.999999999999986C112.21875,49.99999999999999,107.90264423076923,49.99999999999999,103.58653846153847,49.999999999999986C99.27043269230768,49.99999999999999,94.9543269230769,49.99999999999999,90.63822115384615,49.999999999999986C86.32211538461537,49.99999999999999,82.00600961538461,49.99999999999999,77.68990384615384,49.999999999999986C73.37379807692308,49.99999999999999,69.0576923076923,49.99999999999999,64.74158653846153,49.999999999999986C60.425480769230774,49.99999999999999,56.109375,49.99999999999999,51.79326923076923,49.999999999999986C47.47716346153846,49.99999999999999,43.16105769230769,49.99999999999999,38.84495192307692,49.999999999999986C34.52884615384615,49.99999999999999,30.212740384615387,49.99999999999999,25.896634615384613,49.999999999999986C21.580528846153847,49.99999999999999,17.264423076923077,49.99999999999999,12.948317307692307,49.999999999999986C8.632211538461538,49.99999999999999,4.316105769230769,49.99999999999999,0,49.999999999999986C-4.316105769230769,49.99999999999999,-8.632211538461538,49.99999999999999,-10.790264423076923,49.999999999999986L-12.948317307692308,50Z"
                                      class="d3-area" style="fill: rgba(255, 255, 255, 0.5); opacity: 1;"
                                      transform="translate(-12.948317527770996,0)"></path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            <!-- /current server load -->

        </div>
        <div class="col-lg-4">

            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>

                    <h3 class="no-margin">$18,390</h3>
                    Today's revenue
                    <div class="text-muted text-size-small">$37,578 avg</div>
                </div>

                <div id="today-revenue">
                    <svg width="336.65625" height="50">
                        <g transform="translate(0,0)" width="336.65625">
                            <defs>
                                <clipPath id="clip-line-small">
                                    <rect class="clip" width="336.65625" height="50"></rect>
                                </clipPath>
                            </defs>
                            <path d="M20,8.46153846153846L69.44270833333333,25.76923076923077L118.88541666666666,5L168.328125,15.384615384615383L217.77083333333331,5L267.2135416666667,36.15384615384615L316.65625,8.46153846153846"
                                  clip-path="url(#clip-line-small)" class="d3-line d3-line-medium"
                                  style="stroke: rgb(255, 255, 255);"></path>
                            <g>
                                <line class="d3-line-guides" x1="20" y1="50" x2="20" y2="8.46153846153846"
                                      style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line>
                                <line class="d3-line-guides" x1="69.44270833333333" y1="50" x2="69.44270833333333"
                                      y2="25.76923076923077"
                                      style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line>
                                <line class="d3-line-guides" x1="118.88541666666666" y1="50" x2="118.88541666666666"
                                      y2="5"
                                      style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line>
                                <line class="d3-line-guides" x1="168.328125" y1="50" x2="168.328125"
                                      y2="15.384615384615383"
                                      style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line>
                                <line class="d3-line-guides" x1="217.77083333333331" y1="50" x2="217.77083333333331"
                                      y2="5"
                                      style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line>
                                <line class="d3-line-guides" x1="267.2135416666667" y1="50" x2="267.2135416666667"
                                      y2="36.15384615384615"
                                      style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line>
                                <line class="d3-line-guides" x1="316.65625" y1="50" x2="316.65625" y2="8.46153846153846"
                                      style="stroke: rgba(255, 255, 255, 0.3); stroke-dasharray: 4, 2; shape-rendering: crispEdges;"></line>
                            </g>
                            <g>
                                <circle class="d3-line-circle d3-line-circle-medium" cx="20" cy="8.46153846153846" r="3"
                                        style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle>
                                <circle class="d3-line-circle d3-line-circle-medium" cx="69.44270833333333"
                                        cy="25.76923076923077" r="3"
                                        style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle>
                                <circle class="d3-line-circle d3-line-circle-medium" cx="118.88541666666666" cy="5"
                                        r="3"
                                        style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle>
                                <circle class="d3-line-circle d3-line-circle-medium" cx="168.328125"
                                        cy="15.384615384615383" r="3"
                                        style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle>
                                <circle class="d3-line-circle d3-line-circle-medium" cx="217.77083333333331" cy="5"
                                        r="3"
                                        style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle>
                                <circle class="d3-line-circle d3-line-circle-medium" cx="267.2135416666667"
                                        cy="36.15384615384615" r="3"
                                        style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle>
                                <circle class="d3-line-circle d3-line-circle-medium" cx="316.65625"
                                        cy="8.46153846153846" r="3"
                                        style="stroke: rgb(255, 255, 255); fill: rgb(41, 182, 246); opacity: 1;"></circle>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            <!-- /today's revenue -->

        </div>
    </div>
    <!-- /main charts -->
@stop
