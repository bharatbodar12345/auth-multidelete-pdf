@include('header')

<style>
.error{
    color: red;
}

</style>
<body>
    <div class="container pt-5 " id="page1">
        <h1>Update your Data</h1>

        <form id="form" enctype='multipart/form-data' method="POST" action="/editform/update/{{$data->id}}" class="pt-5">
            @csrf

            {{-- name --}}
            <div class="col-lg-12">
                <div class=" row form-group">
                    <div class="col-lg-2">
                        <label for="name">Name :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="name" class="form-control" id="name" value="{{$data->name}}" placeholder="Enter Name" name="name" id="name">
                        <input type="hidden" id="id" name="id" value="">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>
            {{-- uasername --}}
            <div class="col-lg-12">
                <div class=" row form-group">
                    <div class="col-lg-2">
                        <label for="name">Username  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="name" class="form-control" id="username" value="{{$data->username}}" placeholder="Enter UserName" name="username" id="username">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>
            {{-- email --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Email  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="email" value="{{$data->email}}" placeholder="Enter email" name="email" id="email">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>
            {{-- password --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Password  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" id="password" value="{{$data->password}}" placeholder="Enter password" name="password" id="password">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>
            {{-- xender --}}
            <div class="col-lg-12">
                <div class="form-group row ">
                    <div class="col-lg-2">
                        <label for="name" class="">Xender : </label>
                    </div>
                    <div class="col-lg-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio" type="radio" name="xender" value="Male"    id="inlineRadio1">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio" type="radio" name="xender" id="inlineRadio2" value="Female" {{ ($data->xender=="Female")? "checked" : "" }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- hobbies --}}
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-2">
                        <p>Hobbies :</p>
                    </div>
                    <div class="col-sm-10">
                        <input type="checkbox" class="spec" id="expertise1" name="expertise[]" value="Playing"{{ (in_array('Playing', explode(',',$data->hobbies))) ? "checked" : "" }}>
                        <label for="expertise1">Playing</label><br>
                        <input type="checkbox" class="spec" id="expertise2" name="expertise[]" value="Singing"{{ (in_array('Singing', explode(',',$data->hobbies))) ? "checked" : "" }}>
                        <label for="expertise2">Singing</label><br>
                        <input type="checkbox" class="spec" id="expertise3" name="expertise[]" value="Reading"{{ (in_array('Reading', explode(',',$data->hobbies))) ? "checked" : "" }}>
                        <label for="expertise3">Reading</label><br>
                    </div>
                </div>
            </div>
            <!-- upload file -->
            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="number" class="col-sm-2">Upload your File :</label>
                    <input type="file" name="file" id="file" class="col-sm-10">
                    <img width="100px" height="100px" src="{{url("public/uploads")}}/{{$data->file}}" >
                    {{-- <input type="hidden" id="filecount" value='0'> --}}

                </div>
            </div>

            <div class="col-lg-12  ">
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-lg-2">
                        <a href="/logout" id="log" class="btn btn-primary">Login</a>
                    </div>
                    {{-- <div class="col-lg-2">
                        <a href="/logout" id="log" class="btn btn-primary">Login</a>
                    </div> --}}
                </div>
            </div>



        </form>
    </div>






    @include('footer')
