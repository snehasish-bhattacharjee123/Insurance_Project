<div wire:ignore.self class="modal fade" id="AddSlider" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetField()"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store()">
                    <div class="col-md-8 my-2">
                        <label class="form-label">Slider Title</label>
                        <input type="text" class="form-control" wire:model="slider_title">
                        @error('slider_title')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-8 my-4">
                        <label class="form-label">Slider Image</label>
                        <input type="file" class="form-control" wire:model="slider_image">
                        @error('slider_image')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label my-3">Status</label>
                        <input type="checkbox" class="form-check-input form-control" wire:model="status">
                    </div>


                    <div class="col-md-12 my-4">
                        <label class="form-label">Slider Description</label>
                        <textarea type="text" class="form-control" wire:model="slider_description" role="2"> </textarea>
                        @error('slider_description')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="resetField()">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- edit section -->

<div wire:ignore.self class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="resetField()"
                    aria-label="Close"></button>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div wire:loading class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div wire:loading.remove class="modal-body">
                <form wire:submit.prevent="update()">
                    <div class="col-md-8 my-2">
                        <label class="form-label">Slider Title</label>
                        <input type="text" class="form-control" wire:model="slider_title">
                        @error('slider_title')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-8 my-4">
                        <label class="form-label">Slider Image</label>
                        <input type="file" class="form-control" wire:model="slider_image"> 
                        
                        @if (!empty($slider_image))
                            <img src="{{ asset('storage/slider/' . $slider_image) }}" alt="Slider Image" class="img-fluid mt-2" style="height: 100px; width: 100px; background-size: cover">
                        @endif
                        
                        @error('slider_image')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="form-label my-3">Status</label>
                        <input type="checkbox" class="form-check-input form-control" wire:model="status">
                    </div>


                    <div class="col-md-12 my-4">
                        <label class="form-label">Slider Description</label>
                        <textarea type="text" class="form-control" wire:model="slider_description" role="2"> </textarea>
                        @error('slider_description')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click="resetField()">Close</button>
                <button type="submit" class="btn btn-warning">Update changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
