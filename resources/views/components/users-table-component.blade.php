<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success m-3">{{ __('click here create new user') }}</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                    <tr>
                    <th>{{ $user->id }}</th>
                    <td scope="row">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ '/admin/users/' . $user->id  }}"  method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="DELETE USER" class="btn btn-danger" type="button" style="transition:all .15s ease">
                        </form>
                    </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            {{ $users->links()  }}
        </div>
    </div>
</div>