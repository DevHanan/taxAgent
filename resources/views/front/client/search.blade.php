@if($clients->count()>0)

         @foreach($clients as $client)
                            <div class="col-sm-6">

                                <a href="{{url('client/'.$client->id.'/'.$client->name)}}">
                                    <div class="testimonial-block">
                                        <div class="inner-box">
                                            <div class="content">
                                                <div class="image">
                                                    <img src="{{$client->image['name']==null?asset('avatar.png'):asset('storage/'.$client->image->name)}}" alt="No Image">
                                                </div>
                                                <h3 class="title"> {{$client->name}} </h3>
                                                <div class="text">
                                                    {{str_limit($client->about==null?'- - -':$client->about,300)}}
                                                </div>

                                                <div class="info">
                                                    <ul>
                                                        <li><i class="icon-jobs pr-1"></i> </li>
                                                        <li>{{\App\Course::targetsArr[$client->type]}}</li>
                                                    </ul>
                                                </div>
                                                <div class="info">
                                                    <ul>
                                                        <li><i class="fas fa-globe-europe pr-1"></i>{{ $client->contry }}-{{ $client->city }}-{{$client->street}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            @endforeach


@endif

<div class="col-lg-12">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$clients->links()}}
        </ul>
    </nav>
</div>