<div>
{{--@if($isBtnAddClicked) --}}
{{--@else--}}
<div class="row p-4  pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2"></i>Listes des utilisateurs</h3>
                <div class="card-tools d-flex align-items-center">
                    <a href="#"
                    class="btn btn-link text-white
                     mr-4 d-block" wire:click.prevent="goToAddUser()"><i class="fas fa-user-plus"></i>Nouvel utilisateurs</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 300px;">
                {{$users}}
            </div>
            <div class="card-footer">
                <div class="float-right">
                    {{-- $users->links()- -- --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{--@endif--}}
</div>
