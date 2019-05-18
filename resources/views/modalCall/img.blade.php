@if ($row['img']=="") <img src="#" width="100" height="50"></a>
@else
<a  href="#" data-toggle="modal" data-target="#img"><img src="{{asset('storage').'/'.$row['img']}}" width="100" height="50"></a>
          <div class="modal" id="img"  role="dialog" >
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <p align="center"> <img src="{{asset('storage').'/'.$row['img']}}" width="750" height="400"></p>
               
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
          </div>
        </div>
        @endif