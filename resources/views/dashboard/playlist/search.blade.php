<table id="datatable" class="text-center table table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>#</th>
        <th>الصورة البارزة</th>
        <th>عنوان القائمة</th>
        <th>playlist title</th>
        <th>تاريخ الإنشاء</th>
        <th>خيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($playlists as $key => $playlist)
        <tr>
            <td>{{++$key}}</td>
            <td><img src="{{asset('storage/'.$playlist->image->name)}}" alt="playlist image" height="60px"></td>
            <td>{{$playlist->getTranslation('title','ar')}}</td>
            <td>{{$playlist->getTranslation('title','en')}}</td>
            <td>{{$playlist->created_at->format('d / m / Y')}}</td>
            <td>
                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-dropdown__toggle">
                        <button type="button" class="btn btn-info m-btn m-btn--custom w-65 h-30 fs-10 p-0">خيارات</button>
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        @can('edit playlists')
                                            <li class="m-nav__item">
                                                <a href="{{url('admin/playlists/'.$playlist->id.'/edit ')}}" class="m-nav__link  lh">
                                                    <i class="fa fa-edit m-nav__link-icon fa-1x"></i>
                                                    <span class="m-nav__link-text fs-12 " >
                                                                                    تعديل
                                                                                </span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('delete playlists')
                                            <li class="m-nav__item">
                                                <form action="{{route('playlists.destroy',$playlist->id)}}" class="m-nav__link  lh"  method="post">
                                                    @csrf @method('DELETE')
                                                    <i class="fa fa-trash-alt m-nav__link-icon fa-1x"></i>
                                                    <span class="m-nav__link-text fs-12 " >
                                                                                     <input type="submit" value="حذف" class="btn btn-none bg-white p-0" style="color: #6f727d;" onclick="return confirm('هل أنت متأكد من عملية الحذف ؟!')">
                                                                                </span>

                                                </form>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </td>
        </tr>
    @endforeach

    </tbody>

</table>
{{$playlists->links() }}