
<h2 class="title">ATTENDANCE LOGS</h2>
<div style="display:flex;justify-content: center;padding-bottom:30px;">
<form method="post" action="timein" enctype="multipart/form-data">
    {{ csrf_field() }}
     @php 
           $p=count($att);
     @endphp
     @if ($p == 0)
     <button class="btn btn-sm btn-success btn-1" type="submit">Time in</button>
     @endif
     @foreach ($att as $data ) 
     @if( $data->status != 1)     
    <button class="btn btn-sm btn-success btn-1" type="submit">Time in</button>
     @endif
     @endforeach
</form>
</div>

<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <ul class="pagination justify-content-center">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">Name</th>
                        <th class="border-0">Date</th>
                        <th class="border-0">Time In</th>
                        <th class="border-0">Time out</th>
                        <th class="border-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($att as $data)                     
                    <tr>
                        <td>{{$data->user_name}}</td>
                        <td>{{date("F d, Y", strtotime($data->time_date))}}</td>
                        <td>{{$data->time_in}}</td>
                        <td>{{$data->time_out}}</td>
                        <td>
                        <form method="post" action="timeout" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if($data->status != 2) 
                            <input type="hidden" name="id" id="id">     
                            <button class="btn btn-sm btn-warning" id="btn-t"  data-value="{{$data->id}}" type="submit">Time out</button>
                            @else
                            <p style="color:#10B981;padding:5px;font-size:8px;">Captured</p>
                            @endif
                        </form>
                        </td>
                    </tr>   
                    @endforeach
                    <!-- End of Item -->
                </tbody>
            </table>
        </div>
    </div>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item active">
                    <a class="page-link" href="#" tabindex="0">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btn-t").click(function(){
     var id=$(this).attr("data-value");
      $( "#id" ).val( id );
     alert(id);
  });
});
</script>