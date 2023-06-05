<div class="nk-content-inner">
    <div class="nk-block-des">
        @if(Session::has('flash_message'))
        <div class="alert alert-success" style="margin-top:65px;">
            {{ Session::get('flash_message') }}
        </div>
        @endif
    </div>
</div>