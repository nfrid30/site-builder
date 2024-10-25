<x-admin.layout.layout title="History">
    <div class="row">
        <div class="row col-md-6">
            <div class="col-md-12">
                <div class="timeline">
                    @foreach($dates as $events)
                        <div class="time-label">
                            <span class="bg-red">{{ $events->first()->created_at->format('d M Y') }}</span>
                        </div>

                        @foreach($events as $event)
                            <div>
                                <i class="fas {{ $event->action->icon() }} bg-{{ $event->action->color() }}"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> {{ $event->created_at?->format('H:i:s') }}</span>
                                    <h3 class="timeline-header"><a href="#">{{ $event->user->name }}</a> create
                                        <b>{{ $event->entity }}</b></h3>

                                    <div class="timeline-body">

                                        @if($event->new_values)
                                            <x-cards.collapsed title="New values">
                                                @foreach($event->new_values ?? [] as $key => $value)
                                                    <div>
                                                        <b>{{$key}}</b> {{ $value }}
                                                    </div>
                                                @endforeach
                                            </x-cards.collapsed>
                                        @endif
                                        @if($event->old_values)
                                            <x-cards.collapsed title="Old values">
                                                @foreach($event->old_values ?? [] as $key => $value)
                                                    <div>
                                                        <b>{{$key}}</b> {{ $value }}
                                                    </div>
                                                @endforeach
                                            </x-cards.collapsed>
                                        @endif

                                    </div>
                                    @if($event->link)
                                        <div class="timeline-footer">
                                            <a href="{{ $event->link }}" class="btn btn-primary btn-sm">Link</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>
</x-admin.layout.layout>
