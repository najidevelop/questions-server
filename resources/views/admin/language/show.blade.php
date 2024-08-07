@extends('admin.layouts.layout')
@section('breadcrumb')اللغات@endsection
@section('content')
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-white" role="alert">
                    {{ $message }}
                </div>
            @endif
        </div>

        @if (count($errors) > 0)

            <ul>
                @foreach ($errors->all() as $item)
                    <li class="text-danger">
                        {{ $item }}
                    </li>
                @endforeach
            </ul>

        @endif

        <div class="row backgroundW p-4 m-3">
            <div class="container">
                <div class="form-group btn-create">
                    <h4>اللغات</h4>
                </div>
                <div class="form-group btn-create  justify-content-end" style="display: flex">
                    <a href="{{route('language.create') }}" class="btn btn-primary">جديد</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            {{-- <th scope="col">User</th> --}}
                            <th scope="col">الرمز</th>
                            <th scope="col">اللغة</th>
                            <th scope="col">الحالة</th>
                            <th scope="col">افتراضي</th>

                           
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse ($List as $item)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{$item->code}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status_conv }}</td>
                                <td>{{ $item->is_default_conv }}</td>
                                
                                <td style="width: 50px">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="{{route('language.edit', $item->id)}}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                        <div class="col-sm-2">
                                                <form method="POST" action="{{route('language.destroy', $item->id)}}" >
                                                    @csrf
                                                    @method('DELETE')
                                                <a href="{{route('language.destroy', $item->id)}}"   onclick="event.preventDefault();  this.closest('form').submit();">
                                                    <i class="fa-solid fa-trash"></i></a>                                                    
                                                </a>
                                            </form> 
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             @empty
                                <tr>
                                    <td colspan="3" style="text-align:center;">لايوجد بيانات لعرضها</td>
                                </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>

    </main>


@endsection