
{{-- 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}



    <div class="row">
      <div class="btn btn-primary text-white" style="text-align:center"> Expenses </div>
      <br>
                   @isset($approvedCount)
                      <div class="col-3">
                        <a href="{{ route('approvedExpenses') }}" class="card text-center py-4 text-decoration-none">  Approval  <br> 
                            <h4> {{ $approvedCount }} </h4>
                        </a>
                       </div>
                    @endisset
                    @isset($notApprovedCount)
                      <div class="col-3">
                        <a href="{{ route('unapprovedExpenses') }}" class="card text-center py-4 text-decoration-none"> Awaiting approval  <br> 
                            <h4> {{ $notApprovedCount }} </h4>
                        </a>
                       </div>
                    @endisset

                     @isset($projectedSpendings)
                      <div class="col-3">
                        <a href="" class="card text-center py-4 text-decoration-none"> Projected Spendings <br> 
                            <h4> {{ $projectedSpendings }} GHS</h4>
                        </a>
                       </div>
                    @endisset

                    @isset($totalSpent)
                      <div class="col-3">
                        <a href="" class="card text-center py-4 text-decoration-none">  Approved spending <br> 
                            <h4> {{ $totalSpent }} GHS</h4>
                        </a>
                       </div>
                    @endisset
    </div>