<div class="col-md-12">
    @if (Session::has(''))
        <div class="alert alert-success">{{ Session::get('  ') }}</div>
    @endif
    <!-- alert -->
    @if(Session('success'))
    <div class="alert alert-success alert-dismissible show fade mt-2">
        <strong>{{Session('success')}}</strong>
        <button class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
</div>