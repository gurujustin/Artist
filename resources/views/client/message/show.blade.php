<div class="row">
    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-body no-border" style="min-height: 850px;">
                <div class="">
                    <h1 id="emailheading">{{ $message->subject }}</h1>
                    <br>
                    <div class="control">
                        <div class="pull-left">
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    {{ $message->from }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @if($message->trashed == 0)
                                    @if($message->from != Auth::user()->email)
                                    <li><a href="{{ action('client\MessageController@reply', ['id' => $message->id]) }}">Reply</a></li>
                                    @endif
                                    <li><a href="{{ action('client\MessageController@singletrash', ['id' => $message->id]) }}">Move to Trash</a></li>
                                    @else
                                    <li><a href="{{ action('client\MessageController@singlerecover', ['id' => $message->id]) }}">Recover</a></li>
                                    <li><a href="{{ action('client\MessageController@singledelete', ['id' => $message->id]) }}">Forever Delete</a></li>
                                    @endif
                                </ul>
                            </div>
                            <label class="inline"><span class="muted">&nbsp;&nbsp;to</span> <span
                                    class="bold small-text">{{ $message->to }}</span></label>
                        </div>
                        <div class="pull-right">
                            <span class="muted small-text">{{ with($message->created_at)->format('d/m/y H:i A') }}</span>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                                              
                    </div>
                    <br>
                    <div class="email-body">
                        <div class="clearfix">{!! $message->content !!}</div>
                        <br/>
                        @if($message->file != NUll)
                        <a href="{{ public_path('uploads\\' . $message->file)  }}" download>
                            <i class="fa fa-file"></i>
                            Download</a>
                        @endif  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>