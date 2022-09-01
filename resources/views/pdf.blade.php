

<style type="text/css">  
    table td, table th{  
        border:1px solid black;
        text-align: center;  
    }  
</style>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="">  

    <h2>All Information Data</h2>
  
    <br/>  
    {{-- <a class="btn btn-primary" href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>   --}}
  
    <table>  
        <tr>  
            <th scope="col">Sr.No.</th>
            <th scope="col">Id</th>
            <th scope="col">Name </th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Xender</th>
            <th scope="col">Hobbies</th>
            <th scope="col">File</th>
              
        </tr>  
         @php
             $srno = 1;
         @endphp
        @foreach ($items->all() as $item)  
        <tr>  
            <td>{{$srno}}</td>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->xender}}</td>
            <td>{{$item->hobbies}}</td>  
            <td>{{$item->file}}</td>  

        </tr>  
        @php
         $srno++;
        @endphp
        @endforeach  
    </table>  
</div>  