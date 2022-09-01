@include('header')

<style>
.error{
    color: red;
}

</style>
<body>
    <div class="container pt-5 " id="page1">
        <h1>Singup to our site</h1>

        <form id="form" enctype='multipart/form-data' method="POST" action="/singin" class="pt-5">
            @csrf

            {{-- name --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Name :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name" id="name">
                        <input type="hidden" id="id" name="id" value="">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>
            {{-- uasername --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Username  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="name" class="form-control" id="username" placeholder="Enter UserName" name="username" id="username">
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
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" id="email">
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
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" id="password">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>
            {{-- Address --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Address  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>

               

                 {{-- city --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">City  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                    </div>
                    <div>
                        <span class="error">*</span>
                    </div>
                </div>
            </div>

                  {{-- state --}}
            <div class="col-lg-12">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">State  :</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="state" placeholder="Enter State" name="state">
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
                            <input class="form-check-input radio" type="radio" name="xender" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio" type="radio" name="xender" id="inlineRadio2" value="Female">
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
                        <input type="checkbox" class="spec" id="expertise1" name="expertise[]" value="Playing">
                        <label for="expertise1">Playing</label><br>
                        <input type="checkbox" class="spec" id="expertise2" name="expertise[]" value="Singing">
                        <label for="expertise2">Singing</label><br>
                        <input type="checkbox" class="spec" id="expertise3" name="expertise[]" value="Reading">
                        <label for="expertise3">Reading</label><br>
                    </div>
                </div>
            </div>
            <!-- upload file -->
            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="number" class="col-sm-2">Upload your File :</label>
                    <input type="file" name="file" id="file" class="col-sm-10">
                    {{-- <input type="hidden" id="filecount" value='0'> --}}
                    
                </div>
            </div>

            <div class="col-lg-12  ">
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-lg-2">
                        <a href="/login" id="log" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>

            

        </form>
    </div>
    


   
    
    
    @include('footer')
