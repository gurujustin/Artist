@extends('admin.layouts.app')

@section('content')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>Widget Settings</h3>
        </div>
        <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <div class="page-title">
            <h3>Payments</h3>
        </div>






        <!-- ID CONTAINER -->

        <div id="container">








            <!-- MY TABLE -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>
                                All <span class="semi-bold">Payments</span>
                            </h4>
                        </div>

                        <span class="refresh">
                            <div class="grid-body ">
                                <table class="table table-striped" id="example2">
                                    <thead>
                                        <tr>
                                            <th>Booking Number</th>
                                            <th>Artist</th>
                                            <th>Location</th>
                                            <th>Booking Date</th>
                                            <th>Event Date</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Amount</th>
                                            <th style="width: 130px;text-align: center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>



                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>



                                        <tr class="odd">
                                            <td>TME082</td>
                                            <td>John Doe Band</td>
                                            <td>New York</td>
                                            <td>20/08/2020</td>
                                            <td>31/10/2020</td>
                                            <td style="text-align: center">
                                                Deposit Paid</td>
                                            <td style="text-align: center">£50.00</td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-small btn-white btn-demo-space">Action</button>
                                                    <button
                                                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                                                        data-toggle="dropdown"> <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">

                                                        <li><a href="#">View Booking</a></li>
                                                        <li><a href="#">View Artist</a></li>
                                                        <li><a href="#">Contact Customer</a></li>
                                                        <li><a href="#">Contact Artist</a></li>
                                                        <li><a href="#">View Invoice</a></li>
                                                        <li><a href="#">Remove Payment</a></li>


                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style=" text-align: center"><b>FULL TOTAL:</b></td>
                                            <td style=" text-align: right"><b>£400.00</b></td>
                                            <td></td>

                                        </tr>
                                    </tbody>
                                </table>






                            </div>


                    </div>
                </div>
            </div>
            <!-- END OF MY TABLE -->





            <div class="MY LOCK" style="display:none">
                <div id="chart"> </div>
                <div id="world-map" style="height:405px"></div>
                <div id="mini-chart-orders"></div>
                <div id="mini-chart-other"></div>
                <div id="ricksaw"></div>
                <div id="legend"></div>
                <canvas id="wind" width="32" height="32"></canvas>
                <canvas id="rain" width="32" height="32"></canvas>
                <canvas id="partly-cloudy-day" width="120" height="120"></canvas>
            </div>
        </div>





        <!-- END PAGE -->
    </div>
</div>

<!-- END CONTAINER -->
@endsection