<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">
           
            <a href="{{ asset('tickets/create') }}" class="btn btn-success m-3">{{ __('New order') }}</a>
                
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">شماره تیکت</th>
                    <th scope="col">موضوع</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">دیدن تیکت</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                    <tr>
                        <th>{{ $ticket->id }}</th>
                        
                        <td>
                            {{ $ticket->subject }}
                        </td>
                        <td scope="row">
                            <span class="badge badge-primary">{{ __($ticket->ticketStatues->status) }}</span>  
                        </td>
                        <td>
                            @if ($ticket->ticket_status_id  == 3)
                                {{ __('the ticket has been closed') }}
                            @else
                            <a href="{{ asset('tickets/' .  $ticket->id ) }}" class="btn btn-info">{{ __("See ticket's messages") }}</a>
                            @endif
                        </td>
                    </tr>
                    
                    
                    @empty
                    <div class="alert alert-danger m-3" role="alert">
                        نتایجی پیدا نشد
                    </div>
                    @endforelse 
                    
                </tbody>
            </table>
    </div>
</div>