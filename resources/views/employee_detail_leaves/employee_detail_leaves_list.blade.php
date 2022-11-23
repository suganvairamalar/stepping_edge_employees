@if(!empty($employee_detail_leaves)) 
<div class="table-responsive">
   <table class="table table-striped table-bordered table-hover">
      <thead>
         <tr class="bg-info">
            <th class="" colspan="2">
               <p style="color:mediumvioletred;font-size:16px;font-weight: bold;font-style: italic;">EMPLOYEE NAME: {{Auth::user()->name}}</p></th>
               <th class="" colspan="3">
               <h5 align="center" style="color: mediumvioletred;">LEAVE DETAILS</h5> </th>
                <th class="" colspan="2"><p style="color:mediumvioletred;font-size:16px;font-weight: bold;font-style: italic;">EMPLOYEE ID: {{Auth::user()->employee_id}}</p></th>            
         </tr>
      </thead>
      <thead>
         <tr class="bg-info">
            <th class="col-xs-1 col-sm-1 col-md-1">S.NO</th>
            <th class="col-xs-2 col-sm-2 col-md-2">FROM DATE</th>
            <th class="col-xs-2 col-sm-2 col-md-2">TO DATE</th>
            <th class="col-xs-1 col-sm-1 col-md-1">DAYS</th>
            <th class="col-xs-3 col-sm-3 col-md-3">LEAVE STATUS</th>
            <th class="col-xs-3 col-sm-3 col-md-3">ACTION</th>
         </tr>
      </thead>
      <tbody >
         <?php $i=0; ?>
         @foreach($employee_detail_leaves as $employee_detail_leave)
         <?php $i++; ?>
         <tr>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $i }}</td>
            <td class="col-xs-1 col-sm-1 col-md-2">{{ $employee_detail_leave->from_date }}</td> 
            <td class="col-xs-2 col-sm-2 col-md-2">{{ $employee_detail_leave->to_date }}</td> 
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $employee_detail_leave->no_of_days }}</td> 
            <td class="col-xs-2 col-sm-2 col-md-2">
               @if($employee_detail_leave->leave_status=='approve')
               <p class="btn btn-success btn-sm" style="font-weight: bold;">
               {{ $employee_detail_leave->leave_status }}
               </p>
               @endif
                @if($employee_detail_leave->leave_status=='cancel')
               <p class="btn btn-danger btn-sm" style="font-weight: bold;text-decoration: line-through;">
               {{ $employee_detail_leave->leave_status }}
               </p>
               @endif
                @if($employee_detail_leave->leave_status=='waiting for apporval')
                <p class="btn btn-secondary btn-sm" style="font-weight: bold;">
               {{ $employee_detail_leave->leave_status='waiting for apporval' }}
               </p>
                @endif
            </td> 
             
            <td class="col-xs-4 col-sm-4 col-md-4">
                <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
               <button type="button" name="edit" id="{{ $employee_detail_leave->id }}" class="edit btn btn-warning btn-sm" @if($employee_detail_leave->leave_status!='waiting for apporval')  style="display: none;" @endif >edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn"" @if($employee_detail_leave->leave_status!='waiting for apporval') disabled @endif -->
                <button type="button" name="view" id="{{ $employee_detail_leave->id }}" class="view btn btn-info btn-sm" @if($employee_detail_leave->leave_status=='waiting for apporval')  style="display: none;" @endif >view</button>
               <button type="button" name="delete" id="{{ $employee_detail_leave->id }}" class="delete btn btn-danger btn-sm"  @if($employee_detail_leave->leave_status!='waiting for apporval') disabled @endif>delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn " -->              
            </td>
         </tr>
         @endforeach       
      </tbody>
   </table>
    <div class="float-right">{{$employee_detail_leaves->links()}}</div> 
</div>
 

@endif   