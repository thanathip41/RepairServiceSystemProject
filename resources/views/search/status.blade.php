<div class="dropdown">
  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	@foreach($sAll as $row) ข้อมูลแจ้งซ่อม&nbsp;<span class="badge badge-danger"> {{$row->number}} @endforeach</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <div align="right">
	<form action="{{action('MainDataRepairController@searchStatus')}}" method="post" > {{ csrf_field() }}
    <button class="dropdown-item"  type="submit" name="searchStatus"	value="1"> รอคิว 
		@foreach($s1 as $row)
		<span class="badge badge-danger"> {{$row->number}} @endforeach </span></button>
		</form>

    <form action="{{action('MainDataRepairController@searchStatus')}}" method="post" > {{ csrf_field() }}
    <button class="dropdown-item"  type="submit" name="searchStatus"	value="2"> ระหว่างการดำเนินการ
		@foreach($s2 as $row)
		<span class="badge badge-danger"> {{$row->number}} @endforeach </span></button>
		</form>

		<form action="{{action('MainDataRepairController@searchStatus')}}" method="post" > {{ csrf_field() }}
    <button class="dropdown-item"  type="submit" name="searchStatus"	value="3"> รอยืนยันจากผู้แจ้งซ่อม 
		@foreach($s3 as $row)
		<span class="badge badge-danger"> {{$row->number}} @endforeach </span></button>
		</form>

    <form action="{{action('MainDataRepairController@searchStatus')}}" method="post" > {{ csrf_field() }}
    <button class="dropdown-item"  type="submit" name="searchStatus"	value="4"> ดำเนินการสำเร็จ
		@foreach($s4 as $row)
		<span class="badge badge-danger"> {{$row->number}} @endforeach </span></button>
		</form>
		<form action="{{action('MainDataRepairController@searchStatus')}}" method="post" > {{ csrf_field() }}
    <button class="dropdown-item"  type="submit" name="searchStatus"	value="5"> รอดำเนินการใหม่ 
		@foreach($s5 as $row)
		<span class="badge badge-danger"> {{$row->number}} @endforeach </span></button>
		</form>

    <form action="{{action('MainDataRepairController@searchStatus')}}" method="post" > {{ csrf_field() }}
    <button class="dropdown-item"  type="submit" name="searchStatus"	value="6"> ส่งเคลม
		@foreach($s6 as $row)
		<span class="badge badge-danger"> {{$row->number}} @endforeach </span></button>
		</form><form action="{{action('MainDataRepairController@searchStatus')}}" method="post" > {{ csrf_field() }}
    <button class="dropdown-item"  type="submit" name="searchStatus"	value="7"> ซื้ออุปกรณ์ใหม่
		@foreach($s7 as $row)
		<span class="badge badge-danger"> {{$row->number}} @endforeach </span></button>
		</form>
        </div>
  </div>
</div>