<table class="table table-striped" id="sample_1">
    <thead>
        <tr>
            <th>Booking Number</th>
            <th>Event Type</th>
            <th>Location</th>
            <th>Booking Date / Time</th>
            <th>Artist</th>
            <th style="text-align: center">Status</th>
            <th style="text-align: center">Amount</th>
            <th class="all" style="width: 130px;text-align: center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
        <tr class="odd">
            <td>{{$booking->booking_number}}</td>
            <td>{{$booking->event->name}}</td>
            <td>{{$booking->pricelocation->location->name}}</td>
            <td>{{$booking->datetime}}</td>
            <td>{{$booking->pricelocation->artist->fullname}}</td>
            <td style=" text-align: center">
                @if ($booking->status_id == 1)
                    <span class="badge badge-warning"> 
                @else
                    <span class="badge badge-success"> 
                @endif
                {{$booking->status->name3}}</span>
            </td>
            <td style="text-align: center">{{$booking->amount}}</td>
            <td class="center">
                <div class="btn-group">
                    <button
                        class="btn btn-small btn-white btn-demo-space">Action</button>
                    <button
                        class="btn btn-small btn-white dropdown-toggle btn-demo-space"
                        data-toggle="dropdown"> <span class="caret"></span> </button>
                    <ul class="dropdown-menu">

                        <li><a href="{{ route('client.booking.view', ['id'=>$booking->id]) }}">View Booking</a></li>
                        <li><a href="{{ route('artists.detail', ['artist'=>$booking->pricelocation->artist->user->id, 'profileid'=>$booking->pricelocation->artist->id]) }}" target="_blank">View Artist</a></li>
                        <li><a href="{{ route('client.booking.contactcustomer', ['id'=>$booking->id]) }}">Contact Customer</a></li>
                        <li><a href="{{ route('client.booking.delete', ['id'=>$booking->id])}}">Remove Booking</a></li>

                    </ul>
                </div>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
<script src="{{ asset('adminn/assets/plugins/data-tables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/plugins/data-tables/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('adminn/assets/js/table-datatables-responsive.js') }}"></script>