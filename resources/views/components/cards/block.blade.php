<div
    @isset($half) class="col-md-6" @endisset
@isset($full) class="col-md-12" @endisset>
    <div class="card card-dark @if(!isset($open))  collapsed-card @endif">
        <div class="card-header">
            <input type="hidden" class="sort-order" name="sort[]" value="{{ $block->id }}">
            <h3 class="card-title">{{ $block->template->name }}</h3>

            <div class="card-tools">
                @if(!isset($dontSort))
                    <span class="header-handle" style="cursor: move">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                @endif
                @if(!isset($dontDelete))
                    <button type="button" class="btn btn-tool"
                            data-toggle="modal" data-target="#modal-delete-block"
                            onclick="document.querySelector('#deleteBlockForm').action = '{{ route('admin.blocks.destroy', compact('block')) }}'">
                        <i class="fas fa-times"></i>
                    </button>
                @endif

                @if(!isset($dontShow))
                    <div class="custom-control custom-switch d-inline">
                        <input type="checkbox"
                               onchange="showHideModel('{{ $block->id }}', '{{ class_basename($block) }}')"
                               @checked($block->show)
                               class="custom-control-input" id="customSwitch-{{$block->id}}">
                        <label class="custom-control-label" for="customSwitch-{{$block->id}}"></label>
                    </div>
                @endif

                @if(isset($open) || (request()->open == $block->id))
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                @else
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                @endif
            </div>

        </div>

        <div class="card-body" @if(isset($open) || (request()->open == $block->id)) style="display: block;" @else style="display: none;" @endif>
            <div style="max-width: 300px">
                <img class="w-100" src="{{ asset('storage/' . $block->template->cover ) }}" alt="">
            </div>
            @if(!$block->template->is_general || isset($general))
                @foreach($block->template->options ?? [] as $field)
                    <x-fields.input hid value="{{ $block->id }}" name="blocks[{{ $block->id }}][id]"/>
                    <x-dynamic-component :component="'fields.' . $field['type']"
                                         :id="$block->id"
                                         :label="$field['name']"
                                         :value="$block->fields[$field['name']] ?? ''"
                                         name="blocks[{{ $block->id }}][fields][{{ $field['name'] }}]"/>
                @endforeach
                <div class="row sortable">
                    @foreach($block->blocks ?? [] as $subBlock)
                        <x-cards.block :block="$subBlock" half open/>
                    @endforeach
                </div>

                @if($block->template->template)
                    <button type="button"
                            class="btn btn-outline-dark"
                            data-toggle="modal"
                            data-target="#modal-add-sub-blocks"
                            onclick="document.querySelector('#addSubBlockForm').action = '{{ route('admin.blocks.addSubBlocks', compact('block')) }}'">
                        Add Sub-block
                    </button>
                @endif
            @else
                <div class="my-4">
                    <a class="btn btn-dark"
                       href="{{ route('admin.general-blocks.index', ['open' => $block->template->generalBlock->id]) }}">Edit
                        Content</a>
                </div>
            @endif
        </div>

    </div>
</div>

