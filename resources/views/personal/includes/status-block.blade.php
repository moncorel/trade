@if($status === \App\Models\Transaction::APPROVED_STATUS)
    <div class="status-approved">
        <i class="fas mr-1 status-approved"></i>
        @if($displayText)
        <span class="status-approved">
            <strong>{{ Str::ucfirst(\App\Models\Transaction::APPROVED_STATUS) }}</strong>
        </span>
        @endif
    </div>
@elseif($status === \App\Models\Transaction::FAILED_STATUS)
    <div class="status-failed">
        <i class="fas mr-1 status-failed"></i>
        @if($displayText)
            <span class="status-failed">
            <strong>{{ Str::ucfirst(\App\Models\Transaction::FAILED_STATUS) }}</strong>
        </span>
        @endif
    </div>
@elseif($status === \App\Models\Transaction::PROCESSING_STATUS)
    <div class="status-processing">
        <i class="fas mr-1 status-processing"></i>
        @if($displayText)
            <span class="status-processing">
            <strong>{{ Str::ucfirst(\App\Models\Transaction::PROCESSING_STATUS) }}</strong>
        </span>
        @endif
    </div>
@endif
