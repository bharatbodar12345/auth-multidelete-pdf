@include('header')

<style>
.error{
    color: red;
}

</style>
<body>
    <div class="container pt-5 " id="page1">
        {{-- <h1>Singup to our site</h1> --}}

        <form id="form" enctype='multipart/form-data' method="POST" action="/form/submit" class="pt-5">
            @csrf
            @if (session('success'))
            <div class="alert alert-success">
            {!! session('success') !!}
            </div>
        @endif
            {{-- Description --}}
            <div class="col-lg-12 pt-2">
                <div class=" row form-group ">
                    <div class="col-lg-2">
                        <label for="name">Description :</label>
                    </div>
                    <div class="col-lg-6">
                        <textarea type="text" class="form-control" id="description" placeholder=" Enter a description" name="description" id="description"></textarea>
                        <input type="hidden" id="id" name="id" value="">
                    </div>
                    <div>
                        {{-- <span class="error">*</span> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-12 pt-2">
                <div class="form-group row">
                    <label for="number" class="col-sm-2">Upload your File :</label>
                    <input type="file" name="file" id="file" class="col-sm-10">
                    {{-- <input type="hidden" id="filecount" value='0'> --}}
                    
                </div>
            </div>


            <div class="col-lg-12 pt-2">
                {{-- <div class=" row form-group "> --}}

                    <div class="form-group row mt-3">
                        <div class="col-lg-2">
                            <label for="name" class="">Category : </label>
                        </div>
                        <div class="col-lg-6">

                            @php
                            // echo "<pre>";
                                // print_r($data->all());
                                // exit;
                                
                            @endphp
                            
                            <select class="form-select form-select-lg mb-3" name="category" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                               
                                @foreach ($data as $value)
                                
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                
                                @endforeach
                              </select>
                        </div>
                    </div>
            </div>

            <div class="col-lg-12  ">
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-lg-2">
                         <a href="/logout" class="btn btn-primary " >Logout</a>
                        </div>
                    <div class="col-lg-2">
                        <a href="/datatable" class="btn btn-primary">Back to Table</a>  
                    </div>
                    
                </div>      
            </div>
        </form>
    </div>