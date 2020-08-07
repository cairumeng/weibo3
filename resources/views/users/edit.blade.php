<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('users.update',Auth::user()) }}">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" value="editModal" name="modal">
                <div class="modal-body">
                    <div class="avatar-edit">
                        <img src="{{Auth::user()->avatar}}" alt="" class="" id="current_avatar"
                            onclick="document.querySelector('#avatar').click()">
                        <div id="upload_message"></div>
                        <input type="file" id="avatar" hidden>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                        @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation </label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var uploadMessage = document.querySelector('#upload_message')
    var currentAvatar = document.querySelector('#current_avatar')

    function uploadAvatar(event) {
        var avatar = event.target.files[0]
        var formData = new FormData()
        formData.append('avatar', avatar)

        uploadMessage.innerHTML = 'Uploading...'
        axios.post("{{ route('users.uploadAvatar', Auth::user())  }}", formData)
            .then(
                function (response) {
                    uploadMessage.innerHTML = 'Success to upload'
                    currentAvatar.src = response.data
                })
            .catch(function (error) {
                uploadMessage.innerHTML = 'Fail to upload'
            })
    }
    document.querySelector('#avatar').addEventListener('change', uploadAvatar);
</script>