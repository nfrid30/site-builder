<div class="card my-4">
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
            <tr>
                @foreach($fields as $field)
                    <th class="p-2"
                        @if(str($field)->upper()->toString() === 'ID') style="width: 80px" @endif
                    >{{ str($field)->upper() }}</th>
                @endforeach
                @isset($image)
                    <th class="p-2">IMAGE</th>
                @endisset
                @isset($off)
                    <th style="width: 45px" class="p-2">SHOW</th>
                @endisset
                @isset($api)
                    <th style="width: 45px" class="p-2">API</th>
                @endisset
                @isset($link)
                    <th style="width: 45px" class="p-2">LINK</th>
                @endisset
                @isset($edit)
                    <th style="width: 45px" class="p-2">EDIT</th>
                @endisset
            </tr>
            </thead>
            <tbody>
            @foreach($collection as $model)
                <tr>
                    @foreach($fields as $field)
                        <td>{{ $model->{str($field)->snake()->toString()} }}</td>
                    @endforeach
                    @isset($image)
                        <td style="height: 100px">
                            <img class="h-100" src="{{ asset('storage/' . $model->{$image}) }}" alt="">
                        </td>
                    @endisset
                    @isset($off)
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox"
                                           onchange="showHideModel('{{ $model->id }}', '{{ class_basename($model) }}')"
                                           @checked($model->show)
                                           class="custom-control-input" id="customSwitch-{{$model->id}}">
                                    <label class="custom-control-label" for="customSwitch-{{$model->id}}"></label>
                                </div>
                            </div>
                        </td>
                    @endisset
                    @isset($api)
                        <x-buttons.table-api-link :link="$model->{ $api }"/>
                    @endisset
                    @isset($link)
                        <x-buttons.table-link :link="$model->{ $link}"/>
                    @endisset
                    @isset($edit)
                        <x-buttons.table-edit :$model/>
                    @endisset

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


