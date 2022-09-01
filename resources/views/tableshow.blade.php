@include('header')

    
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    <div class="container-fluid p-5" id="page2">
            <h3>Information List</h3>
            @if (session('success'))
            <div class="alert alert-success">
            {!! session('success') !!}
            </div>
        @endif
            <button href="" class="btn btn-danger btn-sm" id="Multidelete" >Multi Delete</button>
            
            <a class="btn btn-primary btn-sm" href="/pdf">Download PDF</a>  

             <a href="/logout" class="btn btn-primary btn-sm" >Logout</a>
             <a href="/singup" class="btn btn-primary btn-sm" >Add User</a>
             <a href="/form" class="btn btn-primary btn-sm" >add News</a>
             <a href="/news/show" class="btn btn-primary btn-sm" >All News</a>
             <a href="/user/news" class="btn btn-primary btn-sm" >User News</a>






            
            <table class="table" id="datatable"  cellspacing="0" cellpadding="3"  width="100%">
                <thead class="tablehead">
                    <tr>    
                        <th width="50px"><input type="checkbox" id="master"></th> 
                        <th width="80px">No</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name </th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th> 
                        <th scope="col">Xender</th>
                        <th scope="col">Hobbies</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    @php
                      $srno = 1;
                      @endphp
                    {{-- @if ($maindata->count()) --}}
                    @foreach ($maindata->all() as $item)
                    
                    {{-- @if(Auth::user()->id == $item->id or Auth::user()->id == $item->user_id) --}}
                  
                        <tr>
                            <td><input type="checkbox" class="sub_chk" data-id="{{$item->id}}"></td>
                        {{-- <td>{{$item->id}}</td> --}}
                        <td>{{$srno}}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->xender}}</td>
                        <td>{{$item->hobbies}}</td>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        
                        
                        
                        {{-- @php
                            $path = Storage::disk('public')->path('uploads/' . $item->file);
                            @endphp --}}
                            {{-- <td><img src="C:\xampp\htdocs\laravel\storage\app\public\uploads" /></td> --}}
                            <td><img width="100px" height="100px" src="{{url("public/uploads")}}/{{$item->file}}" ></td>
                            {{-- <img src="{{$post->image}}"/> --}}
                            <td>
                                <form action="/delete/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  class='deletee btn btn-primary btn-sm'>Delete</button>
                                </form> 
                                
                                <a href="/editform/{{$item->id}}" class='edit1 btn btn-primary btn-sm'>Edit</a></td>
                            
                            
                            
                     {{-- @endif --}}

                  </tr>
                      @php
                          $srno++;
                      @endphp
                  @endforeach
                </tbody>
                  
            </table>
                
        </div>
        {{--  --}}


        <script>

            $(document).ready(function () {  

                $('#master').click(function () {    
                $(':checkbox.sub_chk').prop('checked', this.checked);    
               });
                   $('#Multidelete').on('click', function(e) {  
                  var allVals = [];    
                  $(".sub_chk:checked").each(function() {    
                      allVals.push($(this).attr('data-id'));  
                  });  
                  
                  
              
        
                  if(allVals.length <=0)    
                  {    
                      swal("Please select row.");;    
                  }  else {    
        
                      // var check = swal("Are you sure you want to delete this row?");
                      var id = $(this).data('id');
                      
                      swal({
                          title: 'Are you sure?',
                          text: "You won't be able to Delete  this! data",
                          icon: 'warning',
                          buttons: true,
                          dangerMode: true,
                              }).then(function (click) {
                                   if(click) {
        
                                  var join_selected_values = allVals.join(",");   
                                  
                                  $.ajax({  
                                      url: '/sharksDeleteAll',  
                                      type: 'POST',   
                                      data: {_token: $('#token').val(), deleteid: join_selected_values}, 
                                      // data: {_token : csrf_token() , deleteid : join_selected_values},
                                  
                                      
                                      success: function (data) {  
                                          
                                              if(data['success'] != ""){
                                                  swal(
                                                      'Delete!',
                                                      'Your Data Delete Successfully!',
                                                      'success'
                                                      )
                                              }
                                          
                                      
                                      }
                              
                                  });  

                                  
                                  } else {
                                      swal(
                                            'Cancel!',
                                            'success'
                                            )
                                  }
                              
                              })

                         
                  }    
              });  
             
        
              // $('[data-toggle=confirmation]').confirmation({  
              //     rootSelector: '[data-toggle=confirmation]',  
              //     onConfirm: function (event, element) {  
              //         element.trigger('confirm');  
              //     }  
              // });  
        
              $(document).on('confirm', function (e) {  
                  var eele = e.target;  
                  e.preventDefault();  
        
                  $.ajax({  
                      url: ele.href,  
                      type: 'DELETE',  
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},  
                      success: function (data) {  
                          if (data['success']) {  
                              $("#" + data['tr']).slideUp("slow");  
                              alert(data['success']);  
                          } else if (data['error']) {  
                              alert(data['error']);  
                          } else {  
                              alert('Whoops Something went wrong!!');  
                          }  
                      },  
                      error: function (data) {  
                          alert(data.responseText);  
                      }  
                  });  
        
                  return false;  
              });  
          });  
      </script>
    @include('footer')
    


