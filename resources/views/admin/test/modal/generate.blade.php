<div id="generate{{ $item->id }}" class="modal fade" tabindex="-1"
    role="dialog" aria-labelledby="label-modal-confirm" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content tx-14">
           <div class="modal-header">
               <h6 class="modal-title" id="label-modal-confirm">Hapus</h6>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <div class="modal-body">
               <p class="mg-b-0">Apakah Anda yakin akan Generate Password Test?</p>
           </div>
           <form action="{{ route('generate',$item->id) }}" method="POST">
            @csrf
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Tidak</button>
                   <button type="submit" class="btn btn-danger tx-13">Ya, Generate</button>
               </div>
            </form>
       </div>
   </div>
</div>
