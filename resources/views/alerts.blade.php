@if($errors->any())
    <div class="notification is-danger">
        <button class="delete" onclick="this.parentNode.parentNode.removeChild(this.parentNode);"></button>
        @foreach($errors->all() as $error)
            <p><i class="fas fa-info-circle"></i> {{$error}}</p>
        @endforeach
    </div>
@endif
@if(session()->has('success'))
    <div class="notification is-success">
        <button class="delete" onclick="this.parentNode.parentNode.removeChild(this.parentNode);"></button>
            <p><i class="fas fa-check"></i> {{session()->get('success')}}</p>
    </div>
@endif