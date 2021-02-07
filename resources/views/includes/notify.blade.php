<style>
    .notify-alert, .smiley-alert, .connectify-alert, .emoticon-alert { z-index: 100000; }
</style>
@if (session()->has('notify.message'))

    @if (session()->get('notify.model') === 'toast')
        <div class="notify-alert notify-{{ session()->get('notify.type') }} {{ config('notify.theme') }} animated {{ config('notify.animate.in_class') }}" role="alert">
            <div class="notify-alert-icon"><i class="fa fa-{{ notifyIcon(session()->get('notify.type')) }}"></i></div>
            <div class="notify-alert-text">
                <h4>{{ session()->get('notify.title') ? awt(session()->get('notify.title')) : awt(session()->get('notify.type')) }}</h4>
                <p>{{ awt(session()->get('notify.message')) }}</p>
            </div>
            <div class="notify-alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
        </div>
    @endif

    @if (session()->get('notify.model') === 'smiley')
        <div class="smiley-alert smiley-{{ session()->get('notify.type') }} {{ config('notify.theme') }} animated {{ config('notify.animate.in_class') }}" role="alert">
            <div class="smiley-icon"><span>{{ notifyIcon(session()->get('notify-type')) }}</span></div>
            <div class="smiley-text">
                <p>
                    <span class="title">{{ awt(session()->get('notify.type')) }}!</span>
                    {{ awt(session()->get('notify.message')) }}
                </p>
            </div>
            <div class="smiley-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
        </div>
    @endif

    @if (session()->get('notify.model') === 'connect')
        <div class="connectify-alert connectify-{{ session()->get('notify.type') }} {{ config('notify.theme') }} animated {{ config('notify.animate.in_class') }}" role="alert">
            <div class="connectify-icon">
                <i class="flaticon-like"></i><span>{{ session()->get('notify.type') }}</span>
            </div>
            <div class="connectify-text">
                <h4>{{ awt(session()->get('notify.title')) }}</h4>
                <p>{{ awt(session()->get('notify.message')) }}</p>
            </div>
            <div class="connectify-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </span>
                </button>
            </div>
        </div>
    @endif

    @if (session()->get('notify.model') === 'emotify')
        <div class="emoticon-alert emoticon-{{ session()->get('notify.type') }} animated {{ config('notify.animate.in_class') }}" role="alert">
            <div class="emoticon-icon"><span></span></div>
            <div class="emoticon-text">
                <p>{{ awt(session()->get('notify.message')) }}</p>
            </div>
            <div class="emoticon-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
        </div>
    @endif
  
@endif

<script>
    var notify = {
        timeout: "{{ config('notify.animate.timeout') }}",
        animatedIn: "{{ config('notify.animate.in_class') }}",
        animatedOut: "{{ config('notify.animate.out_class') }}",
        position: "{{ config('notify.position') }}"
    }
</script>

{{ session()->forget('notify.message') }}

