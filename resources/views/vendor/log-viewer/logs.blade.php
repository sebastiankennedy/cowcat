@extends('backend.layout.main')

@section('after.css')
<style>
    .label-env {
        padding: 2px 6px;
        background-color: #6A1B9A;
        font-size: .85em;
    }

    span.level {
        padding: 2px 6px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        border-radius: 2px;
        font-size: .9em;
        font-weight: 600;
    }

    .progress {
        margin-bottom: 10px;
    }

    .progress-bar,
    span.level,
    span.level i {
        color: #FFF;
    }

    span.level.level-empty {
        background-color: {{ log_styler()->color('empty') }};
    }

    .progress-bar.level-all,
    span.level.level-all,
    .badge.level-all {
        background-color: {{ log_styler()->color('all') }};
    }

    .progress-bar.level-emergency,
    span.level.level-emergency,
    .badge.level-emergency {
        background-color: {{ log_styler()->color('emergency') }};
    }

    .progress-bar.level-alert,
    span.level.level-alert,
    .badge.level-alert {
        background-color: {{ log_styler()->color('alert') }};
    }

    .progress-bar.level-critical,
    span.level.level-critical,
    .badge.level-critical {
        background-color: {{ log_styler()->color('critical') }};
    }

    .progress-bar.level-error,
    span.level.level-error,
    .badge.level-error {
        background-color: {{ log_styler()->color('error') }};
    }

    .progress-bar.level-warning,
    span.level.level-warning,
    .badge.level-warning {
        background-color: {{ log_styler()->color('warning') }};
    }

    .progress-bar.level-notice,
    span.level.level-notice,
    .badge.level-notice {
        background-color: {{ log_styler()->color('notice') }};
    }

    .progress-bar.level-info,
    span.level.level-info,
    .badge.level-info {
        background-color: {{ log_styler()->color('info') }};
    }

    .progress-bar.level-debug,
    span.level.level-debug,
    .badge.level-debug {
        background-color: {{ log_styler()->color('debug') }};
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">日志列表</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-responsive table-condensed table-hover table-stats">
                        <thead>
                            <tr>
                                @foreach($headers as $key => $header)
                                <th class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                    @if ($key == 'date')
                                        <span class="label label-info">{{ $header }}</span>
                                    @else
                                        <span class="level level-{{ $key }}">
                                        &nbsp;&nbsp;{!! log_styler()->icon($key) . ' ' . $header !!}&nbsp;&nbsp;
                                        </span>
                                    @endif
                                </th>
                                @endforeach
                                <th class="text-center">日志操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $date => $row)
                            <tr>
                                @foreach($row as $key => $value)
                                <td class="{{ $key == 'date' ? 'text-left' : 'text-center' }}">
                                    @if ($key == 'date')
                                        <span class="label label-primary">{{ $value }}</span>
                                    @elseif ($value == 0)
                                        <span class="level level-empty">{{ $value }}</span>
                                    @else
                                        <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                            <span class="level level-{{ $key }}">{{ $value }}</span>
                                        </a>
                                    @endif
                                </td>
                                @endforeach
                                <td class="text-right">
                                    <a href="{{ route('log-viewer::logs.show', [$date]) }}" class="btn btn-xs btn-info">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="btn btn-xs btn-success">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <a href="#delete-log-modal" class="btn btn-xs btn-danger" data-log-date="{{ $date }}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($rows->render())
                <div class="box-footer">
                    {!! $rows->render() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
    {{-- DELETE MODAL --}}
    <div id="delete-log-modal" class="modal fade">
        <div class="modal-dialog">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">DELETE LOG FILE</h4>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;">DELETE FILE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('after.js')
    <script>
        $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm  = $('form#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            $("a[href='#delete-log-modal']").click(function(event) {
                event.preventDefault();
                var date = $(this).data('log-date');
                deleteLogForm.find('input[name=date]').val(date);
                deleteLogModal.find('.modal-body p').html(
                    'Are you sure you want to <span class="label label-danger">DELETE</span> this log file <span class="label label-primary">' + date + '</span> ?'
                );

                deleteLogModal.modal('show');
            });

            deleteLogForm.submit(function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.reload();
                        }
                        else {
                            alert('AJAX ERROR ! Check the console !');
                            console.error(data);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            deleteLogModal.on('hidden.bs.modal', function(event) {
                deleteLogForm.find('input[name=date]').val('');
                deleteLogModal.find('.modal-body p').html('');
            });
        });
    </script>
@stop
