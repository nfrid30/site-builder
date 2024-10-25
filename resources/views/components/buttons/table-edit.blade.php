<td class="p-2">
    <a href="{{ route('admin.' . str(class_basename($model))->lower()->plural()->toString() . '.edit',
                               [str(class_basename($model))->lower()->toString() => $model]) }}"
       class="btn btn-block btn-default"
       style="width: 40px">
        <i class="fa fa-edit"></i>
    </a>
</td>
