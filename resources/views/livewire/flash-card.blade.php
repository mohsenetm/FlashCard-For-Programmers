<div>
    <div class="row">
        <label class="col-lg-12">Title</label>
        <textarea class="col-lg-12 form-control" style="margin: auto;text-align:right;direction: rtl;" wire:model="title">
            </textarea>
        <textarea class="col-lg-6 form-control" style="height: 300px;" wire:model="html" placeholder="html"></textarea>
        <textarea class="col-lg-6 form-control" style="height: 300px;" wire:model="php" placeholder="php"></textarea>
        <textarea class="col-lg-6 form-control" style="height: 300px;" wire:model="javascript" placeholder="javascript"></textarea>
        <textarea class="col-lg-6 form-control" style="height: 300px;" wire:model="mysql" placeholder="mysql"></textarea>
    </div>
    <span class="btn btn-danger" wire:click="store()">Save</span>
    <span class="btn btn-success">{{$countFlashCart}}</span>
</div>
